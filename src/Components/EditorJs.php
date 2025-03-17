<?php

namespace Diviky\LaravelComponents\Components;

class EditorJs extends Editor
{
    public function setup(): string
    {
        $setup = array_merge([
            'placeholder' => 'Write something...',
            'readOnly' => $this->isReadonly() || $this->isDisabled(),
            'tools' => [
                'header' => [
                    'class' => 'Header',
                    'config' => [
                        'placeholder' => 'Enter a header',
                        'levels' => [1, 2, 3, 4, 5, 6],
                        'defaultLevel' => 2,
                    ],
                ],
                'paragraph' => [
                    'class' => 'Paragraph',
                    'inlineToolbar' => true,
                ],
                'list' => [
                    'class' => 'List',
                    'inlineToolbar' => true,
                ],
                'image' => [
                    'class' => 'ImageTool',
                    'config' => [
                        'uploader' => [
                            'uploadByFile' => true, // This will use the JS implementation
                        ],
                    ],
                ],
                'quote' => [
                    'class' => 'Quote',
                    'inlineToolbar' => true,
                ],
                'checklist' => [
                    'class' => 'Checklist',
                    'inlineToolbar' => true,
                ],
                'delimiter' => 'Delimiter',
                'table' => [
                    'class' => 'Table',
                    'inlineToolbar' => true,
                ],
                'embed' => 'Embed',
            ],
            'autofocus' => false,
        ], $this->config);

        return str((string) json_encode($setup))->replace('"', "'")->toString();
    }
}
