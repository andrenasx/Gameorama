<?php function draw_mainpage() { ?>
<section class="mainpage-container container mt-sm-4 col-lg-8 px-0 mt-md-4">
    <div class="row justify-content-evenly g-0">
        <section class="all-news-cards col-md-8">
            <section class="pill-navigation">
                <ul class="nav nav-pills mb-1 justify-content-space-between bg-white rounded" id="pills-tab"
                    role="tablist">
                    <li class="nav-item col-4" role="presentation">
                        <button class="nav-link active w-100" id="pills-feed-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-feed" type="button" role="tab" aria-controls="pills-feed"
                            aria-selected="true">Feed</button>
                    </li>
                    <li class="nav-item col-4" role="presentation">
                        <button class="nav-link w-100" id="pills-trending-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending"
                            aria-selected="false">Trending</button>
                    </li>
                    <li class="nav-item col-4" role="presentation">
                        <button class="nav-link w-100" id="pills-latest-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest"
                            aria-selected="false">Latest</button>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-feed" role="tabpanel" aria-labelledby="pills-feed-tab">
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
                                            <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="post-topics">Topics: <a href="../pages/topic.php">Gaming Gadgets</a>; <a href="../pages/topic.php">Razer</a></h6>
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
                                    <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                                        style="max-height: 650px" src="https://assets2.razerzone.com/images/pnx.assets/b6873991d1d643906221aa99f822a195/razer-kiyo-usp-synapse-3-mobile.jpg">
                                    <p class="card-text truncate-multiple">A Razer revelou a webcam Kiyo Pro. Com uma abrangência que vai para lá do mundo do gaming, tem no Sensor de Luz Adaptativo a sua principal novidade. Vivemos uma época marcada pelo teletrabalho. E isto veio o despertar um problema há muito dormente: a fraca qualidade das câmaras nos nossos computadores portáteis.</p>
                                </a>
                            </div>
                            <div class="row mt-4 news-card-options">
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1">mode_comment</span>
                                    <span class="d-none d-md-block"> 321</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1">bookmark_add</span>
                                    <span class="d-none d-md-block"> Bookmark</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-red">
                                    <span class="material-icons-outlined align-middle me-1">flag</span>
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
                                            <span class="score d-flex justify-content-center" id="score">18</span>
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
                                      <small>2 hours ago</small>
                                    </div>
                                    <h4 class="post-title-smaller">
                                        <a href="../pages/post.php" class="black-a">Champion Spotlight de Viego, The Ruined King</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="news-card-body">
                                <a href="../pages/post.php" class="black-a">
                                    <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                                        style="max-height: 650px" src="https://s2.glbimg.com/zavTeT4iIiVKpefK-TWGsg0Tas0=/0x0:3840x2160/1000x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2021/U/5/cfZdJHSCiXpc23vCzYGg/58332729.jpg">
                                    <p class="card-text truncate-multiple">
Viego vai-se estrear no lançamento do patch 11.2, que contará com vários Nerfs a personagens conhecidas como Akali e Maokai, e buffs a campeões como Shako e Varus. 
Como não poderia deixar de ser, Viego contará com uma skin própria intitulada Lunar Beast Viego, e irá conceder a sua própria linha de skins, "Ruined", a começar por Shyvana, Draven e Karma.</p>
                                </a>
                            </div>
                            <div class="row mt-4 news-card-options">
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1 ">mode_comment</span>
                                    <span class="d-none d-md-block"> 321</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1 ">bookmark_add</span>
                                    <span class="d-none d-md-block"> Bookmark</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-red">
                                    <span class="material-icons-outlined align-middle me-1">flag</span>
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
                                    <span class="d-none d-md-block"> 321</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1">bookmark_add</span>
                                    <span class="d-none d-md-block"> Bookmark</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-red">
                                    <span class="material-icons-outlined align-middle me-1">flag</span>
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
                                            <span class="score d-flex justify-content-center" id="score">78</span>
                                        </li>
                                        <li>
                                            <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="post-topics">Topics: <a href="../pages/topic.php">The Last of Us</a>; <a href="../pages/topic.php">The Witcher 3</a></h6>
                                    <div class="d-inline">
                                      <small class="post-user">Posted by <a href="./profile.php">BrotherSena</a></small>
                                      <small>12 hours ago</small>
                                    </div>
                                    <h4 class="post-title-smaller">
                                        <a href="../pages/post.php" class="black-a">The Last of Us 2 ultrapassa The Witcher 3 e é o jogo mais galardoado de sempre</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="news-card-body">
                                <a href="../pages/post.php" class="black-a">
                                    <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                                        style="max-height: 650px" src="https://sm.ign.com/ign_pt/screenshot/default/3_cabx.jpg">
                                    <p class="card-text truncate-multiple">
O mais recente título da Naughty Dog, The Last of Us - Part II, alcançou o título de jogo mais galardoado de sempre, sucedendo assim a The Witcher 3: Wild Hunt.
Esta informação é avançada pelo site Game Awards, que assinala que The Last of Us 2, o vencedor da categoria de Jogo do Ano do The Game Awards, alcançou um total de 261 prémios (até agora), ultrapassando assim os 260 alcançados pelo título de 2015 da CD Projekt Red.</p>
                                </a>
                            </div>
                            <div class="row mt-4 news-card-options">
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1">mode_comment</span>
                                    <span class="d-none d-md-block"> 321</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1">bookmark_add</span>
                                    <span class="d-none d-md-block"> Bookmark</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-red">
                                    <span class="material-icons-outlined align-middle me-1">flag</span>
                                    <span class="d-none d-md-block"> Report<span>
                                </div>
                            </div>
                        </div> <!-- /.news-card -->
                    </div> <!-- /#pills-feed -->
                    <div class="tab-pane fade" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
                        <div class="news-card mb-3 p-4 rounded bg-white">
                            <div class="row news-card-header">
                                <div class="post-voting col-1 d-flex justify-content-center">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                        </li>
                                        <li>
                                            <span class="score d-flex justify-content-center" id="score">78</span>
                                        </li>
                                        <li>
                                            <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="post-topics">Topics: <a href="../pages/topic.php">The Last of Us</a>; <a href="../pages/topic.php">The Witcher 3</a></h6>
                                    <div class="d-inline">
                                      <small class="post-user">Posted by <a href="./profile.php">BrotherSena</a></small>
                                      <small>12 hours ago</small>
                                    </div>
                                    <h4 class="post-title-smaller">
                                        <a href="../pages/post.php" class="black-a">The Last of Us 2 ultrapassa The Witcher 3 e é o jogo mais galardoado de sempre</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="news-card-body">
                                <a href="../pages/post.php" class="black-a">
                                    <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                                        style="max-height: 650px" src="https://sm.ign.com/ign_pt/screenshot/default/3_cabx.jpg">
                                    <p class="card-text truncate-multiple">
O mais recente título da Naughty Dog, The Last of Us - Part II, alcançou o título de jogo mais galardoado de sempre, sucedendo assim a The Witcher 3: Wild Hunt.
Esta informação é avançada pelo site Game Awards, que assinala que The Last of Us 2, o vencedor da categoria de Jogo do Ano do The Game Awards, alcançou um total de 261 prémios (até agora), ultrapassando assim os 260 alcançados pelo título de 2015 da CD Projekt Red.</p>
                                </a>
                            </div>
                            <div class="row mt-4 news-card-options">
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1">mode_comment</span>
                                    <span class="d-none d-md-block"> 321</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1">bookmark_add</span>
                                    <span class="d-none d-md-block"> Bookmark</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-red">
                                    <span class="material-icons-outlined align-middle me-1">flag</span>
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
                                            <span class="score d-flex justify-content-center" id="score">143</span>
                                        </li>
                                        <li>
                                            <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="post-topics">Topics: <a href="../pages/topic.php">GTA Online</a>; <a href="../pages/topic.php">GTA 5</a></h6>
                                    <div class="d-inline">
                                      <small class="post-user">Posted by <a href="./profile.php">WanWan</a></small>
                                      <small>3 days ago</small>
                                    </div>
                                    <h4 class="post-title-smaller">
                                        <a href="../pages/post.php" class="black-a">O maior segredo de GTA 5 foi descoberto!</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="news-card-body">
                                <a href="../pages/post.php" class="black-a">
                                    <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                                        style="max-height: 650px" src="https://i1.wp.com/viciados.net/wp-content/uploads/2020/06/GTA-5-PlayStation-5-Rockstar-Games-Sony-2020.jpg">
                                    <p class="card-text truncate-multiple">A franquia estrela da Rockstar, Grand Theft Auto, é das mais acarinhadas e desejadas pelo público. Prova disso é ainda hoje podermos contar com novidades por parte da Take-Two que, querendo corresponder às expectativas dos fãs, aborda temas como a possível produção de um GTA 6 ou remasterização de anteriores jogos de sucesso.</p>
                                </a>
                            </div>
                            <div class="row mt-4 news-card-options">
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1">mode_comment</span>
                                    <span class="d-none d-md-block"> 321</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1">bookmark_add</span>
                                    <span class="d-none d-md-block"> Bookmark</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-red">
                                    <span class="material-icons-outlined align-middle me-1">flag</span>
                                    <span class="d-none d-md-block"> Report<span>
                                </div>
                            </div>
                        </div> <!-- /news-card-->

                    <div class="news-card mb-3 p-4 rounded bg-white">
                            <div class="row news-card-header">
                                <div class="post-voting col-1 d-flex justify-content-center">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                        </li>
                                        <li>
                                            <span class="score d-flex justify-content-center" id="score">115</span>
                                        </li>
                                        <li>
                                            <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="post-topics">Topics: <a href="../pages/topic.php">Cyberpunk 2077</a></h6>
                                    <div class="d-inline">
                                      <small class="post-user">Posted by <a href="./profile.php">kaka34</a></small>
                                      <small>1 week ago</small>
                                    </div>
                                    <h4 class="post-title-smaller">
                                        <a href="../pages/post.php" class="black-a">Cyberpunk 2077 corrige vulnerabilidade de segurança</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="news-card-body">
                                <a href="../pages/post.php" class="black-a">
                                    <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                                        style="max-height: 650px" src="https://www.gruponerd.com.br/wp-content/uploads/2020/12/cyberpunk-2077-3.jpg">
                                    <p class="card-text truncate-multiple">A CD Projekt Red lançou uma atualização que corrige a falha de vulnerabilidade que colocava em risco a segurança dos jogadores que usam mods no jogo. A atualização foi anunciada através do Twitter e já está disponível para PC, corrigindo dois elementos que podiam ser potencialmente utilizados para ativar ficheiros prejudiciais escondidos dentro de mods.</p>
                                </a>
                            </div>
                            <div class="row mt-4 news-card-options">
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1">mode_comment</span>
                                    <span class="d-none d-md-block"> 321</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1">bookmark_add</span>
                                    <span class="d-none d-md-block"> Bookmark</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-red">
                                    <span class="material-icons-outlined align-middle me-1">flag</span>
                                    <span class="d-none d-md-block"> Report<span>
                                </div>
                            </div>
                        </div> <!-- /news-card-->

                        <div class="news-card mb-3 p-4 rounded bg-white">
                            <div class="row news-card-header">
                                <div class="post-voting col-1 d-flex justify-content-center">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                        </li>
                                        <li>
                                            <span class="score d-flex justify-content-center" id="score">232</span>
                                        </li>
                                        <li>
                                            <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="post-topics">Topics: <a href="../pages/topic.php">Console Gaming</a>; <a href="../pages/topic.php">Playstation</a></h6>
                                    <div class="d-inline">
                                      <small class="post-user">Posted by <a href="./profile.php">El_Biden</a></small>
                                      <small>3 months ago</small>
                                    </div>
                                    <h4 class="post-title-smaller">
                                        <a href="../pages/post.php" class="black-a">PlayStation 5 chega a Portugal</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="news-card-body">
                                <a href="../pages/post.php" class="black-a">
                                    <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                                        style="max-height: 650px" src="https://s2.glbimg.com/qvF_gY9F8OfCSZb3GhzlCXiCQRc=/0x0:1896x1055/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2020/2/v/p7gY9qQxGgSJTjOuhJ7A/ps5-the-squad-foto.jpg">
                                    <p class="card-text truncate-multiple">A PlayStation 5 estará disponível em Portugal a partir do dia 19 de novembro em duas versões, uma normal (€499) e outra sem o leitor de Blu-ray (€399). Não existem diferenças de especificações entre elas, uma é dedicada àqueles que abraçaram em definitivo o mundo digital, enquanto outra serve os que não abdicam do formato físico para adornar as prateleira com os seus jogos favoritos, graças à drive ótica preparada para os Ultra HD Blu-ray de até 100GB.</p>
                                </a>
                            </div>
                            <div class="row mt-4 news-card-options">
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1">mode_comment</span>
                                    <span class="d-none d-md-block"> 321</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1">bookmark_add</span>
                                    <span class="d-none d-md-block"> Bookmark</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-red">
                                    <span class="material-icons-outlined align-middle me-1">flag</span>
                                    <span class="d-none d-md-block"> Report<span>
                                </div>
                            </div>
                        </div> <!-- /news-card-->
                    </div> <!-- /#pills-trending -->
                    <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
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
                                            <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="post-topics">Topics: <a href="../pages/topic.php">Gaming Gadgets</a>; <a href="../pages/topic.php">Razer</a></h6>
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
                                    <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                                        style="max-height: 650px" src="https://assets2.razerzone.com/images/pnx.assets/b6873991d1d643906221aa99f822a195/razer-kiyo-usp-synapse-3-mobile.jpg">
                                    <p class="card-text truncate-multiple">A Razer revelou a webcam Kiyo Pro. Com uma abrangência que vai para lá do mundo do gaming, tem no Sensor de Luz Adaptativo a sua principal novidade. Vivemos uma época marcada pelo teletrabalho. E isto veio o despertar um problema há muito dormente: a fraca qualidade das câmaras nos nossos computadores portáteis.</p>
                                </a>
                            </div>
                            <div class="row mt-4 news-card-options">
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1">mode_comment</span>
                                    <span class="d-none d-md-block"> 321</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1">bookmark_add</span>
                                    <span class="d-none d-md-block"> Bookmark</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-red">
                                    <span class="material-icons-outlined align-middle me-1">flag</span>
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
                                            <span class="score d-flex justify-content-center" id="score">18</span>
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
                                      <small>2 hours ago</small>
                                    </div>
                                    <h4 class="post-title-smaller">
                                        <a href="../pages/post.php" class="black-a">Champion Spotlight de Viego, The Ruined King</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="news-card-body">
                                <a href="../pages/post.php" class="black-a">
                                    <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                                        style="max-height: 650px" src="https://s2.glbimg.com/zavTeT4iIiVKpefK-TWGsg0Tas0=/0x0:3840x2160/1000x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2021/U/5/cfZdJHSCiXpc23vCzYGg/58332729.jpg">
                                    <p class="card-text truncate-multiple">
Viego vai-se estrear no lançamento do patch 11.2, que contará com vários Nerfs a personagens conhecidas como Akali e Maokai, e buffs a campeões como Shako e Varus. 
Como não poderia deixar de ser, Viego contará com uma skin própria intitulada Lunar Beast Viego, e irá conceder a sua própria linha de skins, "Ruined", a começar por Shyvana, Draven e Karma.</p>
                                </a>
                            </div>
                            <div class="row mt-4 news-card-options">
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1">mode_comment</span>
                                    <span class="d-none d-md-block"> 321</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1">bookmark_add</span>
                                    <span class="d-none d-md-block"> Bookmark</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-red">
                                    <span class="material-icons-outlined align-middle me-1">flag</span>
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
                                    <span class="d-none d-md-block"> 321</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-blue">
                                    <span class="material-icons-outlined align-middle me-1">bookmark_add</span>
                                    <span class="d-none d-md-block"> Bookmark</span>
                                </div>
                                <div class="col d-flex justify-content-center btn-outline-red">
                                    <span class="material-icons-outlined align-middle me-1">flag</span>
                                    <span class="d-none d-md-block"> Report<span>
                                </div>
                            </div>
                        </div> <!-- /.news-card -->
                    </div> <!-- /#pills-latest -->
                </div>
            </section>
        </section><!-- /.col-md-8 aka all-news-cards -->

        <aside class="col-md-3 d-none d-md-block">
            <div class="row mb-3 p-3 bg-white rounded">
                <h4 class="aside-title fw-bold px-1">Wall of Fame</h4>
                <ol class="ms-2 mb-0">
                    <li class="mb-2">
                        <p class="mb-0 blue-hover text-truncate"><a href="../pages/profile.php">Legalt_of_Rivia</a></p>
                        <p class="mb-0 text-truncate small-grey-text">5,758,783 Aura Score</p>
                    </li>
                    <li class="mb-2">
                        <p class="mb-0 blue-hover text-truncate"><a href="../pages/profile.php">GodGamerX</a></p>
                        <p class="mb-0 text-truncate small-grey-text">3,214,158 Aura Score</p>
                    </li>
                    <li class="mb-2">
                        <p class="mb-0 blue-hover text-truncate"><a href="../pages/profile.php">GamingGolem</a></p>
                        <p class="mb-0 text-truncate small-grey-text">3,143,985 Aura Score</p>
                    </li>
                    <li class="mb-2">
                        <p class="mb-0 blue-hover text-truncate"><a href="../pages/profile.php">EGirlKate</a></p>
                        <p class="mb-0 text-truncate small-grey-text">2,221,354 Aura Score</p>
                    </li>
                    <li class="mb-2">
                        <p class="mb-0 blue-hover text-truncate"><a href="../pages/profile.php">TheGuru</a></p>
                        <p class="mb-0 text-truncate small-grey-text">1,852,189 Aura Score</p>
                    </li>
                </ol>
            </div> <!-- Wall of Fame -->

            <div class="row mb-3 p-3 bg-white rounded">
                <h4 class="aside-title fw-bold px-1">Most Popular Topics</h3>
                    <ol class="ms-2 mb-0">
                        <li class="mb-2">
                            <p class="mb-0 blue-hover text-truncate"><a href="../pages/topic.php">League of Legends</a></p>
                            <p class="mb-0 text-truncate small-grey-text">1,5M Followers</p>
                        </li>
                        <li class="mb-2">
                            <p class="mb-0 blue-hover text-truncate"><a href="../pages/topic.php">CS:GO</a></p>
                            <p class="mb-0 text-truncate small-grey-text">1,2M Followers</p>
                        </li>
                        <li class="mb-2">
                            <p class="mb-0 blue-hover text-truncate"><a href="../pages/topic.php">MMORPG</a></p>
                            <p class="mb-0 text-truncate small-grey-text">1,0M Followers</p>
                        </li>
                        <li class="mb-2">
                            <p class="mb-0 blue-hover text-truncate"><a href="../pages/topic.php">Fortnite</a></p>
                            <p class="mb-0 text-truncate small-grey-text">971k Followers</p>
                        </li>
                        <li class="mb-2">
                            <p class="mb-0 blue-hover text-truncate"><a href="../pages/topic.php">Console Gaming</a></p>
                            <p class="mb-0 text-truncate small-grey-text">923k Followers</p>
                        </li>
                    </ol>
            </div> <!-- Most Popular Topics -->
        </aside><!-- /.col-md-4 aka aside -->
    </div><!-- /.row -->
</section><!-- /.container -->
<script src="../js/voting.js"></script>
<?php } ?>