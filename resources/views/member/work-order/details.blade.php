@extends('member.layouts.main')
@section('title', 'View Work Order')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Work Order /</span> View</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Work Order Details</h5>
            </div>

            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label class="form-label">Property Id</label>
                        <input type="text" class="form-control"
                            value="{{ $workOrder->property() ? $workOrder->property()->name : 'Property Not Assigned' }}"
                            readonly />
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Requested By</label>
                        <input type="text" class="form-control"
                            value="{{ $workOrder->requestedBy() ? $workOrder->requestedBy()->fullName() : 'Requested By Admin' }}"
                            readonly />
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Requested Date</label>
                        <input type="text" class="form-control" value="{{ $workOrder->requested_date }}" readonly />
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <label class="form-label">Priority</label>
                        <input type="text" class="form-control" value="{{ $workOrder->priority }}" readonly />
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Status</label>
                        <input type="text" class="form-control" value="{{ $workOrder->status }}" readonly />
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Assigned To</label>
                        <input type="text" class="form-control"
                            value="{{ $workOrder->vendor() ? $workOrder->vendor()->name : 'Work Not Assigned' }}"
                            readonly />
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <label class="form-label">Completion Date</label>
                        <input type="text" class="form-control" value="{{ $workOrder->completion_date }}" readonly />
                    </div>

                    @if ($workOrder->invoice)
                        <div class="col-md-4">
                            <label class="form-label">Invoice Amount</label>
                            <input type="text" class="form-control" value="{{ $workOrder->invoice_amount }}" readonly />
                        </div>
                    @endif
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="4" readonly>{{ $workOrder->description }}</textarea>
                    </div>
                </div>

                @if ($workOrder->invoice)
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Invoice</label>
                            <a href="/{{ $workOrder->invoice }}" class="btn btn-link btn-sm">Download Invoice</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@stop
