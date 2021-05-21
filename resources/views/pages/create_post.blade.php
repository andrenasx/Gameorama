@extends('layouts.app')
@section('page-title', 'Create | ')
@section('content')
    @include('partials.navbar')
    @push('scripts')
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <!-- Select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


        <!-- Dropzone -->
        <link href="{{ asset('assets/dropzone-5.7.0/dist/min/dropzone.min.css') }}" rel="stylesheet"/>
        <script src="{{ asset('assets/dropzone-5.7.0/dist/dropzone.js') }}"></script>

        <script defer src={{ asset('js/create_post.js') }}></script>
        <script defer src = {{ asset('js/footer.js') }}></script>
    @endpush
    <section class="p-3 p-lg-5 my-4 col-lg-7 container bg-white rounded">
        <h2 class="h2 fw-bold">Create a Post</h2>
        <hr class="rounded">

        <section class="container w-100 mt-4 form-group">
            <form method="POST" action="{{ route('store_post') }}" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <section id="title" class="mb-5">
                    <label for="new-post-title" class="h5 form-label">Title</label>
                    <input type="text" class="form-control" id="new-post-title" name="title" value="{{ old('title') }}" required>
                    @foreach($errors->get('title') as $error)
                        <li class="error">{{$error}}</li>
                    @endforeach
                </section>

                <section id="body" class="mb-5">
                    <label for="editor-body" class="h5 form-label">Body</label><span> (optional)</span>
                    <textarea class="form-control" id="editor-body" name="body" rows="5">{{ old('body') }}</textarea>
                    @foreach($errors->get('body') as $error)
                        <li class="error">{{$error}}</li>
                    @endforeach
                </section>

                <section id="topics" class="mb-5">
                    <label for="select2-topics" class="h5 form-label">Topics</label>
                    <select id="select2-topics" class="form-control" multiple="multiple" name="topics[]" required>
                        @foreach($topics as $topic)
                            <option value="{{ $topic->name }}">{{ $topic->name }}</option>
                        @endforeach
                    </select>
                    @foreach($errors->get('topics') as $error)
                        <li class="error">{{$error}}</li>
                    @endforeach
                </section>

                <section id="images">
                    <label for="formFileMultiple" class="h5 form-label">Upload media</label>
                    <input class="form-control form-control-sm p-4" id="formFileMultiple" type="file" name="images[]" multiple>
                    @foreach($errors->get('images') as $error)
                        <li class="error">{{$error}}</li>
                    @endforeach
                </section>

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
@endsection
