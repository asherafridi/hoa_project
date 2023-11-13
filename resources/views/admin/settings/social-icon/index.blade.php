@extends('admin.layouts.main')
@section('title', $title)
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
      
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
        
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Social Icons</span></h4>
            <a href="{{route('admin.settings.social.create')}}" class="btn btn-primary">Add Social Icon</a>
          </div>
            <div class="card-body">
                <table class=" table table-responsive">

                    <thead>
                        <td>#</td>
                        <td>Title</td>
                        <td>Icon</td>
                        <td>Url</td>
                        <td>Action</td>
                    </thead>
                    <tbody>
                        @foreach ($social as $item)
                            @php
                                $desc = json_decode($item->description);
                            @endphp

                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$desc->title}}</td>
                                <td>{!!$desc->social_icon!!}</td>
                                <td>{{$desc->url}}</td>
                                <td>
                                    <div class="dropdown">
                                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.settings.social.edit',$item->id)}}"
                                          ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                        >
                                        <form method="POST" action="{{ route('admin.settings.social.destroy', $item->id) }}">
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@stop
