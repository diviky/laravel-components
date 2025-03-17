<?php

namespace Diviky\LaravelComponents\Components;

class EditorGrapesjs extends Editor
{
    public function setup(): string
    {
        $setup = array_merge([
            'container' => '#gjs',
            'height' => '500px',
            'fromElement' => true,
            'storageManager' => false,
            'plugins' => ['gjs-preset-webpage'],
            'pluginsOpts' => [
                'gjs-preset-webpage' => [
                    'blocksBasicOpts' => [
                        'blocks' => ['column1', 'column2', 'column3', 'column3-7', 'text', 'link', 'image', 'video'],
                        'flexGrid' => 1,
                    ],
                ],
            ],
            'deviceManager' => [
                'devices' => [
                    [
                        'id' => 'desktop',
                        'name' => 'Desktop',
                        'width' => '',
                    ],
                    [
                        'id' => 'tablet',
                        'name' => 'Tablet',
                        'width' => '768px',
                        'widthMedia' => '992px',
                    ],
                    [
                        'id' => 'mobilePortrait',
                        'name' => 'Mobile',
                        'width' => '320px',
                        'widthMedia' => '575px',
                    ],
                ],
            ],
            'assetManager' => [
                'upload' => true,
                'uploadFile' => true,
            ],
            'canvas' => [
                'styles' => [],
                'scripts' => [],
            ],
        ], $this->config);

        return str((string) json_encode($setup))->replace('"', "'")->toString();
    }
}
