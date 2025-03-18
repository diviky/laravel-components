<?php

declare(strict_types=1);

use Diviky\LaravelComponents\Components;

return [
    'prefix' => env('LARAVEL_COMPONENTS_PREFIX', env('COMPONENTS_PREFIX')),

    // bootstrap-4
    'framework' => env('LARAVEL_COMPONENTS_FRAMEWORK', env('COMPONENTS_FRAMEWORK', 'bootstrap-5')),

    'components' => [
        'accordion' => [
            'view' => 'laravel-components::{framework}.accordion.index',
        ],
        'accordion.body' => [
            'view' => 'laravel-components::{framework}.accordion.body',
        ],
        'accordion.content' => [
            'view' => 'laravel-components::{framework}.accordion.body',
        ],
        'accordion.header' => [
            'view' => 'laravel-components::{framework}.accordion.header',
        ],
        'accordion.item' => [
            'view' => 'laravel-components::{framework}.accordion.item',
        ],
        'alert' => [
            'view' => 'laravel-components::{framework}.alert.index',
        ],
        'alert.danger' => [
            'view' => 'laravel-components::{framework}.alert.danger',
        ],
        'alert.error' => [
            'view' => 'laravel-components::{framework}.alert.error',
        ],
        'alert.success' => [
            'view' => 'laravel-components::{framework}.alert.success',
        ],
        'alert.help' => [
            'view' => 'laravel-components::{framework}.alert.help',
        ],
        'alert.info' => [
            'view' => 'laravel-components::{framework}.alert.help',
        ],
        'alert.warning' => [
            'view' => 'laravel-components::{framework}.alert.warning',
        ],
        'avatar' => [
            'view' => 'laravel-components::{framework}.avatar',
            'class' => Components\Avatar::class,
        ],
        'badge' => [
            'view' => 'laravel-components::{framework}.badge',
        ],
        'breadcrumb' => [
            'view' => 'laravel-components::{framework}.breadcrumb.index',
        ],
        'breadcrumb.item' => [
            'view' => 'laravel-components::{framework}.breadcrumb.item',
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
        'card' => [
            'view' => 'laravel-components::{framework}.card.index',
        ],
        'card.body' => [
            'view' => 'laravel-components::{framework}.card.body',
        ],
        'card.filter' => [
            'view' => 'laravel-components::{framework}.card.filter',
        ],
        'card.footer' => [
            'view' => 'laravel-components::{framework}.card.footer',
        ],
        'card.header' => [
            'view' => 'laravel-components::{framework}.card.header',
        ],
        'card.options' => [
            'view' => 'laravel-components::{framework}.card.options',
        ],
        'card.title' => [
            'view' => 'laravel-components::{framework}.card.title',
        ],
        'container' => [
            'view' => 'laravel-components::{framework}.container',
            'class' => Components\Container::class,
        ],
        'counter' => [
            'view' => 'laravel-components::{framework}.counter',
        ],
        'dropdown' => [
            'view' => 'laravel-components::{framework}.dropdown.index',
        ],
        'dropdown-item' => [
            'view' => 'laravel-components::{framework}.dropdown.item',
            'alias' => 'dropdown.item',
        ],
        'dropdown.action' => [
            'view' => 'laravel-components::{framework}.dropdown.action',
        ],
        'dropdown.header' => [
            'view' => 'laravel-components::{framework}.dropdown.header',
        ],
        'dropdown.menu' => [
            'view' => 'laravel-components::{framework}.dropdown.menu',
        ],
        'dropdown.toggle' => [
            'view' => 'laravel-components::{framework}.dropdown.toggle',
        ],
        'divider' => [
            'view' => 'laravel-components::{framework}.divider',
        ],
        'filter-dates' => [
            'view' => 'laravel-components::{framework}.filters.dates',
            'class' => Components\FilterDates::class,
        ],
        'filter-search' => [
            'view' => 'laravel-components::{framework}.filters.search',
            'class' => Components\FilterSearch::class,
        ],
        'form-button' => [
            'view' => 'laravel-components::{framework}.form-button',
            'class' => Components\FormButton::class,
        ],
        'form-button-cancel' => [
            'view' => 'laravel-components::{framework}.button.cancel',
        ],
        'form-button-group' => [
            'view' => 'laravel-components::{framework}.form-button-group',
            'class' => Components\FormButtonGroup::class,
        ],
        'form-button-item' => [
            'view' => 'laravel-components::{framework}.form-button-item',
            'class' => Components\FormButtonItem::class,
        ],
        'form-button-link' => [
            'view' => 'laravel-components::{framework}.button.link',
        ],
        'form-button-primary' => [
            'view' => 'laravel-components::{framework}.button.primary',
        ],
        'form-button-secondary' => [
            'view' => 'laravel-components::{framework}.button.secondary',
        ],
        'form-choices' => [
            'view' => 'laravel-components::{framework}.form-choices',
            'class' => Components\FormChoices::class,
        ],
        'form-color' => [
            'view' => 'laravel-components::{framework}.form-color',
        ],
        'form-colors' => [
            'view' => 'laravel-components::{framework}.form-colors',
        ],
        'form-currency' => [
            'view' => 'laravel-components::{framework}.form-currency',
        ],
        'form-date' => [
            'view' => 'laravel-components::{framework}.form-date',
            'class' => Components\FormDate::class,
        ],
        'form-date-range' => [
            'view' => 'laravel-components::{framework}.form-date-range',
        ],
        'form-date-time' => [
            'view' => 'laravel-components::{framework}.form-date-time',
            'class' => Components\FormDateTime::class,
        ],
        'form-dropzone' => [
            'view' => 'laravel-components::{framework}.form-dropzone',
            'class' => Components\FormDropzone::class,
        ],
        'form-editor' => [
            'view' => 'laravel-components::{framework}.editor.quill',
            'class' => Components\EditorQuill::class,
        ],
        'form-email' => [
            'view' => 'laravel-components::{framework}.form-email',
        ],
        'form-file' => [
            'view' => 'laravel-components::{framework}.form-file',
            'class' => Components\FormFile::class,
        ],
        'form-hidden' => [
            'view' => 'laravel-components::{framework}.form-hidden',
        ],
        'form-icon' => [
            'view' => 'laravel-components::{framework}.form-icon',
        ],
        'form-image' => [
            'view' => 'laravel-components::{framework}.form-image',
            'class' => Components\FormImage::class,
        ],
        'form-markdown' => [
            'view' => 'laravel-components::{framework}.editor.easymde',
            'class' => Components\EditorEasymde::class,
        ],
        'form-number' => [
            'view' => 'laravel-components::{framework}.form-number',
        ],
        'form-password' => [
            'view' => 'laravel-components::{framework}.form-password',
        ],
        'form-pin' => [
            'view' => 'laravel-components::{framework}.form-pin',
            'class' => Components\FormPin::class,
        ],
        'form-rating' => [
            'view' => 'laravel-components::{framework}.form-rating',
            'class' => Components\FormRating::class,
        ],
        'form-search' => [
            'view' => 'laravel-components::{framework}.form-search',
        ],
        'form-select-group' => [
            'view' => 'laravel-components::{framework}.form-select-group',
            'class' => Components\FormSelectGroup::class,
        ],
        'form-select-item' => [
            'view' => 'laravel-components::{framework}.form-select-item',
            'class' => Components\FormSelectItem::class,
        ],
        'form-signature' => [
            'view' => 'laravel-components::{framework}.form-signature',
            'class' => Components\FormSignature::class,
        ],
        'form-switch' => [
            'view' => 'laravel-components::{framework}.form-switch',
            'class' => Components\FormSwitch::class,
        ],
        'form-tags' => [
            'view' => 'laravel-components::{framework}.form-tags',
            'class' => Components\FormTags::class,
        ],
        'form-tel' => [
            'view' => 'laravel-components::{framework}.form-tel',
        ],
        'form-time' => [
            'view' => 'laravel-components::{framework}.form-time',
            'class' => Components\FormTime::class,
        ],
        'form-toggle' => [
            'view' => 'laravel-components::{framework}.form-toggle',
            'class' => Components\FormToggle::class,
        ],
        'form-url' => [
            'view' => 'laravel-components::{framework}.form-url',
        ],
        'fragment' => [
            'view' => 'laravel-components::{framework}.fragment',
        ],
        'grid' => [
            'view' => 'laravel-components::{framework}.grid.index',
        ],
        'grid.item' => [
            'view' => 'laravel-components::{framework}.grid.item',
        ],
        'grid.title' => [
            'view' => 'laravel-components::{framework}.grid.title',
        ],
        'grid.content' => [
            'view' => 'laravel-components::{framework}.grid.content',
        ],
        'link' => [
            'view' => 'laravel-components::{framework}.link',
            'class' => Components\Link::class,
        ],
        'modal' => [
            'view' => 'laravel-components::{framework}.modal.index',
        ],
        'modal.body' => [
            'view' => 'laravel-components::{framework}.modal.body',
        ],
        'modal.footer' => [
            'view' => 'laravel-components::{framework}.modal.footer',
        ],
        'modal.header' => [
            'view' => 'laravel-components::{framework}.modal.header',
        ],
        'modal.title' => [
            'view' => 'laravel-components::{framework}.modal.title',
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
        'editor-quill' => [
            'alias' => 'editor.quill',
            'view' => 'laravel-components::{framework}.editor.quill',
            'class' => Components\EditorQuill::class,
        ],
        'editor-tiptap' => [
            'alias' => 'editor.tiptap',
            'view' => 'laravel-components::{framework}.editor.tiptap',
            'class' => Components\EditorTiptap::class,
        ],
        'editor-lexical' => [
            'alias' => 'editor.lexical',
            'view' => 'laravel-components::{framework}.editor.lexical',
            'class' => Components\EditorLexical::class,
        ],
        'editor-grapesjs' => [
            'alias' => 'editor.grapesjs',
            'view' => 'laravel-components::{framework}.editor.grapesjs',
            'class' => Components\EditorGrapesjs::class,
        ],
        'editor-js' => [
            'alias' => 'editor.js',
            'view' => 'laravel-components::{framework}.editor.editorjs',
            'class' => Components\EditorJs::class,
        ],
        'editor-easymde' => [
            'alias' => 'editor.easymde',
            'view' => 'laravel-components::{framework}.editor.easymde',
            'class' => Components\EditorEasymde::class,
        ],
        'editor-tinymce' => [
            'alias' => 'editor.tinymce',
            'view' => 'laravel-components::{framework}.editor.tinymce',
            'class' => Components\EditorTinymce::class,
        ],
        'page' => [
            'view' => 'laravel-components::{framework}.page.index',
        ],
        'page.body' => [
            'view' => 'laravel-components::{framework}.page.body',
        ],
        'page.footer' => [
            'view' => 'laravel-components::{framework}.page.footer',
        ],
        'page.header' => [
            'view' => 'laravel-components::{framework}.page.header',
        ],
        'page.options' => [
            'view' => 'laravel-components::{framework}.page.options',
        ],
        'page.subtitle' => [
            'view' => 'laravel-components::{framework}.page.subtitle',
        ],
        'page.title' => [
            'view' => 'laravel-components::{framework}.page.title',
        ],
        'popover' => [
            'view' => 'laravel-components::{framework}.popover',
            'class' => Components\Popover::class,
        ],
        'script' => [
            'view' => 'laravel-components::{framework}.script',
            'class' => Components\Script::class,
        ],
        'spotlight' => [
            'view' => 'laravel-components::{framework}.spotlight',
            'class' => Components\Spotlight::class,
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
        'status' => [
            'view' => 'laravel-components::{framework}.status',
        ],
        'style' => [
            'view' => 'laravel-components::{framework}.style',
            'class' => Components\Style::class,
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
        'table' => [
            'view' => 'laravel-components::{framework}.table.index',
        ],
        'table.body' => [
            'view' => 'laravel-components::{framework}.table.body',
        ],
        'table.cell' => [
            'view' => 'laravel-components::{framework}.table.cell',
        ],
        'table.column' => [
            'view' => 'laravel-components::{framework}.table.column',
        ],
        'table.columns' => [
            'view' => 'laravel-components::{framework}.table.row',
        ],
        'table.footer' => [
            'view' => 'laravel-components::{framework}.table.footer',
        ],
        'table.header' => [
            'view' => 'laravel-components::{framework}.table.header',
        ],
        'table.row' => [
            'view' => 'laravel-components::{framework}.table.row',
        ],
        'view.ago' => [
            'view' => 'laravel-components::{framework}.view.ago',
        ],
        'view.array' => [
            'view' => 'laravel-components::{framework}.view.array',
        ],
        'view.avatar' => [
            'view' => 'laravel-components::{framework}.view.avatar',
        ],
        'view.boolean' => [
            'view' => 'laravel-components::{framework}.view.boolean',
        ],
        'view.currency' => [
            'view' => 'laravel-components::{framework}.view.currency',
        ],
        'view.date' => [
            'view' => 'laravel-components::{framework}.view.date',
        ],
        'view.datetime' => [
            'view' => 'laravel-components::{framework}.view.datetime',
        ],
        'view.email' => [
            'view' => 'laravel-components::{framework}.view.email',
        ],
        'view.empty' => [
            'view' => 'laravel-components::{framework}.view.empty',
        ],
        'view.file' => [
            'view' => 'laravel-components::{framework}.view.file',
        ],
        'view.number' => [
            'view' => 'laravel-components::{framework}.view.number',
        ],
        'view.progress' => [
            'view' => 'laravel-components::{framework}.view.progress',
        ],
        'view.rating' => [
            'view' => 'laravel-components::{framework}.view.rating',
        ],
        'view.select' => [
            'view' => 'laravel-components::{framework}.view.select',
        ],
        'view.show' => [
            'view' => 'laravel-components::{framework}.view.show',
        ],
        'view.status' => [
            'view' => 'laravel-components::{framework}.view.status',
        ],
        'view.string' => [
            'view' => 'laravel-components::{framework}.view.string',
        ],
        'view.tag' => [
            'view' => 'laravel-components::{framework}.view.tag',
        ],
        'view.tags' => [
            'view' => 'laravel-components::{framework}.view.tags',
        ],
        'view.team' => [
            'view' => 'laravel-components::{framework}.view.team',
        ],
        'view.tel' => [
            'view' => 'laravel-components::{framework}.view.tel',
        ],
        'view.time' => [
            'view' => 'laravel-components::{framework}.view.time',
        ],
        'view.url' => [
            'view' => 'laravel-components::{framework}.view.url',
        ],
        'view.user' => [
            'view' => 'laravel-components::{framework}.view.user',
        ],
        'view.badge' => [
            'view' => 'laravel-components::{framework}.view.badge',
        ],
    ],
];
