@extends('frontend.basic.layout.frontend')
@section('content')

<div class="container mt-5">

    <div class="row">
        <h1>{{$event->eventName}}</h1>
        <b class="text-sm">Start at : {{$event->startDate}}</b>
        <b class="text-sm mb-4">Finish at : {{$event->startDate}}</b><br>
        <b class="text-sm mb-4">Venue : {{$event->location}}</b><br>
        <p>{{$event->description}}</p>
    </div>
</div>
@endsection