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
    
</script>

@endsection