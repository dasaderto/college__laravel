@foreach($taxonomies as $taxonomy)
    <option @if($program_taxonomy_id === $taxonomy->id) selected @endif value="{{$taxonomy->id}}">{{$taxonomy->name}}</option>
@endforeach
