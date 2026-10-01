<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Tests\Support;

enum TestVisibility: string
{
    case Internal = 'internal';
    case Public = 'public';
}
