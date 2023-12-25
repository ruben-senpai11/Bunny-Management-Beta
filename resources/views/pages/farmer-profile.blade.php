@extends('layouts.base')

@section('content')
<div class="row">
    <h3 class=" mb-1">Profile du fermier</h3>
</div>
<div class="row">
    <div class="col-12 col-xl-8" style="order: 2;">
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">General information</h2>
            <form action="{{ route('edit-bunny', ) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div><label for="first_name">First Name</label> <input class="form-control" id="first_name" name="inputFirstName"
                                type="text" placeholder="{{$user->first_name}}" required></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div><label for="last_name">Last Name</label> <input class="form-control" id="last_name" name="inputLastName"
                                type="text" placeholder="{{$user->last_name}}" required></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group"><label for="email">Email</label> <input class="form-control" name="inputEmail" id="email"
                                type="email" placeholder="{{$user->email}}" required></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group"><label for="phone">Phone</label> <input class="form-control" name="inputName" id="phone"
                                type="number" placeholder="{{$user->number}}" required></div>
                    </div>
                </div>
                <h2 class="h5 my-4">Location</h2>
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <div class="form-group"><label for="address">Address</label> <input name="inputAddress" class="form-control"
                                id="address" type="text" placeholder="{{$user->address}}" required></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 mb-3">
                        <div class="form-group"><label for="inputCity" class="form-label">Cité</label>
                            <input  type="text" class="form-control" id="inputCity" name="inputCity" placeholder="{{$user->city}}">
                        </div>
                    </div>
                        <div class="col-sm-4">
                        <div class="form-group"><label for="zip">ZIP</label> <input name="inputZip" class="form-control" id="zip"
                                type="tel" placeholder="{{$user->ZIP}}" required></div>
                    </div>
                </div>
                <div class="mt-3"><button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save all</button>
                </div>
            </form>
        </div>
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Sécurité</h2>
            <form>
                <h2 class="h5 my-4">Changer votre mot de passe</h2>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div><label for="old_password">Ancien mot de passe</label> <input class="form-control" id="old_password"
                                type="password" placeholder="*****" required></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div><label for="new_password">Nouveau mot de passe</label> <input class="form-control"
                                id="new_password" type="password" placeholder="*****" required></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div><label for="new_password_confirmation">Confirmation du nouveau mot de passe</label> <input
                                class="form-control" id="new_password_confirmation" type="password" placeholder="*****"
                                required></div>
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
                    <div class="profile-cover rounded-top" data-background="{{ asset('assets/img/cover-bunny-pic.jpg') }}"></div>
                    <div class="card-body pb-5"><img src="{{ asset('assets/img/profile-user_64572.png') }}"
                            class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait">
                        <h4 class="h3">{{$user->first_name}} {{$user->last_name}}</h4>
                        <h5 class="fw-normal">@if ($user->userFarms->first()->role)
                            Propriétaire
                        @else
                            Emploiyer
                        @endif</h5>
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