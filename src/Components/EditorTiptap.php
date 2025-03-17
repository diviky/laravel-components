<?php

namespace Diviky\LaravelComponents\Components;

class EditorTiptap extends Editor
{
    public function setup(): string
    {
        $setup = array_merge([
            'placeholder' => 'Write something...',
            'editable' => ! ($this->isReadonly() || $this->isDisabled()),
            'extensions' => [
                'starterKit',
                'underline',
                'link',
                'image',
            ],
        ], $this->config);

        return str((string) json_encode($setup))->replace('"', "'")->toString();
    }
}
