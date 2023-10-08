@extends('admin.layouts.main')
@section('title', 'View Vendor')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Vendor /</span> View</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Vendor Details</h5>
                <a href="{{ route('admin.vendor.edit', $vendor->id) }}" class="btn btn-primary">Edit</a>
            </div>

            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" value="{{ $vendor->name }}" readonly />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Vendor Type</label>
                        <input type="text" class="form-control" value="{{ $vendor->vendorType }}" readonly />
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <label class="form-label">Contact Email</label>
                        <input type="text" class="form-control" value="{{ $vendor->contactEmail }}" readonly />
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Contact Person</label>
                        <input class="form-control" type="text" value="{{ $vendor->contactPerson }}" readonly />
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Contact Number</label>
                        <input class="form-control" type="text" value="{{ $vendor->contactNumber }}" readonly />
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <label class="form-label">Service Description</label>
                        <textarea class="form-control" rows="3" readonly>{{ $vendor->serviceDescription }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
