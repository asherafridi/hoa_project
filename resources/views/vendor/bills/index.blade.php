@extends('vendor.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Bills /</span> List</h4>
        @include('member.partials.search-bar')
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}<h5>
                        {{-- <a href="{{route('admin.transaction.create')}}" class="btn btn-primary">Add {{$title}}</a> --}}
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Vendor</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($transactions as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->vendor()->name }}</td>
                                <td>{{ $item->transactionDate }}</td>
                                <td>{{ $item->type() ? $item->type()->name : '' }}</td>
                                <td>{{ settings('currency_symbol') }} {{ number_format($item->amount, 2) }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            @if ($item->status == 'Unpaid' && !$item->payment())
                                                <a class="dropdown-item" href="{{ route('vendor.pay-bill', $item->id) }}"><i
                                                        class="bx bx-dollar me-1"></i> Pay this Bill</a>
                                            @endif
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

                    {{ $transactions->links() }}
                </div>
            </div>
        </div>


    </div>
@stop
