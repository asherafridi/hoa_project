@extends('member.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Work Order /</span> List</h4>
        @include('member.partials.search-bar')
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}<h5>
                        <a href="{{ route('work-order.create') }}" class="btn btn-primary">Create a Work Order Request</a>
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
                            <th>Invoice</th>
                            <th>Status</th>
                            <th>Assigned To</th>
                            <th>Action</th>
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
                                <td>
                                    @if ($item->invoice !== null)
                                        <a href="{{ $item->invoice }}" class="btn btn-primary btn-sm">Download</a>
                                    @endif
                                </td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->vendor() ? $item->vendor()->name : 'Work not Assigned Yet' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('work-order.show', $item->id) }}"><i
                                                    class="bx bx-menu me-1"></i> View</a>
                                            {{-- <a class="dropdown-item" href="{{route('admin.work-order.edit',$item->id)}}"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                      >
                      <form method="POST" action="{{route('admin.work-order.destroy',$item->id)}}">
                        @csrf
                        @method('DELETE')
                      <button class="dropdown-item" type="submit"
                        ><i class="bx bx-trash me-1"></i> Delete</button
                      >
                      </form> --}}
                                        </div>
                                    </div>
                                </td>
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
