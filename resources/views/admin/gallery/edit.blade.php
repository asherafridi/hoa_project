@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Gallery /</span> Edit</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}<h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.gallery.update', $gallery->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" required name="name" value="{{ $gallery->name }}"
                                placeholder="Name" autofocus />
                            @error('name')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="file" placeholder="Name" autofocus />
                            @error('file')
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
                                    <option value="{{ $item }}" {{ $gallery->forUser == $item ? 'selected' : '' }}>
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
