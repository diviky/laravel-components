@props([
    'turbo' => true,
    'separator' => 'arrows',
])

<ol {{ $attributes->class([
    'breadcrumb',
    'breadcrumb-dots' => $separator == 'dots',
    'breadcrumb-arrows' => $separator == 'arrows',
    'breadcrumb-bullets' => $separator == 'bullets',
    'breadcrumb-' . $separator => $separator,
]) }}
    aria-label="breadcrumbs" @if ($turbo) data-pjax @endif>
    {!! $slot !!}
</ol>
