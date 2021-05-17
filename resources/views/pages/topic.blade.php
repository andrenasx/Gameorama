@extends('layouts.app')
@section('page-title', $topic->name.' | ')
@section('content')
@include('partials.navbar')
@push('scripts')
    <script defer src={{ asset('js/ajax.js') }}></script>
    <script defer src={{ asset('js/topic.js') }}></script>
    <script defer src={{ asset('js/voting.js') }}></script>
    <script defer src={{ asset('js/follow_topic.js') }}></script>
    <script defer src={{ asset('js/bookmark.js') }}></script>
@endpush
<section class="container g-0 mx-auto my-4 col-lg-7 ">
    <header class="p-3 p-lg-5 mb-3 bg-white rounded" style="height:fit-content">
        <h3 class="mb-3 color-orange">Topic Page</h3>
        <section class="row g-0 align-items-center">
            <div class="col-md-10 col-8">
                <div class="row g-0">
                    <img src="{{ asset('storage/assets/letters/'.strtoupper(substr($topic->name, 0, 1)).'.png') }}" class = "rounded-circle col-2 px-0" alt="" style = "max-width: 100px">
                    <div class="col-10 px-3 my-auto d-flex flex-column">
                        <h3 class="h2 fw-bold" id="topic_name">{{$topic->name}}</h3>
                        <h5 id="topic_followers">{{$topic->followers->count()}} Followers</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-2 col-4 d-flex justify-content-end reportable" data-id={{$topic->id}} >
                @auth
                @if (($topic->isFollowed(Auth::user()->id)) != null)
                    <button type="button" class="following-button btn btn-outline-primary topic-follow-button" data-id ={{$topic->id}}></button>
                @else
                    <button type="button" class="follow-button btn btn-outline-primary topic-follow-button" data-id ={{$topic->id}}></button>
                @endif
                <button type="button" class="btn d-flex align-content-center mt-1 me-1 report-b report-topic" data-id={{$topic->id}}
                        data-bs-toggle="modal"
                        data-bs-target="#reportTopic">
                    <span class="btn-outline-red report-b report-topic" style="font-size: 200%;" data-id={{$topic->id}}>flag</span>
                </button>
                @endauth
            </div>
        </section>
    </header>

    <section class="pill-navigation mb-1">
        <ul class="nav nav-pills mb-1 justify-content-space-between bg-white rounded" id="pills-tab"
            role="tablist">
            <li class="nav-item col" role="presentation">
                <button class="nav-link active w-100" id="pills-trending-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending"
                    aria-selected="false">Trending</button>
            </li>
            <li class="nav-item col" role="presentation">
                <button class="nav-link w-100" id="pills-latest-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest"
                    aria-selected="false">Latest</button>
            </li>
        </ul>

        <div class="tab-content posts reportable" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
                <section id="trending-posts"></section>
                <div id="more-trending" data-page="1" class="d-flex justify-content-center mt-4">
                    <button class="btn btn-light d-block load-btn">Load more</button>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
                <section id="latest-posts"></section>
                <div id="more-latest" data-page="1" class="d-flex justify-content-center mt-4">
                    <button class="btn btn-light d-block load-btn">Load more</button>
                </div>
            </div>
        </div>
    </section>
    
</section>
@include('partials.report_topic')
@include('partials.footer')
@endsection
