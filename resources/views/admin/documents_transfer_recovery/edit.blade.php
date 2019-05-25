@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Редактирование документа перевода|восстановления #{{ $data->id }}</h1>
            <form action="{{ route('admin.document_transfer_recovery.update', $data->id) }}" method="POST">
                <input type="hidden" name="_method" value="put">
                @csrf
                @include('admin.documents_transfer_recovery.partials.form')
            </form>
        </div>
    </div>
</div>

@endsection