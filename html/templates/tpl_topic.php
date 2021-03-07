<?php function draw_topic_page() { ?>
    <section class="container g-0 mx-auto mt-sm-4 col-lg-7">
        <header class="p-3 p-lg-5 mb-3 bg-white rounded" style="height:fit-content">
            <h3 class="mb-3 color-orange">Topic Page</h3>
            <section class="row g-0 align-items-center">
                <div class="col-md-10 col-8">
                    <div class="row g-0">
                        <img src="../assets/L_icon.svg" class = "rounded-circle col-2 px-0" alt="" style = "max-width: 100px">
                        <div class="col-10 px-3 my-auto d-flex flex-column">
                            <h3 class = "h2 fw-bold">League of Legends</h3>
                            <h5>1.5M followers</h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 col-4 d-flex justify-content-end">
                    <button type="button" class="following-button btn btn-outline-primary"></button>
                </div>
            </section>
        </header>

        <section class="pill-navigation mb-1">
            <ul class="nav nav-pills mb-1 justify-content-space-between bg-white rounded" id="pills-tab"
                role="tablist">
                <li class="nav-item col" role="presentation">
                    <button class="nav-link active w-100" id="pills-popular-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular"
                        aria-selected="false">Popular</button>
                </li>
                <li class="nav-item col" role="presentation">
                    <button class="nav-link w-100" id="pills-latest-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest"
                        aria-selected="false">Latest</button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                    <div class="news-card mb-3 p-4 rounded bg-white">
                        <div class="row news-card-header">
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
                        </div>
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
                </div> <!-- /#pills-popular -->
                <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
                    <div class="news-card mb-3 p-4 rounded bg-white">
                        <div class="row news-card-header">
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
                        </div>
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
                </div> <!-- /#pills-latest -->
            </div>
        </section>
    </section>
<?php } ?>
