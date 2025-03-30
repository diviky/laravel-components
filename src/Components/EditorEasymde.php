<?php

namespace Diviky\LaravelComponents\Components;

class EditorEasymde extends Editor
{
    public function setup(): string
    {
        $setup = array_merge([
            'spellChecker' => false,
            'autoSave' => false,
            'uploadImage' => true,
            'imageAccept' => 'image/png, image/jpeg, image/gif, image/avif',
            'toolbar' => [
                'heading', 'bold', 'italic', 'strikethrough', '|',
                'code', 'quote', 'unordered-list', 'ordered-list', 'horizontal-rule', '|',
                'link', 'upload-image', 'table', '|',
                'preview', 'side-by-side',
            ],
        ], $this->config);

        // Table default CSS class `.table` breaks the layout.
        // Here is a workaround
        $table = "{ 'title' : 'Table', 'name' : 'myTable', 'action' : EasyMDE.drawTable, 'className' : 'fe fe-table' }";

        return str((string) json_encode($setup))
            ->replace('"', "'")
            ->replace("'table'", $table)
            ->toString();
    }
}
