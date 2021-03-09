<?php function draw_admin_page() { ?>
<section class="container g-0 mx-auto my-4 col-lg-7">
    <header class="p-3 p-lg-5 mb-3 bg-white rounded">
        <h2 class="h2 fw-bold">Administration Area</h2>
        <hr class="rounded">
        </hr>

        <div class="row align-items-center mt-5">
            <img src="../assets/avatar5.png" class="rounded-circle col-2 px-0" alt="" style="max-width: 100px">
            <div class="col-10 mt-3">
                <h3 class="h3 fw-bold">Admin9218</h3>
                <p>In this area you can delete content that is misleading and abusive.</p>

            </div>

            <div class="col-12 mt-5">
                <p class="text-center">Reported Accounts and Content by Gameorama members:</p>
            </div>
        </div>
    </header>

    <section class="pill-navigation mb-1">
        <ul class="nav nav-pills mb-1 justify-content-space-between bg-white rounded" id="pills-tab" role="tablist">
            <li class="nav-item col-3" role="presentation">
                <button class="nav-link active w-100 text-center" id="pills-posts-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-reported-posts" type="button" role="tab" aria-controls="pills-reported_posts"
                    aria-selected="true">Posts</button>
            </li>
            <li class="nav-item col-3" role="presentation">
                <button class="nav-link w-100 text-center overflow-hidden" id="pills-comments-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-reported-comments" type="button" role="tab" aria-controls="pills-comments"
                    aria-selected="false">Comments</button>
            </li>
            <li class="nav-item col-3" role="presentation">
                <button class="nav-link w-100 text-center" id="pills-topics-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-reported-topics" type="button" role="tab" aria-controls="pills-topics"
                    aria-selected="true">Topics</button>
            </li>
            <li class="nav-item col-3" role="presentation">
                <button class="nav-link w-100 text-center" id="pills-users-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-reported-users" type="button" role="tab" aria-controls="pills-users"
                    aria-selected="false">Users</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-reported-posts" role="tabpanel"
                aria-labelledby="pills-posts-tab">
                <div class="news-card mb-3 p-4 rounded bg-white">
                    <header class="row news-card-header">
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
                    <div class="row mt-4">
                        <hr class="admin_hr">

                        <div class="d-flex justify-content-between">
                            <h4 class="text-danger">10 Reports</h4>
                            <span class="material-icons-round">more_horiz</span>
                        </div>
                    </div>
                </div> <!-- /.news-card -->
            </div>


            <div class="tab-pane fade show" id="pills-reported-comments" role="tabpanel"
                aria-labelledby="pills-comments-tab">
                <section class="bg-white rounded p-4">
                    <div class="row p-3 g-0 mb-3 rounded border">
                        <header class="d-flex justify-content-between">
                            <h5 class="font-weight-bold">on "<a href="../pages/post.php">Razer apresenta webcam Kiyo
                                    Pro</a>"</h5>
                            <small style="color: darkgray;">35 minutes ago</small>
                        </header>

                        <p>Parece um ótimo produto!</p>

                        <hr class="admin_hr mt-2">
                        <div class="d-flex justify-content-between">
                            <h4 class="text-danger">10 Reports</h4>
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

                        <hr class="admin_hr mt-2">
                        <div class="d-flex justify-content-between">
                            <h4 class="text-danger">5 Reports</h4>
                            <span class="material-icons-round">more_horiz</span>
                        </div>
                    </div>
                </section>
            </div>


            <div class="tab-pane fade show" id="pills-reported-topics" role="tabpanel"
                aria-labelledby="pills-topics-tab">
                <section class="bg-white rounded p-4">
                    <div class="row p-3 g-0 mb-3 rounded border">
                        <div class="row align-items-center">
                            <img src="../assets/L_icon.svg" alt="" class="col-2 flex-shrink-0 rounded-circle"
                                style="width:90px;height:auto;">
                            <div class="col-md-10 col-8 d-flex">
                                <div>
                                    <h4><a href="../pages/topic.php">League of Legends</a></h4>
                                    <p class="h6 fw-normal">1,5M Followers</p>
                                </div>
                            </div>
                        </div>
                        <hr class="admin_hr mt-3">

                        <div class="d-flex justify-content-between">
                            <h4 class="text-danger">5 Reports</h4>
                            <span class="material-icons-round">more_horiz</span>
                        </div>
                    </div>

                    <div class="row p-3 g-0 rounded border">
                        <div class="row align-items-center">
                            <img src="../assets/L_icon.svg" alt="" class="col-2 flex-shrink-0 rounded-circle"
                                style="width:90px;height:auto;">
                            <div class="col-md-10 col-8 d-flex">
                                <div>
                                    <h4><a href="../pages/topic.php">Lego Starwars</a></h4>
                                    <p class="h6 fw-normal">135k Followers</p>
                                </div>
                            </div>
                        </div>
                        <hr class="admin_hr mt-3">

                        <div class="d-flex justify-content-between">
                            <h4 class="text-danger">2 Reports</h4>
                            <span class="material-icons-round">more_horiz</span>
                        </div>
                    </div>
                </section>
            </div>


            <div class="tab-pane fade show" id="pills-reported-users" role="tabpanel" aria-labelledby="pills-users-tab">
                <section class="bg-white rounded p-4">
                    <div class="row p-3 g-0 mb-3 rounded border">
                        <div class="row align-items-center">
                            <img src="../assets/avatar4.png" alt="" class="col-2 flex-shrink-0 rounded-circle"
                                style="width:90px;height:auto;">
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
                        <hr class="admin_hr mt-3">

                        <div class="d-flex justify-content-between">
                            <h4 class="text-danger">5 Reports</h4>
                            <span class="material-icons-round">more_horiz</span>
                        </div>
                    </div>

                    <div class="row p-3 g-0 rounded border">
                        <div class="row align-items-center">
                            <img src="../assets/avatar1.png" alt="" class="col-2 flex-shrink-0 rounded-circle"
                                style="width:90px;height:auto;">
                            <div class="col justify-content-between">
                                <div>
                                    <h4><a href="../pages/profile.php">kaka34</a></h4>
                                    <div class="row">
                                        <h6 class="col-12 col-sm-6">8,5k Followers</h6>
                                        <h6 class="col-12 col-sm-6">10,535 Aura Score</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="admin_hr mt-3">

                        <div class="d-flex justify-content-between">
                            <h4 class="text-danger">2 Reports</h4>
                            <span class="material-icons-round">more_horiz</span>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<?php } ?>