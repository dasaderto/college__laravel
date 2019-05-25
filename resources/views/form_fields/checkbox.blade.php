@forelse($data as $item)
    <div class="custom-control custom-checkbox custom-control-inline">
        <input 
            class="custom-control-input form-check-input{{ $errors->has($name) ? ' is-invalid' : '' }}" 
            id="{{$name}}_{{$item->id}}" 
            type="checkbox" 
            name="{{$name}}[]" 
            value="{{$item->id}}"
            @if(in_array($item->id, $data_ids)) checked @endif
        >
        <label class="custom-control-label form-check-label" for="{{$name}}_{{$item->id}}">{{$item->name}}</label>
    </div>
@empty
    <p class="alert alert-danger">Нет данных для вывода</p>
@endforelse