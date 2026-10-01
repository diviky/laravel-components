<?php

namespace Diviky\LaravelComponents\Support;

final class ShadcnTailwindClasses
{
    public const string Label = 'text-sm font-medium leading-none select-none peer-disabled:cursor-not-allowed peer-disabled:opacity-50';

    public const string LabelDescription = 'text-muted-foreground text-sm font-normal leading-snug mt-1';

    public const string Help = 'text-muted-foreground text-sm';

    public const string Error = 'text-destructive text-sm font-medium';

    public const string Field = 'grid gap-2';

    public const string Input = 'border-input file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive';

    public const string InputSm = 'h-8 px-2.5 text-sm';

    public const string InputLg = 'h-10 px-4';

    public const string Textarea = 'border-input placeholder:text-muted-foreground focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive flex field-sizing-content min-h-16 w-full rounded-md border bg-transparent px-3 py-2 text-base shadow-xs transition-[color,box-shadow] outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm';

    public const string Select = 'border-input focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive flex h-9 w-full items-center rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm';

    public const string Checkbox = 'peer border-input size-4 shrink-0 rounded-[4px] border shadow-xs transition-shadow outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive text-primary accent-primary';

    public const string Radio = 'border-input size-4 shrink-0 rounded-full border shadow-xs transition-shadow outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive text-primary accent-primary';

    public const string Range = 'w-full accent-primary';

    public const string InputGroupText = 'border-input bg-muted text-muted-foreground inline-flex h-9 items-center border px-3 text-sm shadow-xs';

    public const string ButtonBase = 'inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-[color,box-shadow] disabled:pointer-events-none disabled:opacity-50 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px]';
}
