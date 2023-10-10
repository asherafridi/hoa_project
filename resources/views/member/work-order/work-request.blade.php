@extends('member.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Work Order /</span> Create</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}<h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('work-order.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">

                        <div class="col-md-12">
                            <label class="form-label">Property Id</label>
                            <select class="form-control" name="propertyId"> 
                                <option value="">Select Property</option>
                                @foreach ($property as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('propertyId')
                                <div class="form-text text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea type="text" name="description" class="form-control" placeholder="What problem you're facing?" rows="4"></textarea>
                            @error('description')
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


    </div>

@stop