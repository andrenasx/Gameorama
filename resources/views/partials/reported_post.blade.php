<div class="news-card mb-3 p-4 rounded bg-white" data-id={{$post->id}}>
    <header class="row news-card-header">
        
        <div class="col">
            <h6 class="post-topics">Topics:
                @foreach ($post->topics as $topic)
                    <a href={{ route('topic', ['name' => $topic->name]) }}>{{$topic->name}}</a>;
                @endforeach
            <div class="">
                <small class="post-user">Posted by 
                    <a href="{{ route('profile', $post->owner->username) }}">{{$post->owner->username}}</a></small>
                <small>{{$post->get_time()}}</small>
            </div>
            <h4 class="post-title-smaller mb-3">
                <a href={{ route('post', ['id_post' => $post->id]) }} class="black-a">{{$post->title}}</a>
            </h4>
        </div>
    </header>
    <div class="news-card-body">
        <a href={{ route('post', ['id_post' => $post->id]) }} class="black-a">
            @if ($post->images->count () > 0)
                <img class="rounded img-fluid img-responsive mx-auto my-3 d-block"
                    style="max-height: 650px"
                    src={{ asset('storage/posts/'.$post->id.'/'.$post->images[0]['file']) }}>
            @endif
            <p class="card-text truncate-multiple">{{$post->body}}</p>
        </a>
    </div>
    <div class="row mt-4">
        <hr class="admin_hr">

        <div class="d-flex justify-content-between">
            <h4 class="text-danger">{{$post->reports->count()}} report</h4>
            <div class="col-2 ">
                <div class="col d-flex justify-content-end btn-outline-blue dropdown "
                     id="more-horizontal" role="button" data-bs-toggle="dropdown">
                    <span class="material-icons-round">more_horiz</span>
                </div>
                <ul class="dropdown-menu more-horizontal" aria-labelledby="more-horizontal">
                    <li><a class="dropdown-item btn-outline-blue dismiss"><span
                                class="material-icons-outlined align-middle ">done</span> <span class = "dismiss"> Dismiss</span></a>
                    </li>
                    <li><a class="dropdown-item btn-outline-red delete"><span
                                class="material-icons-outlined align-middle">delete</span> <span class = "delete"> Delete</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- /.news-card -->