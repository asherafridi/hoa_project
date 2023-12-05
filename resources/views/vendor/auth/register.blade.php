@extends('vendor.layouts.app')
@section('title', 'Vendor Registration')

@section('content')


    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="" />
                                </span>
                                <span class=" demo text-body fw-bolder">{{ settings('website_name') }} - Vendor
                                    Registration</span>
                            </a>
                        </div>
                        <!-- /Logo -->

                        <form id="formAuthentication" class="mb-3" action="{{ route('vendor.register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="firstName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="firstName" name="name"
                                    placeholder="Full Name" autofocus value="{{ old('name') }}" />
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="lastName" name="contactNumber"
                                    placeholder="Phone Number" autofocus value="{{ old('contactNumber') }}" />
                                @error('lastName')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="contactEmail"
                                    placeholder="Enter your Email" autofocus value="{{ old('email') }}" />
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Type</label>
                                <select name="vendorType" class="form-control" required>
                                    @foreach ($vendorType as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('vendorType')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />

                                </div>
                            </div>

                            @error('password')
                                {{ $message }}
                            @enderror

                            <button class="btn btn-primary d-grid w-100">Sign up</button>
                        </form>

                        {{-- <p class="text-center">
                            <span>Already Have an Account?</span>
                            <a href="{{ route('vendor.login') }}">
                                <span>Sign In</span>
                            </a>
                        </p> --}}
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>

@stop
