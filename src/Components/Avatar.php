<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

class Avatar extends Component
{
    public ?string $label;

    public ?string $image;

    public string $color;

    public bool $stacked;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $label = null,
        ?string $name = null,
        ?string $image = '',
        ?string $color = null,
        public ?string $size = null,
        bool $stacked = false
    ) {
        $label = isset($name) && ! empty($name) ? $name : $label;
        $this->color = $color ?? $this->getColor($label);

        if (isset($label)) {
            preg_match_all('#(?<=\s|\b)\pL#u', $label, $matches);
            $label = implode('', array_slice($matches[0], 0, 2));
        }

        $this->label = $label;
        $this->image = $image;
        $this->size = $size;
        $this->stacked = $stacked;
    }

    protected function getColor(?string $label): string
    {
        if ($label === null || strlen($label) === 0) {
            $label = chr(random_int(65, 90));
        }

        $colors = [
            'bg-blue-lt',
            'bg-azure-lt',
            'bg-indigo-lt',
            'bg-purple-lt',
            'bg-pink-lt',
            'bg-red-lt',
            'bg-orange-lt',
            'bg-yellow-lt',
            'bg-lime-lt',
            'bg-green-lt',
            'bg-teal-lt',
            'bg-cyan-lt',
            'bg-gray-200',
            'bg-gray-300',
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
