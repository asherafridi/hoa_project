@extends('admin.layouts.main')
@section('title',$title)

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Payment /</span> History</h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5>{{$title}}<h5>
            {{-- <a href="{{route('admin.transaction.create')}}" class="btn btn-primary">Add {{$title}}</a> --}}
          </div>
        
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>User</th>
                <th>Transaction</th>
                <th>Payment Date</th>
                <th>Amount</th>
                <th>Reference</th>
                <th>Screenshot</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @forelse ($payments as $item)
              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$item->user()->fullname()}}</td>
                <td>{{$item->transaction()->description}}</td>
                <td>{{$item->paymentDate}}</td>
                <td>{{settings('currency_symbol')}} {{ number_format($item->amount,2)}}</td>
                <td>{{$item->reference}}</td>
                <td><a href="{{$item->screenshot}}">Download</a></td>
                <td>{{$item->status}}</td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{route('admin.payments.show',$item->id)}}"
                        ><i class="bx bx-menu me-1"></i> View</a
                      > 
                      <a class="dropdown-item" href="{{route('admin.payments.edit',$item->id)}}"
                        ><i class="bx bx-edit-alt me-1"></i> Update Status</a
                      >
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

            {{$payments->links()}}
          </div>
        </div>
      </div>


  </div>






@stop