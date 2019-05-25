<div>
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
            <div class="form-row">
                <div class="form-group col-md-12">
                    <select name="degree_id" class="custom-select">
                        <option selected="" value="">Степень обучения</option>
                        @include('admin.programs3.partials.select', ['data' => $degrees, 'data_id' => $program->degree_id])
                    </select>
                </div> 
            </div>
            <div class="form-group">
                <label>Формы обучения</label><br>
                @include('admin.programs3.partials.checkbox', ['data' => $forms, 'data_ids' => $program->forms ?? [], 'name' => 'forms'])
            </div>
            <h4 class="mt-4">Вступительные испытания</h4>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Портфолио</label><br>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input id="portfolio" type="checkbox" name="data[portfolio]" value="1" @if(isset($program->data['portfolio']) && $program->data['portfolio'] == 1) checked @endif class="custom-control-input form-check-input">
                        <label for="portfolio" class="custom-control-label form-check-label">Есть</label>
                    </div>
                </div>
                <div class="form-group col-md-10 multiple_select">
                    <input class="multiple_select__input" type="hidden" name="courses" value="{{json_encode($program->courses ?? []) }}" class="form-control">
                    <label>Предметы</label>
                    <div class="multiple_select__show">
                        <span class="badge badge-success" data-toggle="collapse" data-target="#collapse_courses" aria-expanded="false" aria-controls="collapse_courses">
                            Добавить <i class="fas fa-angle-down"></i>
                        </span>
                        @foreach($program->courses ?? [] as $pc)
                        <span class="multiple_select__show__item badge badge-secondary" data-id="{{$pc}}">{{$courses->find($pc)->name}} <i class="fas fa-times-circle"></i></span>
                        @endforeach
                    </div>
                    <div class="collapse" id="collapse_courses">
                        <div class="multiple_select__data card card-body">
                            @foreach($courses as $c)
                                <span class="multiple_select__data__item dropdown-item" data-id="{{$c->id}}">{{$c->name}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="mt-4">График занятий</h4>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Очно</label>
                    <input type="text" name="data[grafik][ochno]" value="{{$program->data['grafik']['ochno'] ?? 'Будни (с 8:30)'}}" readonly="" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Очно-заочно</label>
                    <input type="text" name="data[grafik][ochno_zaochno]" value="{{$program->data['grafik']['ochno_zaochno'] ?? ''}}" readonly="" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Заочно</label>
                    <input type="text" name="data[grafik][zaochno]" value="{{$program->data['grafik']['zaochno'] ?? 'Будни (18:50-22:00)'}}" readonly="" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Дистанционно</label>
                    <input type="text" name="data[grafik][distant]" value="{{$program->data['grafik']['distant'] ?? 'Выходные; Посессионно; С полным применением дистанционных технологий'}}" readonly="" class="form-control">
                </div>
            </div>
            <h4 class="mt-4">Ссылка на учебный план</h4>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Очно</label>
                    <input type="text" name="data[hrefnauchebplan][ochno]" value="{{$program->data['hrefnauchebplan']['ochno'] ?? ''}}" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Очно-заочно</label>
                    <input type="text" name="data[hrefnauchebplan][ochno_zaochno]" value="{{$program->data['hrefnauchebplan']['ochno_zaochno'] ?? ''}}" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Заочно</label>
                    <input type="text" name="data[hrefnauchebplan][zaochno]" value="{{$program->data['hrefnauchebplan']['zaochno'] ?? ''}}" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Дистанционно</label>
                    <input type="text" name="data[hrefnauchebplan][distant]" value="{{$program->data['hrefnauchebplan']['distant'] ?? ''}}" class="form-control">
                </div>
            </div>
            <h4 class="mt-4">Места</h4>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label class="mt-4">Бакалавриат</label>
                    <label class="mt-2">Магистратура</label>
                </div>
                <div class="form-group col-md-2">
                    <label>Очно, бюджет</label>
                    <input type="text" name="data[place][bachelor][ochno][budget]" value="{{$program->data['place']['bachelor']['ochno']['budget'] ?? ''}}" class="form-control">
                    <input type="text" name="data[place][magister][ochno][budget]" value="{{$program->data['place']['magister']['ochno']['budget'] ?? ''}}" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label>Очно, платные</label>
                    <input type="text" name="data[place][bachelor][ochno][pay]" value="{{$program->data['place']['bachelor']['ochno']['pay'] ?? ''}}" class="form-control">
                    <input type="text" name="data[place][magister][ochno][pay]" value="{{$program->data['place']['magister']['ochno']['pay'] ?? ''}}" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label>Заочно, бюджет</label>
                    <input type="text" name="data[place][bachelor][zaochno][budget]" value="{{$program->data['place']['bachelor']['zaochno']['budget'] ?? ''}}" class="form-control">
                    <input type="text" name="data[place][magister][zaochno][budget]" value="{{$program->data['place']['magister']['zaochno']['budget'] ?? ''}}" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label>Заочно, платные</label>
                    <input type="text" name="data[place][bachelor][zaochno][pay]" value="{{$program->data['place']['bachelor']['zaochno']['pay'] ?? ''}}" class="form-control">
                    <input type="text" name="data[place][magister][zaochno][pay]" value="{{$program->data['place']['magister']['zaochno']['pay'] ?? ''}}" class="form-control">
                </div>
            </div>
            <h4 class="mt-4">Стоимость обучения</h4>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Очно</label>
                    <div class="input-group">
                        <input type="text" name="data[price][ochno]" value="{{$program->data['price']['ochno'] ?? ''}}" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text">тыс. руб</span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label>Очно-заочно</label>
                    <div class="input-group">
                        <input type="text" name="data[price][ochno_zaochno]" value="{{$program->data['price']['ochno_zaochno'] ?? ''}}" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text">тыс. руб</span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label>Заочно</label>
                    <div class="input-group">
                        <input type="text" name="data[price][zaochno]" value="{{$program->data['price']['zaochno'] ?? ''}}" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text">тыс. руб</span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label>Дистанционно</label>
                    <div class="input-group">
                        <input type="text" name="data[price][distant]" value="{{$program->data['price']['distant'] ?? ''}}" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text">тыс. руб</span>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="mt-4 mb-3">Контакты по вопросам содержания программы( основные )</h4>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">ФИО, должность</label>
                <div class="col-md-10">
                    <input type="text" name="data[contact][name_and_position]" value="{{$program->data['contact']['name_and_position'] ?? ''}}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Телефон</label>
                <div class="col-md-10">
                    <input type="text" name="data[contact][phone]" value="{{$program->data['contact']['phone'] ?? ''}}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">E-mail</label>
                <div class="col-md-10">
                    <input type="text" name="data[contact][email]" value="{{$program->data['contact']['email'] ?? ''}}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Адрес</label>
                <div class="col-md-10">
                    <input type="text" name="data[contact][address]" value="{{$program->data['contact']['address'] ?? ''}}" class="form-control">
                </div>
            </div>
            <h4 class="mt-4 mb-3">Контакты по вопросам содержания программы( допольнительные )</h4>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">График работы</label>
                <div class="col-md-10">
                    <input type="text" name="data[contact_addition][work_schedule]" value="{{$program->data['contact_addition']['work_schedule'] ?? ''}}" readonly="" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Телефон</label>
                <div class="col-md-10">
                    <input type="text" name="data[contact_addition][phone]" value="{{$program->data['contact_addition']['phone'] ?? ''}}" readonly="" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">E-mail</label>
                <div class="col-md-10">
                    <input type="text" name="data[contact_addition][email]" value="{{$program->data['contact_addition']['email'] ?? ''}}" readonly="" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Адрес</label>
                <div class="col-md-10">
                    <input type="text" name="data[contact_addition][address]" value="{{$program->data['contact_addition']['address'] ?? ''}}" readonly="" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Метро</label>
                <div class="col-md-10">
                    <input type="text" name="data[contact_addition][metro]" value="{{$program->data['contact_addition']['metro'] ?? ''}}" readonly="" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Координаты для карты</label>
                <div class="col-md-9">
                    <input type="text" name="data[contact_addition][coordinate_map]" value="{{$program->data['contact_addition']['coordinate_map'] ?? ''}}" readonly="" class="form-control">
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab">
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Название</label>
                    <input type="text" autofocus="" name="name" value="{{$program->name ?? ''}}" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label>Статус</label><br>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input id="status" type="checkbox" name="status" value="1"  @if($program->status == 1 || $program->name === null) checked @endif class="custom-control-input form-check-input">
                        <label for="status" class="custom-control-label form-check-label">Рабочая</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <select name="direction_id" class="custom-select">
                        <option selected="" value="">Направление</option>
                        @include('admin.programs3.partials.select', ['data' => $directions, 'data_id' => $program->direction_id])
                    </select>
                </div>
                <div class="form-group col-md-8">
                    <select name="faculty_id" class="custom-select">
                        <option selected="" value="">Факультет</option>
                        @include('admin.programs3.partials.select', ['data' => $faculties, 'data_id' => $program->faculty_id ?? 0])
                    </select>
                </div>  
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Обучение на Английском</label><br>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input id="data_training_eng" type="checkbox" name="data[training_eng]" value="1"  @if(isset($program->data['training_eng']) && $program->data['training_eng'] == 1) checked @endif class="custom-control-input form-check-input">
                        <label for="data_training_eng" class="custom-control-label form-check-label">Есть</label>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label>Военная кафедра</label><br>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input id="data_military_department" type="checkbox" name="data[military_department]" value="1" @if(isset($program->data['military_department']) && $program->data['military_department'] == 1) checked @endif class="custom-control-input form-check-input">
                        <label for="data_military_department" class="custom-control-label form-check-label">Есть</label>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label>Программа двойного диплома</label><br>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input id="data_double_degree" type="checkbox" name="data[double_degree]" value="1" @if(isset($program->data['double_degree']) && $program->data['double_degree'] == 1) checked @endif class="custom-control-input form-check-input">
                        <label for="data_double_degree" class="custom-control-label form-check-label">Есть</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Аккредитация</label><br>
                    @forelse($accreditations as $item)
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input 
                                class="custom-control-input form-check-input" 
                                id="accreditations_{{$item['id']}}" 
                                type="checkbox" 
                                name="data[accreditations][]" 
                                value="{{$item['id']}}"
                                @if(isset($program->data['accreditations']) && in_array($item['id'], $program->data['accreditations'])) checked @endif
                            >
                            <label class="custom-control-label form-check-label" for="accreditations_{{$item['id']}}">{{$item['name']}}</label>
                        </div>
                    @empty
                        <p class="alert alert-danger">Нет данных для вывода</p>
                    @endforelse
                </div> 
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Международная аккредитация</label><br>
                    @forelse($international_accreditations as $item)
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input 
                                class="custom-control-input form-check-input" 
                                id="international_accreditations_{{$item['id']}}" 
                                type="checkbox" 
                                name="data[international_accreditations][]" 
                                value="{{$item['id']}}"
                                @if(isset($program->data['international_accreditations']) && in_array($item['id'], $program->data['international_accreditations'])) checked @endif
                            >
                            <label class="custom-control-label form-check-label" for="international_accreditations_{{$item['id']}}">{{$item['name']}}</label>
                        </div>
                    @empty
                        <p class="alert alert-danger">Нет данных для вывода</p>
                    @endforelse
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Картинка шапки</label>
                    <input type="text" name="data[header_img]" value="{{$program->data['header_img'] ?? ''}}" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Вступительное слово руководства</label>
                    <textarea name="data[list_administration_intro]" class="form-control" rows="3">{{$program->data['list_administration_intro'] ?? ''}}</textarea>
                </div>
            </div>
            <h4>Список руководителей</h4>
            <div>
                <div class="add_form-row__example form-row">
                    @forelse($program->data['list_administration'] ?? [] as $item)
                    <div class="form-group col-md-6">
                        <label>ФИО</label>
                        <input type="text" name="data[list_administration][{{$loop->index}}][fio]" value="{{$item['fio'] ?? ''}}" class="form-control add_form-row__el" data-name="data[list_administration][{ind}][fio]">
                        <label>Ссылка на фото</label>
                        <input type="text" name="data[list_administration][{{$loop->index}}][photo]" value="{{$item['photo'] ?? ''}}" class="form-control add_form-row__el" data-name="data[list_administration][{ind}][photo]">
                    </div>
                    <div class="form-group col-md-6">
                        <label>О руководителе</label>
                        <textarea name="data[list_administration][{{$loop->index}}][about]" rows="4" class="form-control add_form-row__el" data-name="data[list_administration][{ind}][about]">{{$item['about'] ?? ''}}</textarea>
                    </div>
                    @empty
                    <div class="form-group col-md-6">
                        <label>ФИО</label>
                        <input type="text" name="data[list_administration][0][fio]" value="" class="form-control add_form-row__el" data-name="data[list_administration][{ind}][fio]">
                        <label>Ссылка на фото</label>
                        <input type="text" name="data[list_administration][0][photo]" value="" class="form-control add_form-row__el" data-name="data[list_administration][{ind}][photo]">
                    </div>
                    <div class="form-group col-md-6">
                        <label>О руководителе</label>
                        <textarea name="data[list_administration][0][about]" rows="4" class="form-control add_form-row__el" data-name="data[list_administration][{ind}][about]"></textarea>
                    </div>
                    @endforelse
                </div>
                <div class="form-group col-md-12 text-center">
                    <button type="button" class="btn btn-success add_form-row"><i class="fas fa-plus"></i>Добавить</button>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Комментарий</label>
                    <textarea name="comment" class="form-control" rows="3">{{$program->comment ?? ''}}</textarea>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab">
            <div class="form-row">
                <h4>Компетенции</h4>
                <div class="form-group col-md-12">
                    <span class="add_textarea badge badge-success" data-toggle="tooltip" data-placement="top" title="Добавить поле"><i class="fas fa-plus"></i></span>
                    @forelse($program->data['competences'] ?? [] as $item)
                    <textarea name="data[competences][]" class="form-control" rows="3">{{$item ?? ''}}</textarea>
                    @empty
                    <textarea name="data[competences][]" class="form-control" rows="3"></textarea>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab">
            <h4>Дисциплины</h4>
            <div class="form-row">
                @forelse($program->data['disciplines'] ?? [] as $item)
                <div class="add_form-row__example col-md-6">
                    <div class="form-group">
                        <label>Заголовок</label>
                        <input type="text" name="data[disciplines][{{$loop->index}}][title]" value="{{$item['title'] ?? ''}}" class="form-control add_form-row__el" data-name="data[disciplines][{ind}][title]">
                        <label>Описание</label>
                        <textarea name="data[disciplines][{{$loop->index}}][message]" class="form-control add_form-row__el" rows="4" data-name="data[disciplines][{ind}][message]">{{$item['message'] ?? ''}}</textarea>
                    </div>
                </div>
                @empty
                <div class="add_form-row__example col-md-6">
                    <div class="form-group">
                        <label>Заголовок</label>
                        <input type="text" name="data[disciplines][0][title]" value="" class="form-control add_form-row__el" data-name="data[disciplines][{ind}][title]">
                        <label>Описание</label>
                        <textarea name="data[disciplines][0][message]" class="form-control add_form-row__el" rows="4" data-name="data[disciplines][{ind}][message]"></textarea>
                    </div>
                </div>
                @endforelse
                <div class="form-group col-md-12 text-center">
                    <button type="button" class="btn btn-success add_form-row"><i class="fas fa-plus"></i>Добавить</button>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-5" role="tabpanel" aria-labelledby="nav-5-tab">
            <h4>Преимущества</h4>
            <div class="form-row">
                @forelse($program->data['advantages'] ?? [] as $item)
                <div class="add_form-row__example col-md-6">
                    <div class="form-group">
                        <label>Заголовок</label>
                        <input type="text" name="data[advantages][{{$loop->index}}][title]" value="{{$item['title'] ?? ''}}" class="form-control add_form-row__el" data-name="data[advantages][{ind}][title]">
                        <label>Описание</label>
                        <textarea name="data[advantages][{{$loop->index}}][message]" rows="4" class="form-control add_form-row__el" data-name="data[advantages][{ind}][message]">{{$item['message'] ?? ''}}</textarea>
                    </div>
                </div>
                @empty
                <div class="add_form-row__example col-md-6">
                    <div class="form-group">
                        <label>Заголовок</label>
                        <input type="text" name="data[advantages][0][title]" value="" class="form-control add_form-row__el" data-name="data[advantages][{ind}][title]">
                        <label>Описание</label>
                        <textarea name="data[advantages][0][message]" rows="4" class="form-control add_form-row__el" data-name="data[advantages][{ind}][message]"></textarea>
                    </div>
                </div>
                @endforelse
                <div class="form-group col-md-12 text-center">
                    <button type="button" class="btn btn-success add_form-row"><i class="fas fa-plus"></i>Добавить</button>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-6" role="tabpanel" aria-labelledby="nav-6-tab">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Описание деловой карьеры выпускника</label>
                    <textarea name="data[graduate_career][message]" class="form-control" rows="3">{{$program->data['graduate_career']['message'] ?? ''}}</textarea>
                </div>
            </div>
            <h4>Список работодатей</h4>
            <div>
                @forelse($program->data['list_employers'] ?? [] as $item)
                <div class="add_form-row__example form-row">
                    <div class="form-group col-md-6">
                        <label>Название</label>
                        <input type="text" name="data[list_employers][{{$loop->index}}][title]" value="{{$item['title'] ?? ''}}" class="form-control add_form-row__el" data-name="data[list_employers][{ind}][title]">
                        <label>Ссылка на фото</label>
                        <input type="text" name="data[list_employers][{{$loop->index}}][photo]" value="{{$item['photo'] ?? ''}}" class="form-control add_form-row__el" data-name="data[list_employers][{ind}][photo]">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Описание</label>
                        <textarea name="data[list_employers][{{$loop->index}}][message]" class="form-control add_form-row__el" rows="4" data-name="data[list_employers][{ind}][message]">{{$item['message'] ?? ''}}</textarea>
                    </div>  
                </div>
                @empty
                <div class="add_form-row__example form-row">
                    <div class="form-group col-md-6">
                        <label>Название</label>
                        <input type="text" name="data[list_employers][0][title]" value="" class="form-control add_form-row__el" data-name="data[list_employers][{ind}][title]">
                        <label>Ссылка на фото</label>
                        <input type="text" name="data[list_employers][0][photo]" value="" class="form-control add_form-row__el" data-name="data[list_employers][{ind}][photo]">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Описание</label>
                        <textarea name="data[list_employers][0][message]" class="form-control add_form-row__el" rows="4" data-name="data[list_employers][{ind}][message]"></textarea>
                    </div>  
                </div>
                @endforelse
                <div class="form-group col-md-12 text-center">
                    <button type="button" class="btn btn-success add_form-row"><i class="fas fa-plus"></i>Добавить</button>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-7" role="tabpanel" aria-labelledby="nav-7-tab">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Описание преподавателей</label>
                    <textarea name="data[list_teachers_intro]" class="form-control" rows="3">{{$program->data['list_teachers_intro'] ?? ''}}</textarea>
                </div>
            </div>
            <h4>Список преподавателей</h4>
            <div>
                @forelse($program->data['list_teachers'] ?? [] as $item)
                <div class="add_form-row__example form-row">
                    <div class="form-group col-md-6">
                        <label>ФИО</label>
                        <input type="text" name="data[list_teachers][{{$loop->index}}][fio]" value="{{$item['fio'] ?? ''}}" class="form-control add_form-row__el" data-name="data[list_teachers][{ind}][fio]">
                        <label>Ссылка на фото</label>
                        <input type="text" name="data[list_teachers][{{$loop->index}}][photo]" value="{{$item['photo'] ?? ''}}" class="form-control add_form-row__el" data-name="data[list_teachers][{ind}][photo]">
                    </div>
                    <div class="form-group col-md-6">
                        <label>О преподавателе</label>
                        <textarea name="data[list_teachers][{{$loop->index}}][message]" class="form-control add_form-row__el" rows="4" data-name="data[list_teachers][{ind}][message]">{{$item['message'] ?? ''}}</textarea>
                    </div>  
                </div>
                @empty
                <div class="add_form-row__example form-row">
                    <div class="form-group col-md-6">
                        <label>ФИО</label>
                        <input type="text" name="data[list_teachers][0][fio]" value="" class="form-control add_form-row__el" data-name="data[list_teachers][{ind}][fio]">
                        <label>Ссылка на фото</label>
                        <input type="text" name="data[list_teachers][0][photo]" value="" class="form-control add_form-row__el" data-name="data[list_teachers][{ind}][photo]">
                    </div>
                    <div class="form-group col-md-6">
                        <label>О преподавателе</label>
                        <textarea name="data[list_teachers][0][message]" class="form-control add_form-row__el" rows="4" data-name="data[list_teachers][{ind}][message]"></textarea>
                    </div>  
                </div>
                @endforelse
                <div class="form-group col-md-12 text-center">
                    <button type="button" class="btn btn-success add_form-row"><i class="fas fa-plus"></i>Добавить</button>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-8" role="tabpanel" aria-labelledby="nav-8-tab">
            <h4>Вопросы</h4>
            <div class="form-row">
                @forelse($program->data['faq'] ?? [] as $item)
                <div class="add_form-row__example col-md-6">
                    <div class="form-group">
                        <label>Вопрос</label>
                        <input type="text" name="data[faq][{{$loop->index}}][question]" value="{{$item['question'] ?? ''}}" class="form-control add_form-row__el" data-name="data[faq][{ind}][question]">
                        <label>Ответ</label>
                        <textarea name="data[faq][{{$loop->index}}][answer]" class="form-control add_form-row__el" rows="4" data-name="data[faq][{ind}][answer]">{{$item['answer'] ?? ''}}</textarea>
                    </div>
                </div>
                @empty
                <div class="add_form-row__example col-md-6">
                    <div class="form-group">
                        <label>Вопрос</label>
                        <input type="text" name="data[faq][0][question]" value="" class="form-control add_form-row__el" data-name="data[faq][{ind}][question]">
                        <label>Ответ</label>
                        <textarea name="data[faq][0][answer]" class="form-control add_form-row__el" rows="4" data-name="data[faq][{ind}][answer]"></textarea>
                    </div>
                </div>
                @endforelse
                <div class="form-group col-md-12 text-center">
                    <button type="button" class="btn btn-success add_form-row"><i class="fas fa-plus"></i>Добавить</button>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-9" role="tabpanel" aria-labelledby="nav-9-tab">
            <h4>Список учебных заведений</h4>
            <div>
                @forelse($program->data['list_educational_institutions'] ?? [] as $item)
                <div class="add_form-row__example form-row">
                    <div class="form-group col-md-6">
                        <label>Название</label>
                        <input type="text" name="data[list_educational_institutions][{{$loop->index}}][title]" value="{{$item['title'] ?? ''}}" class="form-control add_form-row__el" data-name="data[list_educational_institutions][{ind}][title]">
                        <label>Ссылка на фото</label>
                        <input type="text" name="data[list_educational_institutions][{{$loop->index}}][photo]" value="{{$item['photo'] ?? ''}}" class="form-control add_form-row__el" data-name="data[list_educational_institutions][{ind}][photo]">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Описание учебного заведения</label>
                        <textarea name="data[list_educational_institutions][{{$loop->index}}][message]" class="form-control add_form-row__el" rows="4" data-name="data[list_educational_institutions][{ind}][message]">{{$item['message'] ?? ''}}</textarea>
                    </div>  
                </div>
                @empty
                <div class="add_form-row__example form-row">
                    <div class="form-group col-md-6">
                        <label>Название</label>
                        <input type="text" name="data[list_educational_institutions][0][title]" value="" class="form-control add_form-row__el" data-name="data[list_educational_institutions][{ind}][title]">
                        <label>Ссылка на фото</label>
                        <input type="text" name="data[list_educational_institutions][0][photo]" value="" class="form-control add_form-row__el" data-name="data[list_educational_institutions][{ind}][photo]">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Описание учебного заведения</label>
                        <textarea name="data[list_educational_institutions][0][message]" class="form-control add_form-row__el" rows="4" data-name="data[list_educational_institutions][{ind}][message]"></textarea>
                    </div>  
                </div>
                @endforelse
                <div class="form-group col-md-12 text-center">
                    <button type="button" class="btn btn-success add_form-row"><i class="fas fa-plus"></i>Добавить</button>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </div>
</div>