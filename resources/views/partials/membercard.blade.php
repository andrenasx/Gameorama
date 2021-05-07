<div class="row g-0 p-3 mb-2 rounded bg-white">
    <div class="row g-0 align-items-center">
        <img src="{{ asset('storage/members/'.$member->avatar_image) }}" alt="" class="col-2 me-3 flex-shrink-0 rounded-circle" style="width:90px;height:auto;">
        <div class="col justify-content-between">
            <div>
                <h4><a href="{{ route('profile', ['username' => $member->username]) }}">{{$member->username}}</a></h4>
                <div class="row g-0">
                    <h6 class="col-12 col-sm-6">{{$member->followers->count()}} Followers</h6>
                    <h6 class="col-12 col-sm-6">{{$member->aura}} Aura Score</h6>
                </div>
            </div>
        </div>
    </div>
</div>
