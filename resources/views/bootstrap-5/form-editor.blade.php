<div class="form-group">
    <x-form-label :label="$label" :required="$attributes->has('required')" :for="$attributes->get('id') ?: $id()" />

    <div x-data="{
        value: {{ json_encode($value) }},
        prefix: {{ json_encode($prefix) }},
        accept: 'image/*',
        folder: '{{ $folder }}',
        csrfToken: {{ json_encode(csrf_token()) }},
        uploading: false,
        init() {
            this.initEditor()
        },
        destroyEditor() {
            tinymce.activeEditor.destroy();
        },
        initEditor() {
            let that = this;
            tinymce.init({
                {{ $setup() }},
                target: $refs.tinymce,
                @if ($attributes->get('disabled')) content_style: 'body { opacity: 50% }',
                @else
                content_style: 'img { max-width: 100%; height: auto; }', @endif

                setup: function(editor) {
                    editor.on('keyup', (e) => that.value = editor.getContent())
                    editor.on('change', (e) => that.value = editor.getContent())
                    editor.on('init', () => editor.setContent(that.value ?? ''))
                    editor.on('OpenWindow', (e) => tinymce.activeEditor.topLevelWindow = e.dialog)

                    // Handles a case where people try to change contents on the fly from Livewire methods
                    $watch('value', function(newValue) {
                        if (newValue !== editor.getContent()) {
                            editor.resetContent(newValue || '');
                        }
                    })
                },
                file_picker_callback: function(cb, value, meta) {
                    const formData = new FormData()
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.click();

                    tinymce.activeEditor.topLevelWindow.block('');

                    input.addEventListener('change', (e) => {
                        const file = e.target.files[0];

                        fetch(that.prefix + '/upload/signed', {
                                headers: {
                                    'Content-Type': 'application/json',
                                    Accept: 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'X-CSRF-Token': that.csrfToken,
                                },
                                method: 'post',
                                credentials: 'same-origin',
                                body: JSON.stringify({
                                    filename: file.name.split('.').slice(0, -1).join('.'),
                                    extension: file.type.replace(/(.*)\//g, ''),
                                    prefix: that.prefix,
                                    accept: that.accept,
                                    folder: that.folder
                                }),
                            })
                            .then(function(response) {
                                return response.json();
                            })
                            .then(function(response) {
                                if (response.disk != 's3') {
                                    for (const [key, val] of Object.entries(response.inputs)) {
                                        formData.append(key, val);
                                    }
                                    formData.append('file', file, response.attributes.name);
                                } else {
                                    formData = file;
                                }

                                fetch(response.attributes.action, {
                                        method: response.attributes.method,
                                        body: formData,
                                        headers: {
                                            Accept: 'application/json',
                                            'X-Requested-With': 'XMLHttpRequest',
                                        }
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        cb(data.paths[0].url)
                                    })
                                    .catch((err) => {
                                        console.log(err);
                                        alert('Error uploading image!')
                                    })
                                    .finally(() => {
                                        that.uploading = false;
                                        tinymce.activeEditor.topLevelWindow.unblock()
                                    })
                            })
                            .catch((err) => {
                                console.log(err);
                                alert('Error uploading image!')
                            })
                            .finally(() => {
                                that.uploading = false;
                                tinymce.activeEditor.topLevelWindow.unblock()
                            });
                    });
                }
            })
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

    <x-help> {!! $help ?? null !!} </x-help>
</div>
