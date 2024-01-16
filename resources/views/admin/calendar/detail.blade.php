@extends('admin.layouts.main')

@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Event /</span> View</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}</h5>
            </div>

            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <strong>Event Name:</strong>
                        <p>{{ $calendar->eventName }}</p>
                        @error('eventName')
                            <div class="form-text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <strong>Start Date:</strong>
                        <p>{{ $calendar->startDate }}</p>
                        @error('startDate')
                            <div class="form-text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <strong>End Date:</strong>
                        <p>{{ $calendar->endDate }}</p>
                        @error('endDate')
                            <div class="form-text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <strong>Location:</strong>
                        <p>{{ $calendar->location }}</p>
                        @error('location')
                            <div class="form-text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <strong>Committee:</strong>
                        <p>{{ $calendar->committeeId != null ? $calendar->committee()->name : 'No Committee Found' }}</p>

                        @error('committeeId')
                            <div class="form-text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <strong>Event Description:</strong>
                        <p>{{ $calendar->description }}</p>
                        @error('description')
                            <div class="form-text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
