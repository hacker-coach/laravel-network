<div class="form-group row">
    <div class="col-md-6 offset-md-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="{{ $name }}" id="{{ $name }}" {{ $value ? 'checked' : '' }}>

            <label class="form-check-label" for="{{ $name }}">
                {{ $title }}
            </label>
        </div>
    </div>
</div>
