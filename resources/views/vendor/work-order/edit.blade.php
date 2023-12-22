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
                <form method="POST" action="{{ route('admin.work-order.update', $workOrder->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Priority</label>
                            <select class="form-control" name="priority">
                                <option value="">Select Priority Level</option>
                                @foreach (priority_level() as $priority)
                                    <option value="{{ $priority }}"
                                        {{ $workOrder->priority == $priority ? 'selected' : '' }}>
                                        {{ $priority }}
                                    </option>
                                @endforeach
                            </select>
                            @error('priority')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
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

                        <div class="col-md-4">
                            <label class="form-label">Assigned to</label>
                            <select class="form-control" name="assignedTo">
                                <option value="">Select Vendor</option>
                                @foreach ($vendor as $vendor)
                                    <option value="{{ $vendor->id }}"
                                        {{ $workOrder->assignedTo == $vendor->id ? 'selected' : '' }}>
                                        {{ $vendor->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('assignedTo')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Completion Date</label>
                            <input type="date" class="form-control" name="completion_date"
                                value="{{ $workOrder->completion_date }}" />
                            @error('completion_date')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Invoice</label>

                            <input type="file" class="form-control" name="invoice" />
                            @if ($workOrder->invoice)
                                <div>
                                    <a href="{{ $workOrder->invoice }}" class="btn btn-link btn-sm">Download Invoice</a>
                                </div>
                            @endif
                            @error('invoice')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Invoice Amount</label>
                            <input type="number" class="form-control" name="invoice_amount"
                                value="{{ $workOrder->invoice_amount }}" />
                            @error('invoice_amount')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea type="text" name="description" class="form-control" placeholder="Description..." rows="4">{{ $workOrder->description }}</textarea>
                            @error('description')
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
