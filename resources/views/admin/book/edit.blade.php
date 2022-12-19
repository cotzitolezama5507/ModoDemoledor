@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Edit Book
        </div>
        <div class="card-body">
            @if($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.book.update', ['id'=> $viewData['book']->getId()]) }}"
            enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name Book:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="namebook" value="{{ $viewData['book']->getNameBook() }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Pages:</label>
                                <div class="col-lg-10 col-md-6 col-sm-12">
                                    <input name="pages" value="{{ $viewData['book']->getPages() }}" type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
                                <div class="col-lg-10 col-md-6 col-sm-12">
                                    <input class="form-control" type="file" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                        &nbsp;
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input name="category_id" value="{{ $viewData['book']->getCategory_id() }}" type="number" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection