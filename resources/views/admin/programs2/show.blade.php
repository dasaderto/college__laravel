@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-center my-4">
                <h1>Программа обучения: {{$program->name}}</h1>
                <a href="{{ route('admin.program2.edit', $program->id) }}" class="btn btn-primary ml-auto"><i class="fas fa-pen"></i> Редактировать</a>
            </div>
            
            <table class="border table table-borderless table-light">
                <tbody class="programs_container">
                    <tr><td>Степень</td><td>{{$program->degree->name}}</td></tr>
                    <tr><td>Направление</td><td>{{$program->direction->name}}</td></tr>
                    <tr><td>Факультет</td><td>{{$program->faculty->name}}</td></tr>
                    <tr>
                        <td>Форма обучения</td>
                        <td>
                            @forelse($program->form_ids as $c)
                                {{$forms->find($c)->name}}
                            @empty
                                <span>-</span>
                            @endforelse
                        </td>
                    </tr>
                    <tr><td>Статус</td><td>{{$program->status}}</td></tr>
                    <tr><td>Срок обучения</td><td>{{$program->duration_study}} года</td></tr>
                    <tr><td>Возможный срок обучения</td><td>{{$program->possible_duration_study}} года</td></tr>
                    <tr><td>Бюджетные места</td><td>{{$program->budget_places}}</td></tr>
                    <tr><td>Бюджетные места по особой квоте</td><td>{{$program->budget_places_special}}</td></tr>
                    <tr><td>Места под целевую квоту</td><td>{{$program->places_target_quota}}</td></tr>
                    <tr><td>Платные места</td><td>{{$program->paid_places}}</td></tr>
                    <tr><td>Конкурс(человек/место) 2018</td><td>{{$program->competition}}</td></tr>
                    <tr><td>Средний балл 2018</td><td>{{$program->average_point}}</td></tr>
                    <tr><td>Минимальный балл для заключения договора</td><td>{{$program->min_point}}</td></tr>
                    <tr><td>Цена проекта</td><td>{{$program->price}} тыс. руб.</td></tr>
                    <tr>
                        <td>Предметы</td>
                        <td>
                            @forelse($program->courses as $c)
                                {{$courses->find($c)->name}}
                            @empty
                                <span>-</span>
                            @endforelse
                        </td>
                    </tr>
                    <tr><td>Частичная реализация обучения на английском</td><td>{{$program->training_english}}</td></tr>
                    <tr><td>Обучение по программам двух дипломов</td><td>{{$program->double_defree_program}}</td></tr>
                    <tr><td>Наличие аккредитации</td><td>{{$program->accreditation}}</td></tr>
                    <tr><td>Учебный процесс</td><td>@foreach($program->educational_process as $p) {{$p}} @endforeach</td></tr>
                    <tr><td>Комментарий</td><td>{{$program->comment}}</td></tr>
                </tbody>
            </table>
            <div class="d-flex align-items-center my-4">
                <h3>Информация о факультете: {{$program->faculty->name}}</h3>
                <a href="{{ route('admin.faculty.edit', $program->faculty->id) }}" class="btn btn-primary ml-auto"><i class="fas fa-pen"></i> Редактировать</a>
            </div>
            <p>Декан: {{$program->faculty->deccan}}</p>
            <p>Адрес: {{$program->faculty->address}}</p>
            <p>Метро: {{$program->faculty->metro}}</p>
            <p>Контакты: @foreach($program->faculty->phones as $p) {{$p}}; @endforeach</p>
        </div>
    </div>
</div>
@endsection