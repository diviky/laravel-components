<?php

declare(strict_types=1);

use Diviky\LaravelComponents\Components;

return [
    'prefix' => env('LARAVEL_COMPONENTS_PREFIX', env('COMPONENTS_PREFIX')),

    // bootstrap-4
    'framework' => env('LARAVEL_COMPONENTS_FRAMEWORK', env('COMPONENTS_FRAMEWORK', 'bootstrap-5')),

    'components' => [
        'form-switch' => [
            'view' => 'laravel-components::{framework}.form-switch',
            'class' => Components\FormSwitch::class,
        ],
        'form-toggle' => [
            'view' => 'laravel-components::{framework}.form-toggle',
            'class' => Components\FormToggle::class,
        ],
        'form-button' => [
            'view' => 'laravel-components::{framework}.form-button',
            'class' => Components\FormButton::class,
        ],
        'form-button-cancel' => [
            'view' => 'laravel-components::{framework}.button.cancel',
        ],
        'form-button-link' => [
            'view' => 'laravel-components::{framework}.button.link',
        ],
        'form-hidden' => [
            'view' => 'laravel-components::{framework}.form-hidden',
        ],
        'form-button-primary' => [
            'view' => 'laravel-components::{framework}.button.primary',
        ],
        'form-button-secondary' => [
            'view' => 'laravel-components::{framework}.button.secondary',
        ],
        'form-date' => [
            'view' => 'laravel-components::{framework}.form-date',
        ],
        'form-pin' => [
            'view' => 'laravel-components::{framework}.form-pin',
            'class' => Components\FormPin::class,
        ],
        'form-date-time' => [
            'view' => 'laravel-components::{framework}.form-date-time',
        ],
        'form-date-range' => [
            'view' => 'laravel-components::{framework}.form-date-range',
        ],
        'form-time' => [
            'view' => 'laravel-components::{framework}.form-time',
        ],
        'form-select-group' => [
            'view' => 'laravel-components::{framework}.form-select-group',
            'class' => Components\FormSelectGroup::class,
        ],
        'form-select-item' => [
            'view' => 'laravel-components::{framework}.form-select-item',
            'class' => Components\FormSelectItem::class,
        ],
        'form-button-group' => [
            'view' => 'laravel-components::{framework}.form-button-group',
            'class' => Components\FormButtonGroup::class,
        ],
        'form-button-item' => [
            'view' => 'laravel-components::{framework}.form-button-item',
            'class' => Components\FormButtonItem::class,
        ],
        'form-file' => [
            'view' => 'laravel-components::{framework}.form-file',
            'class' => Components\FormFile::class,
        ],
        'form-dropzone' => [
            'view' => 'laravel-components::{framework}.form-dropzone',
            'class' => Components\FormDropzone::class,
        ],
        'form-email' => [
            'view' => 'laravel-components::{framework}.form-email',
        ],
        'form-url' => [
            'view' => 'laravel-components::{framework}.form-url',
        ],
        'form-tel' => [
            'view' => 'laravel-components::{framework}.form-tel',
        ],
        'form-search' => [
            'view' => 'laravel-components::{framework}.form-search',
        ],
        'form-color' => [
            'view' => 'laravel-components::{framework}.form-color',
        ],
        'form-number' => [
            'view' => 'laravel-components::{framework}.form-number',
        ],
        'form-password' => [
            'view' => 'laravel-components::{framework}.form-password',
        ],
        'form-choices' => [
            'view' => 'laravel-components::{framework}.form-choices',
            'class' => Components\FormChoices::class,
        ],
        'form-currency' => [
            'view' => 'laravel-components::{framework}.form-currency',
        ],
        'form-colors' => [
            'view' => 'laravel-components::{framework}.form-colors',
        ],
        'counter' => [
            'view' => 'laravel-components::{framework}.counter',
        ],
        'alert-error' => [
            'view' => 'laravel-components::{framework}.alert.error',
        ],
        'alert-warning' => [
            'view' => 'laravel-components::{framework}.alert.warning',
        ],
        'alert-danger' => [
            'view' => 'laravel-components::{framework}.alert.danger',
        ],
        'alert-help' => [
            'view' => 'laravel-components::{framework}.alert.help',
        ],
        'alert-info' => [
            'view' => 'laravel-components::{framework}.alert.help',
        ],
        'alert-success' => [
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
        'filter-search' => [
            'view' => 'laravel-components::{framework}.filters.search',
            'class' => Components\FilterSearch::class,
        ],
        'filter-dates' => [
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
        'popover' => [
            'view' => 'laravel-components::{framework}.popover',
            'class' => Components\Popover::class,
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
        'table.heading' => [
            'view' => 'laravel-components::{framework}.table.heading',
        ],
        'table.row' => [
            'view' => 'laravel-components::{framework}.table.row',
        ],
        'table.cell' => [
            'view' => 'laravel-components::{framework}.table.cell',
        ],
        'page' => [
            'view' => 'laravel-components::{framework}.page.index',
        ],
        'page.header' => [
            'view' => 'laravel-components::{framework}.page.header',
        ],
        'page.body' => [
            'view' => 'laravel-components::{framework}.page.body',
        ],
        'page.footer' => [
            'view' => 'laravel-components::{framework}.page.footer',
        ],
        'page.title' => [
            'view' => 'laravel-components::{framework}.page.title',
        ],
        'accordion' => [
            'view' => 'laravel-components::{framework}.accordion.index',
        ],
        'accordion.item' => [
            'view' => 'laravel-components::{framework}.accordion.item',
        ],
        'accordion.header' => [
            'view' => 'laravel-components::{framework}.accordion.header',
        ],
        'accordion.body' => [
            'view' => 'laravel-components::{framework}.accordion.body',
        ],
        'avatar' => [
            'view' => 'laravel-components::{framework}.avatar',
            'class' => Components\Avatar::class,
        ],
        'tab' => [
            'view' => 'laravel-components::{framework}.tabs.index',
        ],
        'tab.content' => [
            'view' => 'laravel-components::{framework}.tabs.content',
        ],
        'tab.item' => [
            'view' => 'laravel-components::{framework}.tabs.item',
        ],
        'tab.pane' => [
            'view' => 'laravel-components::{framework}.tabs.pane',
        ],
        'dropdown' => [
            'view' => 'laravel-components::{framework}.dropdown.index',
        ],
        'dropdown-item' => [
            'view' => 'laravel-components::{framework}.dropdown.item',
            'alias' => 'dropdown.item',
            //'class' => Components\DropdownItem::class,
        ],
        'dropdown.header' => [
            'view' => 'laravel-components::{framework}.dropdown.header',
        ],
        'steps' => [
            'view' => 'laravel-components::{framework}.steps.index',
        ],
        'steps.actions' => [
            'view' => 'laravel-components::{framework}.steps.actions',
        ],
        'steps.item' => [
            'view' => 'laravel-components::{framework}.steps.item',
        ],
        'fragment' => [
            'view' => 'laravel-components::{framework}.fragment',
        ],
        'view.boolean' => [
            'view' => 'laravel-components::{framework}.view.boolean',
        ],
        'view.tel' => [
            'view' => 'laravel-components::{framework}.view.tel',
        ],
        'view.email' => [
            'view' => 'laravel-components::{framework}.view.email',
        ],
        'view.datetime' => [
            'view' => 'laravel-components::{framework}.view.datetime',
        ],
        'view.currency' => [
            'view' => 'laravel-components::{framework}.view.currency',
        ],
        'view.string' => [
            'view' => 'laravel-components::{framework}.view.string',
        ],
        'view.ago' => [
            'view' => 'laravel-components::{framework}.view.ago',
        ],
        'view.status' => [
            'view' => 'laravel-components::{framework}.view.status',
        ],
        'view.date' => [
            'view' => 'laravel-components::{framework}.view.date',
        ],
        'view.time' => [
            'view' => 'laravel-components::{framework}.view.time',
        ],
        'view.progress' => [
            'view' => 'laravel-components::{framework}.view.progress',
        ],
        'view.avatar' => [
            'view' => 'laravel-components::{framework}.view.avatar',
        ],
        'view.tag' => [
            'view' => 'laravel-components::{framework}.view.tag',
        ],
        'view.number' => [
            'view' => 'laravel-components::{framework}.view.number',
        ],
        'view.rating' => [
            'view' => 'laravel-components::{framework}.view.rating',
        ],
        'view.empty' => [
            'view' => 'laravel-components::{framework}.view.empty',
        ],
        'view.show' => [
            'view' => 'laravel-components::{framework}.view.show',
        ],
        'view.file' => [
            'view' => 'laravel-components::{framework}.view.file',
        ],
        'view.user' => [
            'view' => 'laravel-components::{framework}.view.user',
        ],
        'view.select' => [
            'view' => 'laravel-components::{framework}.view.select',
        ],
        'modal' => [
            'view' => 'laravel-components::{framework}.modal.index',
        ],
        'modal.header' => [
            'view' => 'laravel-components::{framework}.modal.header',
        ],
        'modal.body' => [
            'view' => 'laravel-components::{framework}.modal.body',
        ],
        'modal.title' => [
            'view' => 'laravel-components::{framework}.modal.title',
        ],
        'modal.footer' => [
            'view' => 'laravel-components::{framework}.modal.footer',
        ],
        'modal.toggle' => [
            'view' => 'laravel-components::{framework}.modal.toggle',
        ],
        'nav' => [
            'view' => 'laravel-components::{framework}.nav.index',
        ],
        'nav-item' => [
            'alias' => 'nav.item',
            'view' => 'laravel-components::{framework}.nav.item',
            'class' => Components\NavItem::class,
        ],
        'form-rating' => [
            'view' => 'laravel-components::{framework}.form-rating',
            'class' => Components\FormRating::class,
        ],
    ],
];
