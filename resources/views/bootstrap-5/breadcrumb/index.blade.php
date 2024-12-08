@props([
    'dots' => false,
    'arrows' => true,
    'bullets' => false,
    'turbo' => true,
    'design' => null,
])

<ol {{ $attributes->class([
    'breadcrumb',
    'breadcrumb-dots' => !$design && $dots,
    'breadcrumb-arrows' => !$design && $arrows,
    'breadcrumb-bullets' => !$design && $bullets,
    'breadcrumb-' . $design => $design,
]) }}
    aria-label="breadcrumbs" @if ($turbo) data-pjax @endif>
    {!! $slot !!}
</ol>
