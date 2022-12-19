@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Add Loans
        </div>
        <div class="card-body">
            @if($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.loan.store') }}"enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Id User:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="user_id" value="{{ old('user_id') }}" type="text" class="form-control">
                            </div>
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Id Book:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="book_id" value="{{ old('book_id') }}" type="text" class="form-control">
                            </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-6 col-sm-12">
                    <button type="submit" class="btn btn-primary">Send</button>
                
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Admin Loan
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Book Id</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData["loan"] as $loan)
                        <tr>
                            <td>{{ $loan->getId() }}</td>
                            <td>{{ $loan->getIdUser() }}</td>
                            <td>{{ $loan->getIdBook() }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.loan.edit', ['id'=> $loan->getId()])}}">
                                <i class="bi-pencil"></i>
                               
                            </td>
                            <td>
                                <form action="{{ route('admin.loan.delete', $loan->getId())}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
