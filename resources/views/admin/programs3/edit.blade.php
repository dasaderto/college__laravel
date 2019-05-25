@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Редактирование программы: {{ $program->name }}</h1>
            <form action="{{ route('admin.program3.update', $program->id) }}" method="POST">
                <input type="hidden" name="_method" value="put">
                @csrf
                @include('admin.programs3.partials.form')
            </form>
        </div>
    </div>
</div>

@endsection