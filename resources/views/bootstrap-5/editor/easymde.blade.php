<div class="form-group">
    <x-form-label :label="$label" :required="$isRequired()" :for="$attributes->get('id') ?: $id()" />

    <div x-data="initAlpineEasyMde()" x-init="value = {{ $entangle($attributes) }};
    prefix = {{ json_encode($prefix) }};
    folder = '{{ $folder }}';
    csrfToken = {{ json_encode(csrf_token()) }};
    uploadUrl = '{{ $uploadUrl }}';
    setup = {{ $setup() }};" wire:ignore x-on:livewire:navigating.window="destroyEditor()">

        <div class="relative disabled" :class="uploading && 'pointer-events-none opacity-50'">
            <textarea id="{{ $id() }}" {{ $attributes->except(['extra-attributes', 'settings']) }} {{ $extraAttributes }}
                name="{{ $name }}" x-ref="textarea"></textarea>

            <div class="absolute top-1/2 start-1/2 !opacity-100 text-center hidden" :class="uploading && '!block'">
                <div>Uploading</div>
                <div class="loading loading-dots"></div>
            </div>
        </div>
    </div>

    <x-form-errors :name="$name" />

    <x-help> {!! $help ?? null !!} </x-help>
</div>
