@extends('frontend.basic.layout.frontend')
@section('content')

<div class="container mt-5">

    <div class="row">
        @foreach ($document as $item)
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$item->name}}</h5>
                    <p class="card-text">{{$item->description}}</p>
                    
                </div>
                <div class="card-footer">
                    <a href="{{$item->file}}" class="btn btn-success">Download</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection