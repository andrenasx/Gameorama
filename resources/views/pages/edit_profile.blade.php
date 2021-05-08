@extends('layouts.app')
@section('page-title', 'Edit '.$member->username.'\'s profile | ')
@section('content')
    @include('partials.navbar')
    <script defer src="{{ asset('js/edit_profile.js') }}"></script>
    <section class="container g-0 mx-auto my-4 col-lg-7">
        <section class="profile-widget bg-white rounded mb-3">
            <form method="POST" action="{{ route('edit_profile', $member->username) }}" enctype="multipart/form-data"
                  id="edit_form">
                @csrf
                {!! method_field('patch') !!}
                <row class="mb-3">
                    <div class="col-12 justify-content-center">
                        <div class="image-container bg2" id="banner_photo_preview"
                             style="background-image: url({{ asset('media/members+'.$member->banner_image) }}); background-size:cover">
                            <img src="{{ asset('media/members+'.$member->avatar_image) }}" class="avatar"
                                 id="profile_image">
                        </div>
                    </div>
                    <button type="button" class="btn d-flex align-content-center edit_banner_photo camera_icon">
                        <input type="file" hidden id="input_banner_photo" name="banner_photo">
                        <span class="material-icons-outlined" style="font-size: 200%;">camera_alt</span>
                    </button>

                    <div class="">
                        <button type="button" class="btn d-flex align-content-center camera_icon edit_profile_photo">
                            <input type="file" hidden id="input_profile_photo" name="profile_photo">
                            <span class="material-icons-outlined" style="font-size: 200%;">camera_alt</span>
                        </button>
                    </div>
                </row>
                <div class="mt-2 edit_profile_username">
                    <h2 class="h2 fw-bold text-center " id="username">{{$member->username}}</h2>
                </div>

                <section class="container w-100 mt-2 form-group p-2">
                    <div class="mb-4">
                        <label for="new-post-title" class="form-label">Display Name</label>
                        <input type="text" class="form-control" id="new-post-title" name="full_name"
                               value="{{$member->full_name}}">
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlTextarea1" class="form-label">Biography</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="bio" rows="5"
                                  placeholder="Add a bio to your profile!">{{$member->bio}}</textarea>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" id="edit_submit_button">Save changes</button>
                    </div>
                </section>
            </form>
        </section>
    </section>
    @include('partials.footer')
@endsection
