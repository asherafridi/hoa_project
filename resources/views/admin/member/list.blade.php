@extends('admin.layouts.main')
@section('title',$title)

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Member /</span> List</h4>
    @include('admin.partials.search-bar')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5>{{$title}}<h5>
              <a href="{{route('admin.member.create')}}" class="btn btn-primary">Add {{$title}}</a>

          </div>
        
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Member Type</th>
                <th>Property</th>
                <th>Balance</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @forelse ($boardmember as $item)
              <tr>
                <td>{{$item->firstName}}</td>
                <td>{{$item->lastName}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->type() ? $item->type()->name : 'Type Not Found'}}</td>
                <td>{{$item->property() ? $item->property()->name : 'No Property'}}</td>
                <td>{{$item->balance}}</td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      {{-- <a class="dropdown-item" href="{{route('admin.member.show',$item->id)}}"
                        ><i class="bx bx-menu me-1"></i> View</a
                      > --}}
                      <a class="dropdown-item" href="{{route('admin.member.edit',$item->id)}}"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                      >
                      <form method="POST" action="{{route('admin.member.destroy',$item->id)}}">
                        @csrf
                        @method('DELETE')
                      <button class="dropdown-item" type="submit"
                        ><i class="bx bx-trash me-1"></i> Delete</button
                      >
                      </form>
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

            {{$boardmember->links()}}
          </div>
        </div>
      </div>


  </div>






@stop