<div class="row p-3 g-0 mb-3 rounded border comment-card bg-white" data-id={{$comment->id}}>
    <header class="d-flex justify-content-between">
        <h5 class="font-weight-bold">on "<a href="/post/{{$comment->post->id}}">{{$comment->post->title}}</a></h5>
        <small style="color: darkgray;">{{$comment->get_time()}}</small>
    </header>

    <p>{!!$comment->body!!}</p>

    <hr class="admin_hr mt-2">
    <div class="d-flex justify-content-between">
        <h4 class="text-danger">{{$comment->reports->count()}} report</h4>
        <div class="col-2 ">
            <div class="col d-flex justify-content-end btn-outline-blue dropdown "
                 id="more-horizontal" role="button" data-bs-toggle="dropdown">
                <span class="material-icons-round">more_horiz</span>
            </div>
            <ul class="dropdown-menu more-horizontal" aria-labelledby="more-horizontal">
                <li><a class="dropdown-item btn-outline-blue dismiss"><span
                            class="material-icons-outlined align-middle">done</span> <span class = "dismiss"> Dismiss</span></a>
                </li>
                <li><a class="dropdown-item btn-outline-red delete"><span
                            class="material-icons-outlined align-middle">delete</span> <span class = "delete" > Delete</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>