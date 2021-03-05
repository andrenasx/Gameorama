<?php function draw_navbar() { ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <div class="container-fluid">
      <div class="col-1" id= "Logo" onclick="window.location.href='mainpage.php#'" style="cursor:pointer;">
        <img src="../assets/Logo.png" class="img-logo" alt = "" >
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="col-lg-6" id="navbar_search">
          <form class="col-lg-6 d-flex " style="width:85%">
            <div class="form-floating col-12" id="search_bar_form">
              <input class="form-control" id="search_bar" type="search" placeholder=" " required autofocus>
              <label for="search_bar" class="col-12 d-flex text-start" >Search <span class="material-icons-round col-11 col-lg-10 col-xxl-11 d-flex justify-content-end" style=" color:darkgrey;" id="navbar_search_icon">search</span></label><!--font-weight: bold;-->
            </div>
          </form>
        </div>
        <ul class="navbar-nav d-flex justify-content-end" >
          <button class="nav-item btn mx-0 d-flex " id="create_post_btn" onclick="window.location.href='create_post.php#'">
            <row class="mt-1 d-flex">  
            <span class="material-icons-round me-1" style="font-weight: bold;">add</span>
              Create a News Post</row>
          </button>
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="material-icons-round">notifications</span>
              <span class="badge rounded-pill badge-notification bg-danger">1</span>
            </a>
          </li>
          <li class="nav-item dropdown d-flex " id="hamburguerIcon">
              <a class="nav-link dropdown-toggle text-dark d-flex mt-1" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
          <li class="nav-item d-flex">
            <li><a class="dropdown-item" href="my_profile.php#" id="colapsedHamburguer"><span class="material-icons-round me-1">account_circle</span> My Profile</a></li>
            <li><a class="dropdown-item mt-2" href="accsettings.php#" id="colapsedHamburguer"><span class="material-icons-round me-1">settings</span> Account Settings</a></li>
            <li><a class="dropdown-item mt-2" href="logout_mainpage.php#"id= "colapsedHamburguer"><span class="material-icons-round me-1" style="font-weight: bold;">logout</span> Log out</a></li>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<?php } ?>



<?php function draw_logout_navbar() { ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <div class="container-fluid">
      <div class="col-1" id= "Logo" onclick="window.location.href='mainpage.php#'" style="cursor:pointer;">
        <img src="../assets/Logo.png" class="img-logo" alt = "" >
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="col-lg-6" id="navbar_search">
          <form class="col-lg-6 w-75 d-flex ">
          <div class="form-floating col-12" id="search_bar_form">
              <input class="form-control" id="search_bar" type="search" placeholder=" " required autofocus>
              <label for="search_bar" class="col-12 d-flex text-start" >Search <span class="material-icons-round col-11 d-flex justify-content-end" style=" color:darkgrey;">search</span></label><!--font-weight: bold;-->
            </div>
          </form>
        </div>
        <ul class="navbar-nav d-flex justify-content-end" >
          
          
          <li class="nav-item d-flex">
            <li><a class="dropdown-item d-flex mt-1" href="login.php#" style="font-weight: bold;" onmouseover="this.style.color='var(--gameOrange)'" onmouseout="this.style.color='black'"><span class="material-icons-round me-2" style="font-weight: bold;">login</span> Log in</a></li>
            <li><a class="dropdown-item d-flex mt-1" href="signup.php#" style="font-weight: bold;" onmouseover="this.style.color='var(--gameOrange)'" onmouseout="this.style.color='black'"><span class="material-icons-round me-2" style="font-weight: bold;">login</span> Sign Up</a></li>
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