<?php

declare(strict_types=1);

use Diviky\LaravelComponents\Components;

return [
    'prefix' => env('COMPONENTS_PREFIX'),

    // tailwind | tailwind-2 | tailwind-forms-simple | bootstrap-4 | bootstrap-5
    'framework' => env('COMPONENTS_FRAMEWORK', 'bootstrap-4'),

    'use_eloquent_date_casting' => false,

    // bool | string
    'default_wire' => false,

    'components' => [
        'form-switch' => [
            'view' => 'laravel-components::{framework}.form-switch',
            'class' => Components\FormSwitch::class,
        ],
        'form-button' => [
            'view' => 'laravel-components::{framework}.form-button',
            'class' => Components\FormButton::class,
        ],
        'form-date' => [
            'view' => 'laravel-components::{framework}.form-date',
            'class' => Components\FormDate::class,
        ],
        'form-date-range' => [
            'view' => 'laravel-components::{framework}.form-date-range',
            'class' => Components\FormDateRange::class,
        ],
        'form-select-group' => [
            'view' => 'laravel-components::{framework}.form-select-group',
            'class' => Components\FormSelectGroup::class,
        ],
        'form-select-item' => [
            'view' => 'laravel-components::{framework}.form-select-item',
            'class' => Components\FormSelectItem::class,
        ],
        'form-file' => [
            'view' => 'laravel-components::{framework}.form-file',
            'class' => Components\FormFile::class,
        ],
        'form-dropzone' => [
            'view' => 'laravel-components::{framework}.form-dropzone',
            'class' => Components\FormDropzone::class,
        ],
        'theme-counter' => [
            'view' => 'laravel-components::{framework}.theme-counter',
        ],
        'theme.modal' => [
            'view' => 'laravel-components::{framework}.theme-modal',
        ],
        'theme-alert-error' => [
            'view' => 'laravel-components::{framework}.alert.error',
        ],
        'theme-alert-warning' => [
            'view' => 'laravel-components::{framework}.alert.warning',
        ],
        'theme-alert-danger' => [
            'view' => 'laravel-components::{framework}.alert.danger',
        ],
        'theme-alert-help' => [
            'view' => 'laravel-components::{framework}.alert.help',
        ],
        'theme-alert-success' => [
            'view' => 'laravel-components::{framework}.alert.success',
        ],
        'button.cancel' => [
            'view' => 'laravel-components::{framework}.button.cancel',
        ],
        'button.primary' => [
            'view' => 'laravel-components::{framework}.button.primary',
        ],
        'button.secondary' => [
            'view' => 'laravel-components::{framework}.button.secondary',
        ],
        'theme-checkbox' => [
            'view' => 'laravel-components::{framework}.theme-checkbox',
            'class' => Components\ThemeCheckbox::class,
        ],
        'filter.search' => [
            'view' => 'laravel-components::{framework}.filters.search',
            'class' => Components\FilterSearch::class,
        ],
        'filter.dates' => [
            'view' => 'laravel-components::{framework}.filters.dates',
            'class' => Components\FilterDates::class,
        ],
        'script' => [
            'view' => 'laravel-components::{framework}.script',
            'class' => Components\Script::class,
        ],
        'style' => [
            'view' => 'laravel-components::{framework}.style',
            'class' => Components\Style::class,
        ],
        'link' => [
            'view' => 'laravel-components::{framework}.link',
            'class' => Components\Link::class,
        ],
        'card' => [
            'view' => 'laravel-components::{framework}.card.index',
        ],
        'card.header' => [
            'view' => 'laravel-components::{framework}.card.header',
        ],
        'card.body' => [
            'view' => 'laravel-components::{framework}.card.body',
        ],
        'card.title' => [
            'view' => 'laravel-components::{framework}.card.title',
        ],
        'card.options' => [
            'view' => 'laravel-components::{framework}.card.options',
        ],
        'card.footer' => [
            'view' => 'laravel-components::{framework}.card.footer',
        ],
        'card.filter' => [
            'view' => 'laravel-components::{framework}.card.filter',
        ],
        'card-header' => [
            'view' => 'laravel-components::{framework}.card.header',
        ],
        'card-body' => [
            'view' => 'laravel-components::{framework}.card.body',
        ],
        'card-title' => [
            'view' => 'laravel-components::{framework}.card.title',
        ],
        'card-options' => [
            'view' => 'laravel-components::{framework}.card.options',
        ],
        'card-footer' => [
            'view' => 'laravel-components::{framework}.card.footer',
        ],
        'card-filter' => [
            'view' => 'laravel-components::{framework}.card.filter',
        ],
        'table' => [
            'view' => 'laravel-components::{framework}.table.index',
        ],
        'table.header' => [
            'view' => 'laravel-components::{framework}.table.header',
        ],
        'table.body' => [
            'view' => 'laravel-components::{framework}.table.body',
        ],
        'table.footer' => [
            'view' => 'laravel-components::{framework}.table.footer',
        ],
        'avatar' => [
            'view' => 'laravel-components::{framework}.avatar',
            'class' => Components\Avatar::class,
        ],
    ],
];
