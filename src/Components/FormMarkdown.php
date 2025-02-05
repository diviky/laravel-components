<?php

namespace Diviky\LaravelComponents\Components;

use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class FormMarkdown extends Component
{
    public mixed $value;

    public function __construct(
        public string $name = '',
        public string $label = '',
        public ?string $icon = '',
        mixed $bind = null,
        mixed $default = null,
        public ?string $language = null,
        bool $showErrors = true,
        public bool $floating = false,
        string|HtmlString|array|Collection|null $extraAttributes = null,
        public array $config = [],
        public ?string $uploadUrl = '',
        public ?string $prefix = '',
        public ?string $disk = '',
        public ?string $folder = 'assets',
        public array $settings = [],
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->showErrors = $showErrors;
        $this->floating = $floating;

        if (! is_null($language)) {
            $this->name = "{$name}[{$language}]";
        }

        $this->setValue($name, $bind, $default, $language);
        $this->setExtraAttributes($extraAttributes);
        $this->mergeAttributes($settings);
    }

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
        $table = "{ 'title' : 'Table', 'name' : 'myTable', 'action' : EasyMDE.drawTable, 'className' : 'fa fa-table' }";

        return str(json_encode($setup))
            ->replace('"', "'")
            ->trim('{}')
            ->replace("'table'", $table)
            ->toString();
    }
}
