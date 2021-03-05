<?php function draw_mainpage() { ?>
  <div class="container">
    <div class="row justify-content-evenly mt-3">
      <div class="col-md-8">
        <section class = "profile_navigation">
          <ul class="nav nav-pills mb-1 justify-content-space-between bg-white rounded" id="pills-tab" role="tablist">
            <li class="nav-item col-4" role="presentation">
              <button class="nav-link active w-100" id="pills-feed-tab" data-bs-toggle="pill" data-bs-target="#pills-feed" type="button" role="tab" aria-controls="pills-feed" aria-selected="true">Feed</button>
            </li>
            <li class="nav-item col-4" role="presentation">
              <button class="nav-link w-100" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false">Trending</button>
            </li>
            <li class="nav-item col-4" role="presentation">
              <button class="nav-link w-100" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest" aria-selected="false">Latest</button>
            </li>
          </ul>

          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-feed" role="tabpanel" aria-labelledby="pills-feed-tab">
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
                    <h7 class="post-topics">Topics: <a href="#">Gaming Gadgets</a>; <a href="#">Razer</a></h7><br>
                    <small class="post-user pt-0">Posted by <a href="#">kaka34</a></small>
                    <h4 class="card-title">Razer apresenta webcam Kiyo Pro</h4>
                  </div>
                </div>
                <img class="rounded img-fluid img-responsive mx-auto my-3 d-block" src="https://i.imgur.com/ZKbpmaU.jpg">
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
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">*insert comments here</div>
          </div>
        </section>
      </div><!-- /.col-md-8 aka all-news-cards -->

      <div class="col-md-3 d-none d-md-block">
        <div class="row mb-3 p-3 bg-white rounded">
          <h4 class="fst-italic aside-title">Wall of Fame</h4>
          <ol class="ms-2 mb-0">
            <li class="mb-2">
              <p class="mb-0 blue-hover text-truncate" href="#">Legalt_of_Rivia</p>
              <p class="mb-0 text-truncate small-grey-text">5,758,783 Aura Score</p>
            </li>
            <li class="mb-2">
              <p class="mb-0 blue-hover text-truncate" href="#">GodGamerX</p>
              <p class="mb-0 text-truncate small-grey-text">3,214,158 Aura Score</p>
            </li>
            <li class="mb-2">
              <p class="mb-0 blue-hover text-truncate" href="#">GamingGolem</p>
              <p class="mb-0 text-truncate small-grey-text">3,143,985 Aura Score</p>
            </li>
            <li class="mb-2">
              <p class="mb-0 blue-hover text-truncate" href="#">EGirlKate</p>
              <p class="mb-0 text-truncate small-grey-text">2,221,354 Aura Score</p>
            </li>
            <li class="mb-2">
              <p class="mb-0 blue-hover text-truncate" href="#">TheGuru</p>
              <p class="mb-0 text-truncate small-grey-text">1,852,189 Aura Score</p>
            </li>
          </ol>
        </div> <!-- Wall of Fame -->

        <div class="row mb-3 p-3 bg-white rounded">
          <h4 class="fst-italic aside-title">Most Popular Topics</h4>
          <ol class="ms-2 mb-0">
            <li class="mb-2">
              <p class="mb-0 blue-hover text-truncate" href="#">League of Legends</p>
              <p class="mb-0 text-truncate small-grey-text">1,5M Followers</p>
            </li>
            <li class="mb-2">
              <p class="mb-0 blue-hover text-truncate" href="#">CS:GO</p>
              <p class="mb-0 text-truncate small-grey-text">1,2M Followers</p>
            </li>
            <li class="mb-2">
              <p class="mb-0 blue-hover text-truncate" href="#">MMORPG</p>
              <p class="mb-0 text-truncate small-grey-text">1,0M Followers</p>
            </li>
            <li class="mb-2">
              <p class="mb-0 blue-hover text-truncate" href="#">Fortnite</p>
              <p class="mb-0 text-truncate small-grey-text">971k Followers</p>
            </li>
            <li class="mb-2">
              <p class="mb-0 blue-hover text-truncate" href="#">Console Gaming</p>
              <p class="mb-0 text-truncate small-grey-text">923k Followers</p>
            </li>
          </ol>
        </div> <!-- Most Popular Topics -->
      </div><!-- /.col-md-4 aka aside -->
    </div><!-- /.row -->
  </div><!-- /.container -->
<?php } ?>
