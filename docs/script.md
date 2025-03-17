# Script Component

A component for including JavaScript code with additional attributes.

## View File

Location: `resources/views/bootstrap-5/script.blade.php`

## Class File

Location: `src/Components/Script.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| src | string | null | External script source URL | '/js/app.js' |
| defer | boolean | false | Whether to defer script execution | true |
| async | boolean | false | Whether to load script asynchronously | true |
| type | string | 'text/javascript' | Script MIME type | 'module' |
| nonce | string | null | Content Security Policy nonce | 'ab4d5e' |
| id | string | null | Script ID | 'main-script' |

## Usage Example

```blade
<!-- Inline script -->
<x-script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Page loaded');
    });
</x-script>

<!-- External script with attributes -->
<x-script src="/js/chart.min.js" defer />

<!-- Module script -->
<x-script type="module">
    import { createApp } from 'vue';
    import App from './App.vue';
    
    createApp(App).mount('#app');
</x-script>
```

## Notes

The script component provides a convenient way to include JavaScript in your Blade templates while adding common attributes like defer and async. It can be used for both inline scripts and external script references.
