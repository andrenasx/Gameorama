@extends('layouts.app')
@section('page-title', '404 | ')
@section('content')
<div class="col d-flex align-items-center">
    <section class="p-3 p-lg-5 my-4 col-lg-7 container bg-white rounded">
        <h5 class="text-center">"Mission failed! We'll get them next time"</h5>
        <h6 class="text-center text-muted">- Call of Duty Modern Warfare 3</h6>
        <h1 class="text-center h1 fw-bold color-orange">Page not found</h1>
        <div class="row g-0 text-center">
            <img class="error-picture" src="{{asset('storage/assets/arcade-machine.svg')}}" alt="Sad arcade machine">
        </div>
        <h5 class="text-center img-fluid img-responsive mt-5">Looks like it's game over for the page you were looking for!</h5>
        <h5 class="text-center">You may start a new game at our <a href="{{ route('home') }}" class="color-orange">Main Page</a></h5>
    </section>
</div>
@endsection
