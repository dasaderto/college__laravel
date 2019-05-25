@extends('admin.layouts.app')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <h1>Добавление вопроса</h1>
         <form method="post" action="{{ route('faq.update', $faq->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
               <label for="que__title">Вопрос:</label>
               <input type="text" class="form-control" name="que__title" value="{{ $faq->que_title }}" />
            </div>
            <div class="form-group">
               <label for="que__answer">Ответ:</label>
               <textarea cols=30 rows=10 type="text" class="form-control" name="que__answer">{{ $faq->answer }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Подтвердить</button>
         </form>
      </div>
   </div>
</div>
@endsection