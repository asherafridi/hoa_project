@extends('admin.layouts.main')
@section('title', 'Edit Property')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Properties /</span> Edit</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Edit Property</h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.properties.update', $property->id) }}">
                    @csrf
                    @method('PUT') <!-- Use the PUT method for update -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" required name="name" value="{{ $property->name }}"
                                autofocus />
                            @error('name')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Property Type</label>
                            <select class="form-control" required name="propertyType">
                                <option value="">Select Type</option>
                                @foreach ($types as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $property->propertyType == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('propertyType')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Phase</label>
                            <select class="form-control" required name="block_id">
                                <option value="">Select Block</option>
                                @foreach ($block as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $property->block_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }} - {{ $item->type()->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('block_id')
                                ;
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" required name="address"
                                value="{{ $property->address }}" autofocus />
                            @error('address')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Unit No.</label>
                            <input type="text" class="form-control" required name="unit_no"
                                value="{{ $property->unit_no }}" autofocus />
                            @error('unit_no')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-control" required name="status">
                                <option value="">Select Type</option>
                                @foreach (propertyStatus() as $item)
                                    <option value="{{ $item }}"
                                        {{ $property->status == $item ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
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
