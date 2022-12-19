@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-4 mb-2">
            <img src="{{ asset('/img/libroportada1.jpeg') }}" class="img-fluid rounded">
        </div>
        <div class="col-md-6 col-lg-4 mb-2">
            <img src="{{ asset('/img/libroportada2.jpeg') }}" class="img-fluid rounded">
        </div>
        <div class="col-md-6 col-lg-4 mb-2">
            <img src="{{ asset('/img/libroportada3.jpeg') }}" class="img-fluid rounded">
        </div>
    </div>
@endsection
