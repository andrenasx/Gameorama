<?php function draw_following() { ?>
    <body>
        <div class="p-3 p-lg-5 mt-sm-4 col-lg-7 container bg-white rounded" >
            <div class = "row title-search-container justify-content-between">
                <h1 class="h2 col-3 fw-bold">Following</h1>
                <form class="col-8">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
            <hr class="rounded"></hr>
            <div class = "profiles-container row mt-5">
                <div class = "profile-container d-flex col-xxl-6 col-8 mb-4">
                    <img src="../assets/avatar2.png" class = "flex-shrink-0 rounded-circle" style="width:60px;height:60px;" alt="">
                    <div class="ms-2">
                        <h1 class="h4 fw-normal">Legalt_of_Rivia</h1>
                        <p class="h6 fw-light">5,758,783 Aura Score</p>
                    </div>
                    <div class="ms-2">
                        <button type="button" class="following-button btn btn-outline-primary col-12 mb-1" id="follow_button"></button>
                        <h1 class="h6 fw-normal">135k Followers</h1>
                    </div>  
                </div>  

                <div class = "profile-container d-flex col-xxl-6 col-8 mb-4">
                    <img src="../assets/avatar2.png" class = "flex-shrink-0 rounded-circle col-3 col-lg-1 col" style="width:60px;height:60px;" alt="">
                    <div class="ms-2">
                        <h1 class="h4 fw-normal">Legalt_of_Rivia</h1>
                        <p class="h6 fw-light">5,758,783 Aura Score</p>
                    </div>
                    <div class="ms-2">
                        <button type="button" class="following-button btn btn-outline-primary col-12 mb-1" id="follow_button"></button>
                        <h1 class="h6 fw-normal">135k Followers</h1>
                    </div>  
                </div>  
            </div>
        </div>
    </body>
<?} ?>