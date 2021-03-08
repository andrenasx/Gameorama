<?php function draw_create_post() { ?>
    <section class="p-3 p-lg-5 my-4 col-lg-7 container bg-white rounded">
        <h2 class="h2 fw-bold">Create a Post</h2>
        <hr class="rounded"></hr>

        <section class = "container w-100 mt-5 form-group">
            <form action="">
                <div class="mb-4">
                    <label for="new-post-title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="new-post-title">
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlTextarea1" class="form-label">Text (optional)</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>
                <h6>Topics</h6>
                <div class = "bg-white rounded border p-2">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>
                
                <div class="mt-4">
                    <label for="formFileMultiple" class="form-label" >Upload media</label>
                    <input class="form-control form-control-sm p-4" id="formFileMultiple" type="file" multiple>
                </div>
                

                <section class = "container create_post_buttons mb-2 mb-lg-0">
                    <div class = "row d-flex justify-content-around">
                        <button type="button" class="col-5 col-md-4 col-lg-3 btn btn-secondary" onclick= >Cancel</button>
                        <button type="button" class="col-5 col-md-4 col-lg-3 btn btn-primary">Post</button>
                    </div>
                </section>  
            </form>
        </section>
    </section>
<?php }?>