@extends('layouts.base')

@section('content')
<div class="row">
    <h3 class=" mb-1">Profile du fermier</h3>
</div>
<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">General information</h2>
            <form>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div><label for="first_name">First Name</label> <input class="form-control" id="first_name"
                                type="text" placeholder="Enter your first name" required></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div><label for="last_name">Last Name</label> <input class="form-control" id="last_name"
                                type="text" placeholder="Also your last name" required></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group"><label for="email">Email</label> <input class="form-control" id="email"
                                type="email" placeholder="name@company.com" required></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group"><label for="phone">Phone</label> <input class="form-control" id="phone"
                                type="number" placeholder="+12-345 678 910" required></div>
                    </div>
                </div>
                <h2 class="h5 my-4">Location</h2>
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <div class="form-group"><label for="address">Address</label> <input class="form-control"
                                id="address" type="text" placeholder="Enter your home address" required></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 mb-3">
                        <div class="form-group"><label for="inputCity" class="form-label">Cité</label>
                            <input type="text" class="form-control" id="inputCity" name="inputCity">
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="country" class="form-label">Pays</label>
                        <input type="text" id="country" name="country" class="form-control">

                    </div>
                    <div class="col-sm-4">
                        <div class="form-group"><label for="zip">ZIP</label> <input class="form-control" id="zip"
                                type="tel" placeholder="ZIP" required></div>
                    </div>
                </div>
                <h2 class="h5 my-4">Sécurité</h2>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div><label for="old_password">Ancien mot de passe</label> <input class="form-control" id="old_password" type="password"
                                placeholder="*****" required></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div><label for="new_password">Nouveau mot de passe</label> <input class="form-control" id="new_password" type="password"
                                placeholder="*****" required></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div><label for="new_password_confirmation">Confirmation du nouveau mot de passe</label> <input class="form-control" id="new_password_confirmation" type="password"
                                placeholder="*****" required></div>
                    </div>
                </div>
                <div class="mt-3"><button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save all</button>
                </div>
            </form>
        </div>
        <div class="card card-body border-0 shadow mb-4 mb-xl-0">
            <h2 class="h5 mb-4">Alerts & Notifications</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
                    <div>
                        <h3 class="h6 mb-1">Company News</h3>
                        <p class="small pe-4">Get Rocket news, announcements, and product updates</p>
                    </div>
                    <div>
                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox"
                                id="user-notification-1"> <label class="form-check-label"
                                for="user-notification-1"></label></div>
                    </div>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
                    <div>
                        <h3 class="h6 mb-1">Account Activity</h3>
                        <p class="small pe-4">Get important notifications about you or activity you've missed</p>
                    </div>
                    <div>
                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox"
                                id="user-notification-2" checked="checked"> <label class="form-check-label"
                                for="user-notification-2"></label></div>
                    </div>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                    <div>
                        <h3 class="h6 mb-1">Meetups Near You</h3>
                        <p class="small pe-4">Get an email when a Dribbble Meetup is posted close to my location</p>
                    </div>
                    <div>
                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox"
                                id="user-notification-3" checked="checked"> <label class="form-check-label"
                                for="user-notification-3"></label></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card shadow border-0 text-center p-0">
                    <div class="profile-cover rounded-top" data-background="../assets/img/profile-cover.jpg"></div>
                    <div class="card-body pb-5"><img src="../assets/img/team/profile-picture-1.jpg"
                            class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait">
                        <h4 class="h3">Neil Sims</h4>
                        <h5 class="fw-normal">Senior Software Engineer</h5>
                        <p class="text-gray mb-4">New York, USA</p><a
                            class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2" href="#"><svg
                                class="icon icon-xs me-1" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                                </path>
                            </svg> Connect </a><a class="btn btn-sm btn-secondary" href="#">Send Message</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<Script>
    $(document).ready(function() {
    $('#select-field').select2({
      theme: 'bootstrap-5'
    });
  });
</Script>
@endsection