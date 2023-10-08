@extends('admin.layouts.main')
@section('title', 'Edit Vendor')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Vendor /</span> Edit</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Edit Vendor</h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.vendor.update', $vendor->id) }}">
                    @csrf
                    @method('PUT') <!-- Use the PUT method for updating -->

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" required name="name" value="{{ old('name', $vendor->name) }}" autofocus />
                            @error('name')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Vendor Type</label>
                            <select class="form-control" required name="vendorType">
                                <option value="">Select Type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" {{ old('vendorType', $vendor->vendorType) == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('vendorType')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Contact Email</label>
                            <input type="text" class="form-control" required name="contactEmail" value="{{ old('contactEmail', $vendor->contactEmail) }}" autofocus />
                            @error('contactEmail')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Contact Person</label>
                            <input class="form-control" type="text" required name="contactPerson" value="{{ old('contactPerson', $vendor->contactPerson) }}" />
                            @error('contactPerson')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Contact Number</label>
                            <input class="form-control" type="text" required name="contactNumber" value="{{ old('contactNumber', $vendor->contactNumber) }}" />
                            @error('contactNumber')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Service Description</label>
                            <textarea type="text" name="serviceDescription" class="form-control" placeholder="Description..." rows="3">{{ old('serviceDescription', $vendor->serviceDescription) }}</textarea>
                            @error('serviceDescription')
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
