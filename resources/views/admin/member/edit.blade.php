@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Member /</span> Edit</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}</h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.member.update', $member->id) }}">
                    @csrf
                    @method('PUT') {{-- Use PUT method for updating --}}
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" required name="firstName"
                                value="{{ $member->firstName }}" placeholder="John" autofocus />
                            @error('firstName')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" required name="lastName"
                                value="{{ $member->lastName }}" placeholder="Grey" autofocus />
                            @error('lastName')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" required name="email" value="{{ $member->email }}"
                                placeholder="john@gmail.com" autofocus />
                            @error('email')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Lot Number</label>
                            <input type="text" class="form-control" name="lot_number" value="{{ $member->lot_number }}"
                                placeholder="" autofocus />
                            @error('lot_number')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" required name="phone" value="{{ $member->phone }}"
                                placeholder="000-000-0000" autofocus />
                            @error('phone')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Your Password"
                                autofocus />
                            @error('password')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Member Type</label>
                            <select class="form-control" required name="userType">
                                <option value="">Select Type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @if ($type->id == $member->userType) selected @endif>
                                        {{ $type->name }}</option>
                                @endforeach
                            </select>
                            @error('userType')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Property</label>
                            <select class="form-control" required name="propertyId">
                                <option value="">Select Property</option>
                                @foreach ($properties as $property)
                                    <option value="{{ $property->id }}" @if ($property->id == $member->propertyId) selected @endif>
                                        {{ $property->address }} -
                                        {{ $property->type() ? $property->type()->name : 'Property' }}</option>
                                @endforeach
                            </select>
                            @error('propertyId')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Status</label>
                            <select class="form-control" required name="status">
                                <option value="">Select Status</option>
                                <option value="1" @if ($member->status == 1) selected @endif>Approved</option>
                                <option value="0" @if ($member->status == 0) selected @endif>Non Approved
                                </option>

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
