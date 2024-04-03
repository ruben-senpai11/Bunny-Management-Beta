@extends('layouts.base')
@section('style')
<link href="{{ asset('vendor/virtual-select-master/dist/virtual-select.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<style>
    .datepicker-input {
        border-top-right-radius: 7px !important;
        border-bottom-right-radius: 7px !important;
    }

    @keyframes change_box-shadow {
        0% {
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .07), 0 0 0 0.18rem rgba(31, 41, 55, .20);
        }

        50% {
            box-shadow: 0 0px 0px;
        }

        100% {
            box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .07), 0 0 0 0.18rem rgba(31, 41, 55, .20);
        }
    }

    .default-red {
        /* border-color: red; */
        color: #6b7280;
        background-color: #fff;
        border-color: #4d6689;
        outline: 0;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .07), 0 0 0 0.18rem rgba(31, 41, 55, .20);
        animation: change_box-shadow 2s infinite;
    }

    .fw-400 {
        font-weight: 400;
    }
</style>

<div class="row">
    <div class="col-12 col-xl-9">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <div class="baby-bunny-form">
            <div class="card-header d-flex align-items-center bg-success">
                <h2 class="fs-5 fw-400 mb-0" style="color: #fff">Enregistrer un Lapereau</h2>
                <div class="ms-auto"><a class="fw-normal d-inline-flex align-items-center" href="#" style="color: #fff"><svg class="icon icon-xxs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                        </svg> Voir tout</a></div>
            </div>
            <div class="card card-body border-0 shadow mb-4">
                <form action="" method="post">
                    @csrf
                    <div id="babyForm" class="row mb-3">
                        <div class="col-lg-4 col-sm-6">

                            <div class="mb-3">
                                <label for="uid" class="">Créer un identifiant</label>
                                <input type="text" class="form-control default-red uid" name="uid" id="uid" placeholder="M-001" required>
                                <div class="invalid-feedback">Attention, cet identifiant est dejà utilisé !</div>
                            </div>
                        </div>
                        <div class=" col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="">Identifier de la mère</label>
                                <input type="text" class="form-control default-red mother_uid" name="mother_uid" id="mother_uid" placeholder="F-001" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="">Identifier la gestation</label>
                                <select style="width: 100%" name="gestation_id" class="form-control no_nullable_baby_field gestation_id">
                                </select>
                                <span class="text-danger" id="error2"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="color">Couleurs</label>
                                <select class="no_nullable_bunny_field color" type="text" name="color" placeholder="Sélectionner" multiple>
                                    @foreach( App\Models\Color::all('color_name') as $color){
                                    <option value="{{$color->color_name}}">{{$color->color_name}}</option>
                                    }
                                    @endforeach
                                    ...
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="weight">Poids (g)</label>
                                <input class="form-control no_nullable_baby_field" type="text" name="weight" id="weight" value="200">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <fieldset class="mb-2">
                                <legend class="h6">Sexe</legend>
                                <div class="form-check">
                                    <input class="form-check-input no_nullable_baby_field" type="radio" name="gender" id="gendera" value="male">
                                    <label class="form-check-label" for="gendera">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input no_nullable_baby_field" type="radio" name="gender" id="genderb" value="female">
                                    <label class="form-check-label" for="genderb">
                                        Femelle
                                    </label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <fieldset class="mb-2">
                                <legend class="h6">Santé</legend>
                                <div class="form-check">
                                    <input class="form-check-input no_nullable_baby_field" type="radio" name="state" id="statea" value="healthy">
                                    <label class="form-check-label" for="statea">
                                        Bien portant
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input no_nullable_baby_field" type="radio" name="state" id="stateb" value="sick_bunny">
                                    <label class="form-check-label" for="stateb">
                                        Malade
                                    </label>
                                </div>

                            </fieldset>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <fieldset class="mb-2">
                                <legend class="h6">Destination</legend>
                                <div class="form-check">
                                    <input class="form-check-input no_nullable_baby_field" type="radio" name="destination" id="destinationa" value="fattening">
                                    <label class="form-check-label" for="destinationa">
                                        Engraissement
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input no_nullable_baby_field" type="radio" name="destination" id="destinationb" value="mating">
                                    <label class="form-check-label" for="destinationb">
                                        Reproduction
                                    </label>
                                </div>

                            </fieldset>
                        </div>
                    </div>
                    <div id="newBabyField"></div>
                    <div style="float:right">
                        <button type="button" id="addBabyField" class="btn btn-light" style="border-color: #0EA271;">Ajouter +</button>&nbsp;
                        <button type="button" id="submitBabyForm" name="babyBunnyForm" value="1" class="btn btn-success" style="color: white; ">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="bunny-form mt-4">
            @if (session()->has('g_message'))
            <div class="alert alert-success">
                {{ session('g_message') }}
            </div>
            @endif
            <div class="card-header d-flex align-items-center bg-secondary">
                <h2 class="fs-5 fw-bold mb-0">Enregistrer un Lapin</h2>
                <div class="ms-auto"><a class="fw-normal d-inline-flex align-items-center" href="#">
                        <svg class="icon icon-xxs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                        </svg> Voir tout</a>
                </div>
            </div>
            <div class="card card-body border-0 shadow mb-4">
                <form action="" method="post">
                    @csrf
                    <div id="bunny-form" class="row mb-4">
                        <div class="col-lg-4 col-sm-6">
                            <!-- Form -->
                            <div class="mb-3">
                                <label for="g_uid">Saisir un identifiant</label>
                                <input type="text" class="form-control default-red g_uid" name="g_uid" id="g_uid" placeholder="F-001" required>
                                <div class="invalid-feedback">Attention, cet identifiant est dejà utilisé !</div>
                            </div>

                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="g_color">Couleurs</label>
                                <select class="no_nullable_bunny_field g_color" type="text" name="g_color" id="g_color" placeholder="Sélectionner" multiple>
                                    @foreach( App\Models\Color::all('color_name') as $color){
                                    <option value="{{$color->color_name}}">{{$color->color_name}}</option>
                                    }
                                    @endforeach
                                    ...
                                </select>
                            </div>

                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <!-- Form -->
                            <div class="mb-3">
                                <label for="g_date_birth">Date de Naissance</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <input class="form-control no_nullable_bunny_field" name="g_date_birth" id="g_date_birth" type="date" placeholder="dd/mm/yyyy">
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="g_race">Race</label>
                                <select class="no_nullable_bunny_field g_race" name="g_race" id="g_race" placeholder="Sélectionner" multiple required>
                                    @foreach( App\Models\Race::all('race_name') as $race){
                                    <option value="{{$race->race_name}}">{{$race->race_name}}</option>
                                    }
                                    @endforeach
                                    ...
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="weight">Poids (g)</label>
                                <input class="form-control no_nullable_bunny_field" type="number" name="g_weight" id="g_weight" value="1100">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <fieldset class="mb-3">
                                <legend class="h6">Santé</legend>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="g_state" id="g_statea" value="healthy">
                                    <label class="form-check-label" for="g_statea">
                                        Bien portant
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="g_state" id="g_stateb" value="sick_bunny">
                                    <label class="form-check-label" for="g_stateb">
                                        Malade
                                    </label>
                                </div>

                            </fieldset>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <fieldset class="mb-3">
                                <legend class="h6">Destination</legend>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="g_destination" id="g_destinationa" value="fattening">
                                    <label class="form-check-label" for="g_destinationa">
                                        Engraissement
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="g_destination" id="g_destinationb" value="mating">
                                    <label class="form-check-label" for="g_destinationb">
                                        Reproduction
                                    </label>
                                </div>

                            </fieldset>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <fieldset>
                                <legend class="h6">Sexe</legend>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="g_gender" id="g_gendera" value="male">
                                    <label class="form-check-label" for="g_gendera">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="g_gender" id="g_genderb" value="female">
                                    <label class="form-check-label" for="g_genderb">
                                        Femelle
                                    </label>
                                </div>

                            </fieldset>
                        </div>
                    </div>
                    <div id="newBunnyField"></div>
                    <div style="float:right">
                        <button type="button" id="addBunnyField" class="btn btn-light" style="border-color: #F0BC74">Ajouter +</button>&nbsp; <!-- -->
                        <button type="button" id="submitBunnyForm" name="bunnyForm" value="1" class="btn btn-secondary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-3 p-4">
        <div class="row">

            <div class="col-12 p-0">
                <div class="card notification-card border-0 shadow">
                    <div class="card-header d-flex align-items-center bg-light ">
                        <h2 class="fs-5 fw-bold mb-0">Aide </h2>
                        <div class="ms-auto"><a class="fw-bold d-inline-flex align-items-center" href="#">?</a></div>
                    </div>
                    <div class="p-3 pb-2">
                        <ol>
                            <li>Veuillez renseigner toutes les informations. Seul le champ couleur est optionnel.</li>
                            <li>Vous pouvez choisir une ou plusieurs races, de même pour les couleurs.</li>
                            <li>Avec le bouton <strong>Ajouter</strong> vous pouvez enregistrer plusieurs lapins à la fois. <br>
                                Vous pouvez aussi supprimer les formulaires créés dynamiquement avec le bouton <strong>Supprimer</strong>.
                            </li>
                        </ol>
                    </div>
                    <!-- <div class="card-body">
                        <div class="list-group list-group-flush list-group-timeline">
                            <div class="list-group-item border-0">
                                <div class="row ps-lg-0">
                                    <div class="col-auto">
                                        <div class="icon-shape icon-xs icon-shape-purple rounded"><svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                                </path>
                                            </svg></div>
                                    </div>
                                    <div class="col ms-n2 mb-3">
                                        <h3 class="fs-6 fw-bold mb-1">You sold an item</h3>
                                        <p class="mb-1">Bonnie Green just purchased "Volt - Admin Dashboard"!</p>
                                        <div class="d-flex align-items-center"><svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                            </svg> <span class="small">1 minute ago</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item border-0">
                                <div class="row ps-lg-1">
                                    <div class="col-auto">
                                        <div class="icon-shape icon-xs icon-shape-primary rounded"><svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path>
                                            </svg></div>
                                    </div>
                                    <div class="col ms-n2 mb-3">
                                        <h3 class="fs-6 fw-bold mb-1">New message</h3>
                                        <p class="mb-1">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                        <div class="d-flex align-items-center"><svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                            </svg> <span class="small">8 minutes ago</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item border-0">
                                <div class="row ps-lg-1">
                                    <div class="col-auto">
                                        <div class="icon-shape icon-xs icon-shape-warning rounded"><svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg></div>
                                    </div>
                                    <div class="col ms-n2 mb-3">
                                        <h3 class="fs-6 fw-bold mb-1">Product issue</h3>
                                        <p class="mb-0">A new issue has been reported for Pixel Pro.</p>
                                        <div class="d-flex align-items-center"><svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                            </svg> <span class="small">10 minutes ago</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item border-0">
                                <div class="row ps-lg-1">
                                    <div class="col-auto">
                                        <div class="icon-shape icon-xs icon-shape-success rounded"><svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                                            </svg></div>
                                    </div>
                                    <div class="col ms-n2 mb-3">
                                        <h3 class="fs-6 fw-bold mb-1">Product update</h3>
                                        <p class="mb-0">Spaces - Listings Template has been updated</p>
                                        <div class="d-flex align-items-center"><svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                            </svg> <span class="small">4 hours ago</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item border-0">
                                <div class="row ps-lg-1">
                                    <div class="col-auto">
                                        <div class="icon-shape icon-xs icon-shape-success rounded"><svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                                            </svg></div>
                                    </div>
                                    <div class="col ms-n2">
                                        <h3 class="fs-6 fw-bold mb-1">Product update</h3>
                                        <p class="mb-0">Volt - Admin Dashboard has been updated</p>
                                        <div class="d-flex align-items-center"><svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                            </svg> <span class="small">8 hours ago</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>


        </div>
    </div>
    <!-- <button type="submit" name="recuperer_donnees" id="recuperer-donnees" class="btn btn-primary">Enregistrer</button> -->

</div>


<script src="{{ asset('vendor/virtual-select-master/dist/virtual-select.min.js') }}"></script>
<script>
    function initVirtualSelect() {
        VirtualSelect.init({
            ele: '.color, .g_color, .g_race',
            // Text to show when no options to show
            noOptionsText: 'Aucune donnée',
            // Text to show when no results on search
            noSearchResultsText: 'Aucun résultat',
            // Text to show near select all checkbox when search is disabled
            selectAllText: 'Tout sélectionner',
            // Text to show as placeholder for search input
            searchPlaceholderText: 'Rechercher...',
            // Text to use when displaying no.of values selected text (i.e. 3 options selected)
            optionsSelectedText: 'Sélectionnés',
            // Text to use when displaying no.of values selected text and only one value is selected (i.e. 1 option selected)
            optionSelectedText: 'Sélectionnés',
            // Text to use when displaying all values selected text (i.e. All (10))
            allOptionsSelectedText: 'Tout'
        });
    }
    initVirtualSelect()
</script>

<script type="text/javascript">
    let i = 2
    $("#addBabyField").click(function() {
        newBabyForm =
            '<div id="addedBabyField" class="row mb-4 pt-4" style="border: 1px solid lightgray; border-radius: 10px;" >' +
            '<p class="text-bold">' + i + 'ème lapereau</p>' +
            '<div class="col-lg-4 col-sm-6"> ' +
            '<div class="mb-3">' +
            '<label for="uid_.' + i + '">Saisir un identifiant</label>' +
            '<input type="text" name="uid.' + i + '" class="form-control default-red uid" placeholder="M-001" required>' +
            '<div class="invalid-feedback">Attention, cet identifiant est dejà utilisé !</div>' +
            '</div>' +
            '</div>' +
            '<div class=" col-lg-4 col-sm-6">' +
            '<div class="mb-3">' +
            '<label for="weight' + i + '">Poids (g)</label>' +
            '<input class="form-control no_nullable_baby_field" type="text" name="weight.' + i + '" id="weight.' + i + '" value="200">' +
            '</div>' +
            '</div>' +
            '<div class="col-lg-4 col-sm-6">' +
            '<div class="mb-3">' +
            '<label for="color.' + i + '">Couleurs</label>' +
            '<select class="no_nullable_bunny_field color" type="text" name="color.' + i + '" id="color.' + i + '" placeholder="Sélectionner" multiple >' +
            '@foreach( App\Models\Color::all("color_name") as $color){' +
            '<option value="{{$color->color_name}}">{{$color->color_name}}</option>' +
            '}@endforeach' +
            '...' +
            '</select>' +
            '</div>' +
            '</div>' +
            '<div class=" col-lg-4 col-sm-6">' +
            '<fieldset class="mb-2">' +
            '<legend class="h6">Santé</legend>' +
            '<div class="form-check">' +
            '<input class="form-check-input" type="radio" name="state.' + i + '" id="statea.' + i + '" value="healthy" required>' +
            '<label class="form-check-label" for="statea.' + i + '">Bien portant</label></div>' +
            '<div class="form-check">' +
            '<input class="form-check-input" type="radio" name="state.' + i + '" id="stateb.' + i + '" value="sick_bunny" required>' +
            '<label class="form-check-label" for="stateb.' + i + '">Malade</label></div>' +
            '</fieldset>' +
            '</div>' +
            '<div class=" col-lg-4 col-sm-6">' +
            '<fieldset class="mb-2">' +
            '<legend class="h6">Sexe</legend>' +
            '<div class="form-check">' +
            '<input class="form-check-input" type="radio" name="gender.' + i + '" id="gender.' + i + 1500 + '" value="male" required>' +
            '<label class="form-check-label" for="gender.' + i + 1500 + '">Male</label>' +
            '</div>' +
            '<div class="form-check">' +
            '<input class="form-check-input" type="radio" name="gender.' + i + '" id="gender.' + i + 2000 + '" value="female" required>' +
            '<label class="form-check-label" for="gender.' + i + 2000 + '">Femelle</label>' +
            '</div>' +
            '</fieldset>' +
            '</div>' +
            '<div class=" col-lg-4 col-sm-6">' +
            '<fieldset class="mb-2">' +
            '<legend class="h6">Destination</legend>' +
            '<div class="form-check">' +
            '<input class="form-check-input" type="radio" name="destination_' + i + '" id="g_destinationa.' + i + 1500 + '" value="fattening" required>' +
            '<label class="form-check-label" for="g_destinationa.' + i + 1500 + '">Engraissement</label>' +
            '</div>' +
            '<div class="form-check">' +
            '<input class="form-check-input" type="radio" name="destination_' + i + '" id="g_destinationb.' + i + 2000 + '" value="mating" required>' +
            '<label class="form-check-label" for="g_destinationb.' + i + 2000 + '">Reproduction</label>' +
            '</div>' +
            '</fieldset>' +
            '</div>' +
            '<div class="mb-2">' +
            '<button type="button" id="deleteBabyField" class="btn btn-danger" style="float:right;">Retirer -</button>&nbsp;' +
            '</div>';
        '</div>';
        $('#newBabyField').append(newBabyForm);
        initVirtualSelect()
        i += 1;
    })
    $("body").on("click", "#deleteBabyField", function() {
        $(this).parents("#addedBabyField").remove();
    })
    let numberOfBabyFields = $('div#' + 'addedBabyField').length;

    let j = 2
    $("#addBunnyField").click(function() {
        newBunnyForm =
            '<div id="addedBunnyField" class="row mb-4 pt-4" style="border: 1px solid lightgray; border-radius: 10px;" >' +
            '<p class="text-bold">' + j + 'ème lapin</p>' +
            '<div class="col-lg-4 col-sm-6"> ' +
            '<div class="mb-3">' +
            '<label for="g_uid.' + j + '">Saisir un identifiant</label>' +
            '<input type="text" class="form-control default-red g_uid" name="g_uid.' + j + '" placeholder="F-001" required>' +
            '<div class="invalid-feedback">Attention, cet identifiant est dejà utilisé !</div>' +
            '</div>' +    
            '</div>' +
            '<div class="col-lg-4 col-sm-6">' +        
            '<div class="mb-3">' +
            '<label for="g_color' + i + '">Couleurs</label>' +
            '<select class="no_nullable_bunny_field g_color" type="text" name="g_color' + i + '" id="g_color' + i + '" placeholder="Sélectionner" multiple >' +
            '@foreach( App\Models\Color::all("color_name") as $color){' +
            '<option value="{{$color->color_name}}">{{$color->color_name}}</option>' +
            '}@endforeach' +
            '...' +
            '</select>' +
            '</div>'+
            '</div>' +
            '<div class="col-lg-4 col-sm-6">' +
            '<fieldset>' +
            '<legend class="h6">Santé</legend>' +
            '<div class="form-check">' +
            '<input class="form-check-input" type="radio" name="g_state.' + j + '" id="g_statea.' + j + '" value="healthy" required>' +
            '<label class="form-check-label" for="g_statea.' + j + '">Bien portant</label>' +
            '</div>' +
            '<div class="form-check">' +
            '<input class="form-check-input" type="radio" name="g_state.' + j + '" id="g_stateb.' + j + '" value="sick_bunny" required>' +
            '<label class="form-check-label" for="g_stateb.' + j + '">Malade</label>' +
            '</div>' +
            '</fieldset>' +
            '</div>' +
            '<div class="col-lg-4 col-sm-6">' +
            '<div class="mb-3">' +
            '<label for="g_date_birth.' + j + '">Date de Naissance</label>' +
            '<div class="input-group">' +
            '<span class="input-group-text">' +
            '<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>' +
            '</span>' +
            '<input class="form-control no_nullable_bunny_field" name="g_date_birth.' + j + '" id="g_date_birth.' + j + '" type="date" placeholder="dd/mm/yyyy">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="col-lg-4 col-sm-6">' +
            '<div class="mb-3">' +
            '<label for="weight">Poids (g)</label>' +
            '<input class="form-control no_nullable_bunny_field" type="number" name="g_weight.' + j + '" id="g_weight.' + j + '" value="1100">' +
            '</div>' +
            '</div>' +
            '<div class="col-lg-4 col-sm-6">' +
            '<fieldset>' +
            '<legend class="h6">Destination</legend>' +
            '<div class="form-check">' +
            '<input class="form-check-input" type="radio" name="g_destination.' + j + '" id="g_destinationa.' + j + '" value="fattening" required>' +
            '<label class="form-check-label" for="g_destinationa.' + j + '">Engraissement</label>' +
            '</div>' +
            '<div class="form-check">' +
            '<input class="form-check-input" type="radio" name="g_destination.' + j + '" id="g_destinationb.' + j + '" value="mating" required>' +
            '<label class="form-check-label" for="g_destinationb.' + j + '">Reproduction</label>' +
            '</div>' +
            '</fieldset>' +
            '</div>' +
            '<div class="col-lg-4 col-sm-6">' +            
            '<div class="mb-3">' +
            '<label for="g_race' + j + '">Race</label>' +
            '<select class="no_nullable_bunny_field g_race" name="g_race_' + j + '" id="g_race_' + j + '" placeholder="Sélectionner" multiple required>' +
            '@foreach( App\Models\Race::all("race_name") as $race){ ' +
            '<option value="{{$race->race_name}}">{{$race->race_name}}</option> }' +
            '@endforeach' +
            '...' +
            '</select>' +
            '</div>'+
            '</div>' +
            '<div class="col-lg-4 col-sm-6">' +
            '<fieldset>' +
            '<legend class="h6">Sexe</legend>' +
            '<div class="form-check">' +
            '<input class="form-check-input" type="radio" name="g_gender.' + j + '" id="g_gendera.' + j + '" value="male" required>' +
            '<label class="form-check-label" for="g_gendera.' + j + '">Male</label>' +
            '</div>' +
            '<div class="form-check">' +
            '<input class="form-check-input" type="radio" name="g_gender.' + j + '" id="g_genderb.' + j + '" value="female" required>' +
            '<label class="form-check-label" for="g_genderb.' + j + '">Femelle</label>' +
            '</div>' +
            '</fieldset>' +
            '</div>' +
            '<div class="mb-2" style="float:right">' +
            '<button type="button" id="deleteBunnyField" class="btn btn-warning" style="float:right;">Retirer -</button>&nbsp;' +
            '</div>' +
            '</div>';

        $('#newBunnyField').append(newBunnyForm);
        initVirtualSelect();
        j += 1;
    })
    $("body").on("click", "#deleteBunnyField", function() {
        $(this).parents("#addedBunnyField").remove();
    })
    let numberOfBunnyFields = $('div#' + 'addedBabyField').length;

    $(document).ready(function() {
        let allFieldsValid = false; // Assume at least one field is invalid on page load
        let radioFieldsValid = false;

        $("#submitBabyForm").click(function() {

            $(".no_nullable_baby_field").each(function() {
                if ($(this).val() !== "") {
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    allFieldsValid = true; // At least one field is valid
                } else {
                    $(this).addClass("is-invalid");
                    $(this).removeClass("is-valid");
                    allFieldsValid = false; // A field is invalid, so overall form is invalid
                    return false; // Exit the each() loop early since we found an invalid field
                }
            });

            const genderRadio = $("#babyForm input[name='gender']:checked");
            if (genderRadio.length === 0) {
                // No radio option is selected
                $("#babyForm input[name='gender']").addClass("is-invalid");
                radioFieldsValid = false;
            } else {
                $("#babyForm input[name='gender']").removeClass("is-invalid");
                $("#babyForm input[name='gender']").addClass("is-valid");
                radioFieldsValid = true; // At least one field is valid
            }

            const stateRadio = $("#babyForm input[name='state']:checked");
            if (stateRadio.length === 0) {
                // No radio option is selected
                $("#babyForm input[name='state']").addClass("is-invalid");
                radioFieldsValid = false;
            } else {
                $("#babyForm input[name='state']").removeClass("is-invalid");
                $("#babyForm input[name='state']").addClass("is-valid");
                radioFieldsValid = true; // At least one field is valid
            }

            const destinationRadio = $("#babyForm input[name='destination']:checked");
            if (destinationRadio.length === 0) {
                // No radio option is selected
                $("#babyForm input[name='destination']").addClass("is-invalid");
                radioFieldsValid = false;
            } else {
                $("#babyForm input[name='destination']").removeClass("is-invalid");
                $("#babyForm input[name='destination']").addClass("is-valid");
                radioFieldsValid = true; // At least one field is valid
            }

            if (allFieldsValid && radioFieldsValid && available_uid) {
                // All fields are valid, submit the form
                console.log('All is Right')
                $("#submitBabyForm").prop('type', 'submit');
            }
        });


        $("#submitBunnyForm").click(function() {
            $(".no_nullable_bunny_field").each(function() {
                if ($(this).val() !== "") {
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    allFieldsValid = true; // At least one field is valid
                } else {
                    $(this).addClass("is-invalid");
                    $(this).removeClass("is-valid");
                    allFieldsValid = false; // A field is invalid, so overall form is invalid
                    return false; // Exit the each() loop early since we found an invalid field
                }
            });

            const genderRadio = $("#bunny-form input[name='g_gender']:checked");
            if (genderRadio.length === 0) {
                // No radio option is selected
                $("#bunny-form input[name='g_gender']").addClass("is-invalid");
                radioFieldsValid = false;
            } else {
                $("#bunny-form input[name='g_gender']").removeClass("is-invalid");
                $("#bunny-form input[name='g_gender']").addClass("is-valid");
                radioFieldsValid = true; // At least one field is valid
            }

            const stateRadio = $("#bunny-form input[name='g_state']:checked");
            if (stateRadio.length === 0) {
                // No radio option is selected
                $("#bunny-form input[name='g_state']").addClass("is-invalid");
                radioFieldsValid = false;
            } else {
                $("#bunny-form input[name='g_state']").removeClass("is-invalid");
                $("#bunny-form input[name='g_state']").addClass("is-valid");
                radioFieldsValid = true; // At least one field is valid
            }

            const destinationRadio = $("#bunny-form input[name='g_destination']:checked");
            if (destinationRadio.length === 0) {
                // No radio option is selected
                $("#bunny-form input[name='g_destination']").addClass("is-invalid");
                radioFieldsValid = false;
            } else {
                $("#bunny-form input[name='g-destination']").removeClass("is-invalid");
                $("#bunny-form input[name='g_destination']").addClass("is-valid");
                radioFieldsValid = true; // At least one field is valid
            }

            if (allFieldsValid && radioFieldsValid && available_uid) {
                // All fields are valid, submit the form
                console.log('All is Right')
                $("#submitBunnyForm").prop('type', 'submit');
            }
        });

        // Validation inputs uid 
        let url = "{{route('get-bunnies-id')}}"
        let available_uid

        function performSearch(search_uid, current_input) {
            const apiUrl = url;
            $.get(apiUrl, {
                    search: search_uid
                })
                .done(function(data) {
                    console.log(data.content)
                    if (data.content.length === 0) {
                        current_input.removeClass("is-invalid");
                        return available_uid = true
                    } else {
                        current_input.removeClass("is-valid").addClass("is-invalid");
                        return available_uid = false
                    }
                })
                .fail(function() {
                    console.log('Failed to fetch search results.');
                });
        }




        let mUrl = "{{route('get-gestateds')}}"

        function performMotherSearch(search_uid, current_input, feed_back, date_field) {
            const apiUrl = mUrl;
            $.get(apiUrl, {
                    search: search_uid
                })
                .done(function(data) {
                    if (!data.gestations[0]) {
                        console.log("No results found")
                        date_field.empty();
                        feed_back.text("Aucune gestation trouvée pour cet identifiant");
                        current_input.removeClass("is-valid").addClass("is-invalid");
                        return available_uid = false
                    } else {
                        console.log(data.gestations)
                        console.log("Results found")
                        current_input.removeClass("is-invalid").addClass("is-valid");
                        date_field.empty();
                        $.each(data.gestations, function(index, gestation) {
                            let female_uid = gestation.female_uid;
                            let gestation_date = gestation.gestation_date;
                            date_field.append('<option value="' + gestation.id + '">' + female_uid + ' ੶ ' + gestation_date + '</option>')
                        })

                        return available_uid = true
                    }
                })
                .fail(function() {
                    console.log('Failed to fetch search results.');
                    date_field.empty();
                    feed_back.text("Aucun accouplement trouvé pour cet identifiant");
                    current_input.removeClass("is-valid").addClass("is-invalid");
                    return available_uid = false
                });
        }



        let uid_inputs = $('#uid, #g_uid');

        uid_inputs.each(function() {
            $(this).on('input', function() {
                let current_input = $(this);
                let search_uid = $(this).val();
                $(this).removeClass('default-red');
                performSearch(search_uid, current_input);
            })
        })

        let mother_uid_inputs = $('#mother_uid');
        mother_uid_inputs.each(function() {
            $(this).on('input', function(event) {
                event.preventDefault();
                let current_input = $(this);
                let feed_back = $(this).next('.invalid-feedback');
                let date_field = $(this).closest('.col-lg-4').nextAll('.col-lg-4').find('.gestation_id');

                let search_uid = $(this).val();
                $(this).removeClass('default-red');
                console.log(date_field.length);
                performMotherSearch(search_uid, current_input, feed_back, date_field);
            })
        })

        $('#newBabyField, #newBunnyField').click(function() {

            let uid_inputs = $('.uid, .g_uid');
            uid_inputs.each(function() {
                $(this).on('input', function(event) {
                    event.preventDefault();
                    // console.log("loki");
                    let current_input = $(this);
                    let search_uid = $(this).val();
                    $(this).removeClass('default-red');
                    performSearch(search_uid, current_input);
                })
            })


            let mother_uid_inputs = $('.mother_uid');
            mother_uid_inputs.each(function() {
                $(this).on('input', function(event) {
                    event.preventDefault();
                    let current_input = $(this);
                    let feed_back = $(this).next('.invalid-feedback');
                    let date_field = $(this).closest('.col-lg-4').nextAll('.col-lg-4').find('.gestation_date');

                    let search_uid = $(this).val();
                    $(this).removeClass('default-red');
                    console.log(date_field.length);
                    performMotherSearch(search_uid, current_input, feed_back, date_field);
                })
            })
        })



    });
</script>

@endsection