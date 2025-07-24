<div class="form-group">
    <x-form-label :label="$label" :required="$isRequired()" :for="$attributes->get('id') ?: $id()" />

    <div x-data="tiptapEditor({
        id: '{{ $id() }}',
        value: {{ $entangle($attributes) }},
        prefix: {{ json_encode($prefix) }},
        folder: '{{ $folder }}',
        csrfToken: {{ json_encode(csrf_token()) }},
        uploadUrl: '{{ $uploadUrl }}',
        editable: {{ $setup() }}.editable !== false ? true : false
    })" wire:ignore x-on:livewire:navigating.window="destroyEditor()" x-init="init()">
        <div class="relative" :class="uploading && 'pointer-events-none opacity-50'">
            <div class="tiptap-toolbar" x-show="editor">
                <button x-on:click.prevent="toggleBold()" :class="{ 'is-active': editor?.isActive('bold') }"
                    title="Bold">B</button>
                <button x-on:click.prevent="toggleItalic()" :class="{ 'is-active': editor?.isActive('italic') }"
                    title="Italic">I</button>
                <button x-on:click.prevent="toggleUnderline()" :class="{ 'is-active': editor?.isActive('underline') }"
                    title="Underline">U</button>
                <button x-on:click.prevent="toggleStrike()" :class="{ 'is-active': editor?.isActive('strike') }"
                    title="Strike">S</button>
                <button x-on:click.prevent="toggleHeading(1)"
                    :class="{ 'is-active': editor?.isActive('heading', { level: 1 }) }" title="H1">H1</button>
                <button x-on:click.prevent="toggleHeading(2)"
                    :class="{ 'is-active': editor?.isActive('heading', { level: 2 }) }" title="H2">H2</button>
                <button x-on:click.prevent="toggleBulletList()" :class="{ 'is-active': editor?.isActive('bulletList') }"
                    title="Bullet List">UL</button>
                <button x-on:click.prevent="toggleOrderedList()"
                    :class="{ 'is-active': editor?.isActive('orderedList') }" title="Ordered List">OL</button>
                <button x-on:click.prevent="toggleBlockquote()" :class="{ 'is-active': editor?.isActive('blockquote') }"
                    title="Blockquote">Quote</button>
                <button x-on:click.prevent="toggleCodeBlock()" :class="{ 'is-active': editor?.isActive('codeBlock') }"
                    title="Code Block">Code</button>
                <button x-on:click.prevent="imageHandler()" title="Image">Image</button>
                <button x-on:click.prevent="setLink()" :class="{ 'is-active': editor?.isActive('link') }"
                    title="Link">Link</button>
            </div>
            <div x-ref="tiptapContainer{{ $id() }}" class="tiptap-editor"></div>
            <input type="hidden" id="{{ $id() }}" {{ $attributes->except(['extra-attributes', 'settings']) }}
                {{ $extraAttributes }} name="{{ $name }}" x-ref="hiddenInput{{ $id() }}"
                :value="value">

            <div class="absolute top-1/2 start-1/2 opacity-100! text-center hidden" :class="uploading && 'block!'">
                <div>Uploading</div>
                <div class="loading loading-dots"></div>
            </div>
        </div>
    </div>

    <x-form-errors :name="$name" />

    <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
</div>

<script>
    // Import the external TipTap editor setup
    function tiptapEditor(config) {
        return window.tiptapEditorSetup ? {
            ...window.tiptapEditorSetup(),
            ...config
        } : config;
    }
</script>
