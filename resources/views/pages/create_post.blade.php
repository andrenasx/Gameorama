@extends('layouts.app')
@section('page-title', 'Create | ')
@section('content')
    @include('partials.navbar')
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script defer src={{ asset('js/create_post.js') }}></script>
    @endpush
    <section class="p-3 p-lg-5 my-4 col-lg-7 container bg-white rounded">
        <h2 class="h2 fw-bold">Create a Post</h2>
        <hr class="rounded">

        <section class="container w-100 mt-4 form-group">
            <form method="POST" action="{{ route('store_post') }}" enctype="multipart/form-data">
                @csrf
                <input hidden name="id_owner" value="{{ Auth::user()->id }}">
                <div class="mb-4">
                    <label for="new-post-title" class="h5 form-label">Title</label>
                    <input type="text" class="form-control" id="new-post-title" name="title" required>
                </div>

                <div class="mb-4">
                    <label for="exampleFormControlTextarea1" class="h5 form-label">Text (optional)</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="5"></textarea>
                </div>

                <label for="select2-topics" class="h5 form-label">Topics</label>
                <select id="select2-topics" class="form-control" multiple="multiple" name="topics[]" required>
                    @foreach($topics as $topic)
                        <option value="{{ $topic->name }}">{{ $topic->name }}</option>
                    @endforeach
                </select>

                <div class="mt-4">
                    <label for="formFileMultiple" class="h5 form-label">Upload media</label>
                    <input class="form-control form-control-sm p-4" id="formFileMultiple" type="file" name="images[]" multiple>
                </div>

                <section class="container create_post_buttons mb-2 mb-lg-0">
                    <div class="row d-flex justify-content-around">
                        <button type="button" class="col-5 col-md-4 col-lg-3 btn btn-secondary"
                                onclick="window.location.href=document.referrer">Cancel
                        </button>
                        <button type="submit" class="col-5 col-md-4 col-lg-3 btn btn-primary">Post</button>
                    </div>
                </section>
            </form>
        </section>
    </section>
    @include('partials.footer')
    <script>

    </script>
@endsection
