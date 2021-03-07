<?php 

include_once("tpl_login_popup.php");
include_once("tpl_report_post.php");
function draw_navbar() { ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light gx-0" id="navbar">
    <div class="container-fluid">
      <div class="col-1 ps-1" id= "Logo" onclick="window.location.href='mainpage.php#'" style="cursor:pointer;">
        <img src="../assets/Logo.png" class="img-logo" alt = "" >
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="col-lg-6" id="navbar_search">
          <form class="col-lg-6 d-flex " style="width:85%" >
          <span class="material-icons-round mt-1" style=" font-size:200%; color:grey;">search</span>
            <input class="form-control" type="search" placeholder="Search"aria-label="Search" ></input>

           
          </form>
        </div>
        <ul class="navbar-nav d-flex justify-content-end" >

          <button class="btn btn-primary nav-item me-3 h-100" style="margin-top:5px"id="create_post_btn" data-bs-toggle="modal" data-bs-target="#loginRequired">
            <row class="d-flex ">  
            <span class="material-icons-round me-1">add</span>
              Create a News Post</row>
          </button>
          

          <li class="nav-item dropdown d-flex pe-1" id="hamburguerIcon">
              <a class="nav-link gx-0 mx-0 px-0" href="#" id="navbarDropdown" role="button" aria-expanded="false"  >
              <button type="button" class="navbar-icon" data-bs-toggle="modal" data-bs-target="#modalNotifications" style="margin-top:2px" onmouseover="this.style.color='var(--bsBlue)'" onmouseout="this.style.color='black'"><span class="material-icons-round">notifications</span></button>
                <span class="badge rounded-pill badge-notification bg-danger">1</span>
              </a>
              <a class="nav-link dropdown-toggle d-flex mt-1 " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" onmouseover="this.style.color='var(--bsBlue)'" onmouseout="this.style.color='black'">
              <span class="material-icons-round me-1">account_circle</span>
                WanWan
              </a>
            <ul class="dropdown-menu" id="hamburguerMenu"aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="my_profile.php#">My Profile</a></li>
              <li><a class="dropdown-item" href="accsettings.php#">Account Settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout_mainpage.php#">Log out</a></li>
            </ul>
          </li>
          <li class="nav-item d-flex" id="colapsedHamburguer">
            <a class="nav-link text-dark gx-0 mx-0 px-0" href="#" id="navbarDropdown" role="button" aria-expanded="false" >
              <button type="button" class="navbar-icon" data-bs-toggle="modal" data-bs-target="#modalNotifications"><span class="material-icons-round">notifications</span></button>
                <span class="badge rounded-pill badge-notification bg-danger">1</span>
                Notifications
              </a>
            <li><a class="dropdown-item" href="my_profile.php#" id="colapsedHamburguer"><span class="material-icons-round" style="margin-right:20px">account_circle</span> My Profile</a></li>
            <li><a class="dropdown-item mt-2" href="accsettings.php#" id="colapsedHamburguer"><span class="material-icons-round" style="margin-right:20px">settings</span> Account Settings</a></li>
            <li><a class="dropdown-item mt-2" href="logout_mainpage.php#"id= "colapsedHamburguer"><span class="material-icons-round" style="font-weight: bold;margin-right:20px">logout</span> Log out</a></li>
          </li>
        </ul>
      </div>
    </div>
    <div class="modal fade" id="modalNotifications" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Notifications</h5>
            <button type="button" data-bs-dismiss="modal" id= "close-window-button" aria-label="Close"><span class="material-icons-round" id = "downvote">close</span></button>
          </div>
          <div class="modal-body"> 
            <div class = "profiles-container">
              <!--Follow-->
              <div class="card mb-3">
                <div class="card-header d-flex justify-content-end">
                    <button type="button" data-bs-dismiss="modal" id= "close-window-button" aria-label="Close"><span class="material-icons-round" id = "downvote">close</span></button>
                </div>
                <div class="card-body d-flex justify-content-between">
                    <p class="card-text d-flex align-items-center"><span class="material-icons-round">person</span> kaka34 followed you!</p>
                    <small>1m ago</small>
                </div>
            </div>

            <!--Comment-->
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-end">
                    <button type="button" data-bs-dismiss="modal" id= "close-window-button" aria-label="Close"><span class="material-icons-round" id = "downvote">close</span></button>
                </div>
                <div class="card-body d-flex justify-content-between">
                    <p class="card-text d-flex align-items-center"><span class="material-icons-round">comment</span> BrotherSena commented on your post</p>
                    <small>4h ago</small>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
<?php } ?>



<?php function draw_logout_navbar() { ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-0 gx-0" id="navbar">
    <div class="container-fluid">
      <div class="col-1" id= "Logo" onclick="window.location.href='mainpage.php#'" style="cursor:pointer;">
        <img src="../assets/Logo.png" class="img-logo" alt = "" >
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="col-lg-6" id="navbar_search">
          <form class="col-lg-6 d-flex " style="width:85%" >
          <span class="material-icons-round mt-1" style=" font-size:200%; color:grey;">search</span>
            <input class="form-control" type="search" placeholder="Search"aria-label="Search" ></input>

          </form>
        </div>
        <ul class="navbar-nav d-flex justify-content-end" >
          
          
          <li class="nav-item d-flex">
            <li><a class="d-flex mt-1 me-2" href="login.php#" onmouseover="this.style.color='var(--bsBlue)'" onmouseout="this.style.color='black'"><span class="material-icons-round me-2" style="font-weight: bold;">login</span> Log in</a></li>
            <li><a class="d-flex mt-1" href="signup.php#" onmouseover="this.style.color='var(--bsBlue)'" onmouseout="this.style.color='black'"><span class="material-icons-round me-2" style="font-weight: bold;">login</span> Sign Up</a></li>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<?php } ?>





<?php function draw_simple_navbar() { ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <div class="container-fluid">
      <div class="" style="margin:auto !important;" onclick="window.location.href='mainpage.php#'"  >
        <img src="../assets/Logo.png" class="img-logo" alt = "" style="cursor:pointer;">
      </div>
    </div>
  </nav>
<?php } ?>