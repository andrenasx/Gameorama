<div class="card mb-3">
    <div class="card-header d-flex justify-content-end">
        <button type="button" id="close-window-button">
            <span class="material-icons-round delete-notification-button" data-id={{$notification->id}}>close</span>
        </button>
        </div>
        <div class="card-body d-flex justify-content-between pb-0">
        <p class=" d-flex align-items-center col-10">
            <span class="material-icons-round me-2">comment</span><span><a href="{{ route('post', ['newspost' => $notification->data['id_post']]) }}">{{$notification->data['owner']}} commented on your post: "{{$notification->data['comment']}}"</a></span>
        </p>
        <small>{{$notification->get_date()}}</small>
    </div>
</div>
