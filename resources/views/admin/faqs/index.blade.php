@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-center my-4">
                <h1>Часто задаваемые вопросы</h1>
                <a href="{{ route('faq.create') }}" class="btn btn-primary ml-auto"><i class="fas fa-plus"></i> Добавить</a>
            </div>
            <form id="faq_filter" class="jumbotron bg-success text-light shadow-sm p-3 pt-1 d-flex  justify-content-between align-items-center my-4">
                <div class="form-group d-flex faq-filter__search">
                    <input type="search" class="form-control" name="faq__search" id="faq__search">
                    <button class="btn btn-primary search-btn">Найти</button>
                </div>
            </form>
            <table class="border table table-borderless table-light">
                    <thead>
                        <tr>
                            <th>Вопрос</th>
                            <th>Ответ</th>
                            <th class="text-right" style="width: 50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="programs_container">
                        @forelse($allFaqs as $faq)
                        <tr>
                            <td>
                                <span>{{ $faq->que_title }}</span>
                            </td>
                            <td>
                                <span>{{ $faq->answer }}</span>
                            </td>
                            <td class="d-flex text-right remake__tools">
                                <!-- <a href="" class="badge badge-info" data-toggle="tooltip" data-placement="top" title="HTML код">
                                    <i class="fas fa-code"></i>
                                </a> -->
                                <a href="{{route('faq.edit', $faq->id)}}" class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="Редактировать">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{route('faq.show', [$faq->id])}}" class="badge badge-info" data-toggle="tooltip" data-placement="top" title="Подробно">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('faq.destroy', $faq->id)}}" method="post">
                                   @csrf
                                   @method('DELETE')
                                   <button class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="Удалить"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <p class="alert alert-danger">Вопросы не найдены</p>
                        @endforelse
                    </tbody>
            </table>
        </div>
    </div>
</div>

@endsection