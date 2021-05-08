<div class="profile-container d-flex justify-content-between mb-2">
    <div class="d-flex">
        <img src="{{ asset('storage/assets/letters/'.strtoupper(substr($topic->name, 0, 1)).'.png') }}" class="flex-shrink-0 rounded-circle"
            style="width:50px;height:50px;" alt="">
        <div class="ms-2">
            <h1 class="h5 fw-normal"><a href="{{ route('topic', ['name' => $topic->name]) }}">{{$topic->name}}</a></h1>
            <p class="h6 fw-normal">{{$topic->followers->count()}} Followers</p>
        </div>
    </div>
    <div>
        @if (($topic->isFollowed(Auth::user()->id)) != null)
            <button type="button" class="following-button btn btn-outline-primary col-12 mb-1 topic-follow-button"  data-id = {{$topic->id}} ></button>
        @else
            <button type="button" class="follow-button btn btn-outline-primary col-12 mb-1 topic-follow-button"  data-id = {{$topic->id}} ></button>
        @endif
    </div>
</div>