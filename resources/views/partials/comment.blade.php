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

<div class = "row g-0 offset-{{$offset}} border-start border-bottom border-3 mb-{{$mb}} mt-{{$mt}} comment-{{$comment->id}}" >
    <div class = "d-flex px-3 py-3 ">
        <img class = "flex-shrink-0 rounded-circle" style="width:60px;height:60px;" src="{{ asset('storage/members/'.$comment->owner->avatar_image) }}" alt="">
        <div class = "ms-2 col-lg-11">
            <div class = "row justify-content-between g-0">

                <h5 class="col color-orange"><a href="/member/{{$comment->owner->username}}">{{$comment->owner->username}}</a></h5>

                <small class="col text-end" style = "color: darkgray;">{{$comment->date_time}}</small>
            </div>

            <p class="mb-2">{!!$comment->body!!}</p>
            <div class="row comment_options">

                <div class = "col d-flex justify-content-center comment-voting border-end border-2" data-id = {{$comment->id}}>
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
                <div class="col d-flex justify-content-center btn-outline-blue border-end border-2 reply-comment-button" data-id = {{$comment->id}} data-bs-toggle="modal" data-bs-target="#staticReplyModal">
                    <span class="material-icons-outlined align-middle me-1">mode_comment</span>
                    <span class="d-none d-md-flex reply-comment-button" data-id = {{$comment->id}} > Reply</span>
                </div>
                @if (Auth::check() && Auth::user()->id===$comment->id_owner)
                    <div class="col d-flex justify-content-center btn-outline-blue dropdown " id="more-horizontal" role="button" data-bs-toggle="dropdown">
                        <span class="material-icons-round">more_horiz</span>
                    </div>
                    <ul class="dropdown-menu more-horizontal" aria-labelledby="more-horizontal" >
                        <li><a class="dropdown-item btn-outline-blue"><span class="material-icons-outlined align-middle">edit</span> <span> Edit</span></a></li>
                        <li><a class="dropdown-item btn-outline-red"><span class="material-icons-outlined align-middle">delete</span> <span> Delete</span></a></li>
                    </ul>
                @else
                    <div class="col d-flex justify-content-center btn-outline-red" data-bs-toggle="modal" data-bs-target="#reportPost">
                        <span class="material-icons-outlined align-middle me-1">flag</span>
                        <span class="d-none d-md-flex"> Report</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@foreach ($comment->replies as $reply)
    @include('partials.comment', ['comment' => $reply, 'offset' => $offset + 1])
@endforeach


<div class="modal fade reply-fade" id="staticReplyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Reply to Comment</h5>
                <button type="button" data-bs-dismiss="modal" id="close-window-button" aria-label="Close"><span
                        class="material-icons-round">close</span></button>
            </div>
            <form class="reply-form" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="form-floating" data-id = {{$comment->post->id}}>
                        <textarea type="text" class="form-control inputOldPass" data-id = {{$comment->id}} placeholder=" " rows="5" placeholder="Reply"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary dismiss-modal" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary reply-button" data-id = "{{$comment->id}}">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
