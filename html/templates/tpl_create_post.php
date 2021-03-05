<?php 
function draw_create_post() {
?>
    <section class = "p-3 p-lg-5 mt-4 col-lg-8 pb-1 container bg-white" style = "height:fit-content">
            <h1 class="h2 fw-bold">Create a Post</h1>
            <hr class="rounded"></hr>

        <section class = "container w-100 mt-5 form-group">
            <form action="">
                <div class="form-floating">
                    <input type="text" class = "form-control" placeholder="Title" required autofocus>
                    <label for="inputEmail">Title</label>
                </div>
                
                <div class="form-floating mt-5">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px"></textarea>
                    <label for="inputEmail">Text (optional)</label>
                </div>
                <h6 class = "mt-5">Topics</h6>
                <div class = "container bg-white border">
                    
                    <div class = "d-flex justify-content-start me-0 p-2">
                        
                        <div class = "bg-secondary ">
                        <button type="button" class="border d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <span class="material-icons-round" style="font-weight: bold;">add</span>
                        </button>
                        </div>
                    </div>  
                </div>

                <!-- Button trigger modal -->


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add topics</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                        <div class="form-floating p-2">
                            <input type="text" class = "form-control" placeholder="Insert your topic here" required autofocus>
                            <label for="inputEmail">Topic</label>
                        </div>
                    <!--<div class="modal-body ms-2">
                       <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id = "LOL">
                            <label class="form-check-label" for="LOL">
                                League of Legends
                            </label>
                        </div>

                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" value="" id = "CSGO">
                            <label class="form-check-label" for="CSGO">
                                CS:GO
                            </label>
                        </div>

                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" value="" id = "Fortnite">
                            <label class="form-check-label" for="Fortnite">
                                Fortnite
                            </label>
                        </div>
                    </div>-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>

                <section class = "container mt-5">
                    <label for="formFileMultiple" class="form-label" >Upload media</label>
                    <input class="form-control form-control-sm p-4" id="formFileMultiple" type="file" multiple>
                </section>

                <section class = "container create_post_buttons">
                    <div class = "row d-flex justify-content-center">
                        <button type="button" class="col-2 btn btn-secondary" id = "post_cancel_button"  onclick="window.location.href='mainpage.php#'" >Cancel</button>
                        <button type="button" class="col-2 ms-4 btn btn-primary" id = "post_confirm_button">Post</button>
                    </div>

                </section>

                
            </form>
        </section>
    </section>

<?php }?>