@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Создание программы</h1>
            <form action="{{ route('admin.program2.store') }}" method="POST">
                @csrf
                @include('admin.programs2.partials.form')
            </form>
        </div>
    </div>
</div>

@endsection