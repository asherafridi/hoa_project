@extends('vendor.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Event /</span> List</h4>
        @include('member.partials.search-bar')
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}<h5>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Event Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Location</th>
                            <th>Committee</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($calendar as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->eventName }}</td>
                                <td>{{ $item->startDate }}</td>
                                <td>{{ $item->endDate }}</td>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->committee() ? $item->committee()->name : 'No Committee' }}</td>
                                {{-- <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                    </div>
                                </td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">Data Not Found</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

                <div class="d-flex justify-content-between mt-4 mb-2 px-3 w-100 ">

                    {{ $calendar->links() }}
                </div>
            </div>
        </div>


    </div>






@stop
