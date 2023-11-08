@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Member /</span> Create</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}<h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.member.store') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" required name="firstName" placeholder="John"
                                autofocus />
                            @error('firstName')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" required name="lastName" placeholder="Grey"
                                autofocus />
                            @error('lastName')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" required name="email" placeholder="john@gmail.com"
                                autofocus />
                            @error('email')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" required name="phone" placeholder="000-000-0000"
                                autofocus />
                            @error('phoneNumber')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" required name="password" placeholder="Enter Your Password"
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
                                @foreach ($type as $property)
                                    <option value="{{ $property->id }}">{{ $property->name }}</option>
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
                                    <option value="{{ $property->id }}">{{ $property->address }} - {{ $property->type() ? $property->type()->name : "No Property Type" }}</option>
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
                    </div>
                    <div class="row px-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@stop
