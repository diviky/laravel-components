import EasyMDE from 'easymde';
window.EasyMDE = EasyMDE;

/**
 * Handle image upload for EasyMDE
 */
export function handleImageUpload(file, onSuccess, onError, config) {
    const { prefix, csrfToken, folder, accept, setUploading } = config;

    if (file.type.split('/')[0] !== 'image') {
        return onError('File must be an image.');
    }

    setUploading(true);
    const filepondFormData = new FormData();

    fetch(`${prefix}/upload/signed`, {
        headers: {
            'Content-Type': 'application/json',
            Accept: 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-Token': csrfToken,
        },
        method: 'post',
        credentials: 'same-origin',
        body: JSON.stringify({
            filename: file.name.split('.').slice(0, -1).join('.'),
            extension: file.type.replace(/(.*)\//g, ''),
            prefix,
            accept,
            folder,
        }),
    })
        .then((response) => response.json())
        .then((response) => {
            if (response.disk != 's3') {
                for (const [key, val] of Object.entries(response.inputs)) {
                    filepondFormData.append(key, val);
                }
                filepondFormData.append('file', file, response.attributes.name);
                return fetch(response.attributes.action, {
                    method: response.attributes.method,
                    body: filepondFormData,
                    headers: {
                        Accept: 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                });
            } else {
                return fetch(response.attributes.action, {
                    method: response.attributes.method,
                    body: file,
                    headers: {
                        Accept: 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                });
            }
        })
        .then((response) => response.json())
        .then((data) => {
            onSuccess(data.paths[0].url);
        })
        .catch((err) => {
            console.error(err);
            onError('Error uploading image!');
        })
        .finally(() => setUploading(false));
}

// Alpine.js component for EasyMDE
window.initAlpineEasyMde = function () {
    return {
        editor: null,
        value: null,
        prefix: null,
        accept: 'image/*',
        folder: null,
        csrfToken: null,
        uploadUrl: null,
        uploading: false,
        setup: {},
        syncingFromEditor: false,

        init() {
            this.$nextTick(() => {
                this.initEditor();

                // Sync when Livewire pushes a new value into the entangled property.
                // Do not reassign `this.value` here — that would replace the entangle proxy.
                this.$watch('value', (newValue) => {
                    if (this.syncingFromEditor || !this.editor) {
                        return;
                    }

                    const next = newValue ?? '';
                    if (next !== this.editor.value()) {
                        this.editor.value(next);
                        this.editor.codemirror.save();
                    }
                });
            });
        },

        destroyEditor() {
            if (this.editor) {
                this.editor.toTextArea();
                this.editor = null;
            }
        },

        initEditor() {
            if (this.editor || !this.$refs.textarea) {
                return;
            }

            const initialValue = this.value ?? this.$refs.textarea.value ?? '';

            if (this.$refs.textarea.value !== initialValue) {
                this.$refs.textarea.value = initialValue;
            }

            this.editor = new EasyMDE({
                ...this.setup,
                element: this.$refs.textarea,
                initialValue: initialValue,
                imageUploadFunction: (file, onSuccess, onError) => {
                    handleImageUpload(file, onSuccess, onError, {
                        prefix: this.prefix,
                        csrfToken: this.csrfToken,
                        folder: this.folder,
                        accept: this.accept,
                        setUploading: (val) => (this.uploading = val),
                    });
                },
            });

            // Sync editor changes back to the textarea (non-Livewire forms) and Alpine/Livewire entangle
            this.editor.codemirror.on('change', () => {
                const newValue = this.editor.value();
                this.editor.codemirror.save();

                if (this.value !== newValue) {
                    this.syncingFromEditor = true;
                    this.value = newValue;
                    this.$nextTick(() => {
                        this.syncingFromEditor = false;
                    });
                }
            });

            // CodeMirror needs a refresh when initialized inside a hidden container.
            this.$nextTick(() => {
                if (this.editor) {
                    this.editor.codemirror.refresh();
                }
            });
        },
    };
};
