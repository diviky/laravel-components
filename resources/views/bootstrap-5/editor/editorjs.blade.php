<div class="form-group">
    <x-form-label :label="$label" :required="$isRequired()" :for="$attributes->get('id') ?: $id()" />

    <div x-data="{
        editorInstance: null,
        value: {{ $entangle($attributes) }},
        uploading: false,
        init() {
            this.$nextTick(() => {
                this.initEditor();
            });

            // Handle Livewire updates
            this.$watch('value', (newValue) => {
                // Only reinitialize if the value changes externally
                if (this.editorInstance && JSON.stringify(newValue) !== $refs.hiddenInput{{ $id() }}.value) {
                    this.destroyEditor();
                    this.initEditor();
                }
            });
        },
        initEditor() {
            const config = {{ $setup() }};

            // Create EditorJS component
            this.editorInstance = new EditorJsComponent({
                container: $refs.editorContainer{{ $id() }},
                value: this.value,
                tools: config.tools,
                readOnly: config.readOnly,
                placeholder: config.placeholder,
                uploadUrl: '{{ $uploadUrl }}',
                csrfToken: {{ json_encode(csrf_token()) }},
                prefix: {{ json_encode($prefix) }},
                accept: 'image/*',
                folder: '{{ $folder }}',
                hiddenInput: $refs.hiddenInput{{ $id() }}
            }).init();

            // Set up custom image uploader
            if (config.tools && config.tools.image) {
                // The image tool will be properly configured in the instance
                config.tools.image.config = config.tools.image.config || {};
                config.tools.image.config.uploader = {
                    uploadByFile: async (file) => {
                        this.uploading = true;
                        try {
                            const url = await this.editorInstance.uploadImage(file);
                            this.uploading = false;
                            return {
                                success: 1,
                                file: {
                                    url: url
                                }
                            };
                        } catch (error) {
                            this.uploading = false;
                            return {
                                success: 0,
                                error: error.message
                            };
                        }
                    }
                };
            }
        },
        destroyEditor() {
            if (this.editorInstance) {
                this.editorInstance.destroy();
                this.editorInstance = null;
            }
        }
    }" wire:ignore x-on:livewire:navigating.window="destroyEditor()">
        <div class="relative" :class="uploading && 'pointer-events-none opacity-50'">
            <div x-ref="editorContainer{{ $id() }}" class="editor-js-container"></div>
            <input type="hidden" id="{{ $id() }}" {{ $attributes->except(['extra-attributes', 'settings']) }}
                {{ $extraAttributes }} name="{{ $name }}" x-ref="hiddenInput{{ $id() }}"
                :value="JSON.stringify(value)">

            <div class="editor-js-loading hidden" :class="uploading && '!block'">
                <div>Uploading</div>
                <div class="loading loading-dots"></div>
            </div>
        </div>
    </div>

    <x-form-errors :name="$name" />

    <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
</div>
