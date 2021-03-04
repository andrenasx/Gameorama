<?php function draw_accsettings() { ?>
    <body>
    <body>
        <div class="p-3 p-lg-5 mt-4 col-lg-8 container bg-white" id="accsettings-container">
            <h1 class="h2 fw-bold">Account Settings</h1>
            <hr class="rounded"></hr>

            <div class="col-12 col-lg-10 mt-5 px-4 pt-5 pb-5 container" id="field-container">
                <button type="button" class="btn btn-primary p-2 col-4" id="accept-button" data-bs-toggle="modal" data-bs-target="#staticBackdropEmail">Change</button>
                <h1 class="h4 fw-bold">Email Address</h1>
                <h2 class="h5 fw-lighter">nick.rogers@email.com</h2>
            </div>

            <div class="col-12 col-lg-10 mt-5 px-4 pt-5 pb-5 container" id="field-container">
                <button type="button" class="btn btn-primary p-2 col-4" id="accept-button" data-bs-toggle="modal" data-bs-target="#staticBackdropPassword">Change</button>
                <h1 class="h4 fw-bold">Change Password</h1>
                <h2 class="h5 fw-lighter">Password must be at least 6 characters long</h2>
            </div>

            <div class="col-12 col-lg-8 pt-4 pb-4 container" id="field-delete-container">
                <h1 class="h4 fw-bold">Danger Zone</h1>
                <h2 class="h5 fw-bold">☢️ BEWARE THE NUCLEAR BUTTON ☢️</h1>
                <button type="button" class="btn btn-primary mt-2 p-2 col-8 col-lg-4" id="delete-button" data-bs-toggle="modal" data-bs-target="#staticBackdropDelete">Delete Account</button>
            </div>
        
            <!-- Modal -->
            <div class="modal fade" id="staticBackdropEmail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Change Email Address</h5>
                        <button type="button" data-bs-dismiss="modal" id= "close-window-button" aria-label="Close"><span class="material-icons-round" id = "downvote">close</span></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-floating mb-5">
                                <input type="email" id="inputEmail" class="form-control mb-3" placeholder=" " required autofocus>
                                <label for="inputEmail">Old Email Address</label>
                            </div>
                            <div class="form-floating mb-5">
                                <input type="email" id="inputEmail" class="form-control mb-3" placeholder=" " required autofocus>
                                <label for="inputEmail">New Email Address</label>
                            </div>

                            <div class="form-floating mb-5">
                                <input type="email" id="inputEmail" class="form-control mb-3" placeholder=" " required autofocus>
                                <label for="inputEmail">Confirm New Email Address</label>
                            </div>
                        <form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id= "close-button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id= "save-button" class="btn btn-primary">Save Changes</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="staticBackdropPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Change Password</h5>
                        <button type="button" data-bs-dismiss="modal" id= "close-window-button" aria-label="Close"><span class="material-icons-round" id = "downvote">close</span></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-floating mb-5">
                                <input type="password" id="inputPassword" class="form-control mb-3" placeholder=" " required autofocus>
                                <label for="inputPassword">Old Password</label>
                            </div>
                            <div class="form-floating mb-5">
                                <input type="password" id="inputPassword" class="form-control mb-3" placeholder=" " required autofocus>
                                <label for="inputPassword">New Password</label>
                            </div>

                            <div class="form-floating mb-5">
                                <input type="password" id="inputPassword" class="form-control mb-3" placeholder=" " required autofocus>
                                <label for="inputPassword">Confirm New Password</label>
                            </div>
                        <form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id= "close-button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id= "save-button" class="btn btn-primary">Save Changes</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="staticBackdropDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabelDelete">Delete Account</h5>
                        <button type="button" data-bs-dismiss="modal" id= "close-window-button" aria-label="Close"><span class="material-icons-round" id = "downvote">close</span></button>
                    </div>
                    <div class="modal-body">
                        <p class="game-quote mt-3">“You’ve met with a terrible fate, haven’t you?” </p>
                        <p class="game-quote-origin">- The Legend of Zelda: Majora’s Mask </p> <!--Rotating Game Quotes-->
                        <form>
                            <div class="form-floating mb-5">
                                <input type="password" id="inputDeleteAccount" class="form-control mb-3" placeholder=" " required autofocus>
                                <label for="inputPassword">Enter Account Password</label>
                            </div>
                        <form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id= "save-button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id= "delete-button" class="btn btn-primary">Delete</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        
    </body>
<?php }?>