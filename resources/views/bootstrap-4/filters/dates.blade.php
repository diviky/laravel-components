<x-form-select-group>
    <label class="selectgroup-item">
        <input type="radio" name="time" value="" date-value data-dateranges-stats class="selectgroup-input">
        <span date-html class="selectgroup-button">custom</span>
    </label>

    <x-form-select-item name="{{ $name }}" data-chart-time value="1h" label="1h" default="{{ $value == '1h' }}" />
    <x-form-select-item name="{{ $name }}" data-chart-time value="3h" label="3h" default="{{ $value == '3h' }}" />
    <x-form-select-item name="{{ $name }}" data-chart-time value="6h" label="6h" default="{{ $value == '6h' }}" />
    <x-form-select-item name="{{ $name }}" data-chart-time value="12h" label="12h" default="{{ $value == '12h' }}" />
    <x-form-select-item name="{{ $name }}" data-chart-time value="1d" label="1d" default="{{ $value == '1d' }}" />
    <x-form-select-item name="{{ $name }}" data-chart-time value="1w" label="1w" default="{{ $value == '1w' }}" />
    <x-form-select-item name="{{ $name }}" data-chart-time value="1m" label="1m" default="{{ $value == '1m' }}" />
    <x-form-select-item name="{{ $name }}" data-chart-time value="3m" label="3m" default="{{ $value == '3m' }}" />
</x-form-select-group>
