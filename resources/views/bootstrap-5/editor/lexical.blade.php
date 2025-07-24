<div class="form-group">
    <x-form-label :label="$label" :required="$isRequired()" :for="$attributes->get('id') ?: $id()" />

    <div x-data="{
        editorInstance: null,
        value: {{ $entangle($attributes) }},
        prefix: {{ json_encode($prefix) }},
        accept: 'image/*',
        folder: '{{ $folder }}',
        csrfToken: {{ json_encode(csrf_token()) }},
        uploadUrl: '{{ $uploadUrl }}',
        uploading: false,
        init() {
            // Initialize editor when Alpine loads
            this.$nextTick(() => {
                this.initializeEditor();
            });

            // Handles a case where people try to change contents on the fly from Livewire methods
            this.$watch('value', (newValue) => {
                if (this.editorInstance && newValue !== this.editorInstance.getEditorContent()) {
                    this.value = newValue || '';
                    this.editorInstance.value = this.value;
                    this.editorInstance.updateEditorContent();
                }
            });
        },
        initializeEditor() {
            const config = {{ $setup() }};

            this.editorInstance = new LexicalEditor({
                value: this.value,
                prefix: this.prefix,
                accept: this.accept,
                folder: this.folder,
                csrfToken: this.csrfToken,
                uploadUrl: this.uploadUrl,
                config: config,
                editorContainer: $refs.editorContainer{{ $id() }},
                toolbarElement: $refs.toolbar{{ $id() }},
                hiddenInput: $refs.hiddenInput{{ $id() }},
                onUploadingChange: (state) => {
                    this.uploading = state;
                }
            });
        },
        destroyEditor() {
            if (this.editorInstance) {
                this.editorInstance.destroy();
                this.editorInstance = null;
            }
        }
    }" wire:ignore x-on:livewire:navigating.window="destroyEditor()">
        <div class="relative" :class="uploading && 'pointer-events-none opacity-50'">
            <!-- Toolbar -->
            <div x-ref="toolbar{{ $id() }}"
                class="lexical-toolbar bg-light border p-1 mb-1 rounded-sm d-flex flex-wrap gap-1">
                <!-- Text formatting -->
                <button type="button" class="btn btn-sm btn-outline-secondary" data-action="format" data-format="bold">
                    <i class="fas fa-bold"></i>
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary" data-action="format"
                    data-format="italic">
                    <i class="fas fa-italic"></i>
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary" data-action="format"
                    data-format="underline">
                    <i class="fas fa-underline"></i>
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary" data-action="format"
                    data-format="strikethrough">
                    <i class="fas fa-strikethrough"></i>
                </button>

                <div class="vr mx-1"></div>

                <!-- Block formatting -->
                <button type="button" class="btn btn-sm btn-outline-secondary" data-action="paragraph"
                    data-format="h1">H1</button>
                <button type="button" class="btn btn-sm btn-outline-secondary" data-action="paragraph"
                    data-format="h2">H2</button>
                <button type="button" class="btn btn-sm btn-outline-secondary" data-action="paragraph"
                    data-format="h3">H3</button>
                <button type="button" class="btn btn-sm btn-outline-secondary" data-action="paragraph"
                    data-format="quote">
                    <i class="fas fa-quote-right"></i>
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary" data-action="paragraph"
                    data-format="code">
                    <i class="fas fa-code"></i>
                </button>

                <div class="vr mx-1"></div>

                <!-- Lists -->
                <button type="button" class="btn btn-sm btn-outline-secondary" data-action="paragraph"
                    data-format="ul">
                    <i class="fas fa-list-ul"></i>
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary" data-action="paragraph"
                    data-format="ol">
                    <i class="fas fa-list-ol"></i>
                </button>

                <div class="vr mx-1"></div>

                <!-- Insert elements -->
                <button type="button" class="btn btn-sm btn-outline-secondary" data-action="insert"
                    data-format="image">
                    <i class="fas fa-image"></i>
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary" data-action="insert" data-format="link">
                    <i class="fas fa-link"></i>
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary" data-action="insert"
                    data-format="table">
                    <i class="fas fa-table"></i>
                </button>
            </div>

            <!-- Editor content area -->
            <div x-ref="editorContainer{{ $id() }}" class="lexical-editor border rounded-sm p-2 min-h-[200px]">
            </div>

            <!-- Hidden input to store HTML content -->
            <input type="hidden" id="{{ $id() }}" {{ $attributes->except(['extra-attributes', 'settings']) }}
                {{ $extraAttributes }} name="{{ $name }}" x-ref="hiddenInput{{ $id() }}"
                :value="value">

            <!-- Upload indicator -->
            <div class="absolute top-1/2 start-1/2 -translate-x-1/2 -translate-y-1/2 opacity-100! text-center hidden"
                :class="uploading && 'block!'">
                <div>Uploading</div>
                <div class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>

    <x-form-errors :name="$name" />

    <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
</div>
