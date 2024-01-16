@extends('member.layouts.main')

@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Committee /</span> View</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}</h5>
            </div>

            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <strong>Committee Name:</strong>
                        <p>{{ $committee->name }}</p>
                        @error('name')
                            <div class="form-text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <strong>Committee Description:</strong>
                        <p>{{ $committee->description }}</p>
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

@stop
