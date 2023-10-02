@extends('admin.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Billing /</span> Edit</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ $title }}<h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.billing.update',$billing->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">User</label>
                            <select class="form-control" name="userId" required>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}" @if ($user->id==$billing->userId)
                                    Selected
                                @endif>{{$user->name}}  </option>
                                @endforeach
                            </select>
                            @error('userId')
                                <div class="form-text text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Amount</label>
                            <input type="text" class="form-control" value="{{$billing->amount}}" name="amount" required placeholder="999" />
                            @error('amount')
                                <div class="form-text text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Date</label>
                            <input class="form-control" type="datetime-local" required name="date" value="{{$billing->date}}" />
                            @error('date')
                                <div class="form-text text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea type="text" name="description" class="form-control" placeholder="Description..." rows="3">{{$billing->description}}</textarea>
                            @error('description')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row px-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@stop
