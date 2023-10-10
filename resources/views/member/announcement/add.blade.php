@extends('member.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Announcement /</span> Create</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}<h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('announcement.store') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" required name="title" placeholder="Arrangement"
                                autofocus />
                            @error('title')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Date</label>
                            <input type="datetime-local" class="form-control" required name="date" placeholder="Arrangement"
                                autofocus />
                            @error('date')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea type="text" name="description" class="form-control" placeholder="Description..." rows="3"></textarea>
                            @error('description')
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
