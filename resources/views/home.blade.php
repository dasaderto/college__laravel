@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Главное меню</h1>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <a href="#">Система публикации <br>(база паспортов)</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('contact-center')}}">База знаний Контакт-центра</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <a href="#">Базовые Справочники</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <a href="#">Телефонный справочник</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
