@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Work Order /</span> Create</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}<h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.work-order.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">

                        <div class="col-md-4">
                            <label class="form-label">Property Id</label>
                            <select class="form-control" name="propertyId">
                                <option value="">Select Property</option>
                                @foreach ($property as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('propertyId')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Requested By</label>
                            <select class="form-control" name="requestedBy">
                                <option value="">Select Member</option>
                                @foreach ($members as $item)
                                    <option value="{{ $item->id }}">{{ $item->firstName }} {{ $item->lastName }}
                                    </option>
                                @endforeach
                            </select>
                            @error('requestedBy')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Requested Date</label>
                            <input type="date" class="form-control" name="requested_date" />
                            @error('requested_date')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">

                        <div class="col-md-4">
                            <label class="form-label">Priority</label>
                            <select class="form-control" name="priority">
                                <option value="">Select Priority Level</option>
                                @foreach (priority_level() as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
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
                                @foreach (workOrder_Status() as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
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
                                @foreach ($vendor as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Completion Date</label>
                            <input type="date" class="form-control" name="completion_date" />
                            @error('completion_date')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Invoice</label>
                            <input type="file" class="form-control" name="invoice1" />
                            @error('invoice1')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Invoice Amount</label>
                            <input type="number" class="form-control" name="invoice_amount" />
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
                            <textarea type="text" name="description" class="form-control" placeholder="Address..." rows="4"></textarea>
                            @error('description')
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
