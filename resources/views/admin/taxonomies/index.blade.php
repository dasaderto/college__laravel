@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-center my-4">
                <h1>{{$title ?? 'undefined'}}</h1>
                <a href="{{ route('admin.'.$route.'.create') }}" class="btn btn-primary ml-auto"><i class="fas fa-plus"></i> Добавить</a>
            </div>
            <table class="border table table-borderless table-light">
                <thead>
                    <tr>
                        <th>Номер записи</th>
                        <th>Название</th>
                        <th class="text-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($taxonomies as $taxonomy)
                    <tr>
                        <td><span class="text-muted">#</span>{{$taxonomy->id}}</td>
                        <td>{{$taxonomy->name}}</td>
                        <td class="text-right">
                            <a href="{{route('admin.'.$route.'.edit', $taxonomy->id)}}" class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="Редактировать">
                                <i class="fas fa-pen"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                        <tr><td><p class="alert alert-danger">Записи не найдены</p></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection