@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Billing /</span> View</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}<h5>
                        <a href="{{ route('admin.payments.edit', $payment->id) }}" class="btn btn-primary">Update Status</a>
            </div>

            <div class="card-body">
                <form method="POST">

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">User</label>
                            <input type="text" class="form-control"
                                value="{{ $payment->userId != null ? $payment->user()->fullname() : $payment->vendor()->name . ' - Vendor' }}"
                                name="amount" required placeholder="999" />

                            @error('userId')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Amount</label>
                            <input type="text" class="form-control"
                                value="{{ $payment->amount }} {{ settings('currency_symbol') }}" name="amount" required
                                placeholder="999" />
                            @error('amount')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Payment Date</label>
                            <input class="form-control" type="datetime-local" required name="date"
                                value="{{ $payment->paymentDate }}" />
                            @error('date')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Reference</label>
                            <input type="text" class="form-control" value="{{ $payment->reference }}" name="amount"
                                required placeholder="999" />

                            @error('userId')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control" value="{{ $payment->status }}" name="amount"
                                required placeholder="999" />
                            @error('amount')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">For transaction</label>
                            <textarea type="text" name="description" class="form-control" placeholder="Description..." rows="3">{{ $payment->transaction()->description }}</textarea>
                            @error('description')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Screenshot</label>
                            <img class="form-control" src="{{ $payment->screenshot }}" />

                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
@stop
