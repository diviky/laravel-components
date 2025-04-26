<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Diviky\LaravelComponents\Concerns\Authorize;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class Link extends Component
{
    use Authorize;

    public array $defaults = [];

    public string $action = '';

    public string $outline = '';

    public bool $modal = false;

    public bool $confirm = false;

    public bool $away = false;

    public bool $button = false;

    public bool $slideover = false;

    public function __construct(
        string $action = '',
        bool $modal = false,
        bool $confirm = false,
        bool $button = false,
        bool $away = false,
        bool $slideover = false,
        bool $outline = false,
        public bool $ghost = false,
        public bool $active = false,
        public ?string $icon = null,
        public bool $enabled = true,
        public bool $disabled = false,
        public bool $external = false,
        public ?string $badge = null,
        public ?string $badgeClasses = null,
        public null|string|bool $can = null,
        public ?string $role = null,
        public ?string $route = null,
        public ?string $href = null,
        public ?string $url = null,
        public ?string $match = null,
        public ?bool $exact = false,
        ?array $params = [],
        HtmlString|array|string|Collection|null $extraAttributes = null,
    ) {
        $this->action = $action;
        $this->modal = $modal;
        $this->confirm = $confirm;
        $this->away = $away;
        $this->slideover = $slideover;
        $this->button = $button;
        $this->icon = $icon;

        if (is_null($href)) {
            $this->href = '#';
        }

        if (isset($route)) {
            $this->href = route($route, $params);
        }

        if (isset($url)) {
            $this->href = url($url);
        }

        if (is_bool($can) && $route) {
            $this->can = 'name:' . $route;
        }

        $this->outline = $outline ? 'outline-' : ($ghost ? 'ghost-' : '');
        $this->setExtraAttributes($extraAttributes);
    }

    public function routeMatches(): bool
    {
        if (is_null($this->href)
            || $this->href == '#'
        || $this->href == '/'
        || !is_null($this->active)
        ) {
            return false;
        }

        if (!is_null($this->match)) {
            return request()->routeIs($this->match);
        }

        if (!is_null($this->route)) {
            return request()->routeIs($this->route);
        }

        $href = url($this->href);
        $route = url(request()->url());

        if ($href == $route) {
            return true;
        }

        return !$this->exact && Str::startsWith($route, $href);
    }

    #[\Override]
    public function shouldRender(): bool
    {
        return $this->enabled && $this->isAuthorized() && $this->isCan() && $this->hasRole();
    }
}
