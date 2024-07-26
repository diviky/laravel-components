<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class Icon extends Component
{
    public function __construct(
        public string $name,
        public ?string $label = null,
        public ?string $action = null
    ) {}

    public function icon(): string|Stringable
    {
        $name = Str::of($this->name);

        return $name->contains('.') ? $name->replace('.', '-') : "ti ti-{$this->name}";
    }

    public function labelClasses(): mixed
    {
        // Remove `w-*` and `h-*` classes, because it applies only for icon
        return Str::replaceMatches('/(w-\w*)|(h-\w*)/', '', $this->attributes->get('class') ?? '');
    }
}
