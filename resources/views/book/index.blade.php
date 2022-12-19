@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <div class="row">
        @foreach ($viewData["book"] as $book)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <img src="{{ asset('/storage/'.$book->getImage()) }}" class="card-img-top img-card">
                    <div class="card-body text-center">
                        <a href="{{ route('book.show', ['id'=>  $book->getId()]) }}"
                        class="btn bg-primary text-white">{{ $book->getNameBook() }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection