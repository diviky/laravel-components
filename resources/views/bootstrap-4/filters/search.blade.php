<div>
    <div class="d-flex">
        <div class="input-icon">
            <span class="input-icon-addon">
                <i class="fe fe-search"></i>
            </span>
            <input type="text" class="form-control" style="min-width: 600px;" name="parse[]" value="{{ $this->value }}" placeholder='age > 10 and gender = "male" and (love = "me" or love ~= "php%")'>
        </div>

        <div>
            <button type="submit" data-task="" class="btn btn-primary">
                <i class="fe fe-arrow-right"></i>
            </button>
        </div>
    </div>
</div>
