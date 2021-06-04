@extends('layouts.app')
@section('page-title', 'About us | ')
@section('content')
    @include('partials.navbar')
    @push('scripts')
    <script defer src = {{ asset('js/footer.js') }}></script>
    @endpush
    <section class="p-3 p-lg-5 my-4 col-lg-7 bg-white container rounded">
        <h2 class="h2 fw-bold ">About Us</h2>
        <hr class="rounded">

        <section>
            <h3 class="mb-3 mt-4">About Gameorama</h3>
            <p>The goal of Gameorama is to provide a platform for the gaming community to post, rate, and comment on the
                latest news, while also being able to follow their favorite videogame topics.</p>
        </section>

        <hr class="admin_hr mt-4">

        <section>
            <h3 class="mb-3">Our team</h3>
            <section class="team-cards">
                <div class="row g-0 justify-content-around">
                    <div class="card col-12 col-md-5 p-2 about-card">
                        <img src="{{asset('storage/assets/andre.jpg')}}" class="card-img-top rounded" alt="André Nascimento">
                        <div class="card-body">
                            <h4 class="card-title">André Nascimento</h4>
                            <p class="card-text">Student at MIEIC. Proud Corgi lover.</p>
                        </div>
                    </div>

                    <div class="card col-12 col-md-5 mt-3 mt-md-0 p-2 about-card">
                        <img src="{{asset('storage/assets/caio.jpg')}}" class="card-img-top rounded" alt="Caio Nogueira">
                        <div class="card-body">
                            <h4 class="card-title">Caio Nogueira</h4>
                            <p class="card-text">Student at MIEIC. Stays calm under pressure.</p>
                        </div>
                    </div>
                </div>
                <div class="row g-0 mt-3 justify-content-around">
                    <div class="card col-12 col-md-5 p-2 about-card">
                        <img src="{{asset('storage/assets/diogo.jpg')}}" class="card-img-top rounded" alt="Diogo Almeida">
                        <div class="card-body">
                            <h4 class="card-title">Diogo Almeida</h4>
                            <p class="card-text">Student at MIEIC. Loves people from Paris.</p>
                        </div>
                    </div>

                    <div class="card col-12 col-md-5 mt-3 mt-md-0 p-2 about-card">
                        <img src="{{asset('storage/assets/sena.jpg')}}" class="card-img-top rounded" alt="Gustavo Sena">
                        <div class="card-body">
                            <h4 class="card-title">Gustavo Sena</h4>
                            <p class="card-text">Student at MIEIC. Coffee bringer.</p>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </section>
    @include('partials.footer')
@endsection
