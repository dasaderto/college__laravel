@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Создание срока поступления</h1>
            <form action="{{ route('admin.period.store') }}" method="POST">
                @csrf
                @include('admin.periods.partials.form')
            </form>
        </div>
    </div>
</div>

@endsection