@foreach($data as $item)
    <option @if($data_id === $item->id) selected @endif value="{{$item->id}}">{{$item->value}}</option>
@endforeach
