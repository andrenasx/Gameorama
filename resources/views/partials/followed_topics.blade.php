<div class="modal fade" id="modalFollowedTopics" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Followed Topics</h5>
                <button type="button" data-bs-dismiss="modal" id="close-window-button" aria-label="Close"><span
                        class="material-icons-round" id="downvote">close</span></button>
            </div>
            <div class="modal-body">
                <div class="profiles-container">
                    @foreach ($topics as $topic)
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
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"  data-id = {{$topic->id}} ></button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
