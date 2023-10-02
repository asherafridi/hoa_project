@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Vendor /</span> Details</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}<h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.vendor.update',$vendor->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" required name="name" 
                                autofocus value="{{$vendor->name}}" />
                            @error('name')
                                <div class="form-text text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Contact Person</label>
                            <input class="form-control" type="text" required name="contactPerson" value="{{$vendor->contactPerson}}"  />
                            @error('contactPerson')
                                <div class="form-text text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Contact Number</label>
                            <input class="form-control" type="text" required name="contactNumber" value="{{$vendor->contactNumber}}" />
                            @error('contactNumber')
                                <div class="form-text text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Service Description</label>
                            <textarea type="text" name="serviceDescription" value="{{$vendor->serviceDescription}}" class="form-control" placeholder="Description..." rows="3">{{$vendor->serviceDescription}}</textarea>
                            @error('serviceDescription')
                                <div class="form-text text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
@stop
