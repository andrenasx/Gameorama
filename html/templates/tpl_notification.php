<?php function draw_notification_center() { ?>
    <body>
        <div class="p-3 p-lg-5 mt-4 col-lg-8 container bg-white" id="accsettings-container">
            <h2 class="h3 fw-bold">Account Settings</h2>
            <hr class="rounded mb-5"></hr>

            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <!--Follow-->
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-end">
                            <small>1m ago</small>
                            <button type="button" class="btn-close" aria-label="Close"></button>
                        </div>
                        <div class="card-body">
                            <p class="card-text d-flex align-items-center"><span class="material-icons-round">person</span>kaka34 followed you!</p>
                        </div>
                    </div>

                    <!--Comment-->
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-end">
                            <small>4h ago</small>
                            <button type="button" class="btn-close" aria-label="Close"></button>
                        </div>
                        <div class="card-body">
                            <p class="card-text d-flex align-items-center"><span class="material-icons-round">comment</span>BrotherSena commented on your post</p>
                        </div>
                    </div>

                    <!--Report-->
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-end">
                            <small>1d ago</small>
                            <button type="button" class="btn-close" aria-label="Close"></button>
                        </div>
                        <div class="card-body">
                            <p class="card-text d-flex align-items-center"><span class="material-icons-outlined">outlined_flag</span>BlazedN1gger was reported</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
<?php } ?>