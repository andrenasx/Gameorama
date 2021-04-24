@extends('layouts.app')
@section('content')
@include('partials.navbar')
<section class="container g-0 mx-auto my-4 col-lg-7">
    <header class="p-4 p-lg-5 mb-3 bg-white rounded" style="height:fit-content">
        <h3 class="mb-3 color-orange">Results for</h3>
        <h2 class="fw-bold">"Leg"</h2>
    </header>

    <section class="pill-navigation mb-1">
        <ul class="nav nav-pills mb-1 justify-content-space-between bg-white rounded" id="pills-tab"
            role="tablist">
            <li class="nav-item col" role="presentation">
                <button class="nav-link active w-100" id="pills-posts-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-posts" type="button" role="tab" aria-controls="pills-posts"
                    aria-selected="false">Posts</button>
            </li>
            <li class="nav-item col" role="presentation">
                <button class="nav-link w-100" id="pills-topics-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-topics" type="button" role="tab" aria-controls="pills-topics"
                    aria-selected="false">Topics</button>
            </li>
            <li class="nav-item col" role="presentation">
                <button class="nav-link w-100" id="pills-users-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-users" type="button" role="tab" aria-controls="pills-users"
                    aria-selected="false">Users</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-posts" role="tabpanel" aria-labelledby="pills-posts-tab">
                <div class="news-card mb-3 p-4 rounded bg-white">
                    <div class="row news-card-header">
                        <div class="post-voting col-1 d-flex justify-content-center">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                </li>
                                <li>
                                    <span class="score d-flex justify-content-center" id="score">5</span>
                                </li>
                                <li>
                                    <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <h6 class="post-topics">Topics: <a href="../pages/topic.php">Lego Marvel Super Heroes</a></h6>
                            <div class="d-inline">
                                <small class="post-user">Posted by <a href="./profile.php">Legalt_of_Rivia</a></small>
                                <small>6 hours ago</small>
                            </div>
                            <h4 class="post-title-smaller">
                                <a href="../pages/post.php" class="black-a">Rumor: LEGO Marvel Super Heroes a caminho da Switch</a>
                            </h4>
                        </div>
                    </div>
                    <div class="news-card-body">
                        <a href="../pages/post.php" class="black-a">
                            <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                                style="max-height: 650px" src="https://sm.ign.com/ign_pt/gallery/l/lego-aveng/lego-avengers-infinity-war-sets_49ef.jpg">
                            <p class="card-text truncate-multiple">A informação é avançada pelo site da Entertainment Software Rating Board (ESRB), onde podemos encontrar uma página dedicada a esta versão do jogo de 2013, classificando a versão da Switch para "Everyone."</p>
                        </a>
                    </div>
                    <div class="row mt-4 news-card-options">
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
            </div> <!-- /#pills-posts -->
            <div class="tab-pane fade" id="pills-topics" role="tabpanel" aria-labelledby="pills-topics-tab">
                <section class="bg-white rounded py-2">
                    <div class="row m-3 p-2 rounded bg-white">
                        <div class="row align-items-center">
                            <img src="../assets/L_icon.svg" alt="" class = "col-2 flex-shrink-0 rounded-circle" style="width:90px;height:auto;">
                            <div class="col-md-10 col-8 d-flex">
                                <div>
                                    <h4><a href="../pages/topic.php">League of Legends</a></h4>
                                    <p class="h6 fw-normal">1,5M Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-3 p-2 rounded bg-white">
                        <div class="row align-items-center">
                            <img src="../assets/L_icon.svg" alt="" class = "col-2 flex-shrink-0 rounded-circle" style="width:90px;height:auto;">
                            <div class="col-md-10 col-8 d-flex">
                                <div>
                                    <h4><a href="../pages/topic.php">Legends of Runeterra</a></h4>
                                    <p class="h6 fw-normal">300k Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-3 p-2 rounded bg-white">
                        <div class="row align-items-center">
                            <img src="../assets/L_icon.svg" alt="" class = "col-2 flex-shrink-0 rounded-circle" style="width:90px;height:auto;">
                            <div class="col-md-10 col-8 d-flex">
                                <div>
                                    <h4><a href="../pages/topic.php">Lego Starwars</a></h4>
                                    <p class="h6 fw-normal">135k Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div> <!-- /#pills-topics -->
            <div class="tab-pane fade" id="pills-users" role="tabpanel" aria-labelledby="pills-users-tab">
                <section class="bg-white rounded py-2">
                    <div class="row m-3 p-2 rounded bg-white ">
                        <div class="row align-items-center">
                            <img src="../assets/avatar4.png" alt="" class = "col-2 flex-shrink-0 rounded-circle" style="width:90px;height:auto;">
                            <div class="col justify-content-between">
                                <div>
                                    <h4><a href="../pages/profile.php">Legalt_of_Rivia</a></h4>
                                    <div class="row">
                                        <h6 class="col-12 col-sm-6">135k Followers</h6>
                                        <h6 class="col-12 col-sm-6">5,758,783 Aura Score</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-3 p-2 rounded bg-white">
                        <div class="row align-items-center">
                            <img src="../assets/avatar1.png" alt="" class = "col-2 flex-shrink-0 rounded-circle" style="width:90px;height:auto;">
                            <div class="col justify-content-between">
                                <div>
                                    <h4><a href="../pages/profile.php">LegendBoy7454</a></h4>
                                    <div class="row">
                                        <h6 class="col-12 col-sm-6">15,8k Followers</h6>
                                        <h6 class="col-12 col-sm-6">1,151,320 Aura Score</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div> <!-- /#pills-users -->
        </div>
    </section>
</section>
@include('partials.footer')
@endsection