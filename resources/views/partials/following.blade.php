<div class="modal fade" id="modalFollowing" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Following</h5>
                <button type="button" data-bs-dismiss="modal" id="close-window-button" aria-label="Close"><span
                        class="material-icons-round">close</span></button>
            </div>
            <div class="modal-body">
                <div class="profiles-container container-member container-following">
                    @foreach ($following as $member)
                        @include('partials.profile_card',['member'=>$member])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
