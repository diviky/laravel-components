<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Symfony\Component\Mime\MimeTypes;

class FormFile extends Component
{
    public string $name;

    public string $label;

    public mixed $value;

    public string $accept;

    /**
     * Create a new component instance.
     *
     * @param  null|mixed  $language
     */
    public function __construct(
        string $name = '',
        string $label = '',
        public string $type = 'text',
        public string $size = '',
        mixed $bind = null,
        mixed $default = null,
        public ?string $language = null,
        bool $showErrors = true,
        public bool $floating = false,
        public bool $inline = false,
        string|HtmlString|array|Collection|null $extraAttributes = null,
        public ?array $settings = [],
        string $accept = '*.*',
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->showErrors = $showErrors;

        if (isset($language)) {
            $this->name = "{$name}[{$language}]";
        }

        $this->accept = $this->convertToMimeTypes($accept);

        $this->setValue($name, $bind, $default, $language);
        $this->setExtraAttributes($extraAttributes);
    }

    protected function convertToMimeTypes(string $accept): string
    {
        if (strpos($accept, '/') !== false || $accept == '*.*' || $accept == '*' || $accept == '') {
            return implode(',', ['image/*', 'text/*', 'application/*', 'audio/*', 'video/*']);
        }

        $extensions = collect(explode(',', str_replace('.', '', $accept)))
            ->map(function ($extension) {
                $getMimeTypes = MimeTypes::getDefault()->getMimeTypes($extension);

                return ($extension == 'csv') ? array_merge(['text/plain'], $getMimeTypes) : $getMimeTypes;
            })
            ->unique()
            ->toArray();

        $mimes = Arr::collapse($extensions);

        return implode(',', $mimes);
    }
}
