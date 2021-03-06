<?php $mb=2?>
@if ($comment->replies->count()!=0)
    <?php $mb=0?>
@endif
<?php $mt=3?>
@if ($offset!=0)
    <?php $mt=100?>
@endif
@if ($offset>5)
    <?php $offset=5?>
@endif

<div class = "post-comment" data-id = {{$offset + 1}}>
    <div class = "row g-0 offset-{{$offset}} border-start border-bottom border-3 mb-{{$mb}} mt-{{$mt}} comment-{{$comment->id}}" >
        <div class = "d-flex px-3 py-3 ">
            <img class = "flex-shrink-0 rounded-circle" style="width:60px;height:60px;" src="{{ asset('storage/members/'.$comment->owner->avatar_image) }}" alt="Member image">
            <div class = "ms-2 col-10 col-lg-11 comment_box" data-id={{$offset + 1}}>
                <div class = "row justify-content-between g-0">

                    <h5 class="col color-orange"><a href="/member/{{$comment->owner->username}}">{{$comment->owner->username}}</a></h5>

                    <small class="col text-end" style = "color: darkgray;">{{$comment->get_time()}}</small>
                </div>
                <textarea hidden autofocus class = "form-control edit-textarea mb-4" rows="3" >{!!$comment->body!!}</textarea>
                <p class="mb-2 comment_body">{!!$comment->body!!}</p>
                <div class = "d-flex justify-content-end mb-3 edit_button_div post" data-id = {{$comment->id}}>
                    <button type = "button" hidden class="col-4 col-md-3 btn btn-primary edit_button me-3 float-end">Edit</button>
                    <button type = "button" hidden class="col-4 col-md-3 btn btn-danger cancel_button float-end">Cancel</button>
                </div>
                <div class="row comment_options g-0" data-id = {{$comment->id}}>

                    <div class = "col-4 d-flex justify-content-center comment-voting border-end border-2" data-id = {{$comment->id}}>
                        @guest
                            <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                            <label class = "score d-flex justify-content-center mx-2">{{$comment->aura}}</label>
                            <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                        @endguest

                        @auth
                            @if ((Auth::user()->hasVotedComment($comment->id) != null) && (Auth::user()->hasVotedComment($comment->id)->upvote == 1))
                                <span class="upvote voted material-icons-round d-flex justify-content-center">north</span>
                            @else
                                <span class="upvote material-icons-round d-flex justify-content-center">north</span>
                            @endif
                            <span class="score d-flex justify-content-center" id="score"> {{$comment->aura}} </span>

                            @if (Auth::user()->hasVotedComment($comment->id) != null && Auth::user()->hasVotedComment($comment->id)->upvote == 0)
                                <span class="downvote voted material-icons-round d-flex justify-content-center">south</span>
                            @else
                                <span class="downvote material-icons-round d-flex justify-content-center">south</span>
                            @endif
                        @endauth

                    </div>
                    @auth
                    <div class="col-4 d-flex justify-content-center btn-outline-blue border-end border-2 reply-comment-button comment_options" data-id = {{$comment->id}} data-bs-toggle="collapse" href="#comment_{{$comment->id}}" role = "button" aria-controls = "comment_{{$comment->id}}">
                        <span class="material-icons-outlined align-middle me-1 reply-comment-button" data-id = {{$comment->id}}>mode_comment</span>
                        <span class="d-none d-md-flex reply-comment-button" data-id = {{$comment->id}}  > Reply</span>
                    </div>
                    @if (Auth::check() && Auth::user()->id===$comment->id_owner)
                        <div class="col d-flex justify-content-center btn-outline-blue dropdown" id="more-horizontal" role="button" data-bs-toggle="dropdown">
                            <span class="material-icons-round">more_horiz</span>
                        </div>

                        <ul class="dropdown-menu more-horizontal col-1 dropdown-menu-lg-end" aria-labelledby="more-horizontal">
                            <li><a class="dropdown-item btn-outline-blue edit-comment"><span class="material-icons-outlined align-middle edit-comment">edit</span> <span class = "edit-comment"> Edit</span></a></li>
                            <li><a class="dropdown-item btn-outline-red delete-comment"><span class="material-icons-outlined align-middle delete-comment">delete</span> <span class = "delete-comment"> Delete</span></a></li>
                        </ul>

                    @else
                        <div class="col-4 d-flex justify-content-center btn-outline-red report-b report-comment" data-bs-toggle="modal" data-bs-target="#reportComment" data-id={{$comment->id}}>
                            <span class="material-icons-outlined align-middle me-1 report-b report-comment" data-id={{$comment->id}}>flag</span>
                            <span class="d-none d-md-flex report-b report-comment" data-id={{$comment->id}}> Report</span>
                        </div>
                    @endif
                    @endauth
                    @guest
                    <div class="col-4 d-flex justify-content-center btn-outline-blue border-end border-2 reply-comment-button comment_options" data-id = {{$comment->id}}  role = "button" >
                        <span class="material-icons-outlined align-middle me-1 reply-comment-button" data-id = {{$comment->id}}>mode_comment</span>
                        <span class="d-none d-md-flex reply-comment-button" data-id = {{$comment->id}}  > Reply</span>
                    </div>
                    <div class="col-4 d-flex justify-content-center btn-outline-red report-b report-comment" data-id={{$comment->id}}>
                        <span class="material-icons-outlined align-middle me-1 report-b report-comment" data-id={{$comment->id}}>flag</span>
                        <span class="d-none d-md-flex report-b report-comment" data-id={{$comment->id}}> Report</span>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
    <section class = "reply-comment col-{{12-$offset-1}} offset-{{min($offset+1, 5)}} mb-2 collapse" id = "comment_{{$comment->id}}" data-id = "{{$comment->id}}" >

        <textarea type="text" class="form-control inputOldPass content" data-id = {{$comment->id}} placeholder="Leave your reply" rows="4" placeholder="Reply"></textarea>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary cancel_reply" data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#comment_{{$comment->id}}">Cancel</button>
            <button class="btn btn-primary reply-button" >Reply</button>
        </div>
    </section>
    <section class="replies" data-id={{$offset + 1}}>
        @foreach ($comment->replies as $reply)
            @include('partials.comment', ['comment' => $reply, 'offset' => $offset + 1])
        @endforeach
    </section>




</div>
