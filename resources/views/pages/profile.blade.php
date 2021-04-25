@extends('layouts.app')
@section('content')
@auth
    @include('partials.navbar')
@endauth

@guest
    
    @include('partials.logout_navbar')
@endguest
<section class="container g-0 mx-auto my-4 col-lg-7">
    <section class="profile-widget bg-white rounded mb-3">
        <div class="row g-0">
            <div class="col-sm-12">
                <div class="image-container bg2" style="background:url(../assets/banner2.jpg); background-size: cover">
                    <img src="../assets/avatar21.png" class="avatar" alt="avatar">
                </div>
                <row class="d-flex justify-content-end col-12">
                    <button type="button" class="btn d-flex align-content-center mt-1 me-1" data-bs-toggle="modal"
                        data-bs-target="#reportProfile">
                        <span class="btn-outline-red" style="font-size: 200%;">flag</span>
                    </button>
                </row>
            </div>

            <div class="col-sm-12">
                <div class="details ">
                    <h3>{{$member->full_name}}</h3>
                    <h4 class="color-orange fst-italic">{{$member->username}}</h4>
                    <p>{{$member->aura}} Aura Score</p>
                    <p class="bio mb-4 px-3">{{$member->bio}}</p>
                    <button type="button" class="follow-button btn btn-outline-primary col-4 mb-3"></button>
                </div>
            </div>
            <section class="follow_stats pb-3">
                <div class="row g-0 d-flex justify-content-around">
                    <div class="col text-center px-2">
                        <button type="button" class="text-button-profile" data-bs-toggle="modal"
                            data-bs-target="#modalFollowing">{{$member->following->count()}} Following</button>
                    </div>
                    <div class="col text-center px-2">
                        <button type="button" class="text-button-profile" data-bs-toggle="modal"
                            data-bs-target="#modalFollowers">{{$member->followers->count()}} Followers</button>
                    </div>
                    <div class="col text-center px-2">
                        <button type="button" class="text-button-profile" data-bs-toggle="modal"
                            data-bs-target="#modalFollowedTopics">{{$member->topics->count()}} Followed Topics</button>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <section class="pill-navigation mb-1">
        <ul class="nav nav-pills mb-1 justify-content-space-between bg-white rounded" id="pills-tab" role="tablist">
            <li class="nav-item col" role="presentation">
                <button class="nav-link active w-100" id="pills-posts-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-posts" type="button" role="tab" aria-controls="pills-posts"
                    aria-selected="true">Posts</button>
            </li>
            <li class="nav-item col" role="presentation">
                <button class="nav-link w-100" id="pills-comments-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-comments" type="button" role="tab" aria-controls="pills-comments"
                    aria-selected="false">Comments</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-posts" role="tabpanel" aria-labelledby="pills-posts-tab">
                <div class="news-card mb-3 p-4 rounded bg-white">
                    <header class="row g-0 news-card-header">
                        <div class="post-voting col-1 d-flex justify-content-center">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                </li>
                                <li>
                                    <span class="score d-flex justify-content-center" id="score">23</span>
                                </li>
                                <li>
                                    <span
                                        class="downvote material-icons-round d-flex justify-content-center">south</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <h6 class="post-topics">Topics: <a href="topic">Gaming Gadgets</a>; <a
                                    href="topic">Razer</a></h6>
                            <div class="d-inline">
                                <small class="post-user">Posted by <a href="profile">kaka34</a></small>
                                <small>45 minutes ago</small>
                            </div>
                            <h4 class="post-title-smaller">
                                <a href="post" class="black-a">Razer apresenta webcam Kiyo Pro</a>
                            </h4>
                        </div>
                    </header>
                    <div class="news-card-body">
                        <a href="post" class="black-a">
                            <img class="rounded img-fluid img-responsive mx-auto my-3 d-block" style="max-height: 650px"
                                src="https://assets2.razerzone.com/images/pnx.assets/b6873991d1d643906221aa99f822a195/razer-kiyo-usp-synapse-3-mobile.jpg">
                            <p class="card-text truncate-multiple">A Razer revelou a webcam Kiyo Pro. Com uma
                                abrangência que vai para lá do mundo do gaming, tem no Sensor de Luz Adaptativo a sua
                                principal novidade. Vivemos uma época marcada pelo teletrabalho. E isto veio o despertar
                                um problema há muito dormente: a fraca qualidade das câmaras nos nossos computadores
                                portáteis.</p>
                        </a>
                    </div>
                    <div class="row g-0 mt-4 news-card-options">
                        <div class="col d-flex justify-content-center btn-outline-blue">
                            <span class="material-icons-outlined align-middle me-1">mode_comment</span>
                            <span class="d-none d-md-flex"> 321</span>
                        </div>
                        <div class="col d-flex justify-content-center btn-outline-blue">
                            <span class="material-icons-outlined align-middle me-1">bookmark_add</span>
                            <span class="d-none d-md-flex"> Bookmark</span>
                        </div>
                        <div class="col d-flex justify-content-center btn-outline-red " data-bs-toggle="modal" data-bs-target="#reportPost">
                            <span class="material-icons-outlined align-middle me-1">flag</span>
                            <span class="d-none d-md-flex"> Report<span>
                        </div>
                    </div>
                </div> <!-- /.news-card -->
            </div> <!-- .pills-posts -->
            <div class="tab-pane fade" id="pills-comments" role="tabpanel" aria-labelledby="pills-comments-tab">
                <section class="bg-white rounded p-4">
                    <div class="row p-3 g-0 mb-3 rounded border">
                        <header class="d-flex justify-content-between">
                            <h5 class="font-weight-bold">on "<a href="post">Razer apresenta webcam Kiyo
                                    Pro</a>"</h5>
                            <small style="color: darkgray;">35 minutes ago</small>
                        </header>

                        <p>Parece um ótimo produto!</p>

                        <div class="d-flex justify-content-between mt-2">
                            <div class="col-4 col-sm-2 d-flex justify-content-center post-voting">
                                <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                <label class="score d-flex justify-content-center mx-2">1</label>
                                <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                            </div>
                            <span class="material-icons-round">more_horiz</span>
                        </div>
                    </div>

                    <div class="row p-3 g-0 rounded border">
                        <header class="d-flex justify-content-between">
                            <h5 class="font-weight-bold">on "<a href="post">Gran Turismo 7 adiado para
                                    2022</a>"</h5>
                            <small style="color: darkgray;">2 hours ago</small>
                        </header>

                        <p>Estou mesmo ansioso!</p>

                        <div class="d-flex justify-content-between mt-2">
                            <div class="col-4 col-sm-2 d-flex justify-content-center post-voting">
                                <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                <label class="score d-flex justify-content-center mx-2">3</label>
                                <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                            </div>
                            <span class="material-icons-round">more_horiz</span>
                        </div>
                    </div>
                </section>
            </div> <!-- .pills-comments -->
        </div> <!-- .tab-content -->
    </section>
</section>
<!--<script src="../js/voting.js"></script>-->
@include('partials.report_profile')
@include('partials.following', ['following' => $member->following])
@include('partials.followers', ['followers' => $member->followers])
@include('partials.followed_topics', ['topics' => $member->topics])
@include('partials.footer')
@endsection