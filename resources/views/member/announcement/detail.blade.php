@extends('member.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Announcement /</span> View</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}<h5>
            </div>

            <div class="card-body">
                <form method="POST">
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" value="{{$announcement->title}}" class="form-control" required name="title" readonly placeholder="Arrangement"
                                autofocus />
                            @error('title')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Date</label>
                            <input type="datetime-local"  readonly  value="{{$announcement->date}}" class="form-control" required name="date" placeholder="Arrangement"
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
                            <textarea type="text"  readonly name="description" class="form-control" placeholder="Description..." rows="3"> {{$announcement->description}}</textarea>
                            @error('description')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
@stop
