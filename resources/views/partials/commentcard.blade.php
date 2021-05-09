<div class="row p-3 g-0 mb-3 rounded border bg-white">
    <header class="d-flex justify-content-between">
        <h5 class="font-weight-bold">on "<a href="/post/{{$comment->post->id}}">{{$comment->post->title}}</a>"</h5>
        <small style="color: darkgray;">{{$comment->date_time}}</small>
    </header>

    
    <p>{!!$comment->body!!}</p>

    <div class="d-flex justify-content-between mt-2">
        <div class="col-4 col-sm-2 d-flex justify-content-center comment-voting" data-id = {{$comment->id}}>
            @guest
                <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                <label class="score d-flex justify-content-center mx-2">{{$comment->aura}}</label>
                <span class="downvote material-icons-round d-flex justify-content-center">south</span>
            @endguest

            @auth
                    @if (Auth::user()->hasVotedComment($comment->id) != null && Auth::user()->hasVotedComment($comment->id)->upvote == 1)
                        <span class="upvote voted material-icons-round d-flex justify-content-center">north</span>
                    @else    
                        <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                    @endif
                <span class="score d-flex justify-content-center" id="score">{{$comment->aura}}</span>
                    @if (Auth::user()->hasVotedComment($comment->id) !== null && Auth::user()->hasVotedComment($comment->id)->upvote == 0)
                        <span class="downvote voted material-icons-round d-flex justify-content-center">south</span>
                    @else
                        <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                    @endif
            @endauth
        </div>

        @auth
            @if ($comment->owner->isMe(Auth::user()->id))
                <div class="d-flex btn-outline-blue dropdown " id="more-horizontal" role="button" data-bs-toggle="dropdown">
                    <span class="material-icons-round">more_horiz</span>
                </div>
                <ul class="dropdown-menu more-horizontal comment_options" aria-labelledby="more-horizontal" data-id = {{$comment->id}}>
                    <li><a class="dropdown-item btn-outline-blue"><span class="material-icons-outlined align-middle">edit</span> <span> Edit</span></a></li>
                    <li><a class="dropdown-item btn-outline-red delete-comment"><span class="material-icons-outlined align-middle delete-comment">delete</span> <span> Delete</span></a></li>
                </ul>
            @else
                <div class="d-flex btn-outline-red " data-bs-toggle="modal" data-bs-target="#reportComment">
                    <span class="material-icons-outlined align-middle me-1">flag</span>
                    <span class="d-none d-md-flex"> Report</span>
                </div>
            @endif
        @endauth
        @guest
            <div class="d-flex btn-outline-red " data-bs-toggle="modal" data-bs-target="#reportComment">
                <span class="material-icons-outlined align-middle me-1">flag</span>
                <span class="d-none d-md-flex"> Report</span>
            </div>
        @endguest
        @include('partials.report_comment', ['comment' => $comment])
    </div>
</div>
