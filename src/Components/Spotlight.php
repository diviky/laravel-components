<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

class Spotlight extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $shortcut = 'meta.k',
        public ?string $searchText = 'Search ...',
        public ?string $noResultsText = 'Nothing found.',
        public ?string $url = null,

        // Slots
        public mixed $append = null
    ) {}
}
