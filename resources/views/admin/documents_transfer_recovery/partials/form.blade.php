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
            <label>Совокупные категории поступающего</label>
            <span class="add_select badge badge-success" data-toggle="tooltip" data-placement="top" title="Добавить поле"><i class="fas fa-plus"></i></span>
            @forelse($errors->any() ? (old('categories_applicants_combined') ?? []) : $data->categories_applicants_combined ?? [] as $p)
                @if($p !== null || $loop->first)
                <select name="categories_applicants_combined[]" class="custom-select mb-1">
                    <option selected value=""></option>
                    @include('admin.partials.properties_select', ['data' => $props->where('name', 'categories_applicants_combined'), 'data_id' => $props->find($p)->id ?? null])
                </select>
                @endif
            @empty
            <select name="categories_applicants_combined[]" class="custom-select mb-1">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'categories_applicants_combined'), 'data_id' => null])
            </select>
            @endforelse
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
        <div class="form-group col-md-12">
            <label>Документы</label>
            <span class="add_select badge badge-success" data-toggle="tooltip" data-placement="top" title="Добавить поле"><i class="fas fa-plus"></i></span>
            @forelse(
                $errors->any() ? (old('documents') ?? []) : $data->documents ?? [] as $p)
                @if($p !== null || $loop->first)
                <select name="documents[]" class="custom-select mb-1">
                    <option selected value=""></option>
                    @include('admin.partials.properties_select', ['data' => $props->where('name', 'documents'), 'data_id' => $props->find($p)->id ?? null])
                </select>
                @endif
            @empty
            <select name="documents[]" class="custom-select mb-1">
                <option selected value=""></option>
                @include('admin.partials.properties_select', ['data' => $props->where('name', 'documents'), 'data_id' => null])
            </select>
            @endforelse
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>