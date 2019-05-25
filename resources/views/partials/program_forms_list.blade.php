@foreach($forms as $form)
    <{{$tag}}>
        @if(in_array($form['id'], $program_forms)) 
        <span class="badge text-success"><i class="fas fa-check"></i></span>
        @endif
    </{{$tag}}>
@endforeach