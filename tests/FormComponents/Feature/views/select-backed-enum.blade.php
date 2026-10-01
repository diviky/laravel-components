@php
    use Diviky\LaravelComponents\Tests\Support\TestVisibility;

    $target = [
        'visibility' => TestVisibility::Public,
    ];
@endphp

<x-form>
    @bind($target)
        <x-form-select name="visibility" :options="['internal' => 'Internal', 'public' => 'Public']" />
    @endbind
</x-form>
