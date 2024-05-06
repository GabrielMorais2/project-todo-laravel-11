<div class="form_input_area" >
    <label for="{{$name}}">
        {{$label ?? ''}}
    </label>
    <input value="1" name="{{$name}}"" id="{{$name}}" {{$checked ? 'checked' : ''}} type="checkbox" {{empty($required) ? '' : 'required'}}/>

</div>
