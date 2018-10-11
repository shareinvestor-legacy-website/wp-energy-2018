@if ($errors->has($field))
    <span class="invalid-feedback d-block">{{$errors->first($field)}}</span>
@endif