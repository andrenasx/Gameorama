@extends('layouts.app')
@section('content')
    @include('partials.navbar')
    @push('scripts')
        <script defer src = {{ asset('js/ajax.js') }}></script>
        <script defer src = {{ asset('js/footer.js') }}></script>
        <script defer src = {{ asset('js/admin.js') }}></script>
    @endpush
    <section class="container g-0 mx-auto mt-4 col-lg-7">
        <header class="p-3 p-lg-5 mb-3 bg-white rounded">
            <h2 class="h2 fw-bold">Administration Area</h2>
            <hr class="rounded">

            <div class="row align-items-center">
                
                <div class="col-12 ">
                    <p class="text-center">Reported Accounts and Content by Gameorama members:</p>
                </div>
                </div>
            </div>
        </header>

        <section class="pill-navigation mb-1">
            <ul class="nav nav-pills mb-1 justify-content-space-between bg-white rounded" id="pills-tab" role="tablist">
                <li class="nav-item col-3" role="presentation">
                    <button class="nav-link active w-100 text-center" id="pills-posts-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-reported-posts" type="button" role="tab"
                            aria-controls="pills-reported_posts"
                            aria-selected="true">Posts
                    </button>
                </li>
                <li class="nav-item col-3" role="presentation">
                    <button class="nav-link w-100 text-center overflow-hidden" id="pills-comments-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#pills-reported-comments" type="button" role="tab"
                            aria-controls="pills-comments"
                            aria-selected="false">Comments
                    </button>
                </li>
                <li class="nav-item col-3" role="presentation">
                    <button class="nav-link w-100 text-center" id="pills-topics-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-reported-topics" type="button" role="tab"
                            aria-controls="pills-topics"
                            aria-selected="true">Topics
                    </button>
                </li>
                <li class="nav-item col-3" role="presentation">
                    <button class="nav-link w-100 text-center" id="pills-users-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-reported-users" type="button" role="tab" aria-controls="pills-users"
                            aria-selected="false">Members
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active posts" id="pills-reported-posts" role="tabpanel"
                     aria-labelledby="pills-posts-tab">
                     @foreach ($posts as $post) 
                        @include('partials.reported_post', ['post' => $post])
                     @endforeach
                </div>


                <div class="tab-pane fade show" id="pills-reported-comments" role="tabpanel"
                     aria-labelledby="pills-comments-tab">
                    <section class=" rounded comments">
                        @foreach ($comments as $comment)
                            @include('partials.reported_comment', ['comment' => $comment])
                        @endforeach
                    </section>
                </div>


                <div class="tab-pane fade show" id="pills-reported-topics" role="tabpanel"
                     aria-labelledby="pills-topics-tab">
                    <section class=" rounded topics">
                        @foreach ($topics as $topic)
                            @include('partials.reported_topic', ['topic' => $topic])
                        @endforeach
                    </section>
                </div>


                <div class="tab-pane fade show" id="pills-reported-users" role="tabpanel"
                     aria-labelledby="pills-users-tab">
                    <section class=" rounded members">
                        @foreach ($members as $member)
                            @include('partials.reported_member', ['member' => $member])
                        @endforeach

                    </section>
                </div>
            </div>
        </section>
    </section>

    @include('partials.footer')
@endsection
