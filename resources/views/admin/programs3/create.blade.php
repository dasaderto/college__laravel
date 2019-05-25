@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Создание программы</h1>
            <form action="{{ route('admin.program3.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Степень обучения</label>
                        <select name="degree_id" class="custom-select{{ $errors->has('degree_id') ? ' is-invalid' : '' }}">
                            <option selected value=""></option>
                            @include('admin.partials.taxonomies', ['taxonomies' => $degrees, 'item_taxonomy_id' => 
                                $errors->any() 
                                    ? (!empty(old('degree_id')) ? (int)old('degree_id') : null) 
                                    : $program->degree_id ?? null
                            ])
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Название</label>
                        <input type="text" name="name" value="{{old('name', $program->name)}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Формы обучения</label><br>
                        @include('form_fields.checkbox', ['data' => $forms, 'data_ids' => old('forms', $program->forms ?? []), 'name' => 'forms'])
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Направление</label>
                        <select name="direction_id" class="custom-select{{ $errors->has('direction_id') ? ' is-invalid' : '' }}">
                            <option selected value=""></option>
                            @include('admin.partials.taxonomies', ['taxonomies' => $directions, 'item_taxonomy_id' => 
                                $errors->any() 
                                    ? (!empty(old('direction_id')) ? (int)old('direction_id') : null) 
                                    : $program->direction_id ?? null
                            ])
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Факультет</label>
                        <select name="faculty_id" class="custom-select{{ $errors->has('faculty_id') ? ' is-invalid' : '' }}">
                            <option selected value=""></option>
                            @include('admin.partials.taxonomies', ['taxonomies' => $faculties, 'item_taxonomy_id' => 
                                $errors->any() 
                                    ? (!empty(old('faculty_id')) ? (int)old('faculty_id') : null) 
                                    : $program->faculty_id ?? null
                            ])
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
</div>

@endsection