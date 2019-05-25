@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Создание срока перевода|восстановления</h1>
            <form action="{{ route('admin.period_transfer_recovery.store') }}" method="POST">
                @csrf
                @include('admin.periods_transfer_recovery.partials.form')
            </form>
        </div>
    </div>
</div>

@endsection