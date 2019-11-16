<div class="form-row">
    <div class="form-group col-md-6 form-check">
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  {{ $value1 ? 'checked' : '' }} readonly>

                <label class="form-check-label" for="{{ $name1 }}">
                    {{ $title1 }}
                </label>
            </div>
    </div>
    <div class="form-group col-md-6 form-check">
        <div class="form-check">
            <input class="form-check-input" type="checkbox"  {{ $value2 ? 'checked' : '' }} readonly>

            <label class="form-check-label" for="{{ $name2 }}">
                {{ $title2 }}
            </label>
        </div>
    </div>
</div>
