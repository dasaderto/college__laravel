@forelse($forms as $form)
    <div class="custom-control custom-checkbox custom-control-inline">
        <input 
            class="custom-control-input form-check-input" 
            id="form_{{$form->id}}" 
            type="checkbox" 
            name="forms[]" 
            value="{{$form->id}}"
            @if(in_array($form->id, $program_forms)) checked @endif
        >
        <label class="custom-control-label form-check-label" for="form_{{$form->id}}">{{$form->name}}</label>
    </div>
@empty
    <p class="alert alert-danger">Нет форм обучения</p>
@endforelse