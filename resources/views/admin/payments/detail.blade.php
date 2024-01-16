@extends('admin.layouts.main')

@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Billing /</span> View</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}</h5>
                <a href="{{ route('admin.payments.edit', $payment->id) }}" class="btn btn-primary">Update Status</a>
            </div>

            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <strong>User:</strong>
                        <p>{{ $payment->userId != null ? $payment->user()->fullname() : $payment->vendor()->name . ' - Vendor' }}
                        </p>
                        @error('userId')
                            <div class="form-text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <strong>Amount:</strong>
                        <p>{{ $payment->amount }} {{ settings('currency_symbol') }}</p>
                        @error('amount')
                            <div class="form-text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <strong>Payment Date:</strong>
                        <p>{{ $payment->paymentDate }}</p>
                        @error('date')
                            <div class="form-text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <!-- Add other fields here in a similar manner -->
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <strong>For transaction:</strong>
                        <p>{{ $payment->transaction()->description }}</p>
                        @error('description')
                            <div class="form-text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <strong>Screenshot:</strong>
                        <img class="img-fluid" src="{{ $payment->screenshot }}" alt="Screenshot">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
