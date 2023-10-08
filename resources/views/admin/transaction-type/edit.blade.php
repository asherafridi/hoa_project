@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Vendor Type /</span> Edit</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Edit {{ $title }}</h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.transaction-type.update', $transationType->id) }}">
                    @csrf
                    @method('PUT') {{-- Use PUT method for updating --}}
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" required name="name" placeholder="Owner"
                                value="{{ $transationType->name }}" autofocus />
                            @error('name')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row px-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
