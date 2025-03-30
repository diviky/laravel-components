import Quill from 'quill';

const Link = Quill.import('formats/link');

class CustomLink extends Link {
    static tagName = 'span';

    static create(value) {
        let node = super.create(value);
        node.classList.add('link');
        node.style.cursor = 'pointer';
        return node;
    }
}

Quill.register(CustomLink, true);

class QuillEditor {
    constructor(options = {}) {
        this.editor = null;
        this.options = options;
        this.uploading = false;
    }

    init(container, initialValue, config) {
        // Initialize Quill editor
        this.editor = new Quill(container, config);

        // Set initial content
        if (initialValue) {
            this.editor.root.innerHTML = initialValue;
        }

        // Set up the image handler if uploadUrl is provided
        if (this.options.uploadUrl) {
            const toolbar = this.editor.getModule('toolbar');
            toolbar.addHandler('image', () => this.imageHandler());
        }

        return this.editor;
    }

    getContents() {
        return this.editor ? this.editor.root.innerHTML : '';
    }

    setContents(contents) {
        if (this.editor) {
            this.editor.root.innerHTML = contents;
        }
    }

    destroy() {
        this.editor = null;
    }

    imageHandler() {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', this.options.accept || 'image/*');
        input.click();

        input.onchange = () => {
            const file = input.files[0];
            if (file) {
                this.uploading = true;
                this.options.onUploadStart?.();

                // First, get a signed URL
                fetch(this.options.prefix + '/upload/signed', {
                    headers: {
                        'Content-Type': 'application/json',
                        Accept: 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-Token': this.options.csrfToken,
                    },
                    method: 'post',
                    credentials: 'same-origin',
                    body: JSON.stringify({
                        filename: file.name.split('.').slice(0, -1).join('.'),
                        extension: file.type.replace(/(.*)\//g, ''),
                        prefix: this.options.prefix,
                        accept: this.options.accept || 'image/*',
                        folder: this.options.folder,
                    }),
                })
                    .then((response) => response.json())
                    .then((response) => {
                        let formData;

                        if (response.disk != 's3') {
                            formData = new FormData();
                            for (const [key, val] of Object.entries(response.inputs)) {
                                formData.append(key, val);
                            }
                            formData.append('file', file, response.attributes.name);
                        } else {
                            formData = file;
                        }

                        return fetch(response.attributes.action, {
                            method: response.attributes.method,
                            body: formData,
                            headers: {
                                Accept: 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                            },
                        });
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        // Insert the image into the editor at cursor position
                        const range = this.editor.getSelection(true);
                        this.editor.insertEmbed(range.index, 'image', data.paths[0].url);
                    })
                    .catch((error) => {
                        console.error('Error uploading image:', error);
                    })
                    .finally(() => {
                        this.uploading = false;
                        this.options.onUploadEnd?.();
                    });
            }
        };
    }

    onChange(callback) {
        if (this.editor) {
            this.editor.on('text-change', () => {
                callback(this.getContents());
            });
        }
    }
}

// Export both Quill and the QuillEditor class
window.Quill = Quill;
window.QuillEditor = QuillEditor;

export { Quill, QuillEditor };
