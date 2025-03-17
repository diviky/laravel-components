<?php

namespace Diviky\LaravelComponents\Components;

class EditorTinymce extends Editor
{
    public function setup(): string
    {
        $setup = array_merge([
            'file_picker_types' => 'file image media',
            'readonly' => $this->isReadonly() || $this->isDisabled(),
            'menubar' => false,
            'license_key' => 'gpl',
            'automatic_uploads' => true,
            'quickbars_insert_toolbar' => false,
            'branding' => false,
            'relative_urls' => false,
            'remove_script_host' => false,
            'height' => 300,
            'toolbar' => 'undo redo | align bullist numlist | outdent indent | quickimage quicktable | code',
            'quickbars_selection_toolbar' => 'bold italic underline strikethrough | forecolor backcolor | link blockquote removeformat | blocks',
        ], $this->config);

        $setup['plugins'] = str('advlist autolink lists link image table quickbars code')->append($this->config['plugins'] ?? '');

        return str((string) json_encode($setup))->trim('{}')->replace('"', "'")->toString();
    }
}
