@extends('contact-center.layouts.app')

@section('content')
<div class="container">
    <h1>База знаний Контакт-центра</h1>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="input-group my-4">
        <input type="text" class="form-control" placeholder="Поиск...">
        <div class="input-group-append">
            <button class="btn btn-outline-primary" type="button">Найти</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <a href="#">Подача документов</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <a href="#">Программы</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <a href="#">Переводы и Восстановления</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-0 mt-4"><span class="text-muted text-uppercase font-weight-bold">Теги:</span></div>
    <div class="jumbotron bg-success text-light shadow-sm p-3 pt-1 align-items-center">
        <a href="#" class="badge badge-dark">Военная кафедра</a>
        <a href="#" class="badge badge-dark">Общежития</a>
        <a href="#" class="badge badge-dark">Переводы</a>
        <a href="#" class="badge badge-dark">Восстановления</a>
        <a href="#" class="badge badge-dark">Подкурсы</a>
        <a href="#" class="badge badge-dark">Олимпиады</a>
    </div>
    <div class="mb-0 mt-4"><span class="text-muted text-uppercase font-weight-bold">Ответы:</span></div>
    <div class="card mb-4">
        <div class="d-flex py-3">
            <div class="col-md-10">
                <a href="#">Адреса и график работы приемной комиссии</a>
                <p class="mb-0">Адрес приемной комиссии: Ленинградский проспект д51 к1 ст.м. Аэропорт</p>
            </div>
            <div class="col-md-2 d-flex align-items-end justify-content-end">
                <a href="#" class="card-link btn btn-outline-info">Смотреть</a>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="d-flex py-3">
            <div class="col-md-10">
                <a href="#">Документы для поступления на бакалавриат</a>
                <p class="mb-0">Какие документы нужно подать.</p>
            </div>
            <div class="col-md-2 d-flex align-items-end justify-content-end">
                <a href="#" class="card-link btn btn-outline-info">Смотреть</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="d-flex py-3">
            <div class="col-md-10">
                <a href="#">Перечень вступительных испытаний</a>
                <p class="mb-0">Вступительные испытания:
                    Испытание 1
                    Испытание 2
                    Испытание 3</p>
            </div>
            <div class="col-md-2 d-flex align-items-end justify-content-end">
                <a href="#" class="card-link btn btn-outline-info">Смотреть</a>
            </div>
        </div>
    </div>
</div>
@endsection
