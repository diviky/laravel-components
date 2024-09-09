@props([
    'header' => null,
    'body' => null,
    'footer' => null,
    'responsive' => false,
    'bordered' => true,
    'card' => true,
    'nowrap' => true,
    'outline' => true,
    'striped' => false,
    'height' => '50vh',
    'borderTop' => true,
])

@if ($responsive)
    <div class="table-responsive" style="min-height: {{ $height }} ">
@endif
<table {!! $attributes->class([
        'table-outline' => $outline,
        'table-bordered' => $bordered,
        'text-nowrap' => $nowrap,
        'card-table' => $card,
        'table-striped' => $striped,
        'border-top' => $borderTop,
    ])->merge([
        'class' => 'table table-vcenter',
    ]) !!}>
    @isset($header)
        <x-table.header :attributes="$header->attributes">{!! $header !!}</x-table.header>
    @endisset

    @isset($head)
        <x-table.header :attributes="$head->attributes">{!! $head !!}</x-table.header>
    @endisset

    @isset($body)
        <x-table.body :attributes="$body->attributes">{!! $body !!}</x-table.body>
    @endisset

    {!! $slot !!}

    @isset($footer)
        <x-table.footer :attributes="$footer->attributes">{!! $footer !!}</x-table.footer>
    @endisset
</table>

@if ($responsive)
    </div>
@endif