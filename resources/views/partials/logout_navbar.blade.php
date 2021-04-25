<nav class="navbar navbar-expand-lg navbar-light bg-light px-0 gx-0" id="navbar">
    <div class="container-fluid">
        <div class="col-1 ps-lg-2" id="Logo" onclick="window.location.href='/home'" style="cursor:pointer;">
            <img src={{asset('storage/assets/logo.png')}} class="img-logo" alt="">
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="col-lg-6" id="navbar_search">
                <form class="col-lg-6 d-flex " style="width:85%" onclick="window.location.href='search_results.php'">
                    <span class="material-icons-round mt-1" style=" font-size:200%; color:grey;">search</span>
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search"></input>
                </form>
            </div>
            <ul class="navbar-nav d-flex justify-content-end">
                <li class="nav-item d-flex">
                <li>
                    <a class="d-flex mt-1 me-2" href="{{route('login')}}" onmouseover="this.style.color='var(--bsBlue)'" onmouseout="this.style.color='black'">
                        <span class="material-icons-round me-2" style="font-weight: bold;">login</span> Log in
                    </a>
                </li>
                <li>
                    <a class="d-flex mt-1 pe-lg-2" href="{{route('signup')}}" onmouseover="this.style.color='var(--bsBlue)'" onmouseout="this.style.color='black'">
                        <span class="material-icons-round me-2" style="font-weight: bold;">login</span> Sign Up
                    </a></li>
                </li>
            </ul>
        </div>
    </div>
</nav>