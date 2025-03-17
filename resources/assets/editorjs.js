import EditorJS from '@editorjs/editorjs';
import Header from '@editorjs/header';
import List from '@editorjs/list';
import Checklist from '@editorjs/checklist';
import Quote from '@editorjs/quote';
import CodeTool from '@editorjs/code';
import ImageTool from '@editorjs/image';
import Embed from '@editorjs/embed';
import Table from '@editorjs/table';
import LinkTool from '@editorjs/link';
import Marker from '@editorjs/marker';

class EditorJsComponent {
    constructor(options) {
        this.options = options || {};
        this.editor = null;
        this.value = this.options.value || {};
        this.uploadUrl = this.options.uploadUrl;
        this.csrfToken = this.options.csrfToken;
        this.prefix = this.options.prefix || '';
        this.accept = this.options.accept || 'image/*';
        this.folder = this.options.folder || '';
        this.hiddenInput = this.options.hiddenInput;
        this.container = this.options.container;
    }

    init() {
        // Parse the value if it's a string
        let editorData = {};
        if (typeof this.value === 'string') {
            try {
                editorData = this.value ? JSON.parse(this.value) : { blocks: [] };
            } catch (e) {
                editorData = { blocks: [] };
            }
        } else {
            editorData = this.value || { blocks: [] };
        }

        // Default tools configuration
        const defaultTools = {
            header: Header,
            list: List,
            checklist: Checklist,
            quote: Quote,
            code: CodeTool,
            image: {
                class: ImageTool,
                config: {
                    uploader: {
                        uploadByFile: this.uploadImage.bind(this),
                    },
                },
            },
            embed: Embed,
            table: Table,
            linkTool: LinkTool,
            marker: Marker,
        };

        // Initialize Editor.js with configuration
        const config = {
            holder: this.container,
            data: editorData,
            readOnly: this.options.readOnly || false,
            placeholder: this.options.placeholder || 'Write something...',
            tools: this.options.tools || defaultTools,
            onChange: () => {
                this.updateValue();
            },
            onReady: () => {
                // Callback when editor is ready
            },
            autofocus: this.options.autofocus || false,
        };

        // Initialize the editor
        this.editor = new EditorJS(config);

        return this;
    }

    updateValue() {
        // Save the data when content changes
        this.editor.save().then((outputData) => {
            if (this.hiddenInput) {
                this.hiddenInput.value = JSON.stringify(outputData);
                // Trigger change event for frameworks integration
                this.hiddenInput.dispatchEvent(new Event('change', { bubbles: true }));
                this.hiddenInput.dispatchEvent(new Event('input', { bubbles: true }));
            }
        });
    }

    destroy() {
        if (this.editor) {
            this.editor.destroy();
            this.editor = null;
        }
    }

    uploadImage(file) {
        return new Promise((resolve, reject) => {
            if (!file) {
                reject(new Error('No file provided'));
                return;
            }

            if (!file.name) {
                reject(new Error('File name is undefined'));
                return;
            }

            const formData = new FormData();
            const fileExtension = file.name.split('.').pop() || '';
            const fileName = file.name.split('.').slice(0, -1).join('.') || 'file';

            // First, get a signed URL
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
                    filename: fileName,
                    extension: file.type ? file.type.replace(/(.*)\//g, '') : fileExtension,
                    prefix: this.prefix,
                    accept: this.accept,
                    folder: this.folder,
                }),
            })
                .then((response) => response.json())
                .then((response) => {
                    let uploadData;

                    if (response.disk != 's3') {
                        uploadData = new FormData();
                        for (const [key, val] of Object.entries(response.inputs || {})) {
                            uploadData.append(key, val);
                        }
                        uploadData.append('file', file, response.attributes?.name || file.name);
                    } else {
                        uploadData = file;
                    }

                    return fetch(response.attributes?.action || '', {
                        method: response.attributes?.method || 'POST',
                        body: uploadData,
                        headers: {
                            Accept: 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                    });
                })
                .then((response) => response.json())
                .then((data) => {
                    if (!data || !data.paths || !data.paths[0] || !data.paths[0].url) {
                        throw new Error('Invalid response format from the server');
                    }
                    resolve({
                        success: 1,
                        file: {
                            url: data.paths[0].url,
                        },
                    });
                })
                .catch((error) => {
                    console.error('Error uploading image:', error);
                    reject(error);
                });
        });
    }
}

export default EditorJsComponent;
window.EditorJsComponent = EditorJsComponent;
