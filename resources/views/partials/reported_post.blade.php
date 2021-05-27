<div class="news-card mb-3 p-4 rounded bg-white" data-id={{$post->id}}>
    <header class="row news-card-header">

        <div class="col">
            <h6 class="post-topics">Topics:
                @foreach ($post->topics as $topic)
                    <a href={{ route('topic', ['topic' => $topic->name]) }}>{{$topic->name}}</a>;
                @endforeach
            </h6>
            <div class="">
                <small class="post-user">Posted by
                    <a href="{{ route('profile', ['member' => $post->owner->username]) }}">{{$post->owner->username}}</a></small>
                <small>{{$post->get_time()}}</small>
            </div>
            <h4 class="post-title-smaller mb-3">
                <a href={{ route('post', ['newspost' => $post->id]) }} class="black-a">{{$post->title}}</a>
            </h4>
        </div>
    </header>
    <div class="news-card-body">
        <a href={{ route('post', ['newspost' => $post->id]) }} class="black-a">
            @if ($post->images->count () > 0)
                <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                    style="max-height: 650px"
                    src={{ asset('storage/posts/'.$post->id.'/'.$post->images[0]['file']) }}>
            @endif
            <p class="card-text truncate-multiple">{{$post->body}}</p>
        </a>
    </div>
    <div class="row mt-4">
        <hr class="admin_hr">

        <div class="d-flex justify-content-between">
            <button type="button" class="border-0 text-danger bg-body" data-bs-toggle="modal"
                data-bs-target="#modalReportsPost{{$post->id}}"><h4 class="text-danger">{{$post->reports->count()}} reports</h4>
            </button>
            <div class="col-2 ">
                <div class="col d-flex justify-content-end btn-outline-blue dropdown "
                     id="more-horizontal" role="button" data-bs-toggle="dropdown">
                    <span class="material-icons-round">more_horiz</span>
                </div>
                <ul class="dropdown-menu more-horizontal" aria-labelledby="more-horizontal">
                    <li><a class="dropdown-item btn-outline-blue dismiss"><span
                                class="material-icons-outlined align-middle ">done</span> <span class = "dismiss"> Dismiss</span></a>
                    </li>
                    <li><a class="dropdown-item btn-outline-red delete"><span
                                class="material-icons-outlined align-middle">delete</span> <span class = "delete"> Delete</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- /.news-card -->

<div class="modal fade" id="modalReportsPost{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reports</h5>
                <button type="button" data-bs-dismiss="modal" id="close-window-button" aria-label="Close"><span
                        class="material-icons-round">close</span></button>
            </div>
            <div class="modal-body">
                <div class="reports-container container-member container-follower">
                    @foreach ($post->reports as $report)
                    <div class="d-flex">
                        <img src="{{ asset('storage/members/'.$report->owner->avatar_image) }}" class="flex-shrink-0 rounded-circle"
                            style="width:50px;height:50px;" alt="">
                        <div class="ms-2">
                            <h1 class="h5 fw-normal">{{$report->owner->username}}</h1>
                            <p class="h6 fw-normal text-center">{{$report->body}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
