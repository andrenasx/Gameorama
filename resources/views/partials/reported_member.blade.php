<div class="row bg-white p-3 g-0 mb-3 rounded border member-card" data-id={{$member->username}}>
    <div class="row align-items-center">
        <img src="{{ asset('storage/members/'.$member->avatar_image) }}" alt="" class="col-2 flex-shrink-0 rounded-circle"
             style="width:90px;height:auto;">
        <div class="col justify-content-between">
            <div>
                <h4><a href="{{ route('profile', ['username' => $post->owner->username]) }}">{{$member->username}}</a></h4>
                <div class="row">
                    <h6 class="col-12 col-sm-6">{{$member->followers->count()}} Followers</h6>
                    <h6 class="col-12 col-sm-6 text-end">{{$member->aura}} Aura Score</h6>
                </div>
            </div>
        </div>
    </div>
    <hr class="admin_hr mt-3">

    <div class="d-flex justify-content-between">
        <h4 class="text-danger">{{$member->reports->count()}} Reports</h4>
        <div class="col-2 ">
            <div class="col d-flex justify-content-end btn-outline-blue dropdown "
                 id="more-horizontal" role="button" data-bs-toggle="dropdown">
                <span class="material-icons-round">more_horiz</span>
            </div>
            <ul class="dropdown-menu more-horizontal dismiss" aria-labelledby="more-horizontal">
                <li><a class="dropdown-item btn-outline-blue"><span
                            class="material-icons-outlined align-middle">done</span> <span class = "dismiss"> Dismiss</span></a>
                </li>
                <li><a class="dropdown-item btn-outline-red delete"><span
                            class="material-icons-outlined align-middle">delete</span> <span class = "delete"> Delete</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
