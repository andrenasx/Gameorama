@extends('layouts.app')
@section('content')
@auth
    @include('partials.navbar')
@endauth

@guest
    @include('partials.logout_navbar')
@endguest
<section class="container bg-white rounded g-0 mx-auto my-4 col-lg-7">
    <section class="news-card mb-3 p-4">
        <header class="row news-card-header">
            <div class="post-voting col-1 d-flex justify-content-center">
                <ul class="list-unstyled mb-0">
                    <li>
                        <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                    </li>
                    <li>
                        <span class="score d-flex justify-content-center" id="score">{{$post->aura}}</span>
                    </li>
                    <li>
                        <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                    </li>
                </ul>
            </div>
            <div class="col">
                <h5 class="post-topics">Topics:@foreach ($post->topics as $topic) <a href="#">{{$topic->name}}</a>; @endforeach</h5>
                <div class="d-inline">
                    <small class="post-user">Posted by <a href="./profile.php">{{$post->owner->username}}</a></small>
                    <small>{{$post->date_time}}</small>
                </div>
                <h1 class="post-title">{{$post->title}}</h1>
            </div>
        </header>
        <div class="news-card-body">
            @if ($post->images != null)
            <div id="myCarousel" class="offset-lg-1 mb-5 col-lg-10 carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://assets2.razerzone.com/images/pnx.assets/b6873991d1d643906221aa99f822a195/razer-kiyo-usp-synapse-3-mobile.jpg" alt="">
                </div>
                <div class="carousel-item">
                    <img src="https://assets2.razerzone.com/images/pnx.assets/fb10f4852b6142d195b24f0299f0e65d/768x460-kiyopro-hero-mobile.jpg" alt="">
                </div>
                <div class="carousel-item">
                    <img src="https://cdn.mos.cms.futurecdn.net/K6Ccm5f2sgpfZaRcQZwAAC-970-80.jpg.webp" alt="">
                </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
            @endif
            <p class="card-text px-lg-5">{{$post->body}}</p>
        </div>
        <div class="row mt-4 news-card-options">
            <div class="col d-flex justify-content-center btn-outline-blue">
                <span class="material-icons-outlined align-middle me-1">mode_comment</span>
                <span class="d-none d-md-flex"> {{$post->comments->count()}}</span>
            </div>
            <div class="col d-flex justify-content-center btn-outline-blue">
                <span class="material-icons-outlined align-middle me-1">bookmark_add</span>
                <span class="d-none d-md-flex"> Bookmark</span>
            </div>
            <div class="col d-flex justify-content-center btn-outline-red " data-bs-toggle="modal" data-bs-target="#reportPost">
                <span class="material-icons-outlined align-middle me-1">flag</span>
                <span class="d-none d-md-flex"> Report<span>
            </div>
        </div>
    </section> <!-- /.news-card -->

    

    <section class="comments p-2 px-sm-4 mt-5">
        <section class="row g-0 mb-4">
            <div class="md-form amber-textarea active-amber-textarea px-0 ">
                <textarea class="form-control" name="comment" rows="4" placeholder="Leave a comment"></textarea>
                <button type="button" class="btn btn-primary mt-2 float-end">Add Comment</button>
            </div>
        </section>
        
        @foreach ($post->comments as $comment)
        <!-- comment -->   
        <div class = "row g-0 border rounded">
            <div class = "d-flex p-4">
                <img src="../assets/avatar1.png" class = "flex-shrink-0 rounded-circle" style="width:60px;height:60px;" alt="">
                <div class = "ms-2 col-lg-11">
                    <div class = "row justify-content-between g-0">
                        <h4 class="col color-orange">{{$comment->owner->username}}</h4>
                        <small class="col text-end" style = "color: darkgray;">{{$comment->date_time}}</small>
                    </div>
                    
                    <p>{{$comment->body}}</p>

                    <div class="row mt-4">
                        <div class = "col d-flex justify-content-center post-voting">
                            <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                            <label class = "score d-flex justify-content-center mx-2">{{$comment->aura}}</label>
                            <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                        </div>
                        <div class="col d-flex justify-content-center btn-outline-blue">
                            <span class="material-icons-outlined align-middle me-1">mode_comment</span>
                            <span class="d-none d-md-flex"> Reply</span>
                        </div>
                        <div class="col d-flex justify-content-center btn-outline-red" data-bs-toggle="modal" data-bs-target="#reportPost">
                            <span class="material-icons-outlined align-middle me-1">flag</span>
                            <span class="d-none d-md-flex"> Report<span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($comment->replies as $reply)
            <!-- reply -->
            <div class = "row g-0 offset-1 border rounded mb-3">
                <div class = "d-flex p-4">
                    <img src="../assets/avatar2.png" class = "flex-shrink-0 rounded-circle" style="width:60px;height:60px;" alt="">
                    <div class = "ms-2 col-lg-11">
                        <div class = "row justify-content-between g-0">
                            <h4 class="col">{{$reply->owner->username}}</h4>
                            <small class="col text-end" style = "color: darkgray;">35 minutes ago</small>
                        </div>
                        
                        <p>{{$reply->body}}</p>

                        <div class="row mt-4">
                            <div class = "col d-flex justify-content-center post-voting">
                                <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                                <label class = "score d-flex justify-content-center mx-2">101</label>
                                <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                            </div>
                            <div class="col d-flex justify-content-center btn-outline-blue">
                                <span class="material-icons-outlined align-middle me-1">mode_comment</span>
                                <span class="d-none d-md-flex"> Reply</span>
                            </div>
                            <div class="col d-flex justify-content-center btn-outline-blue dropdown " id="more-horizontal" role="button" data-bs-toggle="dropdown">
                                <span class="material-icons-round">more_horiz</span>
                            </div>
                            <ul class="dropdown-menu more-horizontal" aria-labelledby="more-horizontal" >
                                <li><a class="dropdown-item btn-outline-blue"><span class="material-icons-outlined align-middle">edit</span> <span> Edit</span></a></li>
                                <li><a class="dropdown-item btn-outline-red"><span class="material-icons-outlined align-middle">delete</span> <span> Delete</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @endforeach
    </section>
</section>
<!--<script src="../js/voting.js"></script>-->
@include('partials.footer')
@endsection





<!--
    $comments=DB::select(DB::raw("  
    SELECT id, body, date_time, aura, id_owner, id_post
    FROM comment
    WHERE id_post = $id_post 
    AND id NOT IN (SELECT id_comment as id FROM reply WHERE id_post = $id_post)
    );
-->

<!--
    $comments=DB::select(DB::raw("  
    SELECT id, body, date_time, aura, id_owner, id_post
    FROM reply
    INNER JOIN comment ON id_comment = id
    WHERE id_parent = $id_comment
    ); 

-->