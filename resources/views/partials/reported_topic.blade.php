<div class="row bg-white p-3 g-0 mb-3 rounded border topic-card" data-id={{$topic->id}}>
    <div class="row align-items-center">
        <img src="{{ asset('storage/assets/letters/'.strtoupper(substr($topic->name, 0, 1)).'.png') }}" alt="" class="col-2 flex-shrink-0 rounded-circle"
             style="width:90px;height:auto;">
        <div class="col-md-10 col-8 d-flex">
            <div>
                <h4><a href="{{ route('topic', ['topic' => $topic->name]) }}">{{$topic->name}}</a></h4>
                <p class="h6 fw-normal">{{$topic->followers->count()}} Followers</p>
            </div>
        </div>
    </div>
    <hr class="admin_hr mt-3">

    <div class="d-flex justify-content-between">
        <button type="button" class="border-0 text-danger bg-body" data-bs-toggle="modal"
            data-bs-target="#modalReports{{$topic->id}}"><h4 class="text-danger">{{$topic->reports->count()}} reports</h4>
        </button>
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
                            class="material-icons-outlined align-middle">delete</span> <span class = "delete"> Delete</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="modal fade" id="modalReports{{$topic->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reports</h5>
                <button type="button" data-bs-dismiss="modal" id="close-window-button" aria-label="Close"><span
                        class="material-icons-round">close</span></button>
            </div>
            <div class="modal-body">
                <div class="reports-container container-member container-follower">
                    @foreach ($topic->reports as $report)
                    <div class="d-flex mb-3">
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
