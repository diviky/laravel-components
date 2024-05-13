<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Diviky\LaravelFormComponents\Concerns\HandlesDefaultAndOldValue;
use Diviky\LaravelFormComponents\Concerns\HandlesValidationErrors;
use Illuminate\Support\Arr;
use Symfony\Component\Mime\MimeTypes;

class FormFile extends Component
{
    use HandlesDefaultAndOldValue;
    use HandlesValidationErrors;

    public string $name;

    public string $label;

    public string $accept;

    /**
     * Create a new component instance.
     *
     * @param  null|mixed  $bind
     * @param  null|mixed  $default
     * @param  null|mixed  $language
     */
    public function __construct(
        string $name,
        string $label = '',
        $bind = null,
        $default = null,
        $language = null,
        bool $showErrors = true,
        string $accept = '*.*'
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->showErrors = $showErrors;

        if (isset($language)) {
            $this->name = "{$name}[{$language}]";
        }

        $this->accept = $this->convertToMimeTypes($accept);
        $this->setValue($name, $bind, $default, $language);
    }

    protected function convertToMimeTypes(string $accept): string
    {
        if (strpos($accept, '/') !== false || $accept == '*.*' || $accept == '') {
            return $accept;
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
