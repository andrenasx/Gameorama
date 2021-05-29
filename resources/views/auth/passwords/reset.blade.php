@extends('layouts.app')
@section('page-title', 'Reset password | ')
@section('content')
    <section class="login-page d-flex justify-content-center">
        <div class="background-color"></div>
        <div class="background-image"></div>
        <main class="form-signin">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <img class="img-fluid" src={{ asset('storage/assets/logo.png') }} alt=""
                     onclick="window.location.href='{{ route('home') }}'" style="cursor:pointer;">
                <h2 class="h2 mb-5 fw-normal">The Panorama of Gaming</h2>
                <h3 class="h3 mb-2 fw-bold">Reset password</h3>
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-floating">
                    <input type="hidden" name="email" value="{{ $email ?? old('email') }}" placeholder=" " required>
                    <input type="email" id="inputEmail" class="form-control mb-3" value="{{ $email ?? old('email') }}"
                           placeholder=" " disabled required>
                    <label for="inputEmail">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" id="inputPassword" name="password"
                           class="form-control mb-3 @error('password') is-invalid @enderror"
                           placeholder=" "
                           pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&-])[A-Za-z\d@#$!%*?&-]{8,}$"
                           title="Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character"
                           required>
                    <label for="inputPassword">Password</label>
                </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-floating mb-3">
                    <input type="password" id="inputConfirmPassword" name="password_confirmation"
                           class="form-control mb-1 @error('password_confirmation') is-invalid @enderror"
                           placeholder=" "
                           pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&-])[A-Za-z\d@#$!%*?&-]{8,}$"
                           title="Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character"
                           required>
                    <label for="inputConfirmPassword">Confirm Password</label>
                </div>
                @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="col-12 mt-5 mb-3 d-flex justify-content-center">
                    <button class="col-5 btn btn-lg btn-primary" id="loginButton" type="submit">Reset</button>
                </div>
                <p class="mt-4 mb-1 text-center text-muted">&copy; Copyright 2021 Gameorama. All rights reserved.</p>
            </form>
        </main>
    </section>
@endsection
