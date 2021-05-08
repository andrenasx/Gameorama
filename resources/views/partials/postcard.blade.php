<div class="news-card mb-3 p-4 rounded bg-white">
    <header class="row g-0 news-card-header">
        @guest
        <div class="post-voting col-1 d-flex justify-content-center" >
            <ul class="list-unstyled mb-0">
                <li>
                    <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                </li>
                <li>
                    <span class="score d-flex justify-content-center" id="score">{{$post->aura}}</span>
                </li>
                <li>
                    <span
                        class="downvote material-icons-round d-flex justify-content-center">south</span>
                </li>
            </ul>
        </div>
        @endguest

        @auth
        <div class="post-voting col-1 d-flex justify-content-center" data-id = {{$post->id}}>
            <ul class="list-unstyled mb-0">
                <li>
                    @if (Auth::user()->hasVotedPost($post->id) !== null && Auth::user()->hasVotedPost($post->id)->upvote)
                        <span class="upvote voted material-icons-round d-flex justify-content-center">north</span>
                    @else
                        <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                    @endif
                </li>
                <li>
                    <span class="score d-flex justify-content-center" id="score">{{$post->aura}}</span>
                </li>
                <li>
                    @if (Auth::user()->hasVotedPost($post->id) !== null && Auth::user()->hasVotedPost($post->id)->upvote == false)
                        <span class="downvote voted material-icons-round d-flex justify-content-center">south</span>
                    @else
                        <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                    @endif
                    
                </li>
            </ul>
        </div>
        @endauth
        
        <div class="post-header col me-2">
            <h6 class="post-topics">Topics:
                @foreach ($post->topics as $topic)
                    <a href="{{ route('topic', ['name' => $topic->name]) }}">{{$topic->name}}</a>;
                @endforeach
            </h6>
            <div class="d-inline">
                <small class="post-user">Posted by <a href="{{ route('profile', ['username' => $post->owner->username]) }}">{{$post->owner->username}}</a></small>
                <small>{{$post->date_time}}</small>
            </div>
            <h4 class="post-title-smaller">
                <a href="/post/{{$post->id}}" class="post-title black-a">{{$post->title}}</a>
            </h4>
        </div>
    </header>
    <div class="news-card-body">
        <a href="/post/{{$post->id}}" class="black-a">
            @if ($post->images->count () > 0)
            <img class="rounded img-fluid img-responsive mx-auto my-3 d-block" style="max-height: 650px"
                src={{ asset('storage/posts/'.$post->id.'/'.$post->images[0]['file']) }}>
            @endif
            <p class="post-body card-text mt-3 truncate-multiple">{!!$post->body!!}</p>
        </a>
    </div>
    <div class="row g-0 mt-4 news-card-options">
        <div class="col d-flex justify-content-center btn-outline-blue border-end border-2">
            <span class="material-icons-outlined align-middle me-1">mode_comment</span>
            <span class="d-none d-md-flex"> {{$post->comments->count()}}</span>
        </div>
        <div class="col d-flex justify-content-center btn-outline-blue border-end border-2">
            <span class="material-icons-outlined align-middle me-1">bookmark_add</span>
            <span class="d-none d-md-flex"> Bookmark</span>
        </div>
        @auth
            @if ($post->owner->isMe(Auth::user()->id))
                <div class="col d-flex justify-content-center btn-outline-blue dropdown " id="more-horizontal" role="button" data-bs-toggle="dropdown">
                    <span class="material-icons-round">more_horiz</span>
                </div>
                <ul class="dropdown-menu more-horizontal col-1" aria-labelledby="more-horizontal" >
                    <li><a class="dropdown-item btn-outline-blue"><span class="material-icons-outlined align-middle">edit</span> <span> Edit</span></a></li>
                    <li><a class="dropdown-item btn-outline-red"><span class="material-icons-outlined align-middle">delete</span> <span> Delete</span></a></li>
                </ul>
            @else
                <div class="col d-flex justify-content-center btn-outline-red " data-bs-toggle="modal" data-bs-target="#reportPost">
                    <span class="material-icons-outlined align-middle me-1">flag</span>
                    <span class="d-none d-md-flex"> Report</span>
                </div>
            @endif
        @endauth
        @guest
            <div class="col d-flex justify-content-center btn-outline-red " data-bs-toggle="modal" data-bs-target="#reportPost">
                <span class="material-icons-outlined align-middle me-1">flag</span>
                <span class="d-none d-md-flex"> Report</span>
            </div>
        @endguest
    </div>
</div>
