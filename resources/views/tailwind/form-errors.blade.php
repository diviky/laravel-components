@php
    use Diviky\LaravelComponents\Support\ShadcnTailwindClasses as Shadcn;
@endphp

@if ($all)
    @foreach ($getMessages() as $message)
        <{{ $tag }} {!! $attributes->merge(['class' => Shadcn::Error, 'id' => "{$inputId}-error", 'role' => 'alert']) !!}>
            @if ($slot->isEmpty())
                {{ $message }}
            @else
                {{ $slot }}
            @endif
            </{{ $tag }}>
    @endforeach
@elseif ($hasErrorAndShow($inputErrorName))
    @error($inputErrorName, $bag)
        <{{ $tag }} {!! $attributes->merge(['class' => Shadcn::Error, 'id' => "{$inputId}-error", 'role' => 'alert']) !!}>
            @if ($slot->isEmpty())
                {{ $message }}
            @else
                {{ $slot }}
            @endif
            </{{ $tag }}>
        @enderror
@endif
