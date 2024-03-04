@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="header d-flex justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Polls/</span> List</h4>
            <div class="btn-left"><a href="{{ route('admin.polls.create') }}" class="btn btn-primary"> Add Poll</a>
            </div>
        </div>
        <div class="row">
            @foreach ($polls as $item)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-header p-3 d-flex justify-content-between">
                            <p>{{ $item->question }}</p>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    
                                        <a href="/admin/poll-report/{{$item->id}}" class="dropdown-item" type="submit"><i class="bx bxs-report me-1"></i>
                                            Print Report</a>
                                    @if($item->result == 0)
                                        <a href="/admin/change-announcement/{{$item->id}}" class="dropdown-item" type="submit"><i class="bx bx-show me-1"></i>
                                            Show Results</a>
                                    
                                    @else
                                        <a href="/admin/change-announcement/{{$item->id}}" class="dropdown-item" type="submit"><i class="bx bx-hide me-1"></i>
                                            Hide Results</a>
                                    
                                    @endif

                                    <form method="POST" action="{{ route('admin.polls.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" type="submit"><i class="bx bx-trash me-1"></i>
                                            Delete</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="card-body p-3">
                            @foreach ($item->options() as $option)
                                @php $percentage = $item->count() > 0 ? intval(($option->voteCount() * 100) / $item->count()) : 0; @endphp
                                <div class="progress-row mb-2">
                                    <label for="" class="text-sm mb-2"
                                        style="font-size: 12px;">{{ $option->option_text }}</label>
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar" role="progressbar" aria-label="Example with label"
                                            style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}"
                                            aria-valuemin="0" aria-valuemax="100">
                                            {{ $percentage }}%
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="card-footer p-3 text-right">
                            {{ $item->count() }} Votes
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        {{-- <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}<h5>
                        <a href="{{ route('admin.phase.create') }}" class="btn btn-primary">Add
                            {{ $title }}</a>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Phase</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($propertyType as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">Data Not Found</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>
        </div> --}}

        <div class="d-flex justify-content-between mt-4 mb-2 px-3 w-100 ">

            {{ $polls->links() }}
        </div>

    </div>






@stop
