@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-center my-4">
                <h1>Программы обучения</h1>
                <a href="{{ route('admin.program.create') }}" class="btn btn-primary ml-auto"><i class="fas fa-plus"></i> Добавить</a>
            </div>
            <form id="program_filter" class="jumbotron bg-success text-light shadow-sm p-3 d-flex  justify-content-between align-items-center my-4">
                <div class="mr-3">
                    <strong>Фильтр</strong>
                </div>
                <div class="mr-1">
                    <select name="degree" class="custom-select">
                        <option selected="" value="">Степень</option>
                        @include('admin.programs.partials.taxonomies', ['taxonomies' => $degrees, 'program_taxonomy_id' => 0])
                    </select>
                </div>
                <div class="mr-1">
                    <select name="direction" class="custom-select">
                        <option selected="" value="">Направление</option>
                        @include('admin.programs.partials.taxonomies', ['taxonomies' => $directions, 'program_taxonomy_id' => 0])
                    </select>
                </div>
                <div class="mr-3">
                    <select name="faculty" class="custom-select">
                        <option selected="" value="">Факультет</option>
                        @include('admin.programs.partials.taxonomies', ['taxonomies' => $faculties, 'program_taxonomy_id' => 0])
                    </select>
                </div>
                <div>
                @foreach($forms as $form)
                    <div class="custom-control custom-checkbox custom-control-inline mr-1">
                        <input class="filter_program_form custom-control-input form-check-input" id="form-{{$form['id']}}" type="checkbox" name="forms[]" value="{{$form['id']}}">
                        <label class="custom-control-label form-check-label" for="form-{{$form['id']}}">{{$form['name']}}</label>
                    </div>
                @endforeach
                </div>
            </form>
            <table class="border table table-borderless table-light">
                <thead>
                    <tr>
                        <th>Степень</th>
                        <th>Направление</th>
                        <th>Факультет</th>
                        <th>Название</th>
                        @include('partials.forms_list', ['forms' => $forms, 'tag' => 'th'])
                        <th class="text-right" style="width: 50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    </tr>
                </thead>
                <tbody class="programs_container">
                    @forelse($programs as $program)
                    <tr class="program_item degree-{{$program->degree->id}} direction-{{$program->direction->id}} faculty-{{$program->faculty->id}}@foreach($program->form_ids as $form) form-{{$form}} @endforeach">
                        <td>{{$program->degree->name}}</td>
                        <td>{{$program->direction->name}}</td>
                        <td>{{$program->faculty->name}}</td>
                        <td>{{$program->name}}</td>
                        @include('partials.program_forms_list', ['forms' => $forms, 'program_forms' => $program->form_ids, 'tag' => 'td'])
                        <td class="text-right">
                            <a href="{{route('admin.program.show_html', $program->id)}}" class="badge badge-info" data-toggle="tooltip" data-placement="top" title="HTML код">
                                <i class="fas fa-code"></i>
                            </a>
                            <a href="{{route('admin.program.edit', $program->id)}}" class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="Редактировать">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a href="{{route('admin.program.show', $program->id)}}" class="badge badge-info" data-toggle="tooltip" data-placement="top" title="Подробно">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                        <p class="alert alert-danger">Программы обучения не найдены</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection