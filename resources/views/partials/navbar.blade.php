<nav class= "navbar-placeholder row g-0">
    <div class="col-12"></div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <div class="container-fluid">
        <div class="col-1 ps-lg-2" id="Logo" onclick="window.location.href='{{ route('home') }}'" style="cursor:pointer;">
            <img src={{asset('storage/assets/logo.png')}} class="img-logo" alt="">
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="col-lg-6" id="navbar_search">
                <form method="GET" action="/search" class="col-lg-6 d-flex " style="width:85%">
                    <span class="material-icons-round mt-1" style=" font-size:200%; color:grey;">search</span>
                    <input name="query" type="search" autocomplete="off" class="form-control" placeholder="Search" aria-label="Search"></input>
                </form>
            </div>
            <ul class="navbar-nav d-flex justify-content-end">
                @guest
                    <li>
                        <a class="d-flex mt-1 me-3" href="{{route('login')}}">
                            <span class="material-icons-round me-1" style="font-weight: bold;">login</span> Log in
                        </a>
                    </li>
                    <li>
                        <a class="d-flex mt-1 pe-lg-2" href="{{route('signup')}}">
                            <span class="material-icons-round me-1">app_registration</span> Sign Up
                        </a>
                    </li>
                @endguest
                @auth
                    <button class="btn btn-primary nav-item me-3 h-100" style="margin-top:5px" id="create_post_btn"
                             type="button" title="Create a Post"
                            onclick="window.location.href='{{ route('create_post') }}'">
                        <row class="d-flex ">
                            <span class="material-icons-round">post_add</span>
                        </row>
                    </button>
                    <li class="nav-item dropdown d-flex pe-1" id="hamburguerIcon">
                        <a class="nav-link gx-0 mx-0 px-0 modal-notifications" id="navbarDropdown" role="button" aria-expanded="false"
                           data-bs-toggle="modal" data-bs-target="#modalNotifications">
                            <button type="button" id="notifications-button" class="navbar-icon grey-hover" style="margin-top:2px"><span
                                    class="material-icons-round">notifications</span></button>
                            <span class="badge rounded-pill badge-notification bg-danger">{{Auth::user()->unreadNotifications->count()}}</span>
                        </a>
                        <a class="nav-link dropdown-toggle d-flex mt-1 grey-hover" href="#" id="navbarDropdown"
                           role="button" data-bs-toggle="dropdown" style="color:black" aria-expanded="false">
                            <span class="material-icons-round me-1">
                                @if (Auth::user()->admin)
                                    shield
                                @else
                                    account_circle
                                @endif
                            </span>
                            {{Auth::user()->username}}
                        </a>
                        <ul class="dropdown-menu" id="hamburguerMenu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/member/{{Auth::user()->username}}">My Profile</a></li>
                            <li><a class="dropdown-item" href="/member/{{Auth::user()->username}}/settings  ">Account
                                    Settings</a></li>
                            @if (Auth::user()->admin)
                            <li><a class="dropdown-item" href="/admin">Administration Area</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('logout')}}">Log out</a></li>
                        </ul>
                    </li>
                    <li class="nav-item d-flex align-items-start mt-2" id="colapsedHamburguer">
                    <li class="nav-link grey-hover-notification d-flex align-items-start" data-bs-toggle="modal"
                        id="colapsedHamburguer" data-bs-target="#modalNotifications" role="button">
                        <button type="button" id="notifications-button" class="navbar-icon ">
                            <span class="material-icons-round">notifications</span>
                        </button>
                        <span class="badge rounded-pill badge-notification bg-danger mt-2">{{Auth::user()->unreadNotifications->count()}}</span>
                        <span class="">Notifications</span>
                    </li>
                    <li><a class="mt-2 grey-hover" href="/member/{{Auth::user()->username}}"
                           id="colapsedHamburguer"><span
                                class="material-icons-round" style="margin-right:10px">account_circle</span>{{Auth::user()->username}}</a>
                    </li>
                    <li><a class="mt-2 grey-hover" href="/member/{{Auth::user()->username}}/settings"
                           id="colapsedHamburguer"><span class="material-icons-round"
                                                         style="margin-right:10px">settings</span> Account Settings</a>
                    </li>
                    @if (Auth::user()->admin)
                    <li><a class="mt-2 grey-hover" href="/admin"
                           id="colapsedHamburguer"><span class="material-icons-round"
                                                         style="margin-right:10px">shield</span> Administration Area</a>
                    </li>
                    @endif
                    <li><a class="mt-2 grey-hover" href="{{route('logout')}}" id="colapsedHamburguer"><span
                                class="material-icons-round" style="font-weight: bold;margin-right:10px">logout</span>
                            Log out</a></li>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div aria-live="polite" aria-atomic="true" class="position-relative">
    <div class="toast-container position-fixed bottom-1 end-0 p-3" style = "z-index: 10"></div>

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
            <div class="modal-body notifications-body">
                @auth
                    @if(Auth::user()->notifications->count() == 0)
                        <div class="text-center">Looks like there's nothing new yet!</div>
                    @else
                        @foreach((Auth::user()->notifications) as $notification)
                            @if($notification->type === "App\Notifications\FollowNotification")
                                <!--Follow-->
                                @if($notification->read_at !== null)
                                    @include('partials.follow_notification_card',['notification'=>$notification])
                                @else
                                    @include('partials.follow_notification_unread_card',['notification'=>$notification])
                                @endif

                            @elseif($notification->type === "App\Notifications\CommentNotification")
                                <!--Comment-->
                                @if($notification->read_at !== null)
                                    @include('partials.comment_notification_card',['notification'=>$notification])
                                @else
                                    @include('partials.comment_notification_unread_card',['notification'=>$notification])
                                @endif
                            @else($notification->type === "App\Notifications\ReplyNotification")
                                <!--Reply-->
                                @if($notification->read_at !== null)
                                    @include('partials.reply_notification_card',['notification'=>$notification])
                                @else
                                    @include('partials.reply_notification_unread_card',['notification'=>$notification])
                                @endif
                            @endif
                        @endforeach
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>
