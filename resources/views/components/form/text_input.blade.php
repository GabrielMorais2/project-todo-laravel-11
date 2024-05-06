<div class="form_input_area" >
    <label for="{{$name}}">
        {{$label ?? ''}}
    </label>
    <input value="{{$value ?? ''}}" name="{{$name}}"" id="{{$name}}" type="{{empty($type) ? 'text' : $type}}" {{empty($required) ? '' : 'required'}} placeholder="{{$placeholder ?? ''}}"/>
</div>
