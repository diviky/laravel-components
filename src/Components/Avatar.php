<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

class Avatar extends Component
{
    public ?string $initials;

    public ?string $src;

    public string $color;

    public bool $stacked;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $src = null,
        ?string $initials = null,
        ?string $label = null,
        public ?string $icon = null,
        public ?string $size = null,
        ?string $name = null,
        ?string $image = '',
        ?string $color = null,
        bool $stacked = false
    ) {
        $initials = $initials ?? $label ?? $name;

        $this->color = $color ?? $this->getColor($initials);

        if (isset($initials)) {
            preg_match_all('#(?<=\s|\b)\pL#u', $initials, $matches);
            $initials = implode('', array_slice($matches[0], 0, 2));
        }

        $this->src = $src ?? $image;
        $this->initials = $initials;
        $this->size = $size;
        $this->stacked = $stacked;
    }

    protected function getColor(?string $label): string
    {
        if ($label === null || strlen($label) === 0) {
            $label = chr(random_int(65, 90));
        }

        $colors = [
            'blue-lt',
            'azure-lt',
            'indigo-lt',
            'purple-lt',
            'pink-lt',
            'red-lt',
            'orange-lt',
            'yellow-lt',
            'lime-lt',
            'green-lt',
            'teal-lt',
            'cyan-lt',
            'gray-200',
            'gray-300',
        ];

        return $this->getRandomElement($colors, $label);
    }

    protected function getRandomElement(array $array, string $label): string
    {
        $number = ord($label[0]);
        $i = 1;
        $charLength = strlen($label);
        while ($i < $charLength) {
            $number += ord($label[$i]);
            $i++;
        }

        return $array[$number % count($array)];
    }
}
