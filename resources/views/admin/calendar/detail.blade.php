@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Event /</span> View</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}<h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.calendar.update',$calendar->id) }}">
                    
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Event Name</label>
                            <input type="text" class="form-control" required name="eventName" value="{{$calendar->eventName}}" placeholder="Arrangement"
                                autofocus />
                            @error('eventName')
                                <div class="form-text text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Start Date</label>
                            <input class="form-control" type="datetime-local" required name="startDate" value="{{$calendar->startDate}}" />
                            @error('startDate')
                                <div class="form-text text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">End Date</label>
                            <input class="form-control" type="datetime-local" required name="endDate"  value="{{$calendar->endDate}}" />
                            @error('endDate')
                                <div class="form-text text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" name="location" required  value="{{$calendar->location}}" placeholder="St. 1000 , Newyork etc" />
                            @error('location')
                                <div class="form-text text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Committee</label>
                            <select class="form-control" name="committeeId" required>
                                <option value="1">Committee 1</option>
                            </select>
                            @error('committeeId')
                                <div class="form-text text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Event Description</label>
                            <textarea type="text" name="description" class="form-control"  value="" placeholder="Description..." rows="3">{{$calendar->description}}</textarea>
                            @error('description')
                                <div class="form-text text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
@stop
