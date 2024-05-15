<div class="form-group">
    <x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" />
    <div class="dropzone" data-drop>
        <div class="uploader" data-dropzone>
            <div>Drop your file here</div>
            <div> Or Click to choose from your computer</div>
            <ul class="drop-preview hide"></ul>
        </div>
        <input name="{{ $name }}" type="file" {!! $attributes !!}>
    </div>
    <div class="progress" style="height:5px">
        <div class="progress-bar bg-info" role="progressbar" style="width: 0%"></div>
    </div>

    @if($hasErrorAndShow($name))
    <x-form-errors :name="$name" />
    @endif
    {!! $help ?? null !!}
</div>
