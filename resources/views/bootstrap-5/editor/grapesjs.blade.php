<div class="form-group">
    <x-form-label :label="$label" :required="$isRequired()" :for="$attributes->get('id') ?: $id()" />
    <div x-data="{
        grapesjsEditor: null,
        value: {{ $entangle($attributes) }},
        prefix: {{ json_encode($prefix) }},
        uploading: false,

        init() {
            // Initialize the editor after ensuring the required module is loaded
            if (window.GrapesJSEditor) {
                this.initEditor();
            } else {
                // Wait for the script to be loaded
                document.addEventListener('DOMContentLoaded', () => {
                    if (window.GrapesJSEditor) {
                        this.initEditor();
                    } else {
                        // Check periodically until the script is loaded
                        const checkInterval = setInterval(() => {
                            if (window.GrapesJSEditor) {
                                clearInterval(checkInterval);
                                this.initEditor();
                            }
                        }, 100);
                    }
                });
            }

            // Watch for value changes
            this.$watch('value', (newValue) => {
                if (this.grapesjsEditor && newValue !== this.getValue()) {
                    this.destroyEditor();
                    this.initEditor();
                }
            });
        },

        initEditor() {
            const containerId = 'grapesjs-editor-{{ $id() }}';

            this.grapesjsEditor = new GrapesJSEditor({
                containerId: containerId,
                inputId: '{{ $id() }}',
                value: this.value,
                editorConfig: {{ $setup() }},
                csrfToken: {{ json_encode(csrf_token()) }},
                uploadUrl: '{{ $uploadUrl }}',
                prefix: this.prefix,
                folder: '{{ $folder }}'
            });

            this.grapesjsEditor.init();
        },

        getValue() {
            return this.grapesjsEditor ? this.grapesjsEditor.editor.getHtml() : '';
        },

        destroyEditor() {
            if (this.grapesjsEditor) {
                this.grapesjsEditor.destroy();
                this.grapesjsEditor = null;
            }
        }
    }" wire:ignore x-on:livewire:navigating.window="destroyEditor()">
        <div class="grapesjs-editor-container" :class="uploading && 'pointer-events-none opacity-50'">
            <div id="grapesjs-editor-{{ $id() }}"></div>

            <input type="hidden" id="{{ $id() }}" {{ $attributes->except(['extra-attributes', 'settings']) }}
                {{ $extraAttributes }} name="{{ $name }}" :value="value">

            <div class="editor-loading" x-show="uploading">
                <div>Uploading</div>
                <div class="loading loading-dots"></div>
            </div>
        </div>
    </div>

    <x-form-errors :name="$name" />

    <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
</div>
