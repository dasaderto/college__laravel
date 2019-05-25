@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{$title ?? 'undefined'}}</h1>
            <form action="{{ route('admin.'.$route.'.store') }}" method="POST">
                @csrf
                @include('admin.taxonomies.partials.form')
            </form>
        </div>
    </div>
</div>

@endsection