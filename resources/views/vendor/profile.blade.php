@extends('vendor.layouts.main')
@section('title', 'Profile')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->

                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" action="{{ route('vendor.profile.update') }}">
                            @csrf

                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label for="firstName" class="form-label">Name</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                        value="{{ auth()->guard('vendor')->user()->name }}" autofocus />
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" id="email" name="contactEmail"
                                        value="{{ auth()->guard('vendor')->user()->contactEmail }}"
                                        placeholder="john.doe@example.com" />
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Profile Picture</h5>
                    <!-- Account -->

                    <div class="card-body">
                        <form id="formAccountSettings" enctype="multipart/form-data" method="POST"
                            action="{{ route('vendor.profile.picture') }}">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">Profile Picture</label>
                                    <input class="form-control" type="file" accept=".jpg, .jpeg, .png" id="firstName"
                                        name="picture" />
                                </div>
                                {{ auth()->guard('vendor')->user() }}
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>

                <div class="card">
                    <h5 class="card-header">Change Account Password</h5>
                    <div class="card-body">

                        <form id="formAccountDeactivation" method="POST"
                            action="{{ route('vendor.profile.password_update') }}">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label for="firstName" class="form-label">OLd Password</label>
                                    <input class="form-control" type="password" id="firstName" name="old_password" />
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="firstName" class="form-label">New Password</label>
                                    <input class="form-control" type="password" id="firstName" name="password" />
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="firstName" class="form-label">Confirm Password</label>
                                    <input class="form-control" type="password" id="firstName"
                                        name="password_confirmation" />
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary deactivate-account">Change Password</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>






@stop
