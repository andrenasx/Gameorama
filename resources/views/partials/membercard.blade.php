<div class="row g-0 p-3 mb-2 rounded bg-white align-items-center">
    <div class="col-2 col-xl-1 pe-3">
        <img src="{{ asset('storage/members/'.$member->avatar_image) }}" alt="" class="rounded-circle img-fluid img-responsive" style="width:90px;height:auto;">
    </div>
    <div class="col-6 col-xl-9">
        <div class="row g-0">
            <h3 class="h3 color-orange truncate"><a href="{{ route('profile', ['username' => $member->username]) }}">{{ $member->username }}</a></h3>
        </div>
        <div class="row g-0">
            <h5 class="h5 truncate" id="member-name-search" data-id = {{$member->id}}>{{$member->full_name}}</h5>
        </div>
    </div>
    <div class="col-4 col-xl-2">
        <div class="row g-0 d-flex justify-content-end">
            @auth
            @if (!$member->isMe(Auth::user()->id))
                @if ((Auth::user()->isFollowing($member->id)) != null)
                    <button type="button" data-id = {{$member->username}}
                        class="following-button btn btn-outline-primary col-12 mb-1 member-following-button"> 
                    </button>
                @else
                    <button type="button" data-id = {{$member->username}}
                        class="follow-button btn btn-outline-primary col-12 mb-1 member-follow-button">
                    </button>
                @endif
            @endif
            @endauth
        </div>
        <div class="row g-0">
            <p class="m-0 d-flex justify-content-end" id="member_followers" data-id={{$member->username}}>{{$member->followers->count()}} Followers</p>
        </div>
    </div>
</div>
