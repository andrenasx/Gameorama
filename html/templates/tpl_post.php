<?php function draw_post() { ?>
<section class="container bg-white g-0 mx-auto my-4 col-lg-7">
    <section class="news-card mb-3 p-4 rounded bg-white">
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
                        <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                    </li>
                </ul>
            </div>
            <div class="col">
                <h5 class="post-topics">Topics: <a href="#">Gaming Gadgets</a>; <a href="#">Razer</a></h5>
                <div class="d-inline">
                    <small class="post-user">Posted by <a href="./profile.php">kaka34</a></small>
                    <small>45 minutes ago</small>
                </div>
                <h1 class="post-title">Razer apresenta webcam Kiyo Pro</h1>
            </div>
        </header>
        <div class="news-card-body">
            <div id="myCarousel" class="offset-lg-1 mb-5 col-lg-10 carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://assets2.razerzone.com/images/pnx.assets/b6873991d1d643906221aa99f822a195/razer-kiyo-usp-synapse-3-mobile.jpg" alt="">
                </div>
                <div class="carousel-item">
                    <img src="https://assets2.razerzone.com/images/pnx.assets/fb10f4852b6142d195b24f0299f0e65d/768x460-kiyopro-hero-mobile.jpg" alt="">
                </div>
                <div class="carousel-item">
                    <img src="https://cdn.mos.cms.futurecdn.net/K6Ccm5f2sgpfZaRcQZwAAC-970-80.jpg.webp" alt="">
                </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
            <p class="card-text mx-5">A Razer revelou a webcam Kiyo Pro. Com uma abrangência que vai para lá do mundo do gaming, tem no Sensor de Luz Adaptativo a sua principal novidade. Vivemos uma época marcada pelo teletrabalho. E isto veio o despertar um problema há muito dormente: a fraca qualidade das câmaras nos nossos computadores portáteis.</p>
        </div>
        <div class="row mt-4 news-card-options">
            <div class="col d-flex justify-content-center blue-hover">
                <span class="material-icons-outlined align-middle me-1">mode_comment</span>
                <span class="d-none d-md-block"> 321</span>
            </div>
            <div class="col d-flex justify-content-center blue-hover">
                <span class="material-icons-outlined align-middle me-1">bookmark_add</span>
                <span class="d-none d-md-block"> Bookmark</span>
            </div>
            <div class="col d-flex justify-content-center red-hover">
                <span class="material-icons-outlined align-middle me-1">outlined_flag</span>
                <span class="d-none d-md-block"> Report<span>
            </div>
        </div>
    </section> <!-- /.news-card -->

    

    <section class="comments p-2 px-sm-4 mt-5 bg-white">
        <section class="row g-0 mb-4">
            <div class="md-form amber-textarea active-amber-textarea px-0 ">
                <textarea class="form-control" name="comment" rows="4" placeholder="Leave a comment"></textarea>
                <button type="button" class="btn btn-primary mt-2 float-end">Add Comment</button>
            </div>
        </section>

        <!-- comment -->
        <div class = "row g-0 border rounded">
            <div class = "d-flex p-4">
                <img src="../assets/avatar1.png" class = "flex-shrink-0 rounded-circle" style="width:60px;height:60px;" alt="">
                <div class = "ms-2 col-lg-11">
                    <div class = "row justify-content-between g-0">
                        <h4 class="col">kaka34</h4>
                        <small class="col text-end" style = "color: darkgray;">2 hours ago</small>
                    </div>
                    
                    <p>Gostei muito desta câmara. É uma excelente opção para quem usa o Zoom para trabalhar.</p>

                    <div class="row mt-4">
                        <div class = "col d-flex justify-content-center post-voting">
                            <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                            <label class = "score d-flex justify-content-center">1178</label>
                            <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                        </div>
                        <div class="col d-flex justify-content-center blue-hover">
                            <span class="material-icons-outlined align-middle me-1">mode_comment</span>
                            <span class="d-none d-md-block"> Reply</span>
                        </div>
                        <div class="col d-flex justify-content-center red-hover">
                            <span class="material-icons-outlined align-middle me-1">outlined_flag</span>
                            <span class="d-none d-md-block"> Report<span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- reply -->
        <div class = "row g-0 offset-1 border rounded">
            <div class = "d-flex p-4">
                <img src="../assets/avatar2.png" class = "flex-shrink-0 rounded-circle" style="width:60px;height:60px;" alt="">
                <div class = "ms-2 col-lg-11">
                    <div class = "row justify-content-between g-0">
                        <h4 class="col">WanWan</h4>
                        <small class="col text-end" style = "color: darkgray;">35 minutes ago</small>
                    </div>
                    
                    <p>Tenho o modelo anterior e gostaria de saber se vale a pena o upgrade.</p>

                    <div class="row mt-4">
                        <div class = "col d-flex justify-content-center post-voting">
                            <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                            <label class = "score d-flex justify-content-center">101</label>
                            <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                        </div>
                        <div class="col d-flex justify-content-center blue-hover">
                            <span class="material-icons-outlined align-middle me-1">mode_comment</span>
                            <span class="d-none d-md-block"> Reply</span>
                        </div>
                        <div class="col d-flex justify-content-center red-hover">
                            <span class="material-icons-outlined align-middle me-1">outlined_flag</span>
                            <span class="d-none d-md-block"> Report<span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- comment -->
        <div class = "row g-0 mt-3 border rounded">
            <div class = "d-flex p-4">
                <img src="../assets/avatar3.png" class = "flex-shrink-0 rounded-circle" style="width:60px;height:60px;" alt="">
                <div class = "ms-2 col-lg-11">
                    <div class = "row justify-content-between g-0">
                        <h4 class="col">El_biden</h4>
                        <small class="col text-end" style = "color: darkgray;">1 day ago</small>
                    </div>
                    
                    <p>Essa webcam permite 1080p 60fps?</p>

                    <div class="row mt-4">
                        <div class = "col d-flex justify-content-center post-voting">
                            <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                            <label class = "score d-flex justify-content-center">57</label>
                            <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                        </div>
                        <div class="col d-flex justify-content-center blue-hover">
                            <span class="material-icons-outlined align-middle me-1">mode_comment</span>
                            <span class="d-none d-md-block"> Reply</span>
                        </div>
                        <div class="col d-flex justify-content-center red-hover">
                            <span class="material-icons-outlined align-middle me-1">outlined_flag</span>
                            <span class="d-none d-md-block"> Report<span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
    <script src="../js/voting.js"></script>
<?php } ?>