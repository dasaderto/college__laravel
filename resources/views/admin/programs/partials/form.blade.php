<div>
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
                <option selected="" value="">Степень обучения</option>
                @include('admin.programs.partials.taxonomies', ['taxonomies' => $degrees, 'program_taxonomy_id' => $program->degree_id ?? 0])
            </select>
        </div>
        <div class="form-group col-md-4">
            <select name="direction" class="custom-select">
                <option selected="" value="">Программа обучения</option>
                @include('admin.programs.partials.taxonomies', ['taxonomies' => $directions, 'program_taxonomy_id' => $program->direction_id ?? 0])
            </select>
        </div>
        <div class="form-group col-md-4">
            <select name="faculty" class="custom-select">
                <option selected="" value="">Факультет</option>
                @include('admin.programs.partials.taxonomies', ['taxonomies' => $faculties, 'program_taxonomy_id' => $program->faculty_id ?? 0])
            </select>
        </div>  
    </div>
    <div class="form-group">
        <label>Формы обучения</label><br>
        @include('admin.programs.partials.program_forms', ['forms' => $forms, 'program_forms' => $program->form_ids ?? []])
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Срок обучения</label>
            <input type="text" name="duration_study" value="{{$program->duration_study ?? ''}}" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label>Возможный срок обучения</label>
            <input type="text" name="possible_duration_study" value="{{$program->possible_duration_study ?? ''}}" class="form-control">
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
            <input type="text" name="price" value="{{$program->price ?? ''}}" class="form-control">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Предметы</label>
            <input type="text" name="courses" value="{{$program->courses ?? ''}}" class="form-control">
        </div>
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