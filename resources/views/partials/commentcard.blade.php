<div class="row p-3 g-0 mb-3 rounded border bg-white profile-comment" data-id = {{$comment->id}}>
    <header class="d-flex justify-content-between">
        <h5 class="font-weight-bold">on "<a href="/post/{{$comment->post->id}}">{{$comment->post->title}}</a>"</h5>
        <small style="color: darkgray;">{{$comment->get_time()}}</small>
    </header>

    <textarea hidden autofocus class = "form-control edit-textarea mb-4" rows="3" >{!!$comment->body!!}</textarea>
    <p class="comment_body">{!!$comment->body!!}</p>
    <div class = "d-flex justify-content-end edit_button_div post" data-id = {{$comment->id}}>
        <button type = "button" hidden class="col-4 col-md-3 btn btn-primary edit_button me-3 float-end">Edit</button>
        <button type = "button" hidden class="col-4 col-md-3 btn btn-danger cancel_button float-end">Cancel</button>
    </div>
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
                <ul class="dropdown-menu col-1 more-horizontal comment_options profile" aria-labelledby="more-horizontal" data-id = {{$comment->id}}>
                    <li><a class="dropdown-item btn-outline-blue edit-comment"><span class="material-icons-outlined align-middle edit-comment">edit</span> <span class = "edit-comment"> Edit</span></a></li>
                    <li><a class="dropdown-item btn-outline-red delete-comment"><span class="material-icons-outlined align-middle delete-comment">delete</span> <span class = "delete-comment"> Delete</span></a></li>
                </ul>
            @else
                <div class="d-flex btn-outline-red report-b report-comment" data-id = {{$comment->id}} data-bs-toggle="modal" data-bs-target="#reportComment">
                    <span class="material-icons-outlined align-middle me-1 report-b report-comment" data-id = {{$comment->id}}>flag</span>
                    <span class="d-none d-md-flex report-b report-comment" data-id = {{$comment->id}}> Report</span>
                </div>
            @endif
        @endauth
        @guest
            <div class="d-flex btn-outline-red report-b report-comment" data-id = {{$comment->id}}>
                <span class="material-icons-outlined align-middle me-1 report-b report-comment" data-id = {{$comment->id}}>flag</span>
                <span class="d-none d-md-flex report-b report-comment" data-id = {{$comment->id}}> Report</span>
            </div>
        @endguest
    </div>
</div>
