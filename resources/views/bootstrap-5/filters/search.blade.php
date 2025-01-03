<div class="d-flex">
    <div class="input-icon">
        <span class="input-icon-addon">
            <x-icon name="search" />
        </span>
        <input type="text" class="form-control" style="min-width: 600px;" name="parse[]" value="{{ $this->value }}"
            placeholder='age > 10 and gender = "male" and (love = "me" or love ~= "php%")'>
    </div>

    <div>
        <x-form-submit type="submit" data-task="" primary>
            <x-icon name="arrow-right" />
        </x-form-submit>
    </div>
</div>
