@extends('member.layouts.app')
@section('title','Forgot Password')

@section('content')


<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register Card -->
            <div class="card">
                <div class="card-body">

                    <h4 class="mb-2 mt-2">Forgot Your Password</h4>
                    <p class="mb-4">Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                
                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter your email" autofocus />
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('Email Password Reset Link') }}</button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- Register Card -->
        </div>
    </div>
</div>

    <!-- Session Status -->

@endsection