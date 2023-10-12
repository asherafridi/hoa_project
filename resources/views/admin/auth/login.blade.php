@extends('admin.layouts.app')
@section('title','Login')
@section('content')

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <img src="" />
                </span>
                <span class=" demo text-body fw-bolder">{{settings('website_name')}}</span>
              </a>
            </div>
            <!-- /Logo -->  

            <form id="formAuthentication" class="mb-3" action="{{route('admin.login')}}" method="POST">
              @csrf
                <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input
                  type="email"
                  class="form-control"
                  id="username"
                  name="email"
                  placeholder="Enter your username"
                  autofocus
                />
              </div>
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                  />
                 
                </div>
              </div>

              @error('email')
                  {{$message}}
              @enderror

              <button class="btn btn-primary d-grid w-100">Sign in</button>
            </form>

          </div>
        </div>
        <!-- Register Card -->
      </div>
    </div>
  </div>
  
@stop
