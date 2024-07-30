<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;
use InvalidArgumentException;

class Link extends Component
{
    public array $defaults = [];

    public string $action = '';

    public string $outline = '';

    public bool $modal = false;

    public bool $confirm = false;

    public bool $away = false;

    public bool $button = false;

    public bool $slideover = false;

    protected array $allowedAction = [
        'show' => 'read-only',
        'view' => 'read-only',
        'create' => 'create-only',
        'update' => 'update-only',
        'import' => 'update-only',
        'delete' => 'delete-only',
        'export' => 'read-only',
        'download' => 'read-only',
    ];

    public function __construct(
        string $action = '',
        bool $modal = false,
        bool $confirm = false,
        bool $button = false,
        bool $away = false,
        bool $slideover = false,
        bool $outline = false,
        public bool $ghost = false,
        public ?string $icon = null,
        HtmlString|array|string|Collection|null $extraAttributes = null,
    ) {
        $this->action = $action;
        $this->modal = $modal;
        $this->confirm = $confirm;
        $this->away = $away;
        $this->slideover = $slideover;
        $this->button = $button;
        $this->icon = $icon;
        $this->outline = $outline ? 'outline-' : ($ghost ? 'ghost-' : '');
        $this->setExtraAttributes($extraAttributes);

        $this->validateActions();
    }

    private function isAuthorized(): bool
    {
        return (empty($this->action) || ! Auth::user()->isPermissionRevoked($this->allowedAction[$this->action])) ? true : false;
    }

    private function validateActions(): void
    {
        if (! empty($this->action) && ! isset($this->allowedAction[$this->action])) {
            throw new InvalidArgumentException("Invalid action: $this->action. Link action must be one of: ".implode(', ', array_keys($this->allowedAction)));
        }
    }

    public function shouldRender(): bool
    {
        return $this->isAuthorized();
    }
}
