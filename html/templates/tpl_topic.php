<?
    function draw_topic_page() {    
?>
    <section class = "p-3 p-lg-5 mt-4 col-lg-7 pb-1 container bg-white rounded" id = "topic_page" style = "height:fit-content">
            <h3 class="mb-4" >Topic Page</h3>
            <section class="row align-items-center">
                <img src="../assets/L_icon.svg" class = "rounded-circle col-2 px-0" alt="" style = "max-width: 100px">
                <div class=" col-md-7 col-10 ">
                    <h3 class = "h2 fw-bold">League of Legends</h3>
                    <h5>1.5M followers</h5>
                </div>

                <div class="col-md-3 col-12 d-flex justify-content-end mb-3">
                    <button type="button" class="following-button btn btn-outline-primary " id="follow_button"></button>
                </div>
            </section>
           
    </section>

    <section class = "topic_navigation mt-3 col-lg-7 px-0 container bg-white rounded">
        <ul class="nav nav-pills mb-1 justify-content-space-between bg-white rounded" id="pills-tab" role="tablist">
            <li class="nav-item col-6" role="presentation">
                <button class="nav-link active w-100" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-posts" aria-selected="true">Trending</button>
            </li>
            <li class="nav-item col-6" role="presentation">
                <button class="nav-link w-100" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-bookmarked" type="button" role="tab" aria-controls="pills-bookmarked" aria-selected="false">Latest</button>
            </li>
        </ul>

        <section class="tab-content ">
            <div class="tab-pane fade show active" id="pills-posts" role="tabpanel" aria-labelledby="pills-trending-tab">
                <div class="news-card mb-3 p-4 rounded bg-white">
                    <div class="row">
                    <div class="col-1 d-flex justify-content-center">
                        <ul class="list-unstyled">
                        <span class="material-icons-round d-flex justify-content-center" id = "upvote">north</span>
                        <span class="d-flex justify-content-center" id = "score">23.0k</span>
                        <span class="material-icons-round d-flex justify-content-center" id = "downvote">south</span>
                        </ul>
                    </div>
                    <div class="col">
                        <h7 class="post-topics">Topics: <a href="#">Gaming Gadgets</a>; <a href="#">League of Legends</a></h7><br>
                        <small class="post-user pt-0">Posted by <a href="#">kaka34</a></small>
                        <h4 class="card-title">Razer apresenta webcam Kiyo Pro</h4>
                    </div>
                    </div>
                    <img class="rounded img-fluid img-responsive mx-auto my-3 d-block" src="https://i.imgur.com/ZKbpmaU.jpg" alt="">
                    <p class="card-text truncate-multiple">A Razer revelou a webcam Kiyo Pro. Com uma abrangência que vai para lá do mundo do gaming, tem no Sensor de Luz Adaptativo a sua principal novidade. Vivemos uma época marcada pelo teletrabalho. E isto veio o despertar um problema há muito dormente: a fraca qualidade das câmaras nos nossos computadores portáteis.</p>
                    <div class="row mt-4">
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
            </div>
        </section>

        
    </section>

<? } ?>
