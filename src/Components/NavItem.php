<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Diviky\LaravelComponents\Concerns\Authorize;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class NavItem extends Component
{
    use Authorize;

    public function __construct(
        public ?string $title = null,
        public ?string $icon = null,
        public ?string $link = null,
        public ?string $route = null,
        public bool $away = false,
        public bool $tab = false,
        public ?string $badge = null,
        public ?string $badgeClasses = null,
        public ?bool $active = null,
        public bool $separator = false,
        public bool $enabled = true,
        public ?bool $exact = false,
        public null|string|bool $can = null,
        public array $params = [],
        HtmlString|array|string|Collection|null $extraAttributes = null,
    ) {
        $this->setExtraAttributes($extraAttributes);

        if (isset($route)) {
            $this->link = route($route, $params);
        }

        if (is_bool($can) && $route) {
            $this->can = 'name:'.$route;
        }
    }

    public function routeMatches(): bool
    {
        if (is_null($this->link) || $this->link == '#' || ! is_null($this->active)) {
            return false;
        }

        if (! is_null($this->route)) {
            return request()->routeIs($this->route);
        }

        $link = url($this->link);
        $route = url(request()->url());

        if ($link == $route) {
            return true;
        }

        return ! $this->exact && $this->link != '/' && Str::startsWith($route, $link);
    }

    #[\Override]
    public function shouldRender(): bool
    {
        return $this->enabled && $this->isAuthorized() && $this->isCan();
    }
}
