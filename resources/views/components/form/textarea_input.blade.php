<div class="form_input_area" >
    <label for="{{$name}}">
        {{$label ?? ''}}
    </label>
    <textarea name="{{$name}}" id="{{$name}}" {{empty($required) ? '' : 'required'}} placeholder="{{$placeholder ?? ''}}">{{$value ?? ''}}</textarea>

</div>
