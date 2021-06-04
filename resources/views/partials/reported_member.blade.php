<div class="row bg-white p-3 g-0 mb-3 rounded border member-card" data-id={{$member->username}}>
    <div class="row align-items-center">
        <img src="{{ asset('storage/members/'.$member->avatar_image) }}" alt="Member avatar" class="col-2 flex-shrink-0 rounded-circle"
             style="width:90px;height:auto;">
        <div class="col justify-content-between">
            <div>
                <h4><a href="{{ route('profile', ['member' => $member->username]) }}">{{$member->username}}</a></h4>
                <div class="row">
                    <h6 class="col-12 col-sm-6">{{$member->followers->count()}} Followers</h6>
                    <h6 class="col-12 col-sm-6 text-end">{{$member->aura}} Aura Score</h6>
                </div>
            </div>
        </div>
    </div>
    <hr class="admin_hr mt-3">

    <div class="d-flex justify-content-between">
        <button type="button" class="border-0 text-danger bg-body" data-bs-toggle="modal"
            data-bs-target="#modalReportsMember{{$member->id}}"><h4 class="text-danger">{{$member->reports->count()}} reports</h4>
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

<div class="modal fade" id="modalReportsMember{{$member->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reports</h5>
                <button type="button" data-bs-dismiss="modal" id="close-window-button" aria-label="Close"><span
                        class="material-icons-round">close</span></button>
            </div>
            <div class="modal-body">
                <div class="reports-container container-member container-follower">
                    @foreach ($member->reports as $report)
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
