@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Event /</span> Create</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}<h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.calendar.store') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Event Name</label>
                            <input type="text" class="form-control" required name="eventName" placeholder="Arrangement"
                                autofocus />
                            @error('eventName')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Start Date</label>
                            <input class="form-control" type="datetime-local" required name="startDate" value="" />
                            @error('startDate')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">End Date</label>
                            <input class="form-control" type="datetime-local" required name="endDate" value="" />
                            @error('endDate')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" name="location" required
                                placeholder="St. 1000 , Newyork etc" />
                            @error('location')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Committee</label>
                            <select class="form-control" name="committeeId" required>
                                <option>Select Committee</option>
                                @foreach ($committee as $comm)
                                    <option value="{{ $comm->id }}">{{ $comm->name }}</option>
                                @endforeach
                            </select>
                            @error('committeeId')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Event Description</label>
                            <textarea type="text" name="description" class="form-control" placeholder="Description..." rows="3"></textarea>
                            @error('description')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label class="form-label">For User</label>
                            <select class="form-control" required name="forUser">
                                @foreach (forUser() as $item)
                                    <option value="{{ $item }}">
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                            @error('forUser')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row px-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>


    </div>






@stop
