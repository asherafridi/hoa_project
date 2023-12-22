@extends('member.layouts.main')
@section('title', 'View Work Order')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Work Order /</span> Edit</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Update Work Order Status</h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('vendor.work-order.update', $workOrder->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="row mb-4">

                        <div class="col-md-12">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="status">
                                <option value="">Select Status</option>
                                @foreach (workOrder_Status() as $status)
                                    <option value="{{ $status }}"
                                        {{ $workOrder->status == $status ? 'selected' : '' }}>
                                        {{ $status }}
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
