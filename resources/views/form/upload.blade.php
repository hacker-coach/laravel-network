
<div class="form-group">
    <label for="{{$name}}" >{{ $title  }}</label>

        <input id="{{$name}}" type="file" class="form-control @error($name) is-invalid @enderror" name="{{$name}}">
        @error($name)
        <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
        </span>
        @enderror
</div>
