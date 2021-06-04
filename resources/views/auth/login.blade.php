@extends('layouts.app')
@section('page-title', 'Log in | ')
@section('content')
    <section class="login-page d-flex justify-content-center">
        <div class="background-color"></div>
        <div class="background-image"></div>
        <main class="form-signin">
            <form method="POST" action="{{ route('sub.login') }}">
                @csrf
                <a href="{{ route('home') }}">
                    <img class="img-fluid" src="{{ asset('storage/assets/logo.png') }}" alt="Gameorama logo">
                </a>
                <h1 class="h2 mb-5 fw-normal">The Panorama of Gaming</h1>
                <h2 class="h3 mb-4 fw-bold">Login</h2>
                <div class="form-floating mb-5">
                    <input type="text" id="inputLogin" name="login" class="form-control mb-3"
                           value="{{ old('login') }}" placeholder=" " required>
                    <label for="inputLogin">Username or Email address</label>
                </div>
                <div class="form-floating mb-0">
                    <input type="password" id="inputPassword" name="password" class="form-control mb-3" value=""
                           placeholder=" " required>
                    <label for="inputPassword">Password</label>
                </div>
                @error('login')
                <div class="alert alert-danger p-2">{{ $message }}</div>
                @enderror
                <div class="text-end mb-2">
                    <a class="blue-hover" id="forgotPassword" href="{{ route('password.request') }}">Forgot your
                        password?</a>
                </div>
                <div class="col-12 g-0 mt-4 mb-3 d-flex justify-content-center">
                    <button class="col-5 btn btn-lg btn-primary" id="loginButton" type="submit">Login</button>
                </div>
                <div class="row g-0 text-center">
                    <a class="blue-hover" id="signUpLogin" href="{{ route('signup') }}">Don't have an account? Sign Up</a>
                </div>
                <p class="mt-4 mb-1 text-center text-muted">&copy; Copyright 2021 Gameorama. All rights reserved.</p>
            </form>
        </main>
    </section>
@endsection
