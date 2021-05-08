<div class="row g-0 p-3 mb-2 rounded bg-white">
    <div class="row g-0 align-items-center">
        <img src="{{ asset('storage/assets/letters/'.strtoupper(substr($topic->name, 0, 1)).'.png') }}" alt="" class="col-2 me-3 flex-shrink-0 rounded-circle" style="width:90px;height:auto;">
        <div class="col-md-10 col-8 d-flex">
            <div>
                <h4><a href="{{ route('topic', ['name' => $topic->name]) }}">{{$topic->name}}</a></h4>
                <h6>{{$topic->followers->count()}} Followers</h6>
            </div>
        </div>
    </div>
</div>
