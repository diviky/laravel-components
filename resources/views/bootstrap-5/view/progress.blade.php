@props([
    'value' => null,
    'icon' => null,
    'label' => null,
    'copy' => false,
    'settings' => [],
])

@if ($value)
    <span {{ $attributes }}>
        <x-icon :name="$icon" class="me-1"/>
        {!! $label !!}

        <div class="progress" style="height:15px">
            <div @class([
                'progress-bar' => true,
                'bg-success' =>
                    isset($settings['positive']) && $settings['positive'] < $value,
                'bg-danger' =>
                    isset($settings['negative']) && $settings['negative'] > $value,
                'bg-warning' =>
                    isset($settings['negative']) &&
                    $settings['negative'] < $value &&
                    isset($settings['positive']) &&
                    $settings['positive'] > $value,
            ]) style="width: {{ $value }}%;">{{ $value }}%</div>
        </div>

        @if ($copy)
            <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
        @endif
    </span>
@endif
