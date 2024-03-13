# Laravel Components

### Usage

#### Counter

```html
<x-theme-counter number="10" />
```

will be output as

```html
<span class="counter"> 10 </span>
```

#### Switch

```html
<x-form-switch label="Test" name="status" value="1" default="1" />
```

will be output as

```html
<div class="form-group">
    <label class="custom-switch">
        <input class="custom-switch-input" type="checkbox" value="status" name="status" />

        <span class="custom-switch-indicator"></span>
        <span class="custom-switch-description text-upper">Test</span>
    </label>
</div>
```

```html
<x-form-switch label="Test" name="status" title="Form group label" value="1" default="1" />
```

will be output as

```html
<div class="form-group">
    <label class="form-label">Form group label</label>
    <label class="custom-switch">
        <input class="custom-switch-input" type="checkbox" value="status" name="status" />

        <span class="custom-switch-indicator"></span>
        <span class="custom-switch-description text-upper">Test</span>
    </label>
</div>
```

#### Checkbox

```html
<x-theme-checkbox span="Name" name="segment" value="id" />
```

will be output as

```html
<label class="custom-control custom-checkbox custom-control-inline">
    <input type="checkbox" class="custom-control-input" name="segment" value="id" />
    <span class="custom-control-label"> Name </span>
</label>
```

#### Select Group

```html
<x-form-group label="Mail Type">
    <x-form-select-group>
        <x-form-select-item label="From" name="type" value="from" checked />
        <x-form-select-item label="Reply To" name="type" value="reply" />
    </x-form-select-group>
</x-form-group>
```

##### will be output as

```html
<div class="form-group">
    <label> Mail Type </label>
    <div class="selectgroup">
        <label class="selectgroup-item">
            <input type="radio" class="selectgroup-input" value="from" name="type" checked />
            <span class="selectgroup-button"> From </span>
            <input type="radio" class="selectgroup-input" value="reply" name="type" />
            <span class="selectgroup-button"> Reply To </span>
        </label>
    </div>
</div>
```

#### Modal

```html
<x-theme-modal title="Preview" name="preview">
    <iframe class="absolute" width="100%" height="100%" data-html-preview-target></iframe>
</x-theme-modal>
```

##### will be output as

```html
<div class="modal modal-box" data-modal="preview" id="preview" data-modal-backdrop>
    <div class="modal-dialog animated bounceInRight">
        <div class="modal-content">
            <div class="modal-wrapper">
                <button type="button" class="close modal-close" data-dismiss="modal"></button>
                <div class="modal-body">
                    <header class="modal-header">
                        <span class="modal-title"> Preview </span>
                    </header>
                    <div class="modal-content scrollbar">
                        <iframe class="absolute" width="100%" height="100%" data-html-preview-target></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
```

#### Buttons

```html
<x-form-button />
```

##### will be output as

```html
<button type="submit" class="btn btn-primary">Submit</button>
```

##### We can also use label

```html
<x-form-button label="Update" />
```

##### will be output as

```html
<button type="submit" class="btn btn-primary">Update</button>
```

But if you want to display some text or icons in button instead of submit you can use it as a \$slot

##### Example:

```html
<x-form-button> Update </x-form-button>
```

##### it will be output as

```html
<button type="submit" class="btn btn-primary">Update</button>
```

##### For button with btn-secondary we can use

```html
<x-form-button-secondary />
```

##### will be output as

```html
<button type="button" class="btn btn-secondary">Submit</button>
```

##### We can also use label for btn-secondary

```html
<x-form-button-secondary label="Submit This" />
```

##### will be output as

```html
<button type="button" class="btn btn-secondary">Submit This</button>
```

##### For button with btn-cancel we can use

```html
<x-form-button-cancel />
```

##### will be output as

```html
<button type="button" class="btn btn-cancel" data-modal-dismiss>Cancel</button>
```

##### We can also use label for btn-cancel

```html
<x-form-button-cancel label="Cancel This" />
```

##### will be output as

```html
<button type="button" class="btn btn-cancel">Cancel This</button>
```

##### Theme Checkbox

```
<x-theme-checkbox label="Select All" name="box" data-segments-all />
```

```html
<label class="custom-control custom-checkbox custom-control-inline">
    <input type="checkbox" name="box" class="custom-control-input" data-segments-all />
    <span class="custom-control-label">Select All</span>
</label>
```

#### Dates Filters

```
<x-filter-dates />
```

```html
<div class="selectgroup">
    <label class="selectgroup-item">
        <input type="radio" name="time" value="" date-value="" data-dateranges-stats="" class="selectgroup-input" />
        <span date-html="" class="selectgroup-button">custom</span>
    </label>
    <label class="selectgroup-item">
        <input
            type="radio"
            class="selectgroup-input"
            data-chart-time="data-chart-time"
            value="1h"
            name="time"
            id="auto_id_time_1h"
        />
        <span class="selectgroup-button">1h </span>
    </label>
    <label class="selectgroup-item">
        <input
            type="radio"
            class="selectgroup-input"
            data-chart-time="data-chart-time"
            value="3h"
            name="time"
            id="auto_id_time_3h"
        />
        <span class="selectgroup-button">3h </span>
    </label>
    <label class="selectgroup-item">
        <input
            type="radio"
            class="selectgroup-input"
            data-chart-time="data-chart-time"
            value="6h"
            name="time"
            id="auto_id_time_6h"
        />
        <span class="selectgroup-button">6h </span>
    </label>
    <label class="selectgroup-item">
        <input
            type="radio"
            class="selectgroup-input"
            data-chart-time="data-chart-time"
            value="12h"
            name="time"
            id="auto_id_time_12h"
        />
        <span class="selectgroup-button">12h </span>
    </label>
    <label class="selectgroup-item">
        <input
            type="radio"
            class="selectgroup-input"
            data-chart-time="data-chart-time"
            value="1d"
            name="time"
            id="auto_id_time_1d"
            checked="checked"
        />
        <span class="selectgroup-button">1d </span>
    </label>
    <label class="selectgroup-item">
        <input
            type="radio"
            class="selectgroup-input"
            data-chart-time="data-chart-time"
            value="1w"
            name="time"
            id="auto_id_time_1w"
        />
        <span class="selectgroup-button">1w </span>
    </label>
    <label class="selectgroup-item">
        <input
            type="radio"
            class="selectgroup-input"
            data-chart-time="data-chart-time"
            value="1m"
            name="time"
            id="auto_id_time_1m"
        />
        <span class="selectgroup-button">1m </span>
    </label>
    <label class="selectgroup-item">
        <input
            type="radio"
            class="selectgroup-input"
            data-chart-time="data-chart-time"
            value="3m"
            name="time"
            id="auto_id_time_3m"
        />
        <span class="selectgroup-button">3m </span>
    </label>
</div>
```

### Filepond/ File

```
<x-form-file name="file" label="Please upload file" data-upload-prefix="package" />

<x-form-file name="file" label="Please upload file" data-upload-prefix="package">
    @slot('help)
        <span>Allow only jpg, png files</span>
    @endslot
</x-form-file>

```

### Drop Zone

```
<x-form-dropzone name="file" label="Please upload file" />

```

#### Link

```html
<x-link href="/post" />Submit</link>
```

##### will be output as

```html
<a href="/link">Submit</a>
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information about what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
