<?php function draw_profile() { ?>
<section class="container g-0 mx-auto mt-sm-4 col-lg-7">
    <section class="profile-widget bg-white rounded mb-3">
        <div class="row">
            <div class="col-sm-12">
                <div class="image-container bg2"
                    style="background:url(http://www.bootdey.com/img/Content/flores-amarillas-wallpaper.jpeg)">
                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="avatar" alt="avatar">
                </div>
                <row class="d-flex justify-content-end col-12">
                    <button type="button" class="btn d-flex align-content-center mt-1 me-1">
                        <span class="btn-outline-report" style="font-size: 200%;">flag</span>
                    </button>
                </row>
            </div>

            <div class="col-sm-12">
                <div class="details ">
                    <h3>Nick Rogers</h3>
                    <h4>WanWan</h4>
                    <p>103,261 Aura Score</p>
                    <p class="bio">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it to make a type specimen book. It has survived not only
                        five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                        passages, and more recently with desktop publishing software like Aldus PageMaker including
                        versions of Lorem Ipsum.</p>
                    <button type="button" class="follow-button btn btn-outline-primary col-4 mb-1"></button>
                </div>
            </div>
            <section class="follow_stats mt-2 mb-2">
                <div class="row d-flex justify-content-around">
                    <div class="col text-center">
                        <button type="button" class="text-button-profile" data-bs-toggle="modal"
                            data-bs-target="#modalFollowing">1021 Following</button>
                    </div>
                    <div class="col text-center">
                        <button type="button" class="text-button-profile" data-bs-toggle="modal"
                            data-bs-target="#modalFollower">1542 Followers</button>
                    </div>
                    <div class="col text-center">
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
                    <header class="row news-card-header">
                        <div class="post-voting col-1 d-flex justify-content-center">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                </li>
                                <li>
                                    <span class="score d-flex justify-content-center" id="score">23.0k</span>
                                </li>
                                <li>
                                    <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <h6 class="post-topics">Topics: <a href="#">Gaming Gadgets</a>; <a href="#">Razer</a></h6>
                            <small class="post-user">Posted by <a href="./profile.php">kaka34</a></small>
                            <h4 class="post-title-smaller">Razer apresenta webcam Kiyo Pro</h4>
                        </div>
                    </header>
                    <div class="news-card-body">
                        <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                            style="max-height: 650px" src="https://via.placeholder.com/3840x2160">
                        <p class="card-text truncate-multiple">A Razer revelou a webcam Kiyo Pro. Com uma abrangência que vai para lá do mundo do gaming, tem no Sensor de Luz Adaptativo a sua principal novidade. Vivemos uma época marcada pelo teletrabalho. E isto veio o despertar um problema há muito dormente: a fraca qualidade das câmaras nos nossos computadores portáteis.</p>
                    </div>
                    <div class="row mt-4 news-card-options">
                        <div class="col d-flex justify-content-center blue-hover">
                            <span class="material-icons-outlined align-middle">mode_comment</span>
                            <span class="d-none d-md-block"> 321</span>
                        </div>
                        <div class="col d-flex justify-content-center blue-hover">
                            <span class="material-icons-outlined align-middle">bookmark_add</span>
                            <span class="d-none d-md-block"> Bookmark</span>
                        </div>
                        <div class="col d-flex justify-content-center red-hover">
                            <span class="material-icons-outlined align-middle">outlined_flag</span>
                            <span class="d-none d-md-block"> Report<span>
                        </div>
                    </div>
                </div> <!-- /.news-card -->
                <div class="news-card mb-3 p-4 rounded bg-white">
                    <header class="row news-card-header">
                        <div class="post-voting col-1 d-flex justify-content-center">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                </li>
                                <li>
                                    <span class="score d-flex justify-content-center" id="score">23.0k</span>
                                </li>
                                <li>
                                    <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <h6 class="post-topics">Topics: <a href="#">Gaming Gadgets</a>; <a href="#">Razer</a></h6>
                            <small class="post-user">Posted by <a href="./profile.php">kaka34</a></small>
                            <h4 class="post-title-smaller">Razer apresenta webcam Kiyo Pro</h4>
                        </div>
                    </header>
                    <div class="news-card-body">
                        <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                            style="max-height: 650px" src="https://via.placeholder.com/3840x2160">
                        <p class="card-text truncate-multiple">A Razer revelou a webcam Kiyo Pro. Com uma abrangência que vai para lá do mundo do gaming, tem no Sensor de Luz Adaptativo a sua principal novidade. Vivemos uma época marcada pelo teletrabalho. E isto veio o despertar um problema há muito dormente: a fraca qualidade das câmaras nos nossos computadores portáteis.</p>
                    </div>
                    <div class="row mt-4 news-card-options">
                        <div class="col d-flex justify-content-center blue-hover">
                            <span class="material-icons-outlined align-middle">mode_comment</span>
                            <span class="d-none d-md-block"> 321</span>
                        </div>
                        <div class="col d-flex justify-content-center blue-hover">
                            <span class="material-icons-outlined align-middle">bookmark_add</span>
                            <span class="d-none d-md-block"> Bookmark</span>
                        </div>
                        <div class="col d-flex justify-content-center red-hover">
                            <span class="material-icons-outlined align-middle">outlined_flag</span>
                            <span class="d-none d-md-block"> Report<span>
                        </div>
                    </div>
                </div> <!-- /.news-card -->
            </div> <!-- .pills-posts -->
            <div class="tab-pane fade" id="pills-comments" role="tabpanel" aria-labelledby="pills-comments-tab">
                <section class="bg-white rounded pt-2">
                    <div class="row m-3 p-2 rounded bg-white border">
                        <div class="d-flex justify-content-between">
                            <h5 class="font-weight-bold">on "Razer apresenta webcam Kiyo Pro" </h5>
                            <small style="color: darkgray;">35 minutes ago</small>
                        </div>

                        <p>Parece um ótimo produto!</p>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="col-2 d-flex justify-content-evenly vote">
                                <span class="material-icons-round d-flex justify-content-center">north</span>
                                <label class="d-flex justify-content-center">1</label>
                                <span class="material-icons-round d-flex justify-content-center">south</span>
                            </div>

                            <span class="material-icons-round">more_horiz</span>

                        </div>
                    </div>

                    <div class="row m-3 p-2 rounded bg-white border">
                        <div class="d-flex justify-content-between">
                            <h5 class="font-weight-bold">on "Gran Turismo 7 adiado para 2022" </h5>
                            <small style="color: darkgray;">2 hours ago</small>
                        </div>
                        <p>Estou mesmo ansioso!</p>

                        <div class="d-flex justify-content-between mt-2">
                            <div class="col-2 d-flex justify-content-evenly vote">
                                <span class="material-icons-round d-flex justify-content-center">north</span>
                                <label class="d-flex justify-content-center">3</label>
                                <span class="material-icons-round d-flex justify-content-center">south</span>
                            </div>

                            <span class="material-icons-round">more_horiz</span>

                        </div>
                    </div>
                </section>
            </div> <!-- .pills-comments -->
        </div> <!-- .tab-content -->
    </section>
</section>
<?php } ?>




















<?php function draw_own_profile() { ?>
<section class="container g-0 mx-auto mt-sm-4 col-lg-7">
    <section class="profile-widget bg-white rounded mb-3">
        <div class="row">
            <div class="col-sm-12">
                <div class="image-container bg2"
                    style="background:url(http://www.bootdey.com/img/Content/flores-amarillas-wallpaper.jpeg)">
                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="avatar" alt="avatar">
                </div>
                <row class="d-flex justify-content-end col-12">
                    <button type="button" class="btn d-flex align-content-center mt-1 me-1" onclick = "location.href = '../pages/edit_profile.php'">
                        <span class="btn-outline-report" style="font-size: 200%;">create</span>
                    </button>
                </row>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="details mt-5">
                <h3>Nick Rogers</h3>
                <h4>WanWan</h4>
                <p>103,261 Aura Score</p>
                <p class="bio">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                    has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                    galley of type and scrambled it to make a type specimen book. It has survived not only five
                    centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
                    popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and
                    more recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                    Ipsum.</p>
            </div>
        </div>

        <section class="follow_stats mt-2 mb-2">
            <div class="row d-flex justify-content-around">
                <div class="col text-center">
                    <button type="button" class="text-button-profile" data-bs-toggle="modal"
                        data-bs-target="#modalFollowing">1021 Following</button>
                </div>
                <div class="col text-center">
                    <button type="button" class="text-button-profile" data-bs-toggle="modal"
                        data-bs-target="#modalFollowers">1542 Followers</button>
                </div>
                <div class="col text-center">
                    <button type="button" class="text-button-profile" data-bs-toggle="modal"
                        data-bs-target="#modalFollowedTopics">162 Followed Topics</button>
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

    <section class="pill-navigation mt-2">
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
                    <header class="row news-card-header">
                        <div class="post-voting col-1 d-flex justify-content-center">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                </li>
                                <li>
                                    <span class="score d-flex justify-content-center" id="score">23.0k</span>
                                </li>
                                <li>
                                    <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <h6 class="post-topics">Topics: <a href="#">Gaming Gadgets</a>; <a href="#">Razer</a></h6>
                            <small class="post-user">Posted by <a href="./profile.php">kaka34</a></small>
                            <h4 class="post-title-smaller">Razer apresenta webcam Kiyo Pro</h4>
                        </div>
                    </header>
                    <div class="news-card-body">
                        <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                            style="max-height: 650px" src="https://via.placeholder.com/3840x2160">
                        <p class="card-text truncate-multiple">A Razer revelou a webcam Kiyo Pro. Com uma abrangência que vai para lá do mundo do gaming, tem no Sensor de Luz Adaptativo a sua principal novidade. Vivemos uma época marcada pelo teletrabalho. E isto veio o despertar um problema há muito dormente: a fraca qualidade das câmaras nos nossos computadores portáteis.</p>
                    </div>
                    <div class="row mt-4 news-card-options">
                        <div class="col d-flex justify-content-center blue-hover">
                            <span class="material-icons-outlined align-middle">mode_comment</span>
                            <span class="d-none d-md-block"> 321</span>
                        </div>
                        <div class="col d-flex justify-content-center blue-hover">
                            <span class="material-icons-outlined align-middle">bookmark_add</span>
                            <span class="d-none d-md-block"> Bookmark</span>
                        </div>
                        <div class="col d-flex justify-content-center red-hover">
                            <span class="material-icons-outlined align-middle">outlined_flag</span>
                            <span class="d-none d-md-block"> Report<span>
                        </div>
                    </div>
                </div> <!-- /.news-card -->
                <div class="news-card mb-3 p-4 rounded bg-white">
                    <header class="row news-card-header">
                        <div class="post-voting col-1 d-flex justify-content-center">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                </li>
                                <li>
                                    <span class="score d-flex justify-content-center" id="score">23.0k</span>
                                </li>
                                <li>
                                    <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <h6 class="post-topics">Topics: <a href="#">Gaming Gadgets</a>; <a href="#">Razer</a></h6>
                            <small class="post-user">Posted by <a href="./profile.php">kaka34</a></small>
                            <h4 class="post-title-smaller">Razer apresenta webcam Kiyo Pro</h4>
                        </div>
                    </header>
                    <div class="news-card-body">
                        <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                            style="max-height: 650px" src="https://via.placeholder.com/3840x2160">
                        <p class="card-text truncate-multiple">A Razer revelou a webcam Kiyo Pro. Com uma abrangência que vai para lá do mundo do gaming, tem no Sensor de Luz Adaptativo a sua principal novidade. Vivemos uma época marcada pelo teletrabalho. E isto veio o despertar um problema há muito dormente: a fraca qualidade das câmaras nos nossos computadores portáteis.</p>
                    </div>
                    <div class="row mt-4 news-card-options">
                        <div class="col d-flex justify-content-center blue-hover">
                            <span class="material-icons-outlined align-middle">mode_comment</span>
                            <span class="d-none d-md-block"> 321</span>
                        </div>
                        <div class="col d-flex justify-content-center blue-hover">
                            <span class="material-icons-outlined align-middle">bookmark_add</span>
                            <span class="d-none d-md-block"> Bookmark</span>
                        </div>
                        <div class="col d-flex justify-content-center red-hover">
                            <span class="material-icons-outlined align-middle">outlined_flag</span>
                            <span class="d-none d-md-block"> Report<span>
                        </div>
                    </div>
                </div> <!-- /.news-card -->
            </div> <!-- .pills-posts -->
            <div class="tab-pane fade" id="pills-comments" role="tabpanel" aria-labelledby="pills-comments-tab">
                <section class="bg-white rounded pt-2">
                    <div class="row m-3 p-2 rounded bg-white border">
                        <div class="d-flex justify-content-between">
                            <h5 class="font-weight-bold">on "Razer apresenta webcam Kiyo Pro" </h5>
                            <small style="color: darkgray;">35 minutes ago</small>
                        </div>

                        <p>Parece um ótimo produto!</p>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="col-2 d-flex justify-content-evenly vote">
                                <span class="material-icons-round d-flex justify-content-center">north</span>
                                <label class="d-flex justify-content-center">1</label>
                                <span class="material-icons-round d-flex justify-content-center">south</span>
                            </div>

                            <span class="material-icons-round">more_horiz</span>

                        </div>
                    </div>

                    <div class="row m-3 p-2 rounded bg-white border">
                        <div class="d-flex justify-content-between">
                            <h5 class="font-weight-bold">on "Gran Turismo 7 adiado para 2022" </h5>
                            <small style="color: darkgray;">2 hours ago</small>
                        </div>
                        <p>Estou mesmo ansioso!</p>

                        <div class="d-flex justify-content-between mt-2">
                            <div class="col-2 d-flex justify-content-evenly vote">
                                <span class="material-icons-round d-flex justify-content-center">north</span>
                                <label class="d-flex justify-content-center">3</label>
                                <span class="material-icons-round d-flex justify-content-center">south</span>
                            </div>

                            <span class="material-icons-round">more_horiz</span>

                        </div>
                    </div>
                </section>
            </div> <!-- .pills-comments -->
            <div class="tab-pane fade" id="pills-bookmarked" role="tabpanel" aria-labelledby="pills-bookmarked-tab">
                <div class="news-card mb-3 p-4 rounded bg-white">
                    <header class="row news-card-header">
                        <div class="post-voting col-1 d-flex justify-content-center">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                </li>
                                <li>
                                    <span class="score d-flex justify-content-center" id="score">23.0k</span>
                                </li>
                                <li>
                                    <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <h6 class="post-topics">Topics: <a href="#">Gaming Gadgets</a>; <a href="#">Razer</a></h6>
                            <small class="post-user">Posted by <a href="./profile.php">kaka34</a></small>
                            <h4 class="post-title-smaller">Razer apresenta webcam Kiyo Pro</h4>
                        </div>
                    </header>
                    <div class="news-card-body">
                        <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                            style="max-height: 650px" src="https://via.placeholder.com/3840x2160">
                        <p class="card-text truncate-multiple">A Razer revelou a webcam Kiyo Pro. Com uma abrangência que vai para lá do mundo do gaming, tem no Sensor de Luz Adaptativo a sua principal novidade. Vivemos uma época marcada pelo teletrabalho. E isto veio o despertar um problema há muito dormente: a fraca qualidade das câmaras nos nossos computadores portáteis.</p>
                    </div>
                    <div class="row mt-4 news-card-options">
                        <div class="col d-flex justify-content-center blue-hover">
                            <span class="material-icons-outlined align-middle">mode_comment</span>
                            <span class="d-none d-md-block"> 321</span>
                        </div>
                        <div class="col d-flex justify-content-center blue-hover">
                            <span class="material-icons-outlined align-middle">bookmark_add</span>
                            <span class="d-none d-md-block"> Bookmark</span>
                        </div>
                        <div class="col d-flex justify-content-center red-hover">
                            <span class="material-icons-outlined align-middle">outlined_flag</span>
                            <span class="d-none d-md-block"> Report<span>
                        </div>
                    </div>
                </div> <!-- /.news-card -->
            </div> <!-- .pills-bookmarked -->
        </div> <!-- .tab-content -->
    </section>
    </div>
    </div>
    <?php } ?>