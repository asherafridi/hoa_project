@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Website /</span> Settings</h4>
        {{-- Website Name  --}}
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.settings.name.update') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Website Name</label>
                            <input type="text" class="form-control" value="{{ $website_name }}" required name="name"
                                placeholder="Website Name" autofocus />
                            @error('name')
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

        {{-- Image  --}}
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.settings.logo.update') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Logo</label>
                            <input type="file" class="form-control" required name="logo" placeholder="Website Name"
                                autofocus />
                            @error('logo')
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

        {{-- Icon  --}}
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.settings.icon.update') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Icon</label>
                            <input type="file" class="form-control" required name="icon" placeholder="Icon"
                                autofocus />
                            @error('icon')
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


        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.settings.about.update') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" value="{{ settings('email') }}" name="email"
                                autofocus />
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" value="{{ settings('phone_number') }}"
                                name="phone_number" autofocus />
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" value="{{ settings('address') }}" name="address"
                                autofocus />
                        </div>
                    </div>


                    <div class="row px-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.settings.about.update') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Payment Method Text</label>
                            <input type="text" class="form-control" value="{{ settings('payment_method_manual') }}"
                                name="payment_method_manual" autofocus />
                        </div>
                    </div>


                    <div class="row px-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.settings.about.update') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Currency</label>
                            <input type="text" class="form-control" value="{{ settings('currency') }}"
                                name="currency" autofocus />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Currency Symbol</label>
                            <input type="text" class="form-control" value="{{ settings('currency_symbol') }}"
                                name="currency_symbol" autofocus />
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
