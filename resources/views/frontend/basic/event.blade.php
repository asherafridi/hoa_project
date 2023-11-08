@extends('frontend.basic.layout.frontend')
@section('content')

<div class="container mt-5">

    <div class="row">
        @foreach ($events as $item)
        <div class="col-md-3 mb-4">
            <div class="card">
                {{-- <img src="{{$item->image}}" class="card-img-top" alt="Event Image 1"> --}}
                <div class="card-body">
                    <h5 class="card-title">{{$item->eventName}}</h5>
                    <p class="card-text"><b>Venue :</b> {{$item->location}}</p>
                    <p class="card-text"><small class="text-muted">Date : {{$item->startDate}}</small></p>
                </div>
            </div>
        </div>
            
        @endforeach

    </div>
</div>
@endsection