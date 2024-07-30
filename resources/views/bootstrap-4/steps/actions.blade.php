@props([
    'steps' => collect(),
])

@if ($steps->count() > 1)
    @foreach ($steps as $step)
        <div class="{{ $step['id'] }} ms-auto" data-step-content
            style="display:@if ($loop->index == 0) block @else none @endif">
            @if ($loop->last)
                <x-form-button-link data-step-back="{{ $loop->index }}" class="ms-auto">
                    Back
                </x-form-button-link>
                <x-form-submit class="ms-auto">Create</x-form-submit>
            @else
                @if (!$loop->first)
                    <x-form-button-link data-step-back="{{ $loop->index }}" class="ms-auto">
                        Back
                    </x-form-button-link>
                @endif
                <x-form-button-primary data-step-next="{{ $loop->index }}" class="ms-auto">
                    Continue
                </x-form-button-primary>
            @endif
        </div>
    @endforeach
@else
    <x-form-submit class="ms-auto">Create</x-form-submit>
@endif
