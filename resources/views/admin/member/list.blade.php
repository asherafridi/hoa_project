@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Member /</span> List</h4>

        @include('admin.member.filter')
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}<h5>
                        <a href="{{ route('admin.member.create') }}" class="btn btn-primary">Add {{ $title }}</a>

            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Lot Number</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Member Type</th>
                            <th>Phase</th>
                            <th>Block</th>
                            <th>Property</th>
                            <th>Balance</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="result">
                        {{-- @forelse ($boardmember as $item)
                            <tr>
                                <td>{{ $item->lot_number === null ? 'Not Assigned Yet' : $item->lot_number }}</td>
                                <td>{{ $item->firstName }}</td>
                                <td>{{ $item->lastName }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->type() ? $item->type()->name : 'Type Not Found' }}</td>
                                <td>{{ $item->property() ? $item->property()->name : 'No Property' }}</td>
                                <td>{{ $item->balance }}</td>
                                <td>{{ $item->status == 1 ? 'Approved' : 'Non Approved' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">

                                            <a class="dropdown-item" href="{{ route('admin.member.edit', $item->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form method="POST" action="{{ route('admin.member.destroy', $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit"><i
                                                        class="bx bx-trash me-1"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="12">Data Not Found</td>
                            </tr>
                        @endforelse --}}

                    </tbody>
                </table>

                <div class="d-flex justify-content-between mt-4 mb-2 px-3 w-100 ">

                    {{-- {{ $boardmember->links() }} --}}
                </div>
            </div>
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(() => {
            getMemberData('');
            $("#searchBtn").click(() => {
                let lot_number = $("#lotNumberInput").val();
                let search = $("#searchInput").val();
                let property = $("#propertyId").val();
                let status = $("#status").val();
                let phase = $("#phase").val();
                let block = $("#block").val();
                getMemberData(
                    `search=${search}&property=${property}&status=${status}&lot_number=${lot_number}&phase=${phase}&block=${block}`
                );
            });

        });

        function getMemberData(query) {

            $('#result').html(`<tr>
                    <td colspan="12" class="text-center">Loading</td>
                    </tr>`);
            $.ajax({
                url: '{{ env('APP_URL') }}/admin/get-member?' + query,
                method: 'GET',
                dataType: 'json',
                success: function(data) {

                    $('#result').html(``);
                    if (data.length == 0) {

                        $('#result').html(`<tr>
                    <td colspan="12" class="text-center">Loading</td>
                    </tr>`);
                    }
                    data.forEach(element => {
                        let id = element.id;
                        let env = "{{ env('APP_URL') }}";
                        $('#result').append(`<tr>
                        <td>${element.lot_number !=null ? element.lot_number : 'Number Not Alloted'}</td>
                        <td>${element.firstName}</td>
                        <td>${element.lastName}</td>
                        <td>${element.email}</td>
                        <td>${element.phone  !=null ?  element.phone : 'Number Not Setuped'}</td>
                        <td>${element.user_type_name !=null ? element.user_type_name : 'Type Not Found'}</td>
                        <td>${element.phase_name !== null ? element.phase_name : 'Phase Not Found' }</td>
                        <td>${element.block_name !=null ? element.block_name : 'Block Not Found'}</td>
                        <td>${element.propertyName !=null ?element.propertyName : 'Property Not Found' }</td>
                        <td>${element.balance}</td>
                        <td>${element.status==0 ? 'Unapproved' : 'Approved'}</td>
                        <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">

                                            <a class="dropdown-item" href="${env}/admin/member/${id}/edit"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form method="POST" action="${env}/admin/member/${id}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit"><i
                                                        class="bx bx-trash me-1"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                        </tr>`);
                        console.log(element);
                    });
                },
                error: function(xhr, status, error) {
                    $('#result').html(`<tr>
                    <td colspan="12" class="text-center">Error occurred while fetching data.</td>
                    </tr>`);
                }
            });
        }
    </script>






@stop
