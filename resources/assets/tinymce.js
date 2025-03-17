/* Import TinyMCE */
import tinymce from '/node_modules/tinymce';

/* Default icons are required. After that, import custom icons if applicable */
import '/node_modules/tinymce/icons/default/icons.min.js';

/* Required TinyMCE components */
import '/node_modules/tinymce/themes/silver/theme.min.js';
import '/node_modules/tinymce/models/dom/model.min.js';

/* Import a skin (can be a custom skin instead of the default) */
import '/node_modules/tinymce/skins/ui/oxide/skin.js';
import '/node_modules/tinymce/skins/ui/oxide-dark/skin.js';

/* Import plugins */
import '/node_modules/tinymce/plugins/accordion';
import '/node_modules/tinymce/plugins/advlist';
import '/node_modules/tinymce/plugins/anchor';
import '/node_modules/tinymce/plugins/autolink';
import '/node_modules/tinymce/plugins/autoresize';
import '/node_modules/tinymce/plugins/autosave';
import '/node_modules/tinymce/plugins/code';
import '/node_modules/tinymce/plugins/codesample';
import '/node_modules/tinymce/plugins/emoticons';
import '/node_modules/tinymce/plugins/emoticons/js/emojis';
import '/node_modules/tinymce/plugins/fullscreen';
import '/node_modules/tinymce/plugins/image';
import '/node_modules/tinymce/plugins/insertdatetime';
import '/node_modules/tinymce/plugins/link';
import '/node_modules/tinymce/plugins/lists';
import '/node_modules/tinymce/plugins/media';
import '/node_modules/tinymce/plugins/nonbreaking';
import '/node_modules/tinymce/plugins/pagebreak';
import '/node_modules/tinymce/plugins/preview';
import '/node_modules/tinymce/plugins/searchreplace';
import '/node_modules/tinymce/plugins/table';
import '/node_modules/tinymce/plugins/quickbars';
import '/node_modules/tinymce/plugins/visualblocks';
import '/node_modules/tinymce/plugins/wordcount';

window.tinymce = tinymce;

// TinyMCE Editor initialization function
window.initTinyMCE = function (options = {}) {
    const {
        target,
        value,
        prefix,
        accept = 'image/*',
        folder,
        csrfToken,
        disabled = false,
        customSetup = '',
        watchValueCallback,
    } = options;

    let editorConfig = {
        target,
        content_style: disabled ? 'body { opacity: 50% }' : 'img { max-width: 100%; height: auto; }',

        setup: function (editor) {
            editor.on('keyup', (e) => options.onContentChange && options.onContentChange(editor.getContent()));
            editor.on('change', (e) => options.onContentChange && options.onContentChange(editor.getContent()));
            editor.on('init', () => editor.setContent(value ?? ''));
            editor.on('OpenWindow', (e) => (tinymce.activeEditor.topLevelWindow = e.dialog));

            // Watch for external value changes
            if (watchValueCallback) {
                watchValueCallback((newValue) => {
                    if (newValue !== editor.getContent()) {
                        editor.resetContent(newValue || '');
                    }
                });
            }
        },

        file_picker_callback: function (cb, value, meta) {
            const formData = new FormData();
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.click();

            if (options.onUploadStart) {
                options.onUploadStart();
            }
            tinymce.activeEditor.topLevelWindow.block('');

            input.addEventListener('change', (e) => {
                const file = e.target.files[0];

                fetch(prefix + '/upload/signed', {
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
                        prefix: prefix,
                        accept: accept,
                        folder: folder,
                    }),
                })
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (response) {
                        let uploadFormData = formData;

                        if (response.disk != 's3') {
                            for (const [key, val] of Object.entries(response.inputs)) {
                                uploadFormData.append(key, val);
                            }
                            uploadFormData.append('file', file, response.attributes.name);
                        } else {
                            uploadFormData = file;
                        }

                        return fetch(response.attributes.action, {
                            method: response.attributes.method,
                            body: uploadFormData,
                            headers: {
                                Accept: 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                            },
                        });
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        cb(data.paths[0].url);
                    })
                    .catch((err) => {
                        console.log(err);
                        alert('Error uploading image!');
                    })
                    .finally(() => {
                        if (options.onUploadEnd) {
                            options.onUploadEnd();
                        }
                        tinymce.activeEditor.topLevelWindow.unblock();
                    });
            });
        },
    };

    // Parse and add any custom setup from blade
    if (customSetup) {
        try {
            const customConfig = new Function(`return {${customSetup}}`)();
            editorConfig = { ...editorConfig, ...customConfig };
        } catch (e) {
            console.error('Error parsing custom TinyMCE setup:', e);
        }
    }

    return tinymce.init(editorConfig);
};

// Function to destroy the editor
window.destroyTinyMCE = function () {
    if (tinymce.activeEditor) {
        tinymce.activeEditor.destroy();
    }
};
