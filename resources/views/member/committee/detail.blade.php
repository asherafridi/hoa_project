@extends('member.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Committee /</span> View</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}<h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('committee.update', $committee->id) }}">

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Committee Name</label>
                            <input type="text" readonly class="form-control" required name="name"
                                value="{{ $committee->name }}" placeholder="Committee" autofocus />
                            @error('name')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Committee Description</label>
                            <textarea type="text" readonly name="description" class="form-control" value="" placeholder="Description..."
                                rows="3">{{ $committee->description }}</textarea>
                            @error('description')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
@stop
