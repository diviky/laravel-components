<div class="form-group">
    <x-form-label :label="$label" :required="$isRequired()" :for="$attributes->get('id') ?: $id()" />

    <div x-data="{
        editor: null,
        quillEditor: null,
        value: {{ $entangle($attributes) }},
        prefix: {{ json_encode($prefix) }},
        accept: 'image/*',
        folder: '{{ $folder }}',
        csrfToken: {{ json_encode(csrf_token()) }},
        uploadUrl: '{{ $uploadUrl }}',
        uploading: false,
        isUpdating: false,
        init() {
            // Create QuillEditor instance
            this.quillEditor = new QuillEditor({
                prefix: this.prefix,
                accept: this.accept,
                folder: this.folder,
                csrfToken: this.csrfToken,
                uploadUrl: this.uploadUrl,
                onUploadStart: () => { this.uploading = true },
                onUploadEnd: () => { this.uploading = false }
            });

            this.initEditor();

            // Handles a case where people try to change contents on the fly from Livewire methods
            this.$watch('value', (newValue) => {
                if (this.isUpdating) return;

                if (this.editor && newValue !== this.quillEditor.getContents()) {
                    this.isUpdating = true;
                    // Instead of destroying/recreating the editor, just set the content
                    this.quillEditor.setContents(newValue || '');
                    $refs.hiddenInput{{ $id() }}.value = newValue || '';
                    this.isUpdating = false;
                }
            });
        },
        initEditor() {
            const config = {{ $setup() }};
            this.editor = this.quillEditor.init($refs.quillContainer{{ $id() }}, this.value, config);

            // Update value when content changes
            this.quillEditor.onChange((content) => {
                if (this.isUpdating) return;

                this.isUpdating = true;
                this.value = content;
                // Update hidden field
                $refs.hiddenInput{{ $id() }}.value = content;
                this.isUpdating = false;
            });
        },
        destroyEditor() {
            if (this.quillEditor) {
                this.quillEditor.destroy();
                this.editor = null;
            }
        }
    }" wire:ignore x-on:livewire:navigating.window="destroyEditor()">
        <div class="relative" :class="uploading && 'pointer-events-none opacity-50'">
            <div x-ref="quillContainer{{ $id() }}" class="quill-editor"></div>
            <input type="hidden" id="{{ $id() }}" {{ $attributes->except(['extra-attributes', 'settings']) }}
                {{ $extraAttributes }} name="{{ $name }}" x-ref="hiddenInput{{ $id() }}"
                :value="value">

            <div class="absolute top-1/2 start-1/2 opacity-100! text-center hidden" :class="uploading && 'block!'">
                <div>Uploading</div>
                <div class="loading loading-dots"></div>
            </div>
        </div>
    </div>

    <x-form-errors :name="$name" />

    <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
</div>
