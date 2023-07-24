@extends('layouts.base')

@section('content')

<div class="row">
    <div class="col-12 col-xl-9">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="baby-bunny-form">
            <div class="card-header d-flex align-items-center bg-success" >
                <h2 class="fs-5 fw-normal mb-0" style="color: white">Enregistrer un Lapereau</h2>
                <div class="ms-auto"><a class="fw-normal d-inline-flex align-items-center" href="#" style="color: white"><svg class="icon icon-xxs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                        </svg> Voir tout</a></div>
            </div>
            <div class="card card-body border-0 shadow mb-4">
                <form action="" method="post">
                    @csrf
                    <div id="babyForm" class="row mb-3">
                        <div class="col-lg-4 col-sm-6">
                            <!--Form -->
                            <div class="mb-3">
                                <label for="uid" class="">Saisir un identifiant</label>
                                <input type="text" class="form-control" name="uid" id="uid" placeholder="M-0001">
                                <div class="valid-feedback">Disponible</div>
                                <div class="invalid-feedback">Attention, cet identifiant es dejà utilisé !</div>

                            </div>
                            <!-- End of Form -->
                           <div class="mb-3">
                                <label for="color">Couleur</label>
                                <input class="form-control" type="text" name="color" id="color" placeholder="Blanc, noir...">
                            </div>
                            <!-- Radio -->
                            <fieldset>
                                <legend class="h6">Santé</legend>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="state" id="statea" value="healthy">
                                    <label class="form-check-label" for="statea">
                                        Bien portant
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="state" id="stateb" value="sick_bunny">
                                    <label class="form-check-label" for="stateb">
                                        Malade
                                    </label>
                                </div>
                                <!-- End of Radio -->
                            </fieldset>
                            <!-- End of Form -->
                        </div>
                        <div class=" col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="">Identifier de la génitrice</label>
                                <select style="width: 100%" class="form-control">
                                    <option value="default" selected>Choose a UID</option>
                                </select>
                                <span class="text-danger" ></span>
                            </div>
                            <div class="mb-3">
                                <label for="weight">Poids</label>
                                <input class="form-control" type="text" name="weight" id="weight" placeholder="100g - 300g">
                            </div> 
                            <!-- Radio -->
                            <fieldset class="mb-2">
                                <legend class="h6">Destination</legend>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="destination" id="destinationa" value="fattening">
                                    <label class="form-check-label" for="destinationa">
                                        Engraissement
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="destination" id="destinationb" value="mating">
                                    <label class="form-check-label" for="destinationb">
                                        Reproduction
                                    </label>
                                </div>
                                <!-- End of Radio -->
                            </fieldset>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="">Identifier la gestation</label>
                                <select style="width: 100%" name="gestation_id" class="form-control">
                                    <option value="12014" selected>Choose one</option>
                                    <option value="120214">Choose two</option>
                                </select>
                                <span class="text-danger" id="error2"></span>
                            </div>
                            <!-- Radio -->
                            <fieldset class="mb-2">
                                <legend class="h6">Sexe</legend>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gendera" value="male">
                                    <label class="form-check-label" for="gendera">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="genderb" value="female">
                                    <label class="form-check-label" for="genderb">
                                        Femelle
                                    </label>
                                </div>
                                <!-- End of Radio -->
                            </fieldset>
                        </div>
                    </div>
                    <div id="newBabyField"></div>
                    <div style="float:right">                                                   
                        <button type="button" id="addBabyField" class="btn btn-light" style="border-color: #0EA271;">Ajouter +</button>&nbsp;<!-- color: white; -->
                        <button type="submit" name="babyBunnyForm" value="1" class="btn btn-success" style="color: whit; ">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="bunny-form">
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
                    <div class="row mb-4">
                        <div class="col-lg-4 col-sm-6">
                            <!-- Form -->                  
                            <div class="mb-3">
                                <label for="g_uid">Saisir un identifiant</label>
                                <input type="text" class="form-control" name="g_uid" id="g_uid" placeholder="F-0001">
                            </div>
                            <!-- End of Form -->
                           <div class="mb-3">
                                <label for="color">Couleur</label>
                                <input class="form-control" type="text" name="g_color" id="g_color" placeholder="Blanc, noir...">
                            </div>
                            <!-- Radio -->
                            <fieldset>
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
                                <!-- End of Radio -->
                            </fieldset>                 
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <!-- Form -->  
                            <div class="mb-3">
                                <label for="g_date_birth">Date de Naissance</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </span>
                                    <input class="form-control" name="g_date_birth" id="g_date_birth" type="date" placeholder="dd/mm/yyyy">                                               
                                </div>
                            </div>
                            <!-- End of Form --> 
                            <div class="mb-3">
                                <label for="weight">Poids</label>
                                <input class="form-control" type="text" name="g_weight" id="g_weight" placeholder="300g - 1800g">
                            </div>         
                            <!-- Radio -->
                            <fieldset>
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
                                <!-- End of Radio -->
                            </fieldset>                                       
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="g_race">Race</label>
                                <input type="text" class="form-control " id="g_race" placeholder="Locale">
                            </div>
                            <!-- Radio -->
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
                                <!-- End of Radio -->
                            </fieldset>
                        </div>
                    </div>
                    <div id="newBunnyField"></div>
                    <div style="float:right">
                        <button type="button" id="addBunnyField" class="btn btn-light" style="border-color: #F0BC74">Ajouter +</button>&nbsp; <!-- -->
                        <button type="submit" name="bunnyForm" value="1" class="btn btn-secondary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-3 p-4">
        <div class="row">

            <div class="col-12 mb-4 p-0">
                <div class="card notification-card border-0 shadow">
                    <div class="card-header d-flex align-items-center bg-light ">
                        <h2 class="fs-5 fw-bold mb-0">Aide </h2>
                        <div class="ms-auto"><a class="fw-bold d-inline-flex align-items-center" href="#">?</a></div>
                    </div>
                    <div class="card-body">
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
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- <button type="submit" name="recuperer_donnees" id="recuperer-donnees" class="btn btn-primary">Enregistrer</button> -->

</div>

<script type="text/javascript">

    let i = 2
    $("#addBabyField").click(function() {
        newBabyForm =
            '<div id="addedBabyField" class="row mb-4 pt-4" style="border: 1px solid lightgray; border-radius: 10px;" >' +
            '<p class="text-bold">' + i + 'ème lapereau</p>' +
            '<div class="col-lg-4 col-sm-6"> ' +
                '<div class="mb-3">' +
                    '<label for="uid_.' + i + '">Saisir un identifiant</label>' +
                    '<input type="text" name="uid.' + i + '" class="form-control is-valid" id="uid.' + i + '" placeholder="M-0001">' +
                '</div>' +

                '<fieldset class="mb-2">' +
                '<legend class="h6">Sexe</legend>' +
                '<div class="form-check">' +
                '<input class="form-check-input" type="radio" name="gender.' + i + '" id="gender.' + i + 1500 + '" value="male">' +
                '<label class="form-check-label" for="gender.' + i + 1500 + '">Male</label>' +
                '</div>' +
                '<div class="form-check">' +
                '<input class="form-check-input" type="radio" name="gender.' + i + '" id="gender.' + i + 2000 + '" value="female">' +
                '<label class="form-check-label" for="gender.' + i + 2000 + '">Femelle</label>' +
                '</div>' +
                '</fieldset>' +
            '</div>' +
            '<div class=" col-lg-3 col-sm-4">' +
                '<div class="mb-3">'+
                    '<label for="weight' + i + '">Poids</label>'+
                    '<input class="form-control" type="text" name="weight.' + i + '" id="weight.' + i + '" placeholder="100g - 300g">'+
                '</div>'+ 
                
            '<fieldset class="mb-2">'+
                '<legend class="h6">Santé</legend>'+
                '<div class="form-check">'+
                    '<input class="form-check-input" type="radio" name="state.' + i + '" id="statea.' + i + '" value="healthy">'+
                    '<label class="form-check-label" for="statea.' + i + '">Bien portant</label></div>'+
                '<div class="form-check">'+
                    '<input class="form-check-input" type="radio" name="state.' + i + '" id="stateb.' + i + '" value="sick_bunny">'+
                    '<label class="form-check-label" for="stateb.' + i + '">Malade</label></div>'+
            '</fieldset>'+   
            '</div>' +
            '<div class="col-lg-3 col-sm-3">' +
                '<div class="mb-3">'+
                    '<label for="color' + i + '">Couleur</label>'+
                    '<input class="form-control" type="text" name="color.' + i + '" id="color.' + i + '" placeholder="blanc, noir...">'+
                '</div>'+         
            '<fieldset class="mb-2">' +
            '<legend class="h6">Destination</legend>' +
            '<div class="form-check">' +
            '<input class="form-check-input" type="radio" name="destination_' + i + '" id="g_destinationa.' + i + 1500 + '" value="fattening">' +
            '<label class="form-check-label" for="g_destinationa.' + i + 1500 + '">Engraissement</label>' +
            '</div>' +
            '<div class="form-check">' +
            '<input class="form-check-input" type="radio" name="destination_' + i + '" id="g_destinationb.' + i + 2000 + '" value="mating">' +
            '<label class="form-check-label" for="g_destinationb.' + i + 2000 + '">Reproduction</label>' +
            '</div>' +
            '</fieldset>' +
            '</div>' +
            '<div class="col-lg-2 col-sm-3 my-5 ">' +
            '<button type="button" id="deleteBabyField" class="btn btn-danger" style="float:right;">Retirer -</button>&nbsp;' +
            '</div>';
        '</div>';
        $('#newBabyField').append(newBabyForm);
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
            '<p class="text-bold">'+ j +'ème lapin</p>' +
            '<div class="col-lg-4 col-sm-6"> ' +
                '<div class="mb-3">'+
                    '<label for="g_uid.'+ j +'">Saisir un identifiant</label>'+
                    '<input type="text" class="form-control" name="g_uid.'+ j +'" id="g_uid.'+ j +'" placeholder="F-0001">'+
                '</div>'+
                '<div class="mb-3">'+
                    '<label for="color">Couleur</label>'+
                    '<input class="form-control" type="text" name="g_color.'+ j +'" id="g_color.'+ j +'" placeholder="Blanc, noir...">'+
               '</div>'+
                '<fieldset>'+
                    '<legend class="h6">Santé</legend>'+
                    '<div class="form-check">'+
                        '<input class="form-check-input" type="radio" name="g_state.'+ j +'" id="g_statea.'+ j +'" value="healthy">'+
                        '<label class="form-check-label" for="g_statea.'+ j +'">Bien portant</label>'+
                    '</div>'+
                    '<div class="form-check">'+
                        '<input class="form-check-input" type="radio" name="g_state.'+ j +'" id="g_stateb.'+ j +'" value="sick_bunny">'+
                        '<label class="form-check-label" for="g_stateb.'+ j +'">Malade</label>'+
                    '</div>'+
                '</fieldset>'+
            '</div>'+
            '<div class="col-lg-4 col-sm-6">'+
                '<div class="mb-3">'+
                    '<label for="g_date_birth.'+ j +'">Date de Naissance</label>'+
                    '<div class="input-group">'+
                        '<span class="input-group-text">'+
                            '<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>'+
                        '</span>'+
                        '<input class="form-control" name="g_date_birth.'+ j +'" id="g_date_birth.'+ j +'" type="date" placeholder="dd/mm/yyyy">'+
                    '</div>'+
                '</div>'+
                '<div class="mb-3">'+
                    '<label for="weight">Poids</label>'+
                    '<input class="form-control" type="text" name="g_weight.'+ j +'" id="g_weight.'+ j +'" placeholder="300g - 1800g">'+
                '</div>'+
                '<fieldset>'+
                    '<legend class="h6">Destination</legend>'+
                    '<div class="form-check">'+
                        '<input class="form-check-input" type="radio" name="g_destination.'+ j +'" id="g_destinationa.'+ j +'" value="fattening">'+
                        '<label class="form-check-label" for="g_destinationa.'+ j +'">Engraissement</label>'+
                    '</div>'+
                    '<div class="form-check">'+
                        '<input class="form-check-input" type="radio" name="g_destination.'+ j +'" id="g_destinationb.'+ j +'" value="mating">'+
                        '<label class="form-check-label" for="g_destinationb.'+ j +'">Reproduction</label>'+
                    '</div>'+
                '</fieldset>'+                
            '</div>'+
            '<div class="col-lg-4 col-sm-6">'+
                '<div class="mb-3">'+
                    '<label for="g_race.'+ j +'">Race</label>'+
                    '<input type="text" class="form-control" name="g_race.'+ j +'"  id="g_race.'+ j +'" placeholder="Locale">'+
                '</div>'+
                '<fieldset>'+
                    '<legend class="h6">Sexe</legend>'+
                    '<div class="form-check">'+
                        '<input class="form-check-input" type="radio" name="g_gender.'+ j +'" id="g_gendera.'+ j +'" value="male">'+
                        '<label class="form-check-label" for="g_gendera.'+ j +'">Male</label>'+
                    '</div>'+
                    '<div class="form-check">'+
                        '<input class="form-check-input" type="radio" name="g_gender.'+ j +'" id="g_genderb.'+ j +'" value="female">'+
                        '<label class="form-check-label" for="g_genderb.'+ j +'">Femelle</label>'+
                    '</div>'+
                '</fieldset>'+
            '<div class="" style="float:rightf">'+
            '<button type="button" id="deleteBunnyField" class="btn btn-warning" style="float:right;">Retirer -</button>&nbsp;' +
            '</div>'+
            '</div>'+
        '</div>';
        $('#newBunnyField').append(newBunnyForm);
        j += 1;
    })
    $("body").on("click", "#deleteBunnyField", function() {
        $(this).parents("#addedBunnyField").remove();
    })
    let numberOfBunnyFields = $('div#' + 'addedBabyField').length;

    
  $(document).ready(function() {
    $('#recuperer-donnees').click(function() {
      $.ajax({
        url: "http://127.0.0.1:8000/create-bunny",
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          console.log(data);
          $('#resultat').text(JSON.stringify(data));
        },
        error: function(xhr, status, error) {
          console.error(status + ': ' + error);
        }
      });
    });
  });

    
</script>

@endsection