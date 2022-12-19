@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Edit Loans
        </div>
        <div class="card-body">
            @if($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.loan.update', ['id'=> $viewData['loan']->getId()]) }}"
            enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Id User:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="user_id" value="{{ $viewData['loan']->getIdUser() }}" type="text" class="form-control">
                            </div>
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Id Book:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="book_id" value="{{ $viewData['loan']->getIdBook() }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection