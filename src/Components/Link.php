<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Diviky\LaravelComponents\Concerns\Authorize;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
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
        public ?bool $active = false,
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
        public ?string $title = null,
        public bool $tab = false,
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
            $this->can = 'name:'.$route;
        }

        $this->outline = $outline ? 'outline-' : ($ghost ? 'ghost-' : '');
        $this->setExtraAttributes($extraAttributes);
    }

    public function routeMatches(): bool
    {
        if (is_null($this->href) || $this->href == '#' || $this->href == '/') {
            return false;
        }

        $route = Request::route();

        if (! is_null($this->match)) {
            $name = $route->getName();

            return Str::is($this->match, $name);
        }

        if (! is_null($this->route)) {
            return Request::routeIs($this->route);
        }

        $currentUrl = Request::url();
        $linkUrl = URL::to($this->href);

        // Exact match check
        if ($currentUrl === $linkUrl) {
            return true;
        }

        return ! $this->exact && Str::startsWith($currentUrl, $linkUrl);
    }

    #[\Override]
    public function shouldRender(): bool
    {
        return $this->enabled && $this->isAuthorized() && $this->isCan() && $this->hasRole();
    }
}
