<div class="modal fade" id="modalFollowing" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Following</h5>
                <button type="button" data-bs-dismiss="modal" id="close-window-button" aria-label="Close"><span
                        class="material-icons-round">close</span></button>
            </div>
            <div class="modal-body">
                <div class="profiles-container">
                    @foreach ($following as $followin)
                        <div class="profile-container d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <img src="{{ asset('storage/members/'.$followin->avatar_image) }}" class="flex-shrink-0 rounded-circle"
                                    style="width:50px;height:50px;" alt="">
                                <div class="ms-2">
                                    <h1 class="h5 fw-normal">{{$followin->username}}</h1>
                                    <p class="h6 fw-normal">{{$followin->aura}} Aura Score</p>
                                </div>
                            </div>
                            <div>
                                <button type="button"
                                    class="following-button btn btn-outline-primary col-12 mb-1"></button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
