<div class="form-group">
    <x-form-label :label="$label" :required="$isRequired()" :for="$attributes->get('id') ?: $id()" />

    <div x-data="Object.assign(initAlpineEasyMde(), {
        value: {{ $entangle($attributes) }},
        prefix: {{ json_encode($prefix) }},
        folder: '{{ $folder }}',
        csrfToken: {{ json_encode(csrf_token()) }},
        uploadUrl: '{{ $uploadUrl }}',
        setup: {{ $setup() }},
    })" wire:ignore x-on:livewire:navigating.window="destroyEditor()">

        <div class="relative disabled" :class="uploading && 'pointer-events-none opacity-50'">
            {{-- Keep wire:model off the textarea: EasyMDE hides it and Livewire would overwrite Alpine entangle with a stale/empty value on save. --}}
            <textarea id="{{ $id() }}" {{ $attributes->whereDoesntStartWith('wire:model')->except(['extra-attributes', 'settings']) }} {{ $extraAttributes }}
                name="{{ $inputName() }}" x-ref="textarea">{{ $value }}</textarea>

            <div class="absolute top-1/2 start-1/2 opacity-100! text-center hidden" :class="uploading && 'block!'">
                <div>Uploading</div>
                <div class="loading loading-dots"></div>
            </div>
        </div>
    </div>

    <x-form-errors :name="$inputName()" />

    <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
</div>
