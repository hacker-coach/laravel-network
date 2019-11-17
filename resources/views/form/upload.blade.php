
<div class="form-row">
    <div class="form-group col-md-6 ">
        <label for="{{$name}}" >{{ $title  }}</label>
        <input id="{{$name}}" type="file" class="form-control @error($name) is-invalid @enderror" name="{{$name}}">
        @error($name)
        <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-6 ">
    <br>
    @if (strlen($value) > 15)
        <a href="{{$value}}" target="_blank"><img src="{{$value}}" class="rounded" style="max-width:50px; max-height:50px;"></a>
    @endif
    </div>
</div>

