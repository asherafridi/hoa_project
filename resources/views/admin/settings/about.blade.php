@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Header /</span> Settings</h4>
        {{-- Website Name  --}}
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.settings.about.update') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">About Subtitle</label>
                            <input type="text" class="form-control" value="{{ settings('aboutus_subtitle') }}"
                                name="aboutus_subtitle" autofocus />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">About Title</label>
                            <input type="text" class="form-control" value="{{ settings('aboutus_title') }}"
                                name="aboutus_title" autofocus />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">About Desc</label>
                            <textarea class="form-control" name="aboutus_desc">{{ settings('aboutus_desc') }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">About Background</label>
                            <input type="file" class="form-control" name="about_background" autofocus />
                        </div>
                    </div>

                    {{-- <hr> --}}
                    {{-- <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Counter 1 Text</label>
                            <input type="text" class="form-control" value="{{settings('aboutus_sec1_text')}}" name="aboutus_sec1_text"
                                autofocus />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Counter 1 Number</label>
                            <input type="text" class="form-control" value="{{settings('aboutus_sec1_number')}}" name="aboutus_sec1_number"
                                autofocus />
                        </div>
                    </div> --}}

                    {{-- <hr>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Counter 2 Text</label>
                            <input type="text" class="form-control" value="{{settings('aboutus_sec2_text')}}" name="aboutus_sec2_text"
                                autofocus />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Counter 2 Number</label>
                            <input type="text" class="form-control" value="{{settings('aboutus_sec2_number')}}" name="aboutus_sec2_number"
                                autofocus />
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Counter 3 Text</label>
                            <input type="text" class="form-control" value="{{settings('aboutus_sec3_text')}}" name="aboutus_sec3_text"
                                autofocus />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Counter 3 Number</label>
                            <input type="text" class="form-control" value="{{settings('aboutus_sec3_number')}}" name="aboutus_sec3_number"
                                autofocus />
                        </div>
                    </div>

                    <hr>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Counter 4 Text</label>
                            <input type="text" class="form-control" value="{{settings('aboutus_sec4_text')}}" name="aboutus_sec4_text"
                                autofocus />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Counter 4 Number</label>
                            <input type="text" class="form-control" value="{{settings('aboutus_sec4_number')}}" name="aboutus_sec4_number"
                                autofocus />
                        </div>
                    </div> --}}

                    <div class="row px-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>



        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.settings.about.update') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Map Location</label>
                            <input type="text" class="form-control" value="{{ settings('map_location') }}"
                                name="map_location" autofocus />
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
