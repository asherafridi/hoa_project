@extends('frontend.basic.layout.frontend')
@section('content')
    <div class="container py-5">
        <div class="row">
            @foreach ($images->chunk(3) as $imageGroup)
        <div class="row">
            @foreach ($imageGroup as $imageUrl)
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img src="{{ $imageUrl->image }}" class="w-100 shadow-1-strong rounded mb-4" alt="Image" />
                </div>
            @endforeach
        </div>
    @endforeach

    <div class="d-flex justify-content-center">
        {{ $images->links() }} <!-- Display pagination links -->
    </div>

        </div>
        <!-- Gallery -->
    </div>
@endsection
