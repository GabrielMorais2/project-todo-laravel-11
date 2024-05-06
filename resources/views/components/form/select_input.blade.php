<div class="form_input_area" >
    <label for="{{$name}}">
        {{$label ?? ''}}
    </label>
    <select value="{{$value ?? ''}}" name="{{$name}}" id="{{$name}}" {{empty($required) ? '' : 'required'}} placeholder="{{$placeholder ?? ''}}">
        <option selected disabled value="">Selecione uma categoria</option>
        {{$slot}}
    </select>
</div>
