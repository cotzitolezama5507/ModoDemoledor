@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card">
        <div class="card-header">
            Loan View
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Id_Book</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData["loan"] as $loan)
                        <tr>
                            <td>{{ $loan->getId() }}</td>
                            <td>{{ $loan->getIdBook() }}</td>                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
