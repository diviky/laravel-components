<?php

namespace Diviky\LaravelComponents\Components;

class EditorQuill extends Editor
{
    public function setup(): string
    {
        $setup = array_merge([
            'theme' => 'snow',
            'placeholder' => 'Write something...',
            'readOnly' => $this->isReadonly() || $this->isDisabled(),
            'modules' => [
                'toolbar' => [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [['header' => 1], ['header' => 2]],
                    [['list' => 'ordered'], ['list' => 'bullet']],
                    [['script' => 'sub'], ['script' => 'super']],
                    [['indent' => '-1'], ['indent' => '+1']],
                    [['direction' => 'rtl']],
                    [['size' => ['small', false, 'large', 'huge']]],
                    [['header' => [1, 2, 3, 4, 5, 6, false]]],
                    [['color' => []], ['background' => []]],
                    [['font' => []]],
                    [['align' => []]],
                    ['clean'],
                    ['link', 'image', 'video'],
                ],
                'history' => [
                    'delay' => 2000,
                    'maxStack' => 500,
                ],
            ],
        ], $this->config);

        return str((string) json_encode($setup))->replace('"', "'")->toString();
    }
}
