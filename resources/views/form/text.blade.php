<div class="form-group">
    <label for="{{$name}}" >{{ $title }}</label>

    <input id="{{$name}}" type="text" class="form-control @error($name) is-invalid @enderror" name="{{$name}}" value="{{ $value }}" {{ $required }} autocomplete="{{$name}}" autofocus>

    @error($name)
    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
    @enderror
</div>
