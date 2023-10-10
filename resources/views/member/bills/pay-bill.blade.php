@extends('member.layouts.main')
@section('title', $title)

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>{{ $title }}<h5>
                    </div>

                    <div class="card-body">
                            @csrf
                            
                            <div class="row mb-4">
                                <div class="col-md-12 mb-4">
                                    <label class="form-label">Bill For</label>
                                    <input type="text" class="form-control bg-white" value="{{$bill->type()->name}}" required name="title"
                                        placeholder="Arrangement"  readonly />
                                    
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Description</label>
                                    <textarea type="text" name="description" class="form-control border-none" placeholder="Description..." rows="3">{{$bill->description}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label bg-white">Date</label>
                                    <input type="text" class="form-control bg-white" required name="date"
                                        placeholder="Arrangement" readonly value="{{$bill->transactionDate}}" />
                                    @error('date')
                                        <div class="form-text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label bg-white">Amount</label>
                                    <input type="text" class="form-control bg-white" required name="date"
                                        placeholder="Arrangement"  readonly value="{{$bill->amount}} {{settings('currency_symbol')}}" />
                                    @error('date')
                                        <div class="form-text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="accordion" id="accordionExample">
                    {{-- Manual Payment  --}}
                    <div class="card accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="false" aria-controls="accordionOne">
                          Manual Payment
                        </button>
                      </h2>
              
                      <div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                        <div class="accordion-body">
                            
                          <input class="text-sm form-control mb-3 mt-2" value="Send Money On Easypaisa : 0313-3430196" readonly>
                          <form action="{{route('manual-bill.pay')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="userId" value="{{auth()->user()->id}}">
                            <input type="hidden" name="transactionId" value="{{$bill->id}}">
                            <input type="hidden" name="paymentMethod" value="Manual Payment">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Transaction Screenshot</label>
                                    <input type="file" class="form-control" name="referencePic"/>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Reference / TID</label>
                                    <textarea class="form-control" name="reference"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary"/>
                                </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    {{-- End Manual Payment  --}}
                    {{-- <div class="card accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                          Payment 
                        </button>
                      </h2>
                      <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          Dessert ice cream donut oat cake jelly-o pie sugar plum cheesecake. Bear claw dragée oat cake dragée ice
                          cream halvah tootsie roll. Danish cake oat cake pie macaroon tart donut gummies. Jelly beans candy canes
                          carrot cake. Fruitcake chocolate chupa chups.
                        </div>
                      </div>
                    </div> --}}

                    {{-- <div class="card accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">
                          Accordion Item 3
                        </button>
                      </h2>
                      <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          Oat cake toffee chocolate bar jujubes. Marshmallow brownie lemon drops cheesecake. Bonbon gingerbread
                          marshmallow sweet jelly beans muffin. Sweet roll bear claw candy canes oat cake dragée caramels. Ice cream
                          wafer danish cookie caramels muffin.
                        </div>
                      </div>
                    </div> --}}
                  </div>
            </div>
        </div>


    </div>






@stop
