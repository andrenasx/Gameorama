@extends('layouts.app')
@section('page-title', 'Home | ')
@section('content')
    @include('partials.navbar')
    @push('scripts')
        <script defer src={{ asset('js/ajax.js') }}></script>
        <script defer src={{ asset('js/home.js') }}></script>
    @endpush
    <section class="mainpage-container container my-4 col-lg-8 px-0 mt-md-4">
        <div class="row justify-content-evenly g-0">
            <section class="all-news-cards col-md-8">
                <section class="pill-navigation">
                    <ul class="nav nav-pills mb-1 bg-white rounded" id="pills-tab" role="tablist">
                        @auth
                            <li class="nav-item col" role="presentation">
                                <button class="nav-link active w-100" id="pills-feed-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-feed" type="button" role="tab" aria-controls="pills-feed"
                                        aria-selected="true">Feed
                                </button>
                            </li>
                        @endauth
                        <li class="nav-item col" role="presentation">
                            <button class="nav-link @guest active @endguest w-100" id="pills-trending-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-trending" type="button" role="tab"
                                    aria-controls="pills-trending"
                                    aria-selected="@auth false @endauth @guest true @endguest">Trending
                            </button>
                        </li>
                        <li class="nav-item col" role="presentation">
                            <button class="nav-link w-100" id="pills-latest-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest"
                                    aria-selected="false">Latest
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        @auth
                            <div class="tab-pane fade active show" id="pills-feed" role="tabpanel"
                                 aria-labelledby="pills-feed-tab">
                                <section id="feed-posts"></section>
                                <div id="more-feed" data-page="1" class="d-flex justify-content-center mt-4">
                                    <button class="btn btn-light d-block">Load more</button>
                                </div>
                            </div>
                        @endauth
                        <div class="tab-pane fade @guest active show @endguest" id="pills-trending" role="tabpanel"
                             aria-labelledby="pills-trending-tab">
                            <section id="trending-posts"></section>
                            <div id="more-trending" data-page="1" class="d-flex justify-content-center mt-4">
                                <button class="btn btn-light d-block">Load more</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
                            <section id="latest-posts"></section>
                            <div id="more-latest" data-page="1" class="d-flex justify-content-center mt-4">
                                <button class="btn btn-light d-block">Load more</button>
                            </div>
                        </div>
                    </div>
                </section>
            </section>

            <aside class="col-md-3 d-none d-md-block">
                <section id="hall_of_fame" class="row mb-3 p-3 bg-white rounded">
                    <h4 class="aside-title fw-bold px-1">Wall of Fame</h4>
                    <ol class="ms-2 mb-0">
                        @foreach ($hall_of_fame as $member)
                            <li class="mb-2">
                                <p class="mb-0 blue-hover text-truncate"><a
                                        href="{{ route('profile', $member->username)}}">{{$member->username}}</a></p>
                                <p class="mb-0 text-truncate small-grey-text">{{$member->aura}} Aura Score</p>
                            </li>
                        @endforeach
                    </ol>
                </section>

                <section id="popular_topics" class="row mb-3 p-3 bg-white rounded">
                    <h4 class="aside-title fw-bold px-1">Most Popular Topics</h4>
                    <ol class="ms-2 mb-0">
                        @foreach ($popular_topics as $poptopic)
                            <li class="mb-2">
                                <p class="mb-0 blue-hover text-truncate"><a
                                        href="/topic/{{$poptopic->name}}">{{$poptopic->name}}</a></p>
                                <p class="mb-0 text-truncate small-grey-text">{{$poptopic->num_followers}} Followers</p>
                            </li>
                        @endforeach
                    </ol>
                </section>
            </aside>
        </div>
    </section>
    @include('partials.report_post')
    @include('partials.footer')
@endsection
