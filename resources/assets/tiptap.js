import { Editor } from '@tiptap/core';
// Import necessary TipTap extensions
// For example:
import StarterKit from '@tiptap/starter-kit';
import Underline from '@tiptap/extension-underline';
import Link from '@tiptap/extension-link';
import Image from '@tiptap/extension-image';

export default function tiptapEditorSetup() {
    return {
        editor: null,
        value: '',
        uploading: false,

        init() {
            const config = {
                id: this.id,
                value: this.value,
                prefix: this.prefix,
                folder: this.folder,
                csrfToken: this.csrfToken,
                uploadUrl: this.uploadUrl,
                editable: this.editable,
            };

            this.initEditor(config);
        },

        initEditor(config) {
            const self = this;

            this.editor = new Editor({
                element: this.$refs[`tiptapContainer${config.id}`],
                extensions: [StarterKit, Underline, Link, Image],
                content: config.value,
                editable: config.editable,
                onUpdate({ editor }) {
                    self.value = editor.getHTML();
                    self.$refs[`hiddenInput${config.id}`].value = editor.getHTML();
                },
            });
        },

        destroyEditor() {
            if (this.editor) {
                this.editor.destroy();
            }
        },

        // Editor button actions
        toggleBold() {
            this.editor.chain().focus().toggleBold().run();
        },

        toggleItalic() {
            this.editor.chain().focus().toggleItalic().run();
        },

        toggleUnderline() {
            this.editor.chain().focus().toggleUnderline().run();
        },

        toggleStrike() {
            this.editor.chain().focus().toggleStrike().run();
        },

        toggleHeading(level) {
            this.editor.chain().focus().toggleHeading({ level }).run();
        },

        toggleBulletList() {
            this.editor.chain().focus().toggleBulletList().run();
        },

        toggleOrderedList() {
            this.editor.chain().focus().toggleOrderedList().run();
        },

        toggleBlockquote() {
            this.editor.chain().focus().toggleBlockquote().run();
        },

        toggleCodeBlock() {
            this.editor.chain().focus().toggleCodeBlock().run();
        },

        setLink() {
            const url = window.prompt('URL');

            if (!url) {
                return;
            }

            if (this.editor.isActive('link')) {
                this.editor.chain().focus().extendMarkRange('link').unsetLink().run();
                return;
            }

            this.editor.chain().focus().extendMarkRange('link').setLink({ href: url }).run();
        },

        imageHandler() {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';

            input.onchange = async () => {
                if (input.files?.length) {
                    this.uploading = true;
                    const file = input.files[0];

                    try {
                        const formData = new FormData();
                        formData.append('file', file);
                        formData.append('folder', this.folder);
                        formData.append('prefix', this.prefix);

                        const response = await fetch(this.uploadUrl, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': this.csrfToken,
                            },
                            body: formData,
                        });

                        const data = await response.json();

                        if (data.url) {
                            this.editor.chain().focus().setImage({ src: data.url }).run();
                        }
                    } catch (error) {
                        console.error('Error uploading image:', error);
                    } finally {
                        this.uploading = false;
                    }
                }
            };

            input.click();
        },
    };
}
