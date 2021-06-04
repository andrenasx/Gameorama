@extends('layouts.app')
@section('page-title', 'Sign up | ')
@section('content')
    <section class="d-flex justify-content-center">
        <section class="signup-page d-flex justify-content-center">
            <div class="background-color"></div>
            <div class="background-image"></div>
            <main class="form-signup">
                <form method="post" action="{{ route('sub.signup') }}">
                    @csrf
                    <a href="{{ route('home') }}">
                        <img class="img-fluid" src="{{ asset('storage/assets/logo.png') }}" alt="Gameorama logo">
                    </a>
                    <h1 class="h2 mb-5 fw-normal mx-auto">The Panorama of Gaming</h1>
                    <h2 class="h3 mb-4 fw-bold">Sign Up</h2>
                    <div class="form-floating mb-3">
                        <input type="text" id="inputName" name="full_name" value="{{ old('full_name') }}"
                               class="form-control mb-3 @error('full_name') is-invalid @enderror" placeholder=" "
                               required>
                        <label for="inputName">Name</label>
                    </div>
                    @error('full_name')
                    <div class="alert alert-danger p-2">{{ $message }}</div>
                    @enderror
                    <div class="form-floating mb-3">
                        <input type="email" id="inputEmail" name="email" value="{{ old('email') }}"
                               class="form-control mb-3 @error('email') is-invalid @enderror" placeholder=" " required>
                        <label for="inputEmail">Email address</label>
                    </div>
                    @error('email')
                    <div class="alert alert-danger p-2">{{ $message }}</div>
                    @enderror
                    <div class="form-floating mb-3">
                        <input type="text" id="inputUsername" name="username"
                               class="form-control mb-3 @error('username') is-invalid @enderror" placeholder=" "
                               pattern="^[\w.-]*$" title="Only alphanumeric and - . _ characters" required>
                        <label for="inputEmail">Username</label>
                    </div>
                    @error('username')
                    <div class="alert alert-danger p-2">{{ $message }}</div>
                    @enderror
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
                    <div class="alert alert-danger p-2">{{ $message }}</div>
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
                    <div class="alert alert-danger p-2">{{ $message }}</div>
                    @enderror
                    <div class="col-12 mt-3 mb-3 d-flex justify-content-center">
                        <button class="col-5 btn btn-lg btn-primary" id="signUpButton" type="submit">Sign Up</button>
                    </div>
                    <div class="row g-0 text-center">
                        <a class="blue-hover" id="signUpLogin" href="{{ route('login') }}">Already have an account?
                            Login</a>
                    </div>
                    <p class="mt-4 mb-1 text-center text-muted">&copy; Copyright 2021 Gameorama. All rights
                        reserved.</p>
                </form>
            </main>
        </section>
    </section>
@endsection
