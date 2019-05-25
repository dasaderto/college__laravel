@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-center my-4">
                <h1>Документ для перевода|восстановления: #{{$data->id}}</h1>
                <a href="{{ route('admin.period.edit', $data->id) }}" class="btn btn-primary ml-auto"><i class="fas fa-pen"></i> Редактировать</a>
            </div>
            
            <table class="border table table-borderless table-light">
                <tbody class="periods_container">
                    <tr><td>Вид срока</td><td>{{$data->type_terms}}</td></tr>
                    <tr><td>Тип обучения</td><td>{{$data->degree->name}}</td></tr>
                    <tr><td>Форма обучения</td><td>{{$data->form->name}}</td></tr>
                    <tr><td>Бюджет/платка</td><td>{{$data->type_price}}</td></tr>
                    <tr><td>Категория поступающиего</td><td>{{$data->category_applicants}}</td></tr>
                    <tr><td>Совокупные категории поступающего</td><td>@foreach($data->categories_applicants_combined as $p) {{$p}}; @endforeach</td></tr>
                    <tr><td>Ответственный за заполнение</td><td>{{$data->responsible_filling}}</td></tr>
                    <tr><td colspan="2"><p><b>Список документов</b></p>@foreach($data->documents as $p) <p>{{$p}}</p> @endforeach</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection