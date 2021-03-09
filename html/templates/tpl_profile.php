<?php 
include_once("tpl_report_profile.php");
include_once("tpl_report_post.php");
function draw_profile() { ?>
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
                    <h3>John Marston</h3>
                    <h4 class="color-orange fst-italic">kaka34</h4>
                    <p>214,385 Aura Score</p>
                    <p class="bio mb-4 px-3">What's up! I'm kaka34 and I love sports games, especially FIFA! Every other
                        game is bad (this is my opinion and therefore the truth).</p>
                    <button type="button" class="follow-button btn btn-outline-primary col-4 mb-3"></button>
                </div>
            </div>
            <section class="follow_stats pb-3">
                <div class="row g-0 d-flex justify-content-around">
                    <div class="col text-center px-2">
                        <button type="button" class="text-button-profile" data-bs-toggle="modal"
                            data-bs-target="#modalFollowing">1021 Following</button>
                    </div>
                    <div class="col text-center px-2">
                        <button type="button" class="text-button-profile" data-bs-toggle="modal"
                            data-bs-target="#modalFollower">1542 Followers</button>
                    </div>
                    <div class="col text-center px-2">
                        <button type="button" class="text-button-profile" data-bs-toggle="modal"
                            data-bs-target="#modalFollowedTopics">162 Followed Topics</button>
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
                            <h6 class="post-topics">Topics: <a href="../pages/topic.php">Gaming Gadgets</a>; <a
                                    href="../pages/topic.php">Razer</a></h6>
                            <div class="d-inline">
                                <small class="post-user">Posted by <a href="./profile.php">kaka34</a></small>
                                <small>45 minutes ago</small>
                            </div>
                            <h4 class="post-title-smaller">
                                <a href="../pages/post.php" class="black-a">Razer apresenta webcam Kiyo Pro</a>
                            </h4>
                        </div>
                    </header>
                    <div class="news-card-body">
                        <a href="../pages/post.php" class="black-a">
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
                            <h5 class="font-weight-bold">on "<a href="../pages/post.php">Razer apresenta webcam Kiyo
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
                            <h5 class="font-weight-bold">on "<a href="../pages/post.php">Gran Turismo 7 adiado para
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
<script src="../js/voting.js"></script>
<?php draw_report_profile(); draw_report_post(); } ?>




<?php function draw_own_profile() { ?>
<section class="container g-0 mx-auto my-4 col-lg-7">
    <section class="profile-widget bg-white rounded mb-3">
        <div class="row g-0">
            <div class="col-sm-12">
                <div class="image-container bg2" style="background:url(../assets/banner.jpg); background-size: cover">
                    <img src="../assets/avatar.jpg" class="avatar" alt="avatar">
                </div>
                <row class="d-flex justify-content-end col-12">
                    <button type="button" class="btn d-flex align-content-center mt-1 me-1"
                        onclick="location.href = '../pages/edit_profile.php'">
                        <span class="btn-outline-blue" style="font-size: 200%;">create</span>
                    </button>
                </row>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="details ">
                <h3>Nick Rogers</h3>
                <h4 class="color-orange fst-italic">WanWan</h4>
                <p>103,261 Aura Score</p>
                <p class="bio mb-4 px-3">Hello There! I'm WanWan and I'm a portuguese gamer that loves playing all kinds
                    of games. In my profile you'll find the very best source of gaming news, have fun!</p>
            </div>
        </div>

        <section class="follow_stats pb-3">
            <div class="row g-0 d-flex justify-content-around">
                <div class="col text-center px-2">
                    <button type="button" class="text-button-profile" data-bs-toggle="modal"
                        data-bs-target="#modalFollowing">854 Following</button>
                </div>
                <div class="col text-center px-2">
                    <button type="button" class="text-button-profile" data-bs-toggle="modal"
                        data-bs-target="#modalFollowers">1024 Followers</button>
                </div>
                <div class="col text-center px-2">
                    <button type="button" class="text-button-profile" data-bs-toggle="modal"
                        data-bs-target="#modalFollowedTopics">84 Followed Topics</button>
                </div>
            </div>
        </section>
    </section>

    <!--Following users on modal popup-->
    <div class="modal fade" id="modalFollowing" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Following</h5>
                    <button type="button" data-bs-dismiss="modal" id="close-window-button" aria-label="Close"><span
                            class="material-icons-round">close</span></button>
                </div>
                <div class="modal-body">
                    <div class="profiles-container">
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Follower users on modal popup-->
    <div class="modal fade" id="modalFollowers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Followers</h5>
                    <button type="button" data-bs-dismiss="modal" id="close-window-button" aria-label="Close"><span
                            class="material-icons-round" id="downvote">close</span></button>
                </div>
                <div class="modal-body">
                    <div class="profiles-container">
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="follow-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="follow-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="follow-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="follow-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">Legalt_of_Rivia</h1>
                                    <p class="h6 fw-normal">5,758,783 Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="follow-button btn btn-outline-primary col-12 mb-1"></button>
                                <h1 class="h6 fw-normal">135k Followers</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalFollowedTopics" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Followed Topics</h5>
                    <button type="button" data-bs-dismiss="modal" id="close-window-button" aria-label="Close"><span
                            class="material-icons-round" id="downvote">close</span></button>
                </div>
                <div class="modal-body">
                    <div class="profiles-container">
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">League of Legends</h1>
                                    <p class="h6 fw-normal">1.5M Followers</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">League of Legends</h1>
                                    <p class="h6 fw-normal">1.5M Followers</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">League of Legends</h1>
                                    <p class="h6 fw-normal">1.5M Followers</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">League of Legends</h1>
                                    <p class="h6 fw-normal">1.5M Followers</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">League of Legends</h1>
                                    <p class="h6 fw-normal">1.5M Followers</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">League of Legends</h1>
                                    <p class="h6 fw-normal">1.5M Followers</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">League of Legends</h1>
                                    <p class="h6 fw-normal">1.5M Followers</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">League of Legends</h1>
                                    <p class="h6 fw-normal">1.5M Followers</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">League of Legends</h1>
                                    <p class="h6 fw-normal">1.5M Followers</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">League of Legends</h1>
                                    <p class="h6 fw-normal">1.5M Followers</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">League of Legends</h1>
                                    <p class="h6 fw-normal">1.5M Followers</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">League of Legends</h1>
                                    <p class="h6 fw-normal">1.5M Followers</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">League of Legends</h1>
                                    <p class="h6 fw-normal">1.5M Followers</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                            </div>
                        </div>
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="../assets/avatar2.png" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">League of Legends</h1>
                                    <p class="h6 fw-normal">1.5M Followers</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="pill-navigation">
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
            <li class="nav-item col" role="presentation">
                <button class="nav-link w-100" id="pills-bookmarked-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-bookmarked" type="button" role="tab" aria-controls="pills-bookmarked"
                    aria-selected="false">Bookmarked</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-posts" role="tabpanel" aria-labelledby="pills-posts-tab">
                <div class="news-card mb-3 p-4 rounded bg-white">
                    <div class="row g-0 news-card-header">
                        <div class="post-voting col-1 d-flex justify-content-center">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                </li>
                                <li>
                                    <span class="score d-flex justify-content-center" id="score">18</span>
                                </li>
                                <li>
                                    <span
                                        class="downvote material-icons-round d-flex justify-content-center">south</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <h6 class="post-topics">Topics: <a href="../pages/topic.php">League of Legends</a></h6>
                            <div class="d-inline">
                                <small class="post-user">Posted by <a href="./profile.php">WanWan</a></small>
                                <small>2 hours ago</small>
                            </div>
                            <h4 class="post-title-smaller">
                                <a href="../pages/post.php" class="black-a">Champion Spotlight de Viego, The Ruined
                                    King</a>
                            </h4>
                        </div>
                    </div>
                    <div class="news-card-body">
                        <a href="../pages/post.php" class="black-a">
                            <img class="rounded img-fluid img-responsive mx-auto my-3 d-block" style="max-height: 650px"
                                src="https://s2.glbimg.com/zavTeT4iIiVKpefK-TWGsg0Tas0=/0x0:3840x2160/1000x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2021/U/5/cfZdJHSCiXpc23vCzYGg/58332729.jpg">
                            <p class="card-text truncate-multiple">
                                Viego vai-se estrear no lançamento do patch 11.2, que contará com vários Nerfs a
                                personagens conhecidas como Akali e Maokai, e buffs a campeões como Shako e Varus.
                                Como não poderia deixar de ser, Viego contará com uma skin própria intitulada Lunar
                                Beast Viego, e irá conceder a sua própria linha de skins, "Ruined", a começar por
                                Shyvana, Draven e Karma.</p>
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
                        <div class="col-4 ">
                            <div class="col d-flex justify-content-center btn-outline-blue dropdown " id="more-horizontal" role="button" data-bs-toggle="dropdown">
                                <span class="material-icons-round">more_horiz</span>
                            </div>
                            <ul class="dropdown-menu more-horizontal" aria-labelledby="more-horizontal" >
                                <li><a class="dropdown-item btn-outline-blue"><span class="material-icons-outlined align-middle">edit</span> <span> Edit</span></a></li>
                                <li><a class="dropdown-item btn-outline-red"><span class="material-icons-outlined align-middle">delete</span> <span> Delete</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- /.news-card -->
            </div> <!-- .pills-posts -->
            <div class="tab-pane fade" id="pills-comments" role="tabpanel" aria-labelledby="pills-comments-tab">
                <section class="bg-white rounded p-4">
                    <div class="row p-3 mb-3 g-0 rounded border">
                        <header class="d-flex justify-content-between">
                            <h5 class="font-weight-bold">on "<a href="../pages/post.php">Razer apresenta webcam Kiyo
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
                            <div class="col-2 ">
                                <div class="col d-flex justify-content-end btn-outline-blue dropdown " id="more-horizontal" role="button" data-bs-toggle="dropdown">
                                    <span class="material-icons-round">more_horiz</span>
                                </div>
                                <ul class="dropdown-menu more-horizontal" aria-labelledby="more-horizontal" >
                                    <li><a class="dropdown-item btn-outline-blue"><span class="material-icons-outlined align-middle">done</span> <span> Dismiss</span></a></li>
                                    <li><a class="dropdown-item btn-outline-red"><span class="material-icons-outlined align-middle">delete</span> <span> Delete</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row p-3 g-0 rounded border">
                        <header class="d-flex justify-content-between">
                            <h5 class="font-weight-bold">on "<a href="../pages/post.php">Gran Turismo 7 adiado para
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
                            <div class="col-2 ">
                                <div class="col d-flex justify-content-end btn-outline-blue dropdown " id="more-horizontal" role="button" data-bs-toggle="dropdown">
                                    <span class="material-icons-round">more_horiz</span>
                                </div>
                                <ul class="dropdown-menu more-horizontal" aria-labelledby="more-horizontal" >
                                    <li><a class="dropdown-item btn-outline-blue"><span class="material-icons-outlined align-middle">done</span> <span> Dismiss</span></a></li>
                                    <li><a class="dropdown-item btn-outline-red"><span class="material-icons-outlined align-middle">delete</span> <span> Delete</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div> <!-- .pills-comments -->
            <div class="tab-pane fade" id="pills-bookmarked" role="tabpanel" aria-labelledby="pills-bookmarked-tab">
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
                            <h6 class="post-topics">Topics: <a href="../pages/topic.php">Gaming Gadgets</a>; <a
                                    href="../pages/topic.php">Razer</a></h6>
                            <div class="d-inline">
                                <small class="post-user">Posted by <a href="./profile.php">kaka34</a></small>
                                <small>45 minutes ago</small>
                            </div>
                            <h4 class="post-title-smaller">
                                <a href="../pages/post.php" class="black-a">Razer apresenta webcam Kiyo Pro</a>
                            </h4>
                        </div>
                    </header>
                    <div class="news-card-body">
                        <a href="../pages/post.php" class="black-a">
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
                            <span class="material-icons-outlined align-middle me-1">bookmark_remove</span>
                            <span class="d-none d-md-flex"> Bookmark</span>
                        </div>
                        <div class="col d-flex justify-content-center btn-outline-red " data-bs-toggle="modal" data-bs-target="#reportPost">
                            <span class="material-icons-outlined align-middle me-1">flag</span>
                            <span class="d-none d-md-flex"> Report<span>
                        </div>
                    </div>
                </div> <!-- /.news-card -->
            </div> <!-- .pills-bookmarked -->
        </div> <!-- .tab-content -->
    </section>
</section>
<script src="../js/voting.js"></script>
<?php draw_report_profile(); draw_report_post(); } ?>
