<?php
function draw_navbar() { ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <div class="container-fluid">
      <div class="col-1 ps-lg-2" id= "Logo" onclick="window.location.href='mainpage.php'" style="cursor:pointer;">
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

                <button class="btn btn-primary nav-item me-3 h-100" style="margin-top:5px" id="create_post_btn" onclick="window.location.href='create_post.php'">
                    <row class="d-flex ">
                        <span class="material-icons-round me-1">add</span> Create a News Post
                    </row>
                </button>

          <li class="nav-item dropdown d-flex pe-1" id="hamburguerIcon">
              <a class="nav-link gx-0 mx-0 px-0" id="navbarDropdown" role="button" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#modalNotifications" >
              <button type="button" class="navbar-icon grey-hover"  style="margin-top:2px"  ><span class="material-icons-round">notifications</span></button>
                <span class="badge rounded-pill badge-notification bg-danger">1</span>
              </a>
              <a class="nav-link dropdown-toggle d-flex mt-1 grey-hover" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" style="color:black" aria-expanded="false" >
              <span class="material-icons-round me-1">account_circle</span>
                WanWan
              </a>
            <ul class="dropdown-menu" id="hamburguerMenu"aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="my_profile.php">My Profile</a></li>
              <li><a class="dropdown-item" href="accsettings.php">Account Settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout_mainpage.php">Log out</a></li>
            </ul>
        </li>
          <li class="nav-item d-flex align-items-start mt-2" id="colapsedHamburguer">
            <li class="nav-link grey-hover-notification d-flex align-items-start" data-bs-toggle="modal"  id="colapsedHamburguer" data-bs-target="#modalNotifications" role="button" >
                <button type="button" class="navbar-icon " >
                  <span class="material-icons-round">notifications</span>
                </button>
                <span class="badge rounded-pill badge-notification bg-danger mt-2">1</span>
                <span class="">Notifications</span>
            </li>
            <li><a class=" mt-2 grey-hover" href="my_profile.php" id="colapsedHamburguer"><span class="material-icons-round" style="margin-right:10px">account_circle</span> My Profile</a></li>
            <li><a class=" mt-2 grey-hover" href="accsettings.php" id="colapsedHamburguer"><span class="material-icons-round" style="margin-right:10px">settings</span> Account Settings</a></li>
            <li><a class=" mt-2 grey-hover" href="logout_mainpage.php"id= "colapsedHamburguer"><span class="material-icons-round" style="font-weight: bold;margin-right:10px">logout</span> Log out</a></li>
          </li>
        </ul>
        </div>
    </div>
    <div class="modal fade" id="modalNotifications" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(251,116,45);">
                    <h5 class="modal-title" style="color: white;" id="exampleModalLabel">Notifications</h5>
                    <button class="close-notification-button" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span class="material-icons-round">close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <!--Follow-->
                        <div class="card mb-3">
                            <div class="card-header d-flex justify-content-end">
                                <button  type="button" data-bs-dismiss="modal" aria-label="Close" id="close-window-button">
                                    <span class="material-icons-round">close</span></button>
                            </div>
                            <div class="card-body d-flex justify-content-between pb-0">
                                <p class="card-text d-flex align-items-center">
                                    <span class="material-icons-round me-2">person</span><span><a href="../pages/profile.php">kaka34</a> followed you!</span>
                                </p>
                                <small>1m ago</small>
                            </div>
                        </div>

                        <!--Comment-->
                        <div class="card mb-3">
                            <div class="card-header d-flex justify-content-end">
                                <button type="button" data-bs-dismiss="modal" aria-label="Close" id="close-window-button">
                                    <span class="material-icons-round">close</span>
                                </button>
                            </div>
                            <div class="card-body d-flex justify-content-between pb-0">
                                <p class="card-text d-flex align-items-center">
                                    <span class="material-icons-round me-2">comment</span><span><a href="../pages/profile.php">BrotherSena</a> commented on your post</span>
                                </p>
                                <small>4h ago</small>
                            </div>
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
        <div class="col-1 ps-lg-2" id="Logo" onclick="window.location.href='mainpage.php'" style="cursor:pointer;">
            <img src="../assets/Logo.png" class="img-logo" alt="">
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="col-lg-6" id="navbar_search">
                <form class="col-lg-6 d-flex " style="width:85%">
                    <span class="material-icons-round mt-1" style=" font-size:200%; color:grey;">search</span>
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search"></input>
                </form>
            </div>
            <ul class="navbar-nav d-flex justify-content-end">
                <li class="nav-item d-flex">
                <li>
                    <a class="d-flex mt-1 me-2" href="login.php" onmouseover="this.style.color='var(--bsBlue)'" onmouseout="this.style.color='black'">
                        <span class="material-icons-round me-2" style="font-weight: bold;">login</span> Log in
                    </a>
                </li>
                <li>
                    <a class="d-flex mt-1 pe-lg-2" href="signup.php" onmouseover="this.style.color='var(--bsBlue)'" onmouseout="this.style.color='black'">
                        <span class="material-icons-round me-2" style="font-weight: bold;">login</span> Sign Up
                    </a></li>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php } ?>





<?php function draw_simple_navbar() { ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <div class="container-fluid">
        <div class="" style="margin:auto !important;" onclick="window.location.href='mainpage.php'">
            <img src="../assets/Logo.png" class="img-logo" alt="" style="cursor:pointer;">
        </div>
    </div>
</nav>
<?php } ?>