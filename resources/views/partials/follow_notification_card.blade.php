<div class="card mb-3">
    <div class="card-header d-flex justify-content-end">
        <button  type="button" data-bs-dismiss="modal" aria-label="Close" id="close-window-button">
            <span class="material-icons-round">close</span></button>
        </div>
        <div class="card-body d-flex justify-content-between pb-0">
        <p class="card-text d-flex align-items-center">
            <span class="material-icons-round me-2">person</span><span><a href="{{route('profile', ['member' => $notification->data['follower']])}}">{{$notification->data['follower']}} followed you!</a> </span>
        </p>
        <small>{{$notification->get_date()}}</small>
    </div>
</div>
