@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-center my-4">
                <h1>Документы для перевода|восстановления</h1>
                <a href="{{ route('admin.document_transfer_recovery.create') }}" class="btn btn-primary ml-auto"><i class="fas fa-plus"></i> Добавить</a>
            </div>
            <table class="border table table-borderless table-light">
                <thead>
                    <tr>
                        <th>Вид сроков</th>
                        <th>Тип обучения</th>
                        <th>Форма обучения</th>
                        <th>Бюджет/платка</th>
                        <th>Категория поступающиего</th>
                        <th>Совокупные категории поступающего</th>
                        <th class="text-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $item)
                    <tr>
                        <td>{{$props->find($item->type_terms)->value}}</td>
                        <td>{{$item->degree->name}}</td>
                        <td>{{$item->form->name}}</td>
                        <td>{{$props->find($item->type_price)->value}}</td>
                        <td>{{$props->find($item->category_applicants)->value}}</td>
                        <td>@foreach($item->categories_applicants_combined as $p) {{$props->find($p)->value}}; @endforeach</td>
                        <td class="text-right">
                            <a href="{{route('admin.document_transfer_recovery.edit', $item->id)}}" class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="Редактировать">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a href="{{route('admin.document_transfer_recovery.show', $item->id)}}" class="badge badge-info" data-toggle="tooltip" data-placement="top" title="Подробно">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                        <p class="alert alert-danger">Документы для перевода|восстановления не найдены</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection