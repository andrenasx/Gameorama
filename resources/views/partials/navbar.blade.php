<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <div class="container-fluid">
        <div class="col-1 ps-lg-2" id="Logo" onclick="window.location.href='/home'" style="cursor:pointer;">
            <img src={{asset('storage/assets/logo.png')}} class="img-logo" alt="">
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                @guest
                    <li>
                        <a class="d-flex mt-1 me-2" href="{{route('login')}}">
                            <span class="material-icons-round me-2" style="font-weight: bold;">login</span> Log in
                        </a>
                    </li>
                    <li>
                        <a class="d-flex mt-1 pe-lg-2" href="{{route('signup')}}">
                            <span class="material-icons-round me-2" style="font-weight: bold;">login</span> Sign Up
                        </a>
                    </li>
                @endguest
                @auth
                    <button class="btn btn-primary nav-item me-3 h-100" style="margin-top:5px" id="create_post_btn"
                            onclick="window.location.href='create_post.php'">
                        <row class="d-flex ">
                            <span class="material-icons-round me-1">add</span> Create a News Post
                        </row>
                    </button>
                    <li class="nav-item dropdown d-flex pe-1" id="hamburguerIcon">
                        <a class="nav-link gx-0 mx-0 px-0" id="navbarDropdown" role="button" aria-expanded="false"
                           data-bs-toggle="modal" data-bs-target="#modalNotifications">
                            <button type="button" class="navbar-icon grey-hover" style="margin-top:2px"><span
                                    class="material-icons-round">notifications</span></button>
                            <span class="badge rounded-pill badge-notification bg-danger">0</span>
                        </a>
                        <a class="nav-link dropdown-toggle d-flex mt-1 grey-hover" href="#" id="navbarDropdown"
                           role="button" data-bs-toggle="dropdown" style="color:black" aria-expanded="false">
                            <span class="material-icons-round me-1">account_circle</span>
                            {{Auth::user()->username}}
                        </a>
                        <ul class="dropdown-menu" id="hamburguerMenu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/member/{{Auth::user()->username}}">My Profile</a></li>
                            <li><a class="dropdown-item" href="/member/{{Auth::user()->username}}/settings  ">Account
                                    Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{route('logout')}}">Log out</a></li>
                        </ul>
                    </li>
                    <li class="nav-item d-flex align-items-start mt-2" id="colapsedHamburguer">
                    <li class="nav-link grey-hover-notification d-flex align-items-start" data-bs-toggle="modal"
                        id="colapsedHamburguer" data-bs-target="#modalNotifications" role="button">
                        <button type="button" class="navbar-icon ">
                            <span class="material-icons-round">notifications</span>
                        </button>
                        <span class="badge rounded-pill badge-notification bg-danger mt-2">0</span>
                        <span class="">Notifications</span>
                    </li>
                    <li><a class=" mt-2 grey-hover" href="/member/{{Auth::user()->username}}" id="colapsedHamburguer"><span
                                class="material-icons-round" style="margin-right:10px">account_circle</span> My Profile</a>
                    </li>
                    <li><a class=" mt-2 grey-hover" href="/member/{{Auth::user()->username}}/settings"
                           id="colapsedHamburguer"><span class="material-icons-round"
                                                         style="margin-right:10px">settings</span> Account Settings</a></li>
                    <li><a class=" mt-2 grey-hover" href="{{route('logout')}}" id="colapsedHamburguer"><span
                                class="material-icons-round" style="font-weight: bold;margin-right:10px">logout</span> Log
                            out</a></li>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
