@extends('layouts.app')
@section('page-title', $post->title.' | ')
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
            <div class="post-voting col-1 d-flex justify-content-center ">
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
            <div class="post-header col me-2">
                <h5 class="post-topics">Topics:
                    @foreach ($post->topics as $topic)
                        <a href="/topic/{{$topic->name}}">{{$topic->name}}</a>;
                    @endforeach
                </h5>
                <div class="d-inline">
                    <small class="post-user">Posted by <a href="{{ route('profile', $post->owner->username) }}">{{$post->owner->username}}</a></small>
                    <small>{{$post->date_time}}</small>
                </div>
                <h1 class="post-title">{{$post->title}}</h1>
            </div>
        </header>
        <div class="news-card-body">
            @if ($post->images->count() > 0)
                <div id="myCarousel" class="offset-lg-1 mb-5 col-lg-10 carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @for($index = 0; $index < $post->images->count(); $index++)
                        @if ($index == 0)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$index}}" class="active" aria-current="true" aria-label="Slide {{$index}}"></button>
                        @else
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$index}}" aria-label="Slide {{$index}}"></button>
                        @endif
                        @endfor
                    </div>
                    <div class="carousel-inner">
                        @for($index = 0; $index < $post->images->count(); $index++)
                            @if ($index == 0)
                                <div class="carousel-item active">
                            @else
                                <div class="carousel-item">
                            @endif
                                <img src={{ asset('storage/posts/'.$post->id.'/'.$post->images[$index]['file']) }} class="d-block w-100">
                                </div>
                        @endfor
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
            <p class="card-text mt-3 px-lg-5">{{$post->body}}</p>
        </div>
        <div class="row mt-4 news-card-options">
            <div class="col d-flex justify-content-center btn-outline-blue border-end border-2">
                <span class="material-icons-outlined align-middle me-1">mode_comment</span>
                <span class="d-none d-md-flex"> {{$post->comments->count()}}</span>
            </div>
            <div class="col d-flex justify-content-center btn-outline-blue border-end border-2">
                <span class="material-icons-outlined align-middle me-1">bookmark_add</span>
                <span class="d-none d-md-flex"> Bookmark</span>
            </div>
            <div class="col d-flex justify-content-center btn-outline-red " data-bs-toggle="modal" data-bs-target="#reportPost">
                <span class="material-icons-outlined align-middle me-1">flag</span>
                <span class="d-none d-md-flex"> Report</span>
            </div>
        </div>
    </section>


    <section class="comments p-2 px-sm-4 mt-3">
        <section class="row g-0 mb-4">
            <div class="md-form amber-textarea active-amber-textarea px-0 ">
                <textarea class="form-control" name="comment" rows="4" placeholder="Leave a comment"></textarea>
                <button type="button" class="btn btn-primary mt-2 float-end">Add Comment</button>
            </div>
        </section>

        @foreach ($post->parentComments() as $comment)
        @include('partials.comment', ['comment' => $comment, 'offset' => 0])
        @endforeach
    </section>
</section>
@include('partials.footer')
@endsection
