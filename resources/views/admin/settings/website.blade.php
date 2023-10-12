@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Website /</span> Settings</h4>
        {{-- Website Name  --}}
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.settings.name.update') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Website Name</label>
                            <input type="text" class="form-control" value="{{$website_name}}" required name="name" placeholder="Website Name"
                                autofocus />
                            @error('name')
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

        {{-- Image  --}}
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.settings.logo.update') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Logo</label>
                            <input type="file" class="form-control" required name="logo" placeholder="Website Name"
                                autofocus />
                            @error('logo')
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

        {{-- Icon  --}}
        <div class="card">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.settings.icon.update') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Icon</label>
                            <input type="file" class="form-control" required name="icon" placeholder="Icon"
                                autofocus />
                            @error('icon')
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