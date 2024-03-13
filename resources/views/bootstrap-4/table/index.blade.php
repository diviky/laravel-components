@props([
'header' => null,
'body' => null,
'footer'=> null,
'responsive' => false
])

@isset($responsive)
<div class="table-responsive" style="min-height: 50vh">

    @endisset
    <table {!! $attributes->merge(['class' => 'table table-hover table-outline table-vcenter card-table text-nowrap border-top']) !!}>
        @isset($header)
        <x-table-header :attributes="$header->attributes">{!! $header !!}</x-table-header>
        @endisset

        @isset($body)
        <x-table-body :attributes="$body->attributes">{!! $body !!}</x-table-body>
        @endisset

        {!! $slot !!}

        @isset($footer)
        <x-table-footer :attributes="$footer->attributes">{!! $footer !!}</x-table-footer>
        @endisset
    </table>

    @isset($responsive)
</div>
@endisset
