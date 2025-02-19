<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

class FormDateTime extends FormDate
{
    protected string $format = 'F d Y h:m A';
}
