<?php
function draw_edit_profile() {
?>
    <section class="container g-0 mx-auto my-4 col-lg-7">
        <section class="profile-widget bg-white rounded mb-3">
            <row class="mb-3">
                <div class="col-12 justify-content-center">
                    <div class="image-container bg2"
                        style="background:url(../assets/banner.jpg); background-size: cover">
                        <div class = "col-12">
                            <img src="../assets/avatar.jpg" class="avatar" alt="avatar">
                            
                        </div>
                        
                        
                    </div>
                    <button type="button" class="btn d-flex align-content-center edit_banner_photo camera_icon" >
                            <span class="material-icons-outlined" style="font-size: 200%;">camera_alt</span>
                    </button>
                </div>
            
                <div class = "">
                    <button type="button" class="btn d-flex align-content-center camera_icon edit_profile_photo" >
                        <span class="material-icons-outlined" style="font-size: 200%;">camera_alt</span>
                    </button>
                </div>
            </row>
            <div class="mt-2 edit_profile_username">
                <h2 class="h2 fw-bold text-center">WanWan</h2>
            </div>
            
            <section class = "container w-100 mt-2 form-group p-2">
                <form action="">
                    <div class="mb-4">
                        <label for="new-post-title" class="form-label">Display Name</label>
                        <input type="text" class="form-control" id="new-post-title" placeholder="Nick Rogers">
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlTextarea1" class="form-label">Biography</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Hello there! Welcome to my profile!"></textarea>
                    </div>
                </form>
                <div class="col-12 d-flex justify-content-end">
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </section>
        </section>
    </section>
<?php } ?>