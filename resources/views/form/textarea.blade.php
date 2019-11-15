<div class="form-group">
    <label for="{{$name}}" >{{ $title }}</label>

        <textarea id="{{$name}}" class="form-control @error($name) is-invalid @enderror" name="{{$name}}"  {{ $required }} autocomplete="{{$name}}" autofocus>{{ $value }}</textarea>
        @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
</div>


