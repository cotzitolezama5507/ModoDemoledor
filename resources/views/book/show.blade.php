@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('/storage/'.$viewData["book"]->getImage()) }}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                    {{ $viewData["book"]->getNameBook() }} (${{ $viewData["book"]->getPages() }})
                    </h5>
                    <p class="card-text">{{$viewData["book"]->getNameBook() }} {{ $viewData["book"]->getPages() }}  Category: {{ $viewData["book"]->getCategory_id() }}</p>
                    
                    <p class="card-text">
                        <form method="POST" action="{{ route('loan.store') }}" >
                        <input name="book_id" value="{{$viewData["book"]->getId() }}" type="number" class="form-control" style="display:none">
                        <input name="user_id" value="{{ auth()->user()->id }}" type="number" class="form-control" style="display:none">
                        
                        
                            <div class="row">
                                @csrf
                                <div class="col-auto">
                                </div>
                                <div class="col-auto" >
                                    <button class="btn bg-primary text-white" type="submit" >Add Loan</button>
                                </div>
                            </div>
                        </form>
                    </p>

                </div>
            </div>
        </div>
    </div>
@endsection