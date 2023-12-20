@extends('vendor.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Work Order /</span> List</h4>
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
                            <th>Property</th>
                            <th>Requested By</th>
                            <th>Requested Date</th>
                            <th>Description</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Assigned To</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($workOrder as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->property() ? $item->property()->name : 'No Property Selected' }}</td>
                                <td>{{ $item->requestedBy() ? $item->requestedBy()->fullname() : 'Have to Select User' }}
                                </td>
                                <td>{{ $item->requested_date }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->priority != null ? $item->priority : 'Admin will Assign' }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->vendor() ? $item->vendor()->name : 'Work not Assigned Yet' }}</td>

                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">Data Not Found</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

                <div class="d-flex justify-content-between mt-4 mb-2 px-3 w-100 ">

                    {{ $workOrder->links() }}
                </div>
            </div>
        </div>


    </div>






@stop
