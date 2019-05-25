@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-center my-4">
                <h1>Программы обучения</h1>
                <a href="{{ route('admin.program2.create') }}" class="btn btn-primary ml-auto"><i class="fas fa-plus"></i> Добавить</a>
            </div>
            <form id="program_filter" class="jumbotron bg-success text-light shadow-sm p-3 pt-1 d-flex  justify-content-between align-items-center my-4">
                <div>
                    <div class="form-row">
                        <div class="form-group col-4">
                            <select name="degree" class="custom-select">
                                <option selected="" value="">Степень</option>
                                @include('admin.programs2.partials.taxonomies', ['taxonomies' => $degrees, 'program_taxonomy_id' => 0])
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <select name="direction" class="custom-select">
                                <option selected="" value="">Направление</option>
                                @include('admin.programs2.partials.taxonomies', ['taxonomies' => $directions, 'program_taxonomy_id' => 0])
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <select name="faculty" class="custom-select">
                                <option selected="" value="">Факультет</option>
                                @include('admin.programs2.partials.taxonomies', ['taxonomies' => $faculties, 'program_taxonomy_id' => 0])
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                        @foreach($forms as $form)
                            <div class="custom-control custom-checkbox custom-control-inline mr-1">
                                <input class="filter_program_form custom-control-input form-check-input" id="form-{{$form['id']}}" type="checkbox" name="forms[]" value="{{$form['id']}}">
                                <label class="custom-control-label form-check-label" for="form-{{$form['id']}}">{{$form['name']}}</label>
                            </div>
                        @endforeach
                        </div>
                    </div>  
                </div>
            </form>
            <button type="button" class="update_form__show btn btn-primary mb-1"><i class="fas fa-pen"></i> Массовое редактирование</button>
            <form class="update_form" action="{{ route('admin.program2_mass_update') }}" method="POST">
                <button type="submit" class="btn btn-primary" style="display: none;">Сохранить</button>
                @csrf
                <input type="hidden" disabled="" name="degrees" value="{{json_encode($degrees_json, JSON_UNESCAPED_UNICODE)}}">
                <input type="hidden" disabled="" name="directions" value="{{json_encode($directions_json, JSON_UNESCAPED_UNICODE)}}">
                <input type="hidden" disabled="" name="faculties" value="{{json_encode($faculties_json, JSON_UNESCAPED_UNICODE)}}">
                <input type="hidden" disabled="" name="forms" value="{{json_encode($forms_json, JSON_UNESCAPED_UNICODE)}}">
                <table class="index_table border table table-borderless table-light">
                    <thead>
                        <tr>
                            <th>Степень</th>
                            <th>Направление</th>
                            <th>Факультет</th>
                            <th>Название</th>
                            <th>Формы обучения</th>
                            <th class="text-right" style="width: 50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="programs_container">
                        @forelse($programs as $program)
                        <tr class="
                            program_item degree-{{$program->degree->id}} 
                            direction-{{$program->direction->id}} 
                            faculty-{{$program->faculty->id}}
                            @foreach($program->form_ids as $form) form-{{$form}} @endforeach"
                            data-id="{{$program->id}}">
                            <td class="degree" data-id="{{$program->degree->id}}">{{$program->degree->name}}</td>
                            <td class="direction" data-id="{{$program->direction->id}}">{{$program->direction->name}}</td>
                            <td class="faculty" data-id="{{$program->faculty->id}}">{{$program->faculty->name}}</td>
                            <td>{{$program->name}}</td>
                            <td>
                                @foreach($forms as $form)
                                    @if(in_array($form['id'], $program->form_ids)) 
                                    <span class="text-success">{{$form['name']}}</span>
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-right">
                                <a href="{{route('admin.program2.show_html', $program->id)}}" class="badge badge-info" data-toggle="tooltip" data-placement="top" title="HTML код">
                                    <i class="fas fa-code"></i>
                                </a>
                                <a href="{{route('admin.program2.edit', $program->id)}}" class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="Редактировать">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{route('admin.program2.show', $program->id)}}" class="badge badge-info" data-toggle="tooltip" data-placement="top" title="Подробно">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                            <p class="alert alert-danger">Программы обучения не найдены</p>
                        @endforelse
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection