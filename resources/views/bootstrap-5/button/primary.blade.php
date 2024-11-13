<x-form-button primary :attributes="$attributes">
    {{ isset($label) && $label != null ? $label : ($slot->isNotEmpty() ? $slot : __('Submit')) }}
</x-form-button>
