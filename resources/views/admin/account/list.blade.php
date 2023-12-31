@extends('admin.layouts.main')
@section('title',$title)

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account /</span> List</h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5>{{$title}}<h5>
            <a href="{{route('admin.account.create')}}" class="btn btn-primary">Add {{$title}}</a>
          </div>
        
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>User</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @forelse ($account as $item)
              <tr>
                <td>{{$item->user() ? $item->user()->name : 'No User'}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->date}}</td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{route('admin.account.show',$item->id)}}"
                        ><i class="bx bx-menu me-1"></i> View</a
                      >
                      <a class="dropdown-item" href="{{route('admin.account.edit',$item->id)}}"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                      >
                      <form method="POST" action="{{route('admin.account.destroy',$item->id)}}">
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

            {{$account->links()}}
          </div>
        </div>
      </div>


  </div>






@stop