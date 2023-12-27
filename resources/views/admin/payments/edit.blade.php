@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Payment /</span> Update</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}</h5>
            </div>

            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.payments.update', $payment->id) }}">
                    @csrf
                    @method('PUT') <!-- Use the PUT method for updating -->

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Status</label>
                            <select class="form-control" required name="status">
                                <option value="">Select Status</option>
                                @foreach (paymentStatus() as $item)
                                    <option value="{{ $item }}"
                                        {{ old('status', $payment->status) == $item ? 'selected' : '' }}>
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
                            <label class="form-label">Official Reciept</label>
                            <input type="file" class="form-control" required name="admin_reciept"
                                placeholder="Website Name" autofocus />
                            @error('logo')
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
