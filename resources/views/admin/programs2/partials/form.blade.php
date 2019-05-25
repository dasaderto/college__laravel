<div>
    <nav class="mb-3 mt-5">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-1-tab" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1" aria-selected="true">tab1</a>
            <a class="nav-item nav-link" id="nav-2-tab" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2" aria-selected="false">tab2</a>
            <a class="nav-item nav-link" id="nav-3-tab" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3" aria-selected="false">tab3</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab">
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Название</label>
                    <input type="text" autofocus="" name="name" value="{{$program->name ?? ''}}" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label>Статус</label>
                    <input type="text" name="status" value="{{$program->status ?? ''}}" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <select name="degree" class="custom-select">
                        <option value="">Степень обучения</option>
                        @include('admin.programs2.partials.taxonomies', ['taxonomies' => $degrees, 'program_taxonomy_id' => $program->degree_id ?? 0])
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <select name="direction" class="custom-select">
                        <option selected="" value="">Программа обучения</option>
                        @include('admin.programs2.partials.taxonomies', ['taxonomies' => $directions, 'program_taxonomy_id' => $program->direction_id ?? 0])
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <select name="faculty" class="custom-select">
                        <option selected="" value="">Факультет</option>
                        @include('admin.programs2.partials.taxonomies', ['taxonomies' => $faculties, 'program_taxonomy_id' => $program->faculty_id ?? 0])
                    </select>
                </div>  
            </div>
            <div class="form-group">
                <label>Формы обучения</label><br>
                @include('admin.programs2.partials.program_forms', ['forms' => $forms, 'program_forms' => $program->form_ids ?? []])
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Срок обучения</label>
                    <div class="input-group">
                        <input type="text" name="duration_study" value="{{$program->duration_study ?? ''}}" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text">года</span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label>Возможный срок обучения</label>
                    <div class="input-group">
                        <input type="text" name="possible_duration_study" value="{{$program->possible_duration_study ?? ''}}" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text">года</span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label>Бюджетные места</label>
                    <input type="text" name="budget_places" value="{{$program->budget_places ?? ''}}" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Бюджетные места по особой квоте</label>
                    <input type="text" name="budget_places_special" value="{{$program->budget_places_special ?? ''}}" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Места под целевую квоту</label>
                    <input type="text" name="places_target_quota" value="{{$program->places_target_quota ?? ''}}" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Платные места</label>
                    <input type="text" name="paid_places" value="{{$program->paid_places ?? ''}}" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Конкурс(человек/место)</label>
                    <input type="text" name="competition" value="{{$program->competition ?? ''}}" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Средний балл</label>
                    <input type="text" name="average_point" value="{{$program->average_point ?? ''}}" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label>Минимальный балл для заключения договора</label>
                    <input type="text" name="min_point" value="{{$program->min_point ?? ''}}" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label>Цена проекта</label>
                    <div class="input-group">
                        <input type="text" name="price" value="{{$program->price ?? ''}}" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text">тыс. руб.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12 multiple_select">
                    <input class="multiple_select__input" type="hidden" name="courses" value="{{json_encode($program->courses ?? [])}}" class="form-control">
                    <label>Предметы</label>
                    <div class="multiple_select__show">
                        <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapse_courses" aria-expanded="false" aria-controls="collapse_courses">
                            Добавить <i class="fas fa-angle-down"></i>
                        </button>
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
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Частичная реализация обучения на английском</label>
                    <input type="text" name="training_english" value="{{$program->training_english ?? ''}}" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label>Обучение по программам двух дипломов</label>
                    <input type="text" name="double_defree_program" value="{{$program->double_defree_program ?? ''}}" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Наличие аккредитации</label>
                    <input type="text" name="accreditation" value="{{$program->accreditation ?? ''}}" class="form-control">
                </div>
                <div class="form-group col-md-8">
                    <label>Учебный процесс</label>
                    <span class="add_input badge badge-success" data-toggle="tooltip" data-placement="top" title="Добавить поле"><i class="fas fa-plus"></i></span>
                    @if(isset($program->educational_process))
                        @forelse($program->educational_process as $p)
                            <input type="text" name="educational_process[]" value="{{$p ?? ''}}" class="form-control">
                        @empty
                            <input type="text" name="educational_process[]" value="" class="form-control">
                            <input type="text" name="educational_process[]" value="" class="form-control">
                        @endforelse
                    @else
                        <input type="text" name="educational_process[]" value="" class="form-control">
                        <input type="text" name="educational_process[]" value="" class="form-control">
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Комментарий</label>
                <textarea name="comment" value="{{$program->comment ?? ''}}" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
        <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab">2</div>
        <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab">3</div>
    </div>
</div>