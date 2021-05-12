@extends('layouts.app')
@section('page-title', $member->username.' | ')
@section('content')
    @include('partials.navbar')
    @push('scripts')
        <script defer src={{ asset('js/ajax.js') }}></script>
        <script defer src={{ asset('js/profile.js') }}></script>
        <script defer src={{ asset('js/follow.js') }}></script>
        <script defer src={{ asset('js/follow_topic.js') }}></script>
        <script defer src={{ asset('js/voting.js') }}></script>
        <script defer src={{ asset('js/comments.js') }}></script>
    @endpush
    <section class="container g-0 mx-auto my-4 col-lg-7 reportable">
        <section class="profile-widget bg-white rounded mb-3">
            <div class="row g-0">
                <div class="col-sm-12">
                    <div class="image-container bg2"
                         style="background-image: url({{ asset('storage/members/'.$member->banner_image) }}); background-size: cover">
                        <img src="{{ asset('storage/members/'.$member->avatar_image) }}" class="avatar">
                    </div>
                    <row class="d-flex justify-content-end col-12 report-profile" data-id={{$member->id}}>
                        @auth
                            @if ($member->isMe(Auth::user()->id))
                                <button type="button" class="btn d-flex align-content-center mt-1 me-1">
                                    <span class="btn-outline-blue" style="font-size: 200%;"
                                          onclick="location.href = '/member/{{$member->username}}/edit'">create</span>
                                </button>
                            @else
                                <button type="button" class="btn d-flex align-content-center mt-1 me-1"
                                        data-bs-toggle="modal"
                                        data-bs-target="#reportProfile">
                                    <span class="btn-outline-red" style="font-size: 200%;">flag</span>
                                </button>
                            @endif
                        @endauth
                        @guest
                            <button type="button" class="btn d-flex align-content-center mt-1 me-1"
                                    data-bs-toggle="modal"
                                    data-bs-target="#reportProfile">
                                <span class="btn-outline-red" style="font-size: 200%;">flag</span>
                            </button>
                            
                        @endguest
                    </row>
                </div>

                <div class="col-sm-12">
                    <div class="details ">
                        <h3>{{$member->full_name}}</h3>
                        <h4 class="color-orange fst-italic" id="username" data-id = {{$member->id}}>{{$member->username}}</h4>
                        <p>{{$member->aura}} Aura Score</p>
                        <p class="bio mb-4 px-3">{{$member->bio}}</p>
                        @auth
                            @if (!$member->isMe(Auth::user()->id))
                                @if ($member->isFollowed(Auth::user()->id))
                                    <button type="button" class="following-button btn btn-outline-primary col-4 mb-3 member-follow-button" data-id = {{$member->username}}></button>
                                @else
                                    <button type="button" class="follow-button btn btn-outline-primary col-4 mb-3 member-follow-button" data-id = {{$member->username}}></button>
                                @endif
                            @endif
                        @endauth
                    </div>
                </div>
                <section class="follow_stats pb-3">
                    <div class="row g-0 d-flex justify-content-around">
                        <div class="col text-center px-2">
                            <button type="button" class="text-button-profile button-following" data-bs-toggle="modal" data-id = {{$member->username}}
                                    data-bs-target="#modalFollowing">{{$member->following->count()}} Following
                            </button>
                        </div>
                        <div class="col text-center px-2">
                            <button type="button" class="text-button-profile button-followers" data-bs-toggle="modal" data-id = {{$member->username}}
                                    data-bs-target="#modalFollowers">{{$member->followers->count()}} Followers
                            </button>
                        </div>
                        <div class="col text-center px-2">
                            <button type="button" class="text-button-profile button-topics" data-bs-toggle="modal" data-id = {{$member->id}}
                                    data-bs-target="#modalFollowedTopics">{{$member->topics->count()}} Followed Topics
                            </button>
                        </div>
                    </div>
                    @include('partials.following', ['following' => $member->following])
                    @include('partials.followers', ['followers' => $member->followers])
                    @include('partials.followed_topics', ['topics' => $member->topics])
                </section>
            </div>
        </section>

        <section class="pill-navigation mb-1">
            <ul class="nav nav-pills mb-1 bg-white rounded" id="pills-tab" role="tablist">
                <li class="nav-item col" role="presentation">
                    <button class="nav-link active w-100" id="pills-posts-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-posts" type="button" role="tab" aria-controls="pills-posts"
                            aria-selected="true">Posts
                    </button>
                </li>
                <li class="nav-item col" role="presentation">
                    <button class="nav-link w-100" id="pills-comments-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-comments" type="button" role="tab" aria-controls="pills-comments"
                            aria-selected="false">Comments
                    </button>
                </li>
                @auth
                    @if ($member->isMe(Auth::user()->id))
                        <li class="nav-item col" role="presentation">
                            <button class="nav-link w-100" id="pills-bookmarked-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-bookmarked" type="button" role="tab"
                                    aria-controls="pills-bookmarked"
                                    aria-selected="false">Bookmarked
                            </button>
                        </li>
                    @endif
                @endauth
            </ul>

            <div class="tab-content posts" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-posts" role="tabpanel"
                     aria-labelledby="pills-posts-tab">
                    <section id="member-posts"></section>
                    <div id="more-posts" data-page="1" class="d-flex justify-content-center mt-4">
                        <button class="btn btn-light d-block">Load more</button>
                    </div>
                </div>
                <div class="tab-pane fade comments-section" id="pills-comments" role="tabpanel" aria-labelledby="pills-comments-tab">
                    <section id="member-comments"></section>
                    <div id="more-comments" data-page="1" class="d-flex justify-content-center mt-4">
                        <button class="btn btn-light d-block">Load more</button>
                    </div>
                </div>
                @auth
                    @if ($member->isMe(Auth::user()->id))
                        <div class="tab-pane fade posts" id="pills-bookmarked" role="tabpanel"
                             aria-labelledby="pills-bookmarked-tab">
                            <section id="member-bookmarked"></section>
                            <div id="more-bookmarked" data-page="1" class="d-flex justify-content-center mt-4">
                                <button class="btn btn-light d-block">Load more</button>
                            </div>
                        </div>
                    @endif
                @endauth
            </div>
        </section>
    </section>
    @include('partials.report_comment')
    @include('partials.report_post')
    @include('partials.report_profile')
    @include('partials.footer')
@endsection
