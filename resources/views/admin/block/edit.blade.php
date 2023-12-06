@extends('admin.layouts.main')
@section('title', 'Edit Property')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Block /</span> Edit</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Edit Block</h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.block.update', $property->id) }}">
                    @csrf
                    @method('PUT') <!-- Use the PUT method for update -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" required name="name" value="{{ $property->name }}"
                                autofocus />
                            @error('name')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phase</label>
                            <select class="form-control" required name="phase_id">
                                <option value="">Select Type</option>
                                @foreach ($types as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $property->phase_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('phase_id')
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
