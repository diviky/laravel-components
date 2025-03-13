@props(['title', 'content'])

<div {{ $attributes->merge(['class' => 'datagrid-item']) }}>
    @isset($title)
        <x-grid.title>{{ $title }}</x-grid.title>
    @endisset

    @isset($content)
        <x-grid.content>{{ $content }}</x-grid.content>
    @endisset

    {{ $slot }}
</div>
