<?php function draw_post() { ?>
    <body>
        <main>
        <div class="pt-4 pb-4 mt-4 col-lg-8 container bg-white" id="post-container">

            <div class = "row mt-2">
                <div class = "col-1" id = "post-voting">
                    <ul>
                        <span class="material-icons-round d-flex justify-content-center" id = "upvote">north</span>
                        <span class = "d-flex justify-content-center" id = "score">243</span>
                        <span class="material-icons-round d-flex justify-content-center" id = "downvote">south</span>
                        
                    </ul>
                </div>
                <div class = "col mt-3">
                    <h5 class="post-topics">Topics: Gaming Gadgets; Razer</h5>    
                    <h7 class="post-user">Posted by kaka34</h7>
                    <h1 class="post-title">Razer apresenta webcam Kiyo Pro</h1>
                </div>

            </div>
            
            <div id="myCarousel" class="offset-lg-1 mb-5 col-lg-10 carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

                    <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Example headline.</h1>
                        <p>Some representative placeholder content for the first slide of the carousel.</p>
                        <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                    </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

                    <div class="container">
                    <div class="carousel-caption">
                        <h1>Another example headline.</h1>
                        <p>Some representative placeholder content for the second slide of the carousel.</p>
                        <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                    </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

                    <div class="container">
                    <div class="carousel-caption text-end">
                        <h1>One more for good measure.</h1>
                        <p>Some representative placeholder content for the third slide of this carousel.</p>
                        <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                    </div>
                    </div>
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
            <p class = "mx-5">A Razer revelou a webcam Kiyo Pro. Com uma abrangência que vai para lá do mundo do gaming, tem no Sensor de Luz Adaptativo a sua principal novidade. Vivemos uma época marcada pelo teletrabalho. E isto veio o despertar um problema há muito dormente: a fraca qualidade das câmaras nos nossos computadores portáteis.</p>

        </div>
        <div class = "container mt-3 mb-2 col-lg-8">
            <div class = "row ">
                <div class = "md-form amber-textarea active-amber-textarea px-0 ">
                    <textarea class = "form-control" name="comment" rows="3" placeholder="Leave a comment"></textarea>
                    <button type="button" class="btn btn-primary mt-2 me-3" id = "add-comment-button">Add Comment</button>
                </div>
            </div>
        </div>

        <div class = "container mt-4 col-lg-8 px-0 ">
            <div class = "row-lg-8 ">
                <div class = "d-flex bg-white p-2 p-4">
                    <img src="../assets/avatar1.png" class = "flex-shrink-0 rounded-circle" style="width:60px;height:60px;" alt="">
                    <div class = "ms-2 col-lg-10">
                        <div class = "d-flex justify-content-between">
                            <h4>kaka34</h4>
                            <small style = "color: darkgray;">2 hours ago</small>
                        </div>
                        
                        <p>Fita cola preta das camaras</p>
                        
                        <div class = "col pt-4 d-flex justify-content-around comment-icons">
                            <div class = "col-2 d-flex justify-content-around">
                                <span class="material-icons-round d-flex justify-content-center">north</span>
                                <label class = "d-flex justify-content-center">1178</label>
                                <span class="material-icons-round d-flex justify-content-center">south</span>
                            
                            </div>
                            <span class="material-icons-outlined">mode_comment</span> 
                            <span class="material-icons-outlined report-button">outlined_flag</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "row-lg-8 mt-3 offset-1">
                <div class = "d-flex bg-white p-4 pb-4">
                    <img src="../assets/avatar2.png" class = "flex-shrink-0 rounded-circle" style="width:60px;height:60px;" alt="">
                    <div class = "ms-2 col-lg-10">
                        <div class = "d-flex justify-content-between">
                            <h4>WanWan</h4>
                            <small style = "color: darkgray;">35 minutes ago</small>
                        </div>
                        <p>Sim. Da pra tudo.</p>

                        <div class = "col pt-4 d-flex justify-content-around comment-icons">
                            <div class = "col-2 d-flex justify-content-around comment-icons">
                                <span class="material-icons-round d-flex justify-content-center" >north</span>
                                <label class = "d-flex justify-content-center">101</label>
                                <span class="material-icons-round d-flex justify-content-center" >south</span>
                            
                            </div>
                            <span class="material-icons-outlined">mode_comment</span> 
                            <span class="material-icons-outlined report-button">outlined_flag</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "row-lg-8 mt-3 ">
                <div class = "d-flex bg-white p-4 pb-4">
                    <img src="../assets/avatar3.png" class = "flex-shrink-0 rounded-circle" style="width:60px;height:60px;" alt="">
                    <div class = "ms-2 col-lg-10">
                        <div class = "d-flex justify-content-between">
                            <h4>WanWan</h4>
                            <small style = "color: darkgray;">2 days ago</small>
                        </div>
                        <p>Sim. Da pra tudo.</p>

                        <div class = "col pt-4 d-flex justify-content-around comment-icons">
                            <div class = "col-2 d-flex justify-content-around comment-icons">
                                <span class="material-icons-round d-flex justify-content-center" >north</span>
                                <label class = "d-flex justify-content-center">57</label>
                                <span class="material-icons-round d-flex justify-content-center" >south</span>
                            
                            </div>
                            <span class="material-icons-outlined">mode_comment</span> 
                            <span class="material-icons-outlined report-button">outlined_flag</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
    <script src="../js/voting.js"></script>
    </body>
<?php } ?>