<div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="{{ $name }}" id="{{ $name }}" {{ $value ? 'checked' : '' }}>

            <label class="form-check-label" for="{{ $name }}">
                {{ $title }}
            </label>
        </div>
</div>
