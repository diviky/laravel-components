import { $createParagraphNode, $getRoot, $getSelection, $isRangeSelection, createEditor } from 'lexical';

// Import Lexical Rich Text plugin for advanced features
import { $createTextNode, $generateHtmlFromNodes, $generateNodesFromDOM } from '@lexical/html';

// Import Lexical Nodes
import { HeadingNode, QuoteNode } from '@lexical/rich-text';

import { TableNode, TableCellNode, TableRowNode } from '@lexical/table';

import { ListNode, ListItemNode } from '@lexical/list';

import { CodeNode, CodeHighlightNode } from '@lexical/code';

import { AutoLinkNode, LinkNode } from '@lexical/link';

// Utils for manipulating nodes
import { $wrapNodes, $patchStyleText } from '@lexical/utils';

// Expose all needed components to the global scope
window.lexical = {
    $createParagraphNode,
    $getRoot,
    $getSelection,
    $isRangeSelection,
    $createTextNode,
    createEditor,
};

window.lexicalHtml = {
    $generateHtmlFromNodes,
    $generateNodesFromDOM,
};

window.lexicalNodes = {
    HeadingNode,
    QuoteNode,
    TableNode,
    TableCellNode,
    TableRowNode,
    ListNode,
    ListItemNode,
    CodeNode,
    CodeHighlightNode,
    AutoLinkNode,
    LinkNode,
    $createHeadingNode: (tag) => new HeadingNode(tag),
    $createQuoteNode: () => new QuoteNode(),
    $createCodeNode: () => new CodeNode(),
    $createListNode: (type) => new ListNode(type),
    $createListItemNode: () => new ListItemNode(),
    $createLinkNode: (url) => new LinkNode(url),
    $createTableNode: () => new TableNode(),
    $createTableRowNode: () => new TableRowNode(),
    $createTableCellNode: (type) => new TableCellNode(type),
};

window.lexicalUtils = {
    $wrapNodes,
    $patchStyleText,
};

// Create a LexicalEditor class to handle editor functionality
class LexicalEditor {
    constructor(options) {
        this.options = options;
        this.editor = null;
        this.value = options.value || '';
        this.prefix = options.prefix || '';
        this.accept = options.accept || 'image/*';
        this.folder = options.folder || '';
        this.csrfToken = options.csrfToken || '';
        this.uploadUrl = options.uploadUrl || '';
        this.uploading = false;
        this.editorContainer = options.editorContainer;
        this.toolbarElement = options.toolbarElement;
        this.hiddenInput = options.hiddenInput;

        this.init();
    }

    init() {
        if (typeof lexical === 'undefined') {
            document.addEventListener('lexical-ready', () => this.initEditor());
        } else {
            this.initEditor();
        }
    }

    initEditor() {
        const config = this.options.config;

        // Register all required nodes
        const nodes = [
            HeadingNode,
            ListNode,
            ListItemNode,
            QuoteNode,
            CodeNode,
            CodeHighlightNode,
            TableNode,
            TableCellNode,
            TableRowNode,
            AutoLinkNode,
            LinkNode,
        ];

        // Create editor instance
        this.editor = createEditor({
            namespace: config.namespace,
            theme: config.theme,
            nodes: nodes,
            onError: (error) => console.error(error),
        });

        // Register plugins based on features
        if (config.features.toolbar) {
            this.registerToolbar(this.toolbarElement);
        }

        if (config.features.images && this.uploadUrl) {
            this.registerImageUpload();
        }

        // Set initial editor state if we have content
        this.updateEditorContent();

        // Register update listener
        this.editor.registerUpdateListener(({ editorState }) => {
            // Serialize and store the content
            editorState.read(() => {
                const { $generateHtmlFromNodes } = lexicalHtml;
                const html = $generateHtmlFromNodes(this.editor);
                this.value = html;
                if (this.hiddenInput) {
                    this.hiddenInput.value = html;
                }
            });
        });

        // Set editor as readonly if needed
        if (config.readOnly) {
            this.editor.setEditable(false);
        }

        // Mount the editor to the DOM
        this.editor.setRootElement(this.editorContainer);
    }

    getEditorContent() {
        return this.value;
    }

    updateEditorContent() {
        if (!this.editor) return;

        // Clear the editor
        this.editor.update(() => {
            const { $getRoot, $createParagraphNode, $createTextNode } = lexical;
            const root = $getRoot();
            root.clear();

            // If we have content, try to parse it as HTML
            if (this.value) {
                try {
                    const { $generateNodesFromDOM } = lexicalHtml;
                    const parser = new DOMParser();
                    const dom = parser.parseFromString(this.value, 'text/html');
                    const nodes = $generateNodesFromDOM(this.editor, dom);

                    // Insert the nodes
                    for (const node of nodes) {
                        root.append(node);
                    }
                } catch (e) {
                    // If parsing fails, just create a paragraph with the text
                    const paragraph = $createParagraphNode();
                    paragraph.append($createTextNode(this.value));
                    root.append(paragraph);
                }
            } else {
                // Create an empty paragraph
                root.append($createParagraphNode());
            }
        });
    }

    registerToolbar(toolbarElement) {
        const { $getSelection, $isRangeSelection } = lexical;
        const buttons = toolbarElement.querySelectorAll('button');

        // Add click handlers to all toolbar buttons
        buttons.forEach((button) => {
            button.addEventListener('click', () => {
                const action = button.dataset.action;
                const format = button.dataset.format;

                this.editor.update(() => {
                    const selection = $getSelection();
                    if (!$isRangeSelection(selection)) return;

                    // Handle different formatting actions
                    switch (action) {
                        case 'format':
                            this.formatText(selection, format);
                            break;
                        case 'paragraph':
                            this.formatParagraph(selection, format);
                            break;
                        case 'insert':
                            this.insertElement(format);
                            break;
                    }
                });
            });
        });
    }

    formatText(selection, format) {
        const { $patchStyleText } = lexicalUtils;

        switch (format) {
            case 'bold':
                selection.formatText((format) => format.toggleBold());
                break;
            case 'italic':
                selection.formatText((format) => format.toggleItalic());
                break;
            case 'underline':
                selection.formatText((format) => format.toggleUnderline());
                break;
            case 'strikethrough':
                selection.formatText((format) => format.toggleStrikethrough());
                break;
            case 'code':
                selection.formatText((format) => format.toggleCode());
                break;
        }
    }

    formatParagraph(selection, format) {
        const { $createHeadingNode, $createQuoteNode, $createCodeNode } = lexicalNodes;
        const { $wrapNodes } = lexicalUtils;

        switch (format) {
            case 'h1':
            case 'h2':
            case 'h3':
                $wrapNodes(selection, () => $createHeadingNode(format));
                break;
            case 'ul':
            case 'ol':
                this.formatList(format);
                break;
            case 'quote':
                $wrapNodes(selection, () => $createQuoteNode());
                break;
            case 'code':
                $wrapNodes(selection, () => $createCodeNode());
                break;
        }
    }

    formatList(listType) {
        const { $createListNode, $createListItemNode } = lexicalNodes;
        const { $wrapNodes } = lexicalUtils;
        const { $getSelection } = lexical;
        const tag = listType === 'ol' ? 'number' : 'bullet';

        $wrapNodes(
            $getSelection(),
            () => $createListNode(tag),
            (node) => $createListItemNode().append(node)
        );
    }

    insertElement(type) {
        switch (type) {
            case 'image':
                this.selectImageFile();
                break;
            case 'link':
                this.insertLink();
                break;
            case 'table':
                this.insertTable();
                break;
        }
    }

    selectImageFile() {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', this.accept);
        input.click();

        input.onchange = () => {
            const file = input.files[0];
            if (file) {
                this.uploadImage(file);
            }
        };
    }

    uploadImage(file) {
        this.uploading = true;

        // Notify Alpine that uploading state changed
        if (this.options.onUploadingChange) {
            this.options.onUploadingChange(true);
        }

        // Get a signed URL
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
                folder: this.folder,
            }),
        })
            .then((response) => response.json())
            .then((response) => {
                const formData = new FormData();

                if (response.disk != 's3') {
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
                // Insert the image into the editor
                this.editor.update(() => {
                    const { $createImageNode } = lexicalNodes;
                    const { $getSelection, $isRangeSelection } = lexical;

                    const selection = $getSelection();
                    if ($isRangeSelection(selection)) {
                        const imageNode = $createImageNode({
                            src: data.paths[0].url,
                            altText: file.name,
                        });
                        selection.insertNodes([imageNode]);
                    }
                });
            })
            .catch((error) => {
                console.error('Error uploading image:', error);
            })
            .finally(() => {
                this.uploading = false;
                // Notify Alpine that uploading state changed
                if (this.options.onUploadingChange) {
                    this.options.onUploadingChange(false);
                }
            });
    }

    insertLink() {
        const url = prompt('Enter URL');
        if (url) {
            this.editor.update(() => {
                const { $createLinkNode } = lexicalNodes;
                const { $getSelection, $isRangeSelection } = lexical;

                const selection = $getSelection();
                if ($isRangeSelection(selection)) {
                    const linkNode = $createLinkNode(url);
                    // If text is selected, wrap it with the link
                    if (!selection.isCollapsed()) {
                        selection.extract().forEach((node) => {
                            linkNode.append(node);
                        });
                        selection.insertNodes([linkNode]);
                    } else {
                        // If no text is selected, create a link with the URL as text
                        const { $createTextNode } = lexical;
                        linkNode.append($createTextNode(url));
                        selection.insertNodes([linkNode]);
                    }
                }
            });
        }
    }

    insertTable() {
        const rows = prompt('Number of rows', '3');
        const columns = prompt('Number of columns', '3');

        if (rows && columns) {
            this.editor.update(() => {
                const { $createTableNode, $createTableRowNode, $createTableCellNode } = lexicalNodes;
                const { $getSelection, $isRangeSelection } = lexical;

                const selection = $getSelection();
                if ($isRangeSelection(selection)) {
                    const tableNode = $createTableNode();

                    // Create rows and cells
                    for (let i = 0; i < parseInt(rows); i++) {
                        const rowNode = $createTableRowNode();

                        for (let j = 0; j < parseInt(columns); j++) {
                            const cellNode = $createTableCellNode('normal');
                            const { $createParagraphNode, $createTextNode } = lexical;

                            // Add empty paragraph to each cell
                            const paragraph = $createParagraphNode();
                            if (i === 0) {
                                // Add header text
                                paragraph.append($createTextNode(`Header ${j + 1}`));
                            } else {
                                // Add empty text
                                paragraph.append($createTextNode(''));
                            }
                            cellNode.append(paragraph);
                            rowNode.append(cellNode);
                        }

                        tableNode.append(rowNode);
                    }

                    selection.insertNodes([tableNode]);
                }
            });
        }
    }

    destroy() {
        if (this.editor) {
            this.editor.destroy();
            this.editor = null;
        }
    }
}

// Add LexicalEditor to the global scope
window.LexicalEditor = LexicalEditor;

// Dispatch an event when everything is loaded
document.dispatchEvent(new Event('lexical-ready'));
