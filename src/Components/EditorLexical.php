<?php

namespace Diviky\LaravelComponents\Components;

class EditorLexical extends Editor
{
    public function setup(): string
    {
        $setup = array_merge([
            'namespace' => 'lexical-editor',
            'placeholder' => 'Write something...',
            'readOnly' => $this->isReadonly() || $this->isDisabled(),
            'onError' => 'function(error) { console.error(error); }',
            'editorState' => null,
            'nodes' => [
                'HeadingNode',
                'ListNode',
                'ListItemNode',
                'QuoteNode',
                'CodeNode',
                'CodeHighlightNode',
                'TableNode',
                'TableCellNode',
                'TableRowNode',
                'AutoLinkNode',
                'LinkNode',
                'ImageNode',
            ],
            'theme' => [
                'paragraph' => 'editor-paragraph',
                'heading' => [
                    'h1' => 'editor-heading-h1',
                    'h2' => 'editor-heading-h2',
                    'h3' => 'editor-heading-h3',
                ],
                'list' => [
                    'ol' => 'editor-list-ol',
                    'ul' => 'editor-list-ul',
                    'listitem' => 'editor-listitem',
                ],
                'quote' => 'editor-quote',
                'code' => 'editor-code',
                'image' => 'editor-image',
                'link' => 'editor-link',
                'text' => [
                    'bold' => 'editor-text-bold',
                    'italic' => 'editor-text-italic',
                    'underline' => 'editor-text-underline',
                    'strikethrough' => 'editor-text-strikethrough',
                    'code' => 'editor-text-code',
                ],
            ],
            'features' => [
                'toolbar' => true,
                'images' => true,
                'links' => true,
                'tables' => true,
                'lists' => true,
                'formatting' => true,
                'codeHighlight' => true,
            ],
        ], $this->config);

        return str((string) json_encode($setup))->replace('"', "'")->toString();
    }
}
