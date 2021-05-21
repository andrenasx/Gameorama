@extends('layouts.app')
@section('page-title', 'Account settings | ')
@section('content')
    @include('partials.navbar')
    @push('scripts')
        <script defer src={{ asset('js/ajax.js') }}></script>
        <script defer src={{ asset('js/settings.js') }}></script>
        <script defer src = {{ asset('js/footer.js') }}></script>
    @endpush

    <section class="p-3 p-lg-5 my-4 col-lg-7 container bg-white rounded">
        <h1 class="h2 fw-bold">Account Settings</h1>
        <hr class="rounded">

        <div class="col-12 col-lg-10 mt-5 mx-auto px-4 py-5 rounded" id="field-container">
            <button type="button" class="btn btn-primary p-2 col-4" id="accept-button" data-bs-toggle="modal"
                    data-bs-target="#staticBackdropEmail">Change
            </button>
            <h1 class="h4 fw-bold">Email Address</h1>
            <h2 class="h5 fw-lighter" id="member-email">{{$member->email}}</h2>
        </div>

        <div class="col-12 col-lg-10 mt-5 mx-auto px-4 pt-5 pb-5 rounded" id="field-container">
            <button type="button" class="btn btn-primary p-2 col-4" id="accept-button" data-bs-toggle="modal"
                    data-bs-target="#staticBackdropPassword">Change
            </button>
            <h1 class="h4 fw-bold">Change Password</h1>
            <h2 class="h5 fw-lighter">Password must be at least 6 characters long</h2>
        </div>

        <div class="col-12 col-lg-8 pt-4 pb-4 container" id="field-delete-container">
            <h1 class="h4 fw-bold">Danger Zone</h1>
            <h2 class="h5 fw-bold">☢️ BEWARE THE NUCLEAR BUTTON ☢️</h2>
            <button type="button" class="btn btn-danger mt-2 p-2 col-8 col-xxl-4" id="delete-button"
                    data-bs-toggle="modal" data-bs-target="#staticBackdropDelete">Delete Account
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdropEmail" data-bs-backdrop="static" data-bs-keyboard="false"
             tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Change Email Address</h5>
                        <button type="button" data-bs-dismiss="modal" id="close-window-button" aria-label="Close"><span
                                class="material-icons-round">close</span></button>
                    </div>
                    <form id="change-email" autocomplete="off">
                        <div class="modal-body">
                            <div class="form-floating mb-4">
                                <input type="email" id="inputNewEmail" class="form-control" placeholder=" " required>
                                <label for="inputNewEmail">New Email Address</label>
                                <div class="invalid-feedback error-email"></div>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="email" id="inputConfEmail" class="form-control" placeholder=" " required>
                                <label for="inputConfEmail">Confirm New Email Address</label>
                                <div class="invalid-feedback error-email_confirmation"></div>
                            </div>
                            <div class="form-floating">
                                <input type="password" id="inputPass" class="form-control" placeholder=" " required>
                                <label for="inputPass">Password</label>
                                <div class="invalid-feedback error-password"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="staticBackdropPassword" data-bs-backdrop="static" data-bs-keyboard="false"
             tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Change Password</h5>
                        <button type="button" data-bs-dismiss="modal" id="close-window-button" aria-label="Close"><span
                                class="material-icons-round">close</span></button>
                    </div>
                    <form id="change-password" autocomplete="off">
                        <div class="modal-body">
                            <div class="form-floating mb-4">
                                <input type="password" id="inputOldPass" class="form-control" placeholder=" "
                                       required autofocus>
                                <label for="inputOldPass">Old Password</label>
                                <div class="invalid-feedback error-old_password">
                                </div>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" id="inputNewPass" class="form-control" placeholder=" "
                                       required autofocus>
                                <label for="inputNewPass">New Password</label>
                                <div class="invalid-feedback error-new_password"></div>
                            </div>

                            <div class="form-floating">
                                <input type="password" id="inputConfPass" class="form-control" placeholder=" "
                                       required autofocus>
                                <label for="inputConfPass">Confirm New Password</label>
                                <div class="invalid-feedback error-new_password_confirmation"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="staticBackdropDelete" data-bs-backdrop="static" data-bs-keyboard="false"
             tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabelDelete">Delete Account</h5>
                        <button type="button" data-bs-dismiss="modal" id="close-window-button" aria-label="Close"><span
                                class="material-icons-round">close</span></button>
                    </div>
                    <form id="delete-acc" data-username="{{ Auth::user()->username }}" autocomplete="off">
                        <div class="modal-body">
                            <p class="game-quote mt-3">“You’ve met with a terrible fate, haven’t you?” </p>
                            <p class="game-quote-origin">- The Legend of Zelda: Majora’s Mask </p>
                            <!--Rotating Game Quotes-->
                            <div class="form-floating">
                                <input type="password" id="inputDeleteAccount" class="form-control" placeholder=" "
                                       required autofocus>
                                <label for="inputDeleteAccount">Enter Account Password</label>
                                <div class="invalid-feedback error-password"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection
