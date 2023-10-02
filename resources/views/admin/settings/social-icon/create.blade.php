@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Website /</span> Settings</h4>
        {{-- Website Name  --}}
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.settings.social.store') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" value="" required name="title"
                                placeholder="Title" autofocus />
                        </div>

                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Icon</label>
                            <input type="text" class="form-control" value="" required name="social_icon"
                                placeholder="Fontawsome i Tag" autofocus />
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Url</label>
                            <input type="text" class="form-control" value="" required name="Url"
                                placeholder="Link" autofocus />
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
