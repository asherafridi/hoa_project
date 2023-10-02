@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Frontend /</span> Settings</h4>

        <div class="card">
            {{-- <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}<h5>
            </div> --}}

            <div class="card-body">
                <form method="POST" action="{{ route('admin.settings.frontend.update') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Frontend</label>
                            <select class="form-control" name="description" required>
                                @foreach ($frontend as $front)
                                <option value="{{$front}}" @if ($front===$currentFrontend->description)
                                    Selected
                                @endif>{{$front}}  </option>
                                @endforeach
                            </select>
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
