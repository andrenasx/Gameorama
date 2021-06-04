@extends('layouts.app')
@section('page-title', 'Forgot password | ')
@section('content')
    <section class="login-page d-flex justify-content-center">
        <div class="background-color"></div>
        <div class="background-image"></div>
        <main class="form-signin">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <a href="{{ route('home') }}">
                    <img class="img-fluid" src="{{ asset('storage/assets/logo.png') }}" alt="Gameorama logo">
                </a>
                <h2 class="h2 mb-5 fw-normal">The Panorama of Gaming</h2>
                <h3 class="h3 mb-2 fw-bold">Recover password</h3>
                <h5 class="h5 mb-4 fw-normal text-light">Enter your email so we can send you a recovery link!</h5>
                <div class="form-floating">
                    <input type="email" id="inputEmail" name="email" class="form-control mb-3 @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder=" " required>
                    <label for="inputEmail">Email address</label>
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <div class="col-12 mt-5 mb-3 d-flex justify-content-center">
                    <button class="col-5 btn btn-lg btn-primary" id="loginButton" type="submit">Recover</button>
                </div>
                <p class="mt-4 mb-1 text-center text-muted">&copy; Copyright 2021 Gameorama. All rights reserved.</p>
            </form>
        </main>
    </section>
@endsection
