@extends('layouts.base')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/virtual-select-plugin@1.0.39/dist/virtual-select.min.css" rel="stylesheet">
@endsection
@section('content')

<style>
    .datepicker-input {
        border-top-right-radius: 7px !important;
        border-bottom-right-radius: 7px !important;
    }

    @keyframes change_box-shadow {
        0% {
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .07), 0 0 0 0.18rem rgba(31, 41, 55, .25);
        }

        50% {
            box-shadow: 0 0px 0px;
        }

        100% {
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .07), 0 0 0 0.18rem rgba(31, 41, 55, .25);
        }
    }

    .blinking-form {
        /* border-color: red; */
        color: #6b7280;
        background-color: #fff;
        border-color: #4d6689;
        outline: 0;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .07), 0 0 0 0.18rem rgba(31, 41, 55, .25);
        animation: change_box-shadow 2s infinite;
    }

    .fw-400 {
        font-weight: 400 !important;
    }
</style>

<div class="row">
    <div class="col-12 col-xl-9">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <div class="reproduction-form mt-4">
            @if (session()->has('g_message'))
            <div class="alert alert-success">
                {{ session('g_message') }}
            </div>
            @endif
            <div id="mating" class="card-header d-flex align-items-center bg-gray-700">
                <h2 class="fs-5 fw-normal mb-0" style="color: #FFF">Enregistrer un Accouplement</h2>
                <div class="ms-auto">
                    <!-- <a class="fw-normal d-inline-flex align-items-center" href="#">
                        <svg class="icon icon-xxs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                        </svg> Voir tout
                    </a> -->
                </div>
            </div>
            <div class="card card-body border-0 shadow mb-4">
                <form action="" method="post">
                    @csrf
                    <div id="mating-form" class="row my-4">
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="female_uid">Identifiant de la femelle</label>
                                <input type="text" class="form-control  female_uid" name="female_uid" id="female_uid" placeholder="F-001" required>
                                <div class="invalid-feedback">Cet identifiant est introuvable !</div>
                            </div>
                            <div>
                                <label for="mating_remarks">Remarque</label>
                                <textarea type="text" class="form-control" name="mating_remarks" id="mating_remarks" rows='2'></textarea>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="male_uid">Identifiant du mâle</label>
                                <input type="text" class="form-control  male_uid" name="male_uid" id="male_uid" placeholder="M-001" required>
                                <div class="invalid-feedback">Cet identifiant est introuvable !</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="mating_date">Date de Naissance</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <input class="form-control noreproduction_field" name="mating_date" id="mating_date" type="date" placeholder="dd/mm/yyyy">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="newMatingField"></div>
                    <div style="float:right">
                        <button type="button" id="addMatingField" class="btn btn-light" style="border-color: #374157">Ajouter +</button>&nbsp; <!-- -->
                        <button type="button" id="submitMatingForm" name="matingForm" value="1" class="btn btn-gray-800">Enregistrer</button>
                    </div>
                </form>
            </div>
            <div id="palpation" class="card-header d-flex align-items-center bg-gray-700">
                <h2 class="fs-5 fw-normal mb-0" style="color: #FFF">Enregistrer une Palpation</h2>
                <div class="ms-auto">
                </div>
            </div>
            <div class="card card-body border-0 shadow mb-4">
                <form action="" method="post">
                    @csrf
                    <div id="palpation-form" class="row mt-2 mb-4">
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="palpation_female_uid">Identifiant de la femelle</label>
                                <input type="text" class="form-control  palpation_female_uid" name="palpation_female_uid" id="palpation_female_uid" placeholder="F-001" required>
                                <div class="invalid-feedback">Cet identifiant est introuvable !</div>
                            </div>
                            <div class="mb-3">                                
                                <fieldset>
                                    <legend class="h6">Résultat de la palpation</legend>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="f_state" id="f_statea" value="pregnant">
                                        <label class="form-check-label" for="f_statea">
                                            Porteuse
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="f_state" id="f_stateb" value="no_pregnant">
                                        <label class="form-check-label" for="f_stateb">
                                            Non porteuse
                                        </label>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="palpation_uid">Identifiant de l'accouplement</label>
                                <input type="text" class="form-control  palpation_uid" name="palpation_uid" id="palpation_uid" placeholder="A-001" required>
                                <div class="invalid-feedback">Cet identifiant est introuvable !</div>
                            </div>
                            <div>
                                <label for="palpation_remarks">Remarque</label>
                                <textarea type="text" class="form-control" name="palpation_remarks" id="palpation_remarks" rows='2'></textarea>
                            </div>                            
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="palpation_date">Date de la palpation</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <input class="form-control noreproduction_field" name="palpation_date" id="palpation_date" type="date" placeholder="dd/mm/yyyy">
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div id="newPalpationField"></div>
                    <div style="float:right">
                        <button type="button" id="addPalpationField" class="btn btn-light" style="border-color: #374157">Ajouter +</button>&nbsp; <!-- -->
                        <button type="button" id="submitPalpationForm" name="palpationForm" value="1" style="color: #fff" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
            <div id="gestation" class="card-header d-flex align-items-center bg-gray-700">
                <h2 class="fs-5 fw-normal mb-0" style="color: #FFF">Enregistrer une Gestation</h2>
                <div class="ms-auto">
                </div>
            </div>
            <div class="card card-body border-0 shadow mb-4">
                <form action="" method="post">
                    @csrf
                    <div id="gestation-form" class="row mt-2 mb-4">
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="gestation_female_uid">Identifiant de la femelle</label>
                                <input type="text" class="form-control  gestation_female_uid" name="gestation_female_uid" id="gestation_female_uid" placeholder="F-001" required>
                                <div class="invalid-feedback">Cet identifiant est introuvable !</div>
                            </div>
                            <div>
                                <label for="gestation_observations">Observations</label>
                                <textarea type="text" class="form-control" name="gestation_observations" id="gestation_observations" rows='3'></textarea>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="gestation_date">Date de la gestation</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <input class="form-control noreproduction_field" name="gestation_date" id="gestation_date" type="date" placeholder="dd/mm/yyyy">
                                </div>
                            </div>      
                        </div>
                        <div class="col-lg-4 col-sm-6">                            
                            <div class="mb-3">
                                <label for="gestation_bunnies_bumber">Nombre de lapereaux</label>
                                <input type="number" class="form-control" name="gestation_bunnies_bumber" id="gestation_bunnies_bumber" value="4" required>
                            </div>
                        </div>
                    </div>
                    <div id="newGestationField"></div>
                    <div style="float:right">
                        <button type="button" id="addGestationField" class="btn btn-light" style="border-color: #374157">Ajouter +</button>&nbsp;
                        <button type="button" id="submitGestationForm" name="gestationForm" value="1" class="btn btn-gray-800">Enregistrer</button>
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
                </div>
            </div>


        </div>
    </div>
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

let m = 2;
    $("#addMatingField").click(function() {
    
    newMatingForm =
        '<div id="addedMatingField" class="row mb-4 pt-2" style="border: 1px solid lightgray; border-radius: 10px;" >' +
        '<p class="text-bold">' + m + 'ème accouplement</p>' +
        '<div class="col-lg-4 col-sm-6">'+
        '<div class="mb-3">'+
        '<label for="female_uid_' + m +'">Identifiant de la femelle</label>'+
        '<input type="text" class="form-control female_uid" name="female_uid_' + m +'" id="female_uid_' + m +'" placeholder="F-001" required>'+
        '<div class="invalid-feedback">Cet identifiant est introuvable !</div>'+
        '</div>'+
        '</div>'+
        '<div class="col-lg-4 col-sm-6">'+
        '<div class="mb-3">'+
        '<label for="male_uid_' + m +'">Identifiant du mâle</label>'+
        '<input type="text" class="form-control  male_uid_' + m +'" name="male_uid_' + m +'" id="male_uid_' + m +'" placeholder="M-001" required>'+
        '<div class="invalid-feedback">Cet identifiant est introuvable !</div>'+
        '</div>'+
        '</div>'+
        '<div class="col-lg-4 col-sm-6">'+
        '<div class="mb-3">'+
        '<label for="mating_date_' + m +'">Date de Naissance</label>'+
        '<div class="input-group">'+
        '<span class="input-group-text">'+
        '<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">'+
        '<path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>'+
        '</svg>'+
        '</span>'+
        '<input class="form-control noreproduction_field" name="mating_date_' + m +'" id="mating_date_' + m +'" type="date" placeholder="dd/mm/yyyy">'+
        '</div>'+
        '</div>'+
        '</div>'+
        '<div class="mb-2" style="float:right">' +
        '<button type="button" id="deleteMatingField" class="btn btn-gray-300" style="float:right;">Retirer -</button>&nbsp;' +
        '</div>' +
        '</div>';

        $('#newMatingField').append(newMatingForm);
        initVirtualSelect();
        m += 1;
    })
    
    $("body").on("click", "#deleteMatingField", function() {
        $(this).parents("#addedMatingField").remove();
    })

    let p = 2
    $("#addPalpationField").click(function() {
        
        newPalpationForm =
            '<div id="addedPalpationField" class="row mb-4 pt-4" style="border: 1px solid lightgray; border-radius: 10px;" >' +
            '<p class="text-bold">' + p + 'ème palpation</p>' +
            '<div class="col-lg-4 col-sm-6">'+
            '<div class="mb-3">'+
            '<label for="palpation_female_uid_'+ p +'">Identifiant de la femelle</label>'+
            '<input type="text" class="form-control  palpation_female_uid_'+ p +'" name="palpation_female_uid_'+ p +'" id="palpation_female_uid_'+ p +'" placeholder="F-001" required>'+
            '<div class="invalid-feedback">Cet identifiant est introuvable !</div>'+
            '</div>'+
            '<div class="mb-3">'+
            '<fieldset>'+
            '<legend class="h6">Résultat de la palpation</legend>'+
            '<div class="form-check">'+
            '<input class="form-check-input" type="radio" name="f_state_'+ p +'" id="f_state_'+ p +'a" value="pregnant">'+
            '<label class="form-check-label" for="f_state_'+ p +'a">'+
            'Porteuse'+
            '</label>'+
            '</div>'+
            '<div class="form-check">'+
            '<input class="form-check-input" type="radio" name="f_state_'+ p +'" id="f_state_'+ p +'b" value="no_pregnant">'+
            '<label class="form-check-label" for="f_state_'+ p +'b">'+
            'Non porteuse'+
            '</label>'+
            '</div>'+
            '</fieldset>'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-4 col-sm-6">'+
            '<div class="mb-3">'+
            '<label for="mating_uid_'+ p +'">Identifiant de l\'accouplement</label>'+
            '<input type="text" class="form-control  mating_uid_'+ p +'" name="mating_uid_'+ p +'" id="mating_uid_'+ p +'" placeholder="A-001" required>'+
            '<div class="invalid-feedback">Cet identifiant est introuvable !</div>'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-4 col-sm-6">'+
            '<div class="mb-3">'+
            '<label for="palpation_date_'+ p +'">Date de la palpation</label>'+
            '<div class="input-group">'+
            '<span class="input-group-text">'+
            '<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">'+
            '<path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>'+
            '</svg>'+
            '</span>'+
            '<input class="form-control noreproduction_field" name="palpation_date_'+ p +'" id="palpation_date_'+ p +'" type="date" placeholder="dd/mm/yyyy">'+
            '</div>'+
            '</div>'+                          
            '</div>'+
            '<div class="mb-2" style="float:right">' +
            '<button type="button" id="deletePalpationField" class="btn btn-gray-300" style="float:right;">Retirer -</button>&nbsp;' +
            '</div>' +
            '</div>';

        $('#newPalpationField').append(newPalpationForm);
        initVirtualSelect();
        p += 1;
    });
    $("body").on("click", "#deletePalpationField", function() {
        $(this).parents("#addedPalpationField").remove();
    })
    // let numberOfMatingFields = $('div#' + 'addedBabyField').length;


    let g = 2
    $("#addGestationField").click(function() {
        
        newGestationForm =
            '<div id="addedGestationField" class="row mb-4 pt-4" style="border: 1px solid lightgray; border-radius: 10px;" >' +
            '<p class="text-bold">' + p + 'ème gestation</p>' +
            '<div class="col-lg-4 col-sm-6">'+
            '<div class="mb-3">'+
            '<label for="gestation_female_uid_' + p +'">Identifiant de la femelle</label>'+
            '<input type="text" class="form-control" name="gestation_female_uid_' + p +'" id="gestation_female_uid_' + p +'" placeholder="F-001" required>'+
            '<div class="invalid-feedback">Cet identifiant est introuvable !</div>'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-4 col-sm-6">'+
            '<div class="mb-3">'+
            '<label for="gestation_date_' + p +'">Date de la gestation</label>'+
            '<div class="input-group">'+
            '<span class="input-group-text">'+
            '<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">'+
            '<path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>'+
            '</svg>'+
            '</span>'+
            '<input class="form-control noreproduction_field" name="gestation_date_' + p +'" id="gestation_date_' + p +'" type="date" placeholder="dd/mm/yyyy">'+
            '</div>'+
            '</div>'+    
            '</div>'+
            '<div class="col-lg-4 col-sm-6">'+                 
            '<div class="mb-3">'+
            '<label for="gestation_bunnies_bumber_' + p +'">Nombre de lapereaux</label>'+
            '<input type="number" class="form-control" name="gestation_bunnies_bumber_' + p +'" id="gestation_bunnies_bumber_' + p +'" value="4" required>'+
            '</div>'+               
            '</div>'+
            '<div class="mb-2" style="float:right">' +
            '<button type="button" id="deleteGestationField" class="btn btn-gray-300" style="float:right;">Retirer -</button>&nbsp;' +
            '</div>' +
            '</div>';

        $('#newGestationField').append(newGestationForm);
        initVirtualSelect();
        p += 1;
    });
    $("body").on("click", "#deleteGestationField", function() {
        $(this).parents("#addedGestationField").remove();
    })
    





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


        // Validation inputs uid avec Ajax
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


        let uid_inputs = $('#uid, #g_uid');

        uid_inputs.each(function() {
            $(this).on('input', function() {
                let current_input = $(this);
                let search_uid = $(this).val();
                $(this).removeClass('blinking-form');
                performSearch(search_uid, current_input);
            })
        })

        $('#newBabyField, #newMatingField').click(function() {
            let uid_inputs = $('.uid, .g_uid');

            uid_inputs.each(function() {
                $(this).on('input', function() {
                    // console.log("loki");
                    let current_input = $(this);
                    let search_uid = $(this).val();
                    $(this).removeClass('blinking-form');
                    performSearch(search_uid, current_input);
                })
            })
        })

    });
</script>

@endsection