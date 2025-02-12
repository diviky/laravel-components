<?php

namespace Diviky\LaravelComponents\Components;

use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class FormEditor extends Component
{
    public mixed $value;

    public function __construct(
        string $name = '',
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
    }

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
