@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Header /</span> Settings</h4>
        {{-- Website Name  --}}
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST"  enctype="multipart/form-data"  action="{{ route('admin.settings.header.update') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Header Subtitle</label>
                            <input type="text" class="form-control" value="{{settings('header_subtitle')}}" name="header_subtitle"
                                autofocus />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Header Title</label>
                            <input type="text" class="form-control" value="{{settings('header_title')}}" name="header_title"
                                autofocus />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Header Background</label>
                            <input type="file" class="form-control" name="header_background" placeholder="Icon"
                                autofocus />
                        </div>
                    </div>
                    <div class="row px-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST"  enctype="multipart/form-data"  action="{{ route('admin.settings.about.update') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Header Video</label>
                            <input type="text" class="form-control" value="{{settings('header_video')}}" name="header_video"
                                autofocus />
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
