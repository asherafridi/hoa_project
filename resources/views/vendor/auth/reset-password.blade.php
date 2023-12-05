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
                    

                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf
                        
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter your email" autofocus />
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                        
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>

                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Confirm Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password_confirmation"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>

                        @error('password_confirmation')
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


{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf


        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
