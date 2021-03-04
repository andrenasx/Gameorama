<?php function draw_navbar() { ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <div class="container-fluid">
      <div class="col-1" id= "Logo">
        <img src="../assets/Logo.png" class="img-logo" alt = "">
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="col-lg-6 " id="navbar_search">
          <form class="col-lg-6 w-75">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
          </form>
        </div>
        <ul class="navbar-nav d-flex justify-content-around" >
          <button class="nav-item btn me-2" id="create_post_btn">
            <i class="fa fa-plus" aria-hidden="true" ></i>
            Create a News Post
          </button>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell" aria-hidden="true"></i>
              <span class="badge rounded-pill badge-notification bg-danger">1</span>
            </a>
            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Meter Notfs aqui</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown d-flex " id="hamburguerIcon">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user" aria-hidden="true"></i>
                WanWan
              </a>
            <ul class="dropdown-menu" id="hamburguerMenu"aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">My Profile</a></li>
              <li><a class="dropdown-item" href="#">Account Settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Log out</a></li>
            </ul>
          </li>
          <li class="nav-item d-flex">
            <li><a class="dropdown-item" href="#" id="colapsedHamburguer"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a></li>
            <li><a class="dropdown-item" href="#" id="colapsedHamburguer"><i class="fa fa-cog" aria-hidden="true"></i>Account Settings</a></li>
            <li><a class="dropdown-item" href="#"id= "colapsedHamburguer"><i class="fa fa-home" aria-hidden="true"></i>Log out</a></li>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<?php } ?>

<?php function draw_simple_navbar() { ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <div class="container-fluid">
      <div class="" style="margin:auto !important;">
        <img src="../assets/Logo.png" class="img-logo" alt = "">
      </div>
    </div>
  </nav>
<?php } ?>