<div class="row p-3 g-0 mb-3 rounded border comment-card bg-white" data-id={{$comment->id}}>
    <header class="d-flex justify-content-between">
        <h5 class="font-weight-bold">on "<a href="/post/{{$comment->post->id}}">{{$comment->post->title}}</a></h5>
        <small style="color: darkgray;">{{$comment->get_time()}}</small>
    </header>

    <p>{!!$comment->body!!}</p>

    <hr class="admin_hr mt-2">
    <div class="d-flex justify-content-between">
        <button type="button" class="border-0 text-danger bg-body" data-bs-toggle="modal"
            data-bs-target="#modalReports{{$comment->id}}"><h4 class="text-danger">{{$comment->reports->count()}} reports</h4>
        </button>
        <div class="col-2 ">
            <div class="col d-flex justify-content-end btn-outline-blue dropdown "
                 id="more-horizontal" role="button" data-bs-toggle="dropdown">
                <span class="material-icons-round">more_horiz</span>
            </div>
            <ul class="dropdown-menu more-horizontal col-1 dropdown-menu-lg-end" aria-labelledby="more-horizontal">
                <li><a class="dropdown-item btn-outline-blue dismiss"><span
                            class="material-icons-outlined align-middle dismiss">done</span> <span class = "dismiss"> Dismiss</span></a>
                </li>
                <li><a class="dropdown-item btn-outline-red delete"><span
                            class="material-icons-outlined align-middle delete">delete</span> <span class = "delete" > Delete</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="modal fade" id="modalReports{{$comment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reports</h5>
                <button type="button" data-bs-dismiss="modal" id="close-window-button" aria-label="Close"><span
                        class="material-icons-round">close</span></button>
            </div>
            <div class="modal-body">
                <div class="reports-container container-member container-follower">
                    @foreach ($comment->reports as $report)
                    <div class="d-flex mb-3">
                        <img src="{{ asset('storage/members/'.$report->owner->avatar_image) }}" class="flex-shrink-0 rounded-circle"
                            style="width:50px;height:50px;" alt="Member avatar">
                        <div class="ms-2">
                            <a class="h5 fw-normal color-orange" href="{{route('profile', ['member' => $report->owner->username])}}">{{$report->owner->username}}</a>
                            <p class="h6 fw-normal">{{$report->body}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
