@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Properties /</span> Edit</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Edit {{ $title }}</h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.transaction.update', $transaction->id) }}">
                    @csrf
                    @method('PUT') <!-- Use the PUT method for updating -->

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">User</label>
                            <select class="form-control" required name="userId">
                                <option value="">Select User</option>
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}" {{ old('userId', $transaction->userId) == $item->id ? 'selected' : '' }}>
                                        {{ $item->fullname() }}
                                    </option>
                                @endforeach
                            </select>
                            @error('userId')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Transaction Type</label>
                            <select class="form-control" required name="transactionType">
                                <option value="">Select Transaction Type</option>
                                @foreach ($type as $item)
                                    <option value="{{ $item->id }}" {{ old('transactionType', $transaction->transactionType) == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('transactionType')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Date</label>
                            <input type="date" name="transactionDate" class="form-control" value="{{ old('transactionDate', $transaction->transactionDate) }}" required>
                            @error('transactionDate')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">{{ settings('currency_symbol', '$') }}</span>
                                <input type="number" name="amount" class="form-control" value="{{ old('amount', $transaction->amount) }}" required>
                            </div>
                            @error('amount')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Status</label>
                            <select class="form-control" required name="status">
                                <option value="">Select Status</option>
                                @foreach (transactionStatus() as $item)
                                    <option value="{{ $item }}" {{ old('status', $transaction->status) == $item ? 'selected' : '' }}>
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
                    
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea type="text" name="description" class="form-control" placeholder="Description" rows="4">{{ old('description', $transaction->description) }}</textarea>
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
