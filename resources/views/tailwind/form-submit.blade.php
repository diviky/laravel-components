@php
    use Diviky\LaravelComponents\Support\ShadcnTailwindClasses as Shadcn;
@endphp

@php
    $variant = null;
    if ($attributes->has('link')) {
        $variant = 'link';
    } elseif ($attributes->has('danger')) {
        $variant = 'destructive';
    } elseif ($attributes->has('secondary') || $attributes->has('light')) {
        $variant = 'secondary';
    } elseif ($outline === 'outline-' || $attributes->has('outline')) {
        $variant = 'outline';
    } elseif ($attributes->has('cancel') || $ghost || $outline === 'ghost-' || $plain) {
        $variant = 'ghost';
    } elseif (!$plain) {
        $variant = 'default';
    }

    $sizeClass = match (true) {
        $attributes->has('sm') || $attributes->has('small') => 'h-8 px-3 text-xs',
        $attributes->has('lg') || $attributes->has('large') => 'h-10 px-6',
        default => 'h-9 px-4 py-2',
    };

    $variantClass = match ($variant) {
        'destructive' => 'bg-destructive text-white shadow-xs hover:bg-destructive/90 focus-visible:ring-destructive/20 dark:focus-visible:ring-destructive/40',
        'outline' => 'border border-input bg-background shadow-xs hover:bg-accent hover:text-accent-foreground',
        'secondary' => 'bg-secondary text-secondary-foreground shadow-xs hover:bg-secondary/80',
        'ghost' => 'hover:bg-accent hover:text-accent-foreground shadow-none',
        'link' => 'text-primary underline-offset-4 hover:underline shadow-none h-auto px-0',
        'default' => 'bg-primary text-primary-foreground shadow-xs hover:bg-primary/90',
        default => 'hover:bg-accent hover:text-accent-foreground',
    };
@endphp

<button {!! $attributes->merge([
        'type' => 'submit',
        'title' => $attributes->has('title'),
    ])->class([
        Shadcn::ButtonBase,
        $variantClass,
        $sizeClass,
        'w-full' => $attributes->has('full'),
        'size-9 p-0' => $attributes->has('square'),
        'rounded-full' => $attributes->has('pill'),
        'font-semibold' => $attributes->has('bold'),
        'opacity-50 pointer-events-none' => $disabled,
    ])->except(['label', 'disabled']) !!} @if ($disabled) disabled @endif
    @if ($attributes->has('dropdown')) data-bs-toggle="dropdown" @endif>

    @if ($attributes->has('icon'))
        <x-icon :name="$attributes->get('icon')" class="size-4 shrink-0" />
    @endif

    {!! $slot !!}
</button>
