<div>
    <div class="form-row">
        <div class="form-group col-md-8">
            <label>Вид срока</label>
            <select name="type_terms" class="custom-select{{ $errors->has('type_terms') ? ' is-invalid' : '' }}">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'type_terms'), 'data_id' => 
                    $errors->any() 
                        ? (!empty(old('type_terms')) ? (int)old('type_terms') : null) 
                        : $data->type_terms ?? null
                ])
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Тип обучения</label>
            <select name="degree_id" class="custom-select{{ $errors->has('degree_id') ? ' is-invalid' : '' }}">
                <option selected value=""></option>
                @include('admin.partials.taxonomies', ['taxonomies' => $degrees, 'item_taxonomy_id' => 
                    $errors->any() 
                        ? (!empty(old('degree_id')) ? (int)old('degree_id') : null) 
                        : $data->degree_id ?? null
                ])
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Форма обучения</label>
            <select name="form_id" class="custom-select{{ $errors->has('form_id') ? ' is-invalid' : '' }}">
                <option selected value=""></option>
                @include('admin.partials.taxonomies', ['taxonomies' => $forms, 'item_taxonomy_id' => 
                    $errors->any() 
                        ? (!empty(old('form_id')) ? (int)old('form_id') : null) 
                        : $data->form_id ?? null
                ])
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Бюджет/платка</label>
            <select name="type_price" class="custom-select{{ $errors->has('type_price') ? ' is-invalid' : '' }}">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'type_price'), 'data_id' => 
                    $errors->any() 
                        ? (!empty(old('type_price')) ? (int)old('type_price') : null) 
                        : $props->find($data->type_price ?? 0)->id ?? null
                ])
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Категория поступающиего</label>
            <select name="category_applicants" class="custom-select{{ $errors->has('category_applicants') ? ' is-invalid' : '' }}">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'category_applicants'), 'data_id' => 
                    $errors->any() 
                        ? (!empty(old('category_applicants')) ? (int)old('category_applicants') : null) 
                        : $props->find($data->category_applicants ?? 0)->id ?? null
                ])
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Совокупная категория поступающего (при наличии)</label>
            <select name="category_applicants_combined" class="custom-select{{ $errors->has('category_applicants_combined') ? ' is-invalid' : '' }}">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'category_applicants_combined'), 'data_id' => 
                    $errors->any() 
                        ? (!empty(old('category_applicants_combined')) ? (int)old('category_applicants_combined') : null) 
                        : $props->find($data->category_applicants_combined ?? 0)->id ?? null
                ])
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Ответственный за заполнение</label>
            <select name="responsible_filling" class="custom-select{{ $errors->has('responsible_filling') ? ' is-invalid' : '' }}">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'responsible_filling'), 'data_id' => 
                    $errors->any() 
                        ? (!empty(old('responsible_filling')) ? (int)old('responsible_filling') : null) 
                        : $props->find($data->responsible_filling ?? 0)->id ?? null
                ])
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Начало подачи документов</label>
            <select name="start_submission_documents" class="custom-select{{ $errors->has('start_submission_documents') ? ' is-invalid' : '' }}">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'start_submission_documents'), 'data_id' => 
                    $errors->any() 
                        ? (!empty(old('start_submission_documents')) ? (int)old('start_submission_documents') : null) 
                        : $props->find($data->start_submission_documents ?? 0)->id ?? null
                ])
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Окончание подачи документов</label>
            <select name="end_submission_documents" class="custom-select{{ $errors->has('end_submission_documents') ? ' is-invalid' : '' }}">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'end_submission_documents'), 'data_id' => 
                    $errors->any() 
                        ? (!empty(old('end_submission_documents')) ? (int)old('end_submission_documents') : null) 
                        : $props->find($data->end_submission_documents ?? 0)->id ?? null
                ])
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Последнии дни подачи оригиналов документа об образовании (первый и второй этап)</label>
            <span class="add_select badge badge-success" data-toggle="tooltip" data-placement="top" title="Добавить поле"><i class="fas fa-plus"></i></span>
            @forelse($errors->any() ? (old('days_end_submission_document_education') ?? []) : $data->days_end_submission_document_education ?? [] as $p)
                @if($p !== null || $loop->first)
                <select name="days_end_submission_document_education[]" class="custom-select mb-1">
                    <option selected value=""></option>
                    @include('admin.partials.properties_select', ['data' => $props->where('name', 'days_end_submission_document_education'), 'data_id' => $props->find($p)->id ?? null])
                </select>
                @endif
            @empty
            <select name="days_end_submission_document_education[]" class="custom-select mb-1">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'days_end_submission_document_education'), 'data_id' => null])
            </select>
            @endforelse
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Начало заключения договоров</label>
            <select name="start_conclusion_contracts" class="custom-select{{ $errors->has('start_conclusion_contracts') ? ' is-invalid' : '' }}">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'start_conclusion_contracts'), 'data_id' => 
                    $errors->any() 
                        ? (!empty(old('start_conclusion_contracts')) ? (int)old('start_conclusion_contracts') : null) 
                        : $props->find($data->start_conclusion_contracts ?? 0)->id ?? null
                ])
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Окончание заключения договоров</label>
            <select name="end_conclusion_contracts" class="custom-select{{ $errors->has('end_conclusion_contracts') ? ' is-invalid' : '' }}">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'end_conclusion_contracts'), 'data_id' => 
                    $errors->any() 
                        ? (!empty(old('end_conclusion_contracts')) ? (int)old('end_conclusion_contracts') : null) 
                        : $props->find($data->end_conclusion_contracts ?? 0)->id ?? null
                ])
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Последний день оплаты договоров</label>
            <select name="end_payment_contracts" class="custom-select{{ $errors->has('end_payment_contracts') ? ' is-invalid' : '' }}">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'end_payment_contracts'), 'data_id' => 
                    $errors->any() 
                        ? (!empty(old('end_payment_contracts')) ? (int)old('end_payment_contracts') : null) 
                        : $props->find($data->end_payment_contracts ?? 0)->id ?? null
                ])
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Формирование списков поступающих</label>
            <select name="formation_lists_applicants" class="custom-select{{ $errors->has('formation_lists_applicants') ? ' is-invalid' : '' }}">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'formation_lists_applicants'), 'data_id' => 
                    $errors->any() 
                        ? (!empty(old('formation_lists_applicants')) ? (int)old('formation_lists_applicants') : null) 
                        : $props->find($data->formation_lists_applicants ?? 0)->id ?? null
                ])
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Первый и второй этапы приказов о зачислении</label>
            <span class="add_select badge badge-success" data-toggle="tooltip" data-placement="top" title="Добавить поле"><i class="fas fa-plus"></i></span>
            @forelse($errors->any() ? (old('days_enrollment_orders') ?? []) : $data->days_enrollment_orders ?? [] as $p)
                @if($p !== null || $loop->first)
                <select name="days_enrollment_orders[]" class="custom-select mb-1">
                    <option selected value=""></option>
                    @include('admin.partials.properties_select', ['data' => $props->where('name', 'days_enrollment_orders'), 'data_id' => $props->find($p)->id ?? null])
                </select>
                @endif
            @empty
            <select name="days_enrollment_orders[]" class="custom-select mb-1">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'days_enrollment_orders'), 'data_id' => null])
            </select>
            @endforelse
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Начало вступительных испытаний</label>
            <select name="start_entrance_examination" class="custom-select{{ $errors->has('start_entrance_examination') ? ' is-invalid' : '' }}">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'start_entrance_examination'), 'data_id' => 
                    $errors->any() 
                        ? (!empty(old('start_entrance_examination')) ? (int)old('start_entrance_examination') : null) 
                        : $props->find($data->start_entrance_examination ?? 0)->id ?? null
                ])
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Окончание вступительных испытаний</label>
            <select name="end_entrance_examination" class="custom-select{{ $errors->has('end_entrance_examination') ? ' is-invalid' : '' }}">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'end_entrance_examination'), 'data_id' => 
                    $errors->any() 
                        ? (!empty(old('end_entrance_examination')) ? (int)old('end_entrance_examination') : null) 
                        : $props->find($data->end_entrance_examination ?? 0)->id ?? null
                ])
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Резервные дни вступительных испытаний</label>
            <select name="reserve_days_entrance_examinations" class="custom-select{{ $errors->has('reserve_days_entrance_examinations') ? ' is-invalid' : '' }}">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'reserve_days_entrance_examinations'), 'data_id' => 
                    $errors->any() 
                        ? (!empty(old('reserve_days_entrance_examinations')) ? (int)old('reserve_days_entrance_examinations') : null) 
                        : $props->find($data->reserve_days_entrance_examinations ?? 0)->id ?? null
                ])
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Вынесение результатов комиссией</label>
            <select name="results_commission" class="custom-select{{ $errors->has('results_commission') ? ' is-invalid' : '' }}">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'results_commission'), 'data_id' => 
                    $errors->any() 
                        ? (!empty(old('results_commission')) ? (int)old('results_commission') : null) 
                        : $props->find($data->results_commission ?? 0)->id ?? null
                ])
            </select>
        </div>
    </div>


    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>