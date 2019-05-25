@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="my-4">
                <h1>Вопрос:</h1>
                <div class="que__title">
                    <h3>{{ $faq->que_title }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="my-4">
                <h1>Ответ:</h1>
                <div class="que__title">
                    <h3>{{ $faq->answer }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection