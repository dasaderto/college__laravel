@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Добавление вопроса</h1>
            <form action="{{ route('faq.store') }}" method="POST">
                @csrf
                
                <div class="form-group col-md-8">
                    <label><b>Введите вопрос</b></label>
                    <input type="text" class="form-control" name="question__title" id="question__title">
                </div>
                <div class="form-group col-md-8">
                    <label><b>Введите ответ</b></label>
                    <textarea cols=30 rows=10 class="form-control" name="question__answer" id="question__answer"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
</div>

@endsection