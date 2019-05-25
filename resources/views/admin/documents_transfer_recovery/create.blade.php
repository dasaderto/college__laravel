@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Создание документа перевода|восстановления</h1>
            <form action="{{ route('admin.document_transfer_recovery.store') }}" method="POST">
                @csrf
                @include('admin.documents_transfer_recovery.partials.form')
            </form>
        </div>
    </div>
</div>

@endsection