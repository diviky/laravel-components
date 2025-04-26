<div class="form-group">
    <x-form-label :label="$label" :required="$isRequired()" :for="$attributes->get('id') ?: $id()" />

    <div x-data="{
        value: {{ $entangle($attributes) }},
        prefix: {{ json_encode($prefix) }},
        accept: 'image/*',
        folder: '{{ $folder }}',
        csrfToken: {{ json_encode(csrf_token()) }},
        uploading: false,
        init() {
            this.initEditor()
        },
        destroyEditor() {
            window.destroyTinyMCE();
        },
        initEditor() {
            window.initTinyMCE({
                target: $refs.tinymce,
                value: this.value,
                prefix: this.prefix,
                accept: this.accept,
                folder: this.folder,
                csrfToken: this.csrfToken,
                disabled: {{ $attributes->get('disabled') ? 'true' : 'false' }},
                customSetup: `{{ $setup() }}`,
                onContentChange: (content) => {
                    this.value = content;
                },
                onUploadStart: () => {
                    this.uploading = true;
                },
                onUploadEnd: () => {
                    this.uploading = false;
                },
                watchValueCallback: (callback) => {
                    $watch('value', callback);
                }
            });
        }
    }" wire:ignore x-on:livewire:navigating.window="destroyEditor()">
        <div class="relative disabled" :class="uploading && 'pointer-events-none opacity-50'">
            <textarea id="{{ $id() }}" {{ $attributes }} {{ $extraAttributes }} name="{{ $name }}" x-ref="tinymce"></textarea>

            <div class="absolute top-1/2 start-1/2 !opacity-100 text-center hidden" :class="uploading && '!block'">
                <div>Uploading</div>
                <div class="loading loading-dots"></div>
            </div>
        </div>
    </div>

    <x-form-errors :name="$name" />

    <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
</div>
