@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-center my-4">
                <h1>Программа обучения: {{$program->name}}</h1>
                <a href="{{ route('admin.program3.edit', $program->id) }}" class="btn btn-primary ml-auto"><i class="fas fa-pen"></i> Редактировать</a>
            </div>
<nav class="mb-3 mt-5">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-1-tab" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1" aria-selected="true">Приемка</a>
        <a class="nav-item nav-link" id="nav-2-tab" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2" aria-selected="false">Программа</a>
        <a class="nav-item nav-link" id="nav-3-tab" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3" aria-selected="false">Компетенция</a>
        <a class="nav-item nav-link" id="nav-4-tab" data-toggle="tab" href="#nav-4" role="tab" aria-controls="nav-4" aria-selected="false">Дисциплины</a>
        <a class="nav-item nav-link" id="nav-5-tab" data-toggle="tab" href="#nav-5" role="tab" aria-controls="nav-5" aria-selected="false">Преимущества</a>
        <a class="nav-item nav-link" id="nav-6-tab" data-toggle="tab" href="#nav-6" role="tab" aria-controls="nav-6" aria-selected="false">Работодатели</a>
        <a class="nav-item nav-link" id="nav-7-tab" data-toggle="tab" href="#nav-7" role="tab" aria-controls="nav-7" aria-selected="false">Преподаватели</a>
        <a class="nav-item nav-link" id="nav-8-tab" data-toggle="tab" href="#nav-8" role="tab" aria-controls="nav-8" aria-selected="false">FAQ</a>
        <a class="nav-item nav-link" id="nav-9-tab" data-toggle="tab" href="#nav-9" role="tab" aria-controls="nav-9" aria-selected="false">Международка</a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab">
        <table class="m-0 border table table-borderless table-light">
            <tbody>
                <tr><td class="text-muted">Степени обучения</td>
                    <td>
                        @foreach($program->degrees as $item)
                        <span class="badge badge-secondary">{{$degrees->find($item)->name}}</span>
                        @endforeach
                    </td>
                </tr>

                <tr><td class="text-muted">Формы обучения</td>
                    <td>
                        @foreach($program->forms as $item)
                        <span class="badge badge-secondary">{{$forms->find($item)->name}}</span>
                        @endforeach
                    </td>
                </tr>
                <tr><td colspan="2"><hr><h4>Вступительные испытания</h4></td></tr>
                <tr><td class="text-muted">Портфолио</td><td>{{$program->data['portfolio']}}</td></tr>
                <tr>
                    <td class="text-muted">Предметы</td>
                    <td>
                        @foreach($program->courses ?? [] as $pc)
                        <span class="badge badge-secondary">{{$courses->find($pc)->name}}</span>
                        @endforeach
                    </td>
                </tr>

                <tr><td colspan="2"><hr><h4>График занятий</h4></td></tr>
                <tr><td class="text-muted">Очно</td><td>{{$program->data['grafik']['ochno']}}</td></tr>
                <tr><td class="text-muted">Очно-заочно</td><td>{{$program->data['grafik']['ochno_zaochno']}}</td></tr>
                <tr><td class="text-muted">Заочно</td><td>{{$program->data['grafik']['zaochno']}}</td></tr>
                <tr><td class="text-muted">Дистанционно</td><td>{{$program->data['grafik']['distant']}}</td></tr>

                <tr><td colspan="2"><hr><h4>Ссылка на учебный план</h4></td></tr>
                <tr><td class="text-muted">Очно</td><td>{{$program->data['hrefnauchebplan']['ochno']}}</td></tr>
                <tr><td class="text-muted">Очно-заочно</td><td>{{$program->data['hrefnauchebplan']['ochno_zaochno']}}</td></tr>
                <tr><td class="text-muted">Заочно</td><td>{{$program->data['hrefnauchebplan']['zaochno']}}</td></tr>
                <tr><td class="text-muted">Дистанционно</td><td>{{$program->data['hrefnauchebplan']['distant']}}</td></tr>

                <tr><td colspan="2"><hr><h4>Места</h4></td></tr>
                <tr>
                    <td></td>
                    <td class="text-muted">
                        <div class="row">
                            <div class="col-3">Очно, бюджет</div>
                            <div class="col-3">Очно, платные</div>
                            <div class="col-3">Заочно, бюджет</div>
                            <div class="col-3">Заочно, платные</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="text-muted">Бакалавриат</td>
                    <td>
                        <div class="row">
                            <div class="col-3">{{$program->data['place']['bachelor']['ochno']['budget']}}</div>
                            <div class="col-3">{{$program->data['place']['bachelor']['ochno']['pay']}}</div>
                            <div class="col-3">{{$program->data['place']['bachelor']['zaochno']['budget']}}</div>
                            <div class="col-3">{{$program->data['place']['bachelor']['zaochno']['pay']}}</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="text-muted">Магистратура</td>
                    <td>
                        <div class="row">
                            <div class="col-3">{{$program->data['place']['magister']['ochno']['budget']}}</div>
                            <div class="col-3">{{$program->data['place']['magister']['ochno']['pay']}}</div>
                            <div class="col-3">{{$program->data['place']['magister']['zaochno']['budget']}}</div>
                            <div class="col-3">{{$program->data['place']['magister']['zaochno']['pay']}}</div>
                        </div>
                    </td>
                </tr>

                <tr><td colspan="2"><hr><h4>Стоимость обучения</h4></td></tr>
                <tr><td class="text-muted">Очно</td><td>{{$program->data['price']['ochno']}}</td></tr>
                <tr><td class="text-muted">Очно-заочно</td><td>{{$program->data['price']['ochno_zaochno']}}</td></tr>
                <tr><td class="text-muted">Заочно</td><td>{{$program->data['price']['zaochno']}}</td></tr>
                <tr><td class="text-muted">Дистанционно</td><td>{{$program->data['price']['distant']}}</td></tr>

                <tr><td colspan="2"><hr><h4>Контакты по вопросам содержания программы( основные )</h4></td></tr>
                <tr><td class="text-muted">ФИО, должность</td><td>{{$program->data['contact']['name_and_position']}}</td></tr>
                <tr><td class="text-muted">Телефон</td><td>{{$program->data['contact']['phone']}}</td></tr>
                <tr><td class="text-muted">E-mail</td><td>{{$program->data['contact']['email']}}</td></tr>
                <tr><td class="text-muted">Адрес</td><td>{{$program->data['contact']['address']}}</td></tr>

                <tr><td colspan="2"><hr><h4>Контакты по вопросам содержания программы( допольнительные )</h4></td></tr>
                <tr><td class="text-muted">График работы</td><td>{{$program->data['contact_addition']['work_schedule'] ?? '-'}}</td></tr>
                <tr><td class="text-muted">Телефон</td><td>{{$program->data['contact_addition']['phone'] ?? '-'}}</td></tr>
                <tr><td class="text-muted">E-mail</td><td>{{$program->data['contact_addition']['email'] ?? '-'}}</td></tr>
                <tr><td class="text-muted">Адрес</td><td>{{$program->data['contact_addition']['address'] ?? '-'}}</td></tr>
                <tr><td class="text-muted">Метро</td><td>{{$program->data['contact_addition']['metro'] ?? '-'}}</td></tr>
                <tr><td class="text-muted">Координаты для карты</td><td>{{$program->data['contact_addition']['coordinate_map'] ?? '-'}}</td></tr>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab">
        <table class="m-0 border table table-borderless table-light">
            <tbody>
                <tr><td class="text-muted">Название</td><td>{{$program->name}}</td></tr>
                <tr><td class="text-muted">Статус</td><td>{{$program->status}}</td></tr>
                <tr><td class="text-muted">Направление</td><td>{{$program->direction->name}}</td></tr>
                <tr><td class="text-muted">Факультет</td><td>{{$program->faculty->name}}</td></tr>
                <tr><td class="text-muted">Обучение на Английском</td><td>{{$program->data['training_eng']}}</td></tr>
                <tr><td class="text-muted">Военная кафедра</td><td>{{$program->data['military_department']}}</td></tr>
                <tr><td class="text-muted">Программа двойного диплома</td><td>{{$program->data['double_degree'] ?? 0}}</td></tr>
                <tr>
                    <td class="text-muted">Аккредитация</td>
                    <td>
                        @foreach($program->data['accreditations'] as $item)
                            <span class="badge badge-secondary">{{$accreditations[$item]}}</span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="text-muted">Международная аккредитация</td>
                    <td>
                        @foreach($program->data['international_accreditations'] as $item)
                            <span class="badge badge-secondary">{{$international_accreditations[$item]}}</span>
                        @endforeach
                    </td>
                </tr>
                <tr><td class="text-muted">Картинка шапки</td><td>{{$program->data['header_img']}}</td></tr>
                <tr><td colspan="2"><span class="text-muted">Комментарий: </span>{{$program->comment}}</td></tr>
                <tr><td colspan="2"><span class="text-muted">Вступительное слово руководства: </span>{{$program->data['list_administration_intro']}}</td></tr>
                <tr>
                    <td colspan="2"><hr><h4>Список руководителей</h4></td>
                </tr>
                @foreach($program->data['list_administration'] as $item)
                    <tr>
                        <td colspan="2">
                            <h5 class="text-muted">#{{$loop->iteration}}</h5>
                            <p><span class="text-muted">ФИО: </span>{{$item['fio']}}</p>
                            <p><span class="text-muted">Ссылка на фото: </span>{{$item['photo']}}</p>
                            <p><span class="text-muted">О руководителе: </span>{{$item['about']}}</p>
                            @if($loop->last !== true)<hr>@endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab">
        <table class="m-0 border table table-borderless table-light">
            <tbody class="programs_container">
                <tr>
                    <td><h4>Компетенции</h4></td>
                </tr>
                @foreach($program->data['competences'] as $item)
                    <tr>
                        <td><h5 class="text-muted">#{{$loop->iteration}}</h4>{{$item}}@if($loop->last !== true)<hr>@endif</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab">
        <table class="m-0 border table table-borderless table-light">
            <tbody class="programs_container">
                <tr>
                    <td><h4>Дисциплины</h4></td>
                </tr>
                @foreach($program->data['disciplines'] as $item)
                    <tr>
                        <td>
                            <h5 class="text-muted">#{{$loop->iteration}}</h5>
                            <p><span class="text-muted">Заголовок: </span>{{$item['title']}}</p>
                            <p><span class="text-muted">Описание: </span>{{$item['message']}}</p>
                            @if($loop->last !== true)<hr>@endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="nav-5" role="tabpanel" aria-labelledby="nav-5-tab">
        <table class="m-0 border table table-borderless table-light">
            <tbody class="programs_container">
                <tr>
                    <td><h4>Преимущества</h4></td>
                </tr>
                @foreach($program->data['advantages'] as $item)
                    <tr>
                        <td>
                            <h5 class="text-muted">#{{$loop->iteration}}</h5>
                            <p><span class="text-muted">Заголовок: </span>{{$item['title']}}</p>
                            <p><span class="text-muted">Описание: </span>{{$item['message']}}</p>
                            @if($loop->last !== true)<hr>@endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="nav-6" role="tabpanel" aria-labelledby="nav-6-tab">
        <table class="m-0 border table table-borderless table-light">
            <tbody class="programs_container">
                <tr><td><span class="text-muted">Описание деловой карьеры выпускника: </span>{{$program->data['graduate_career']['message']}}</td></tr>
                <tr>
                    <td><h4>Список работодатей</h4></td>
                </tr>
                @foreach($program->data['list_employers'] as $item)
                    <tr>
                        <td>
                            <h5 class="text-muted">#{{$loop->iteration}}</h5>
                            <p><span class="text-muted">Название: </span>{{$item['title']}}</p>
                            <p><span class="text-muted">Ссылка на фото: </span>{{$item['photo']}}</p>
                            <p><span class="text-muted">Описание: </span>{{$item['message']}}</p>
                            @if($loop->last !== true)<hr>@endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="nav-7" role="tabpanel" aria-labelledby="nav-7-tab">
        <table class="m-0 border table table-borderless table-light">
            <tbody class="programs_container">
                <tr><td><span class="text-muted">Описание преподавателей: </span>{{$program->data['list_teachers_intro']}}</td></tr>
                <tr>
                    <td><h4>Список преподавателей</h4></td>
                </tr>
                @foreach($program->data['list_teachers'] as $item)
                    <tr>
                        <td>
                            <h5 class="text-muted">#{{$loop->iteration}}</h5>
                            <p><span class="text-muted">ФИО: </span>{{$item['fio']}}</p>
                            <p><span class="text-muted">Ссылка на фото: </span>{{$item['photo']}}</p>
                            <p><span class="text-muted">Описание: </span>{{$item['message']}}</p>
                            @if($loop->last !== true)<hr>@endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="nav-8" role="tabpanel" aria-labelledby="nav-8-tab">
        <table class="m-0 border table table-borderless table-light">
            <tbody class="programs_container">
                <tr>
                    <td><h4>Вопросы</h4></td>
                </tr>
                @foreach($program->data['faq'] as $item)
                    <tr>
                        <td>
                            <h5 class="text-muted">#{{$loop->iteration}}</h5>
                            <p><span class="text-muted">Вопрос: </span>{{$item['question']}}</p>
                            <p><span class="text-muted">Ответ: </span>{{$item['answer']}}</p>
                            @if($loop->last !== true)<hr>@endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="nav-9" role="tabpanel" aria-labelledby="nav-9-tab">
        <table class="m-0 border table table-borderless table-light">
            <tbody class="programs_container">
                <tr>
                    <td><h4>Список учебных заведений</h4></td>
                </tr>
                @foreach($program->data['list_educational_institutions'] as $item)
                    <tr>
                        <td>
                            <h5 class="text-muted">#{{$loop->iteration}}</h5>
                            <p><span class="text-muted">Название: </span>{{$item['title']}}</p>
                            <p><span class="text-muted">Ссылка на фото: </span>{{$item['photo']}}</p>
                            <p><span class="text-muted">Описание: </span>{{$item['message']}}</p>
                            @if($loop->last !== true)<hr>@endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
            <div class="d-flex align-items-center my-4">
                <h3>Информация о факультете: {{$program->faculty->name}}</h3>
                <a href="{{ route('admin.faculty.edit', $program->faculty->id) }}" class="btn btn-primary ml-auto"><i class="fas fa-pen"></i> Редактировать факультет</a>
            </div>
            <p>Декан: {{$program->faculty->deccan}}</p>
            <p>Адрес: {{$program->faculty->address}}</p>
            <p>Метро: {{$program->faculty->metro}}</p>
            <p>Контакты: @foreach($program->faculty->phones as $p) {{$p}}; @endforeach</p>
        </div>
    </div>
</div>
@endsection