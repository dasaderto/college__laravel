@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Редактирование срока поступления #{{ $data->id }}</h1>
            <form action="{{ route('admin.period.update', $data->id) }}" method="POST">
                <input type="hidden" name="_method" value="put">
                @csrf
                @include('admin.periods.partials.form')
            </form>
        </div>
    </div>
</div>

@endsection