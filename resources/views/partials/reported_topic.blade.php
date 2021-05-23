<div class="row bg-white p-3 g-0 mb-3 rounded border topic-card" data-id={{$topic->id}}>
    <div class="row align-items-center">
        <img src="{{ asset('storage/assets/letters/'.strtoupper(substr($topic->name, 0, 1)).'.png') }}" alt="" class="col-2 flex-shrink-0 rounded-circle"
             style="width:90px;height:auto;">
        <div class="col-md-10 col-8 d-flex">
            <div>
                <h4><a href="{{ route('topic', ['name' => $topic->name]) }}"">{{$topic->name}}</a></h4>
                <p class="h6 fw-normal">{{$topic->followers->count()}} Followers</p>
            </div>
        </div>
    </div>
    <hr class="admin_hr mt-3">

    <div class="d-flex justify-content-between">
        <h4 class="text-danger">{{$topic->reports->count()}} Reports</h4>
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