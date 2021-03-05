<?php function draw_profile() { ?>
  <section class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
          <div class="panel panel-white profile-widget">
              <div class="row">
                  <div class="col-sm-12">
                    <div class="image-container bg2" style="background:url(http://www.bootdey.com/img/Content/flores-amarillas-wallpaper.jpeg)">  
                      <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="avatar" alt="avatar"> 
                      
                    </div>
                    <row class="d-flex justify-content-end col-12"> 
                      <button type="button" class="btn btn-outline-report d-flex align-content-center mt-1 me-1">
                        <span class="material-icons-round" style="font-size: 200%;">flag</span>
                      </button>
                     </row>
                  </div>
                  
                  <div class="col-sm-12">
                    <div class="details ">
                      <h3>Nick Rogers</h3>
                      <h4>WanWan</h4>
                      <p>103,261 Aura Score</p>
                      <p class = "bio">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                      <button type="button" class="btn btn-outline-primary w-25" id="follow_button">Follow</button>
                    </div>  
                  </div> 
                  <section class = "follow_stats mt-2 mb-2">
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
                  </section>
                  
              </div>
          </div>
          <section class = "profile_navigation mt-2">

          <ul class="nav nav-pills mb-1 justify-content-space-between" id="pills-tab" role="tablist">
              <li class="nav-item col-6" role="presentation">
                <button class="nav-link active w-100" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Posts</button>
              </li>
              <li class="nav-item col-6" role="presentation">
                <button class="nav-link w-100" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Comments</button>
              </li>
            </ul>


            <div class="tab-content bg-white" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <!--<div class = "row">
                  <div class = "col-sm-1 bg-white">
                    <ul>
                      <li><span class="fas fa-arrow-up "></span></span></li>
                      <li><span>243</span></li>
                    </ul>
                  </div>

                </div>-->
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">*insert comments here</div>
            </div>
          </section>
      </div>
      

      </div>
    </div>
  </section>
<?php } ?>


<?php function draw_own_profile() { ?>
  <section class="container">
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
                    <div class="details mt-5">
                      <h3>Nick Rogers</h3>
                      <h4>WanWan</h4>
                      <p>103,261 Aura Score</p>
                      <p class = "bio">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>  
                  </div> 
                  <section class = "follow_stats mt-2 mb-2">
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
                  </section>
                  
              </div>
          </div>
          <section class = "profile_navigation mt-2">
            <ul class="nav nav-pills mb-1 justify-content-space-between" id="pills-tab" role="tablist">
              <li class="nav-item col-4" role="presentation">
                <button class="nav-link active w-100" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Posts</button>
              </li>
              <li class="nav-item col-4" role="presentation">
                <button class="nav-link w-100" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Comments</button>
              </li>
              <li class="nav-item col-4" role="presentation">
                <button class="nav-link w-100" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Bookmarked</button>
              </li>
            </ul>
             
            <div class="tab-content bg-white" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <!--<div class = "row">
                  <div class = "col-sm-1 bg-white">
                    <ul>
                      <li><span class="fas fa-arrow-up "></span></span></li>
                      <li><span>243</span></li>
                    </ul>
                  </div>

                </div>-->
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">*insert comments here</div>
            </div>
          </section>
      </div>
      

      </div>
    </div>
  </section>
<?php } ?>