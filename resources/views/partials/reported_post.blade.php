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
                    src="{{ asset('storage/posts/'.$post->id.'/'.$post->images[0]['file']) }}" alt="Post image">
            @endif
            <div class="post-body card-text mt-3 truncate-multiple">{!! $post->body !!}</div>
        </a>
    </div>
    <div class="row mt-4">
        <hr class="admin_hr">

        <div class="d-flex justify-content-between">
            <button type="button" class="border-0 text-danger bg-body report_content_button" data-bs-toggle="modal"
                data-bs-target="#modalReportsPost{{$post->id}}"><h4 class="text-danger report_content_button">{{$post->reports->count()}} reports</h4>
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
                                class="material-icons-outlined align-middle delete">delete</span> <span class = "delete"> Delete</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

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
