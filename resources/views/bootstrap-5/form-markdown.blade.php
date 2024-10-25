<div class="form-group">
    <x-form-label :label="$label" :required="$attributes->has('required')" :for="$attributes->get('id') ?: $id()" />

    <div x-data="{
        editor: null,
        value: {{ json_encode($value) }},
        prefix: {{ json_encode($prefix) }},
        accept: 'image/*',
        folder: '{{ $folder }}',
        csrfToken: {{ json_encode(csrf_token()) }},
        uploadUrl: '{{ $uploadUrl }}',
        uploading: false,
        init() {
            this.initEditor()

            // Handles a case where people try to change contents on the fly from Livewire methods
            this.$watch('value', (newValue) => {
                if (newValue !== this.editor.value()) {
                    this.value = newValue || ''
                    this.destroyEditor()
                    this.initEditor()
                }
            })
        },
        destroyEditor() {
            this.editor.toTextArea();
            this.editor = null
        },
        initEditor() {
            this.editor = new EasyMDE({
                {{ $setup() }},
                element: $refs.markdown{{ $id() }},
                initialValue: this.value ?? '',
                imageUploadFunction: (file, onSuccess, onError) => {
                    if (file.type.split('/')[0] !== 'image') {
                        return onError('File must be an image.');
                    }

                    this.uploading = true
                    let that = this;

                    var filepondFormData = new FormData();
                    fetch(this.prefix + '/upload/signed', {
                            headers: {
                                'Content-Type': 'application/json',
                                Accept: 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-Token': this.csrfToken,
                            },
                            method: 'post',
                            credentials: 'same-origin',
                            body: JSON.stringify({
                                filename: file.name.split('.').slice(0, -1).join('.'),
                                extension: file.type.replace(/(.*)\//g, ''),
                                prefix: this.prefix,
                                accept: this.accept,
                                folder: this.folder
                            }),
                        })
                        .then(function(response) {
                            return response.json();
                        })
                        .then(function(response) {
                            if (response.disk != 's3') {
                                for (const [key, val] of Object.entries(response.inputs)) {
                                    filepondFormData.append(key, val);
                                }
                                filepondFormData.append('file', file, response.attributes.name);
                            } else {
                                filepondFormData = file;
                            }

                            fetch(response.attributes.action, {
                                    method: response.attributes.method,
                                    body: filepondFormData,
                                    headers: {
                                        Accept: 'application/json',
                                        'X-Requested-With': 'XMLHttpRequest',
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    onSuccess(data.paths[0].url)
                                })
                                .catch((err) => {
                                    console.log(err);
                                    onError('Error uploading image!')
                                })
                                .finally(() => this.uploading = false)
                        })
                        .catch((err) => {
                            console.log(err);
                            onError('Error uploading image!')
                        })
                        .finally(() => this.uploading = false);
                }
            })

            this.editor.codemirror.on('change', () => this.value = this.editor.value())
        }
    }" wire:ignore x-on:livewire:navigating.window="destroyEditor()">
        <div class="relative disabled" :class="uploading && 'pointer-events-none opacity-50'">
            <textarea id="{{ $id() }}" {{ $attributes }} {{ $extraAttributes }} name="{{ $name }}"
                x-ref="markdown{{ $id() }}"></textarea>

            <div class="absolute top-1/2 start-1/2 !opacity-100 text-center hidden" :class="uploading && '!block'">
                <div>Uploading</div>
                <div class="loading loading-dots"></div>
            </div>
        </div>
    </div>

    <x-form-errors :name="$name" />

    <x-help> {!! $help ?? null !!} </x-help>
</div>
