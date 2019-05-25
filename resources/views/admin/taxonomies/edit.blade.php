@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{$title ?? 'undefined'}} {{ $taxonomy->name }}</h1>
            <form action="{{ route('admin.'.$route.'.update', $taxonomy->id) }}" method="POST">
                <input type="hidden" name="_method" value="put">
                @csrf
                @include('admin.taxonomies.partials.form')
            </form>
        </div>
    </div>
</div>

@endsection