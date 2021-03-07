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

            <div class="tab-content " id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                    <div class="news-card mb-3 p-4 rounded bg-white">
                            <div class="row news-card-header">
                                <div class="post-voting col-1 d-flex justify-content-center">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                        </li>
                                        <li>
                                            <span class="score d-flex justify-content-center" id="score">37</span>
                                        </li>
                                        <li>
                                            <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="post-topics">Topics: <a href="../pages/topic.php">League of Legends</a></h6>
                                    <div class="d-inline">
                                      <small class="post-user">Posted by <a href="./profile.php">BrotherSena</a></small>
                                      <small>2 days ago</small>
                                    </div>
                                    <h4 class="post-title-smaller">Champion Spotlight de Viego, The Ruined King</h4>
                                </div>
                            </div>
                            <div class="news-card-body">
                                <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                                    style="max-height: 650px" src="https://s2.glbimg.com/zavTeT4iIiVKpefK-TWGsg0Tas0=/0x0:3840x2160/1000x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2021/U/5/cfZdJHSCiXpc23vCzYGg/58332729.jpg">
                                <p class="card-text truncate-multiple">
Viego vai-se estrear no lançamento do patch 11.2, que contará com vários Nerfs a personagens conhecidas como Akali e Maokai, e buffs a campeões como Shako e Varus.
Como não poderia deixar de ser, Viego contará com uma skin própria intitulada Lunar Beast Viego, e irá conceder a sua própria linha de skins, "Ruined", a começar por Shyvana, Draven e Karma.</p>
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
                            <div class="row news-card-header">
                                <div class="post-voting col-1 d-flex justify-content-center">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                        </li>
                                        <li>
                                            <span class="score d-flex justify-content-center" id="score">16</span>
                                        </li>
                                        <li>
                                            <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="post-topics">Topics: <a href="../pages/topic.php">League of Legends</a></h6>
                                    <div class="d-inline">
                                      <small class="post-user">Posted by <a href="./profile.php">WanWan</a></small>
                                      <small>2 days ago</small>
                                    </div>
                                    <h4 class="post-title-smaller">League of Legends: Global Positional Top Ten Players</h4>
                                </div>
                            </div>
                            <div class="news-card-body">
                                <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                                    style="max-height: 650px" src="https://images2.minutemediacdn.com/image/fetch/w_850,h_560,c_fill,g_auto,f_auto/https%3A%2F%2Fblogoflegends.com%2Ffiles%2F2021%2F03%2F50528170178_9de38412cc_k-850x560.jpg">
                                <p class="card-text truncate-multiple">
                                If you thought I wasn’t going to come back with another round of the top ten players by position just because of some controversy, think again. I’m not afraid to say that players like Alphari, Blaber, and CoreJJ are among the best in the world, even though they play in the “dregs” of the LCS.To be clear, these lists of the top ten players are not going into who are the most talented players but who are the best performing. We’re attempting to compare their key statistical outputs (KDA, GPM, estimated damage differential, and matchup-adjusted gold+XP difference at 15) because they have been among the most reliable indicators of success both individually and for their team.</p>
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
                            <div class="row news-card-header">
                                <div class="post-voting col-1 d-flex justify-content-center">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                        </li>
                                        <li>
                                            <span class="score d-flex justify-content-center" id="score">41</span>
                                        </li>
                                        <li>
                                            <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="post-topics">Topics: <a href="../pages/topic.php">League of Legends</a>; <a href="#">Esports</a></h6>
                                    <div class="d-inline">
                                      <small class="post-user">Posted by <a href="./profile.php">El_Biden</a></small>
                                      <small>2 weeks ago</small>
                                    </div>
                                    <h4 class="post-title-smaller">Mid-Season Invitational returns for 2021 in Reykjavík, Iceland</h4>
                                </div>
                            </div>
                            <div class="news-card-body">
                                <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                                    style="max-height: 650px" src="https://www.dailyesports.gg/wp-content/uploads/2021/03/MSI-Iceland-800x400.jpg">
                                <p class="card-text truncate-multiple">
                                Riot Games has announced that the League of Legends Mid-Season Invitational will take place in Reykjavík, Iceland starting on May 6.
The Mid-Season Invitational (MSI) pits the Spring Split champions from each global region against each other to determine the best in the world at that point in the season. MSI serves as the counterpart to the World Championship in terms of international events, and seven different countries have hosted the tournament since it first took place in 2015. The event was cancelled in 2020 due to the COVID-19 pandemic.</p>
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
                                        <span class="score d-flex justify-content-center" id="score">12</span>
                                    </li>
                                    <li>
                                        <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col">
                                <h6 class="post-topics">Topics: <a href="../pages/topic.php">League of Legends</a></h6>
                                <div class="d-inline">
                                    <small class="post-user">Posted by <a href="./profile.php">Legalt_of_Rivia</a></small>
                                    <small>17 hours ago</small>
                                </div>
                                <h4 class="post-title-smaller">League of Legends patch 11.6 PBE updates introduce new Battle Academia skins</h4>
                            </div>
                        </div>
                        <div class="news-card-body">
                            <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                                style="max-height: 650px" src="https://staticg.sportskeeda.com/editor/2021/03/83328-16150422444954-800.jpg">
                            <p class="card-text truncate-multiple">
                            League of Legends' patch 11.6 has hit the PBE, and its notes reveal the introduction of a bunch of new cosmetics and visuals for five champions.

League of Legends fans got a first glance at the new Battle Academia skins for Caitlyn, Wukong, Garen, Yone, and Leona in the PBE preview. All the skins follow a similar theme - that of a futuristic school, teaching its students to fend for themselves. The champions' clothing consists of ties, uniforms, and knit sweaters, all of which reflect their days of training.</p>
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
                            <div class="row news-card-header">
                                <div class="post-voting col-1 d-flex justify-content-center">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                        </li>
                                        <li>
                                            <span class="score d-flex justify-content-center" id="score">37</span>
                                        </li>
                                        <li>
                                            <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="post-topics">Topics: <a href="../pages/topic.php">League of Legends</a></h6>
                                    <div class="d-inline">
                                      <small class="post-user">Posted by <a href="./profile.php">BrotherSena</a></small>
                                      <small>2 days ago</small>
                                    </div>
                                    <h4 class="post-title-smaller">Champion Spotlight de Viego, The Ruined King</h4>
                                </div>
                            </div>
                            <div class="news-card-body">
                                <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                                    style="max-height: 650px" src="https://s2.glbimg.com/zavTeT4iIiVKpefK-TWGsg0Tas0=/0x0:3840x2160/1000x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2021/U/5/cfZdJHSCiXpc23vCzYGg/58332729.jpg">
                                <p class="card-text truncate-multiple">
Viego vai-se estrear no lançamento do patch 11.2, que contará com vários Nerfs a personagens conhecidas como Akali e Maokai, e buffs a campeões como Shako e Varus.
Como não poderia deixar de ser, Viego contará com uma skin própria intitulada Lunar Beast Viego, e irá conceder a sua própria linha de skins, "Ruined", a começar por Shyvana, Draven e Karma.</p>
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
                            <div class="row news-card-header">
                                <div class="post-voting col-1 d-flex justify-content-center">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                        </li>
                                        <li>
                                            <span class="score d-flex justify-content-center" id="score">16</span>
                                        </li>
                                        <li>
                                            <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="post-topics">Topics: <a href="../pages/topic.php">League of Legends</a></h6>
                                    <div class="d-inline">
                                      <small class="post-user">Posted by <a href="./profile.php">kaka34</a></small>
                                      <small>2 days ago</small>
                                    </div>
                                    <h4 class="post-title-smaller">League of Legends: Global Positional Top Ten Players</h4>
                                </div>
                            </div>
                            <div class="news-card-body">
                                <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                                    style="max-height: 650px" src="https://images2.minutemediacdn.com/image/fetch/w_850,h_560,c_fill,g_auto,f_auto/https%3A%2F%2Fblogoflegends.com%2Ffiles%2F2021%2F03%2F50528170178_9de38412cc_k-850x560.jpg">
                                <p class="card-text truncate-multiple">
                                If you thought I wasn’t going to come back with another round of the top ten players by position just because of some controversy, think again. I’m not afraid to say that players like Alphari, Blaber, and CoreJJ are among the best in the world, even though they play in the “dregs” of the LCS.To be clear, these lists of the top ten players are not going into who are the most talented players but who are the best performing. We’re attempting to compare their key statistical outputs (KDA, GPM, estimated damage differential, and matchup-adjusted gold+XP difference at 15) because they have been among the most reliable indicators of success both individually and for their team.</p>
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
