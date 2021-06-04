<div class="card mb-3 unread">
    <div class="card-header d-flex justify-content-end unread-header">
        <button  type="button" id="close-window-button">
            <span class="material-icons-round delete-notification-button" data-id={{$notification->id}}>close</span></button>
        </div>
        <div class="card-body d-flex justify-content-between pb-0">
        <p class="d-flex align-items-center">
            <span class="material-icons-round me-2">person</span><span><a href="{{route('profile', ['member' => $notification->data['follower']])}}">{{$notification->data['follower']}} followed you!</a> </span>
        </p>
        <small>{{$notification->get_date()}}</small>
    </div>
</div>
