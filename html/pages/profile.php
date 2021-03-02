<?php function draw_profile() { ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="panel panel-white profile-widget">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="image-container bg2" style="background:url(http://www.bootdey.com/img/Content/flores-amarillas-wallpaper.jpeg)">  
                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="avatar" alt="avatar"> 
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="details">
                        <h3>Nick Rogers</h3>
                        <h4>WanWan</h4>
                        <p>103,261 Aura Score</p>
                        <p class = "bio">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <button type="button" class="btn btn-outline-dark w-25" id="follow_button">Follow</button>
                      </div>  
                    </div> 
                    <div class = "follow_stats mt-2 mb-2">
                      <div class = "row d-flex justify-content-around">
                        <div class = "col text-center">
                          1021 Following
                        </div>
                        <div class = "col text-center">
                          162 Followed Topics
                        </div>
                        <div class = "col text-center">
                          1542 Followers
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
<?php } ?>