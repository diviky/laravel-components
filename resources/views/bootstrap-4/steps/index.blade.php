@props([
    'steps' => collect(),
])

@if ($steps->count() > 1)
    <div class="wizard" step-wizard>
        <div class="container">
            <div class="position-relative mb-5 mt-2">
                <div class="progress" style="height: 2px;">
                    <div class="progress-bar" style="width: 0%"></div>
                </div>
                @foreach ($steps as $step)
                    <button type="button"
                        class="translate-middle btn btn-sm rounded-pill @if ($loop->index == 0) active @else disabled @endif"
                        style="left: {{ $loop->index * (100 / ($steps->count() - 1)) }}%;"
                        data-step=".{{ $step['id'] }}" data-step-current="{{ $loop->index }}"
                        data-step-total="{{ $steps->count() }}">
                        {{ $step['name'] }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>
@endif
