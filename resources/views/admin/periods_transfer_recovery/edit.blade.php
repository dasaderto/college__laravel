@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Редактирование срока перевода|восстановления #{{ $data->id }}</h1>
            <form action="{{ route('admin.period_transfer_recovery.update', $data->id) }}" method="POST">
                <input type="hidden" name="_method" value="put">
                @csrf
                @include('admin.periods_transfer_recovery.partials.form')
            </form>
        </div>
    </div>
</div>

@endsection