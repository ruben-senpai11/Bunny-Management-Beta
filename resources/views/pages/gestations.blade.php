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
    .help-center{
      height: 100%!important;
    }
</style>


<div class="row">
    <div class="col-12 col-xl-9">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        @if(session('alrdy_mated'))
          <div class="alert alert-danger">
            {{ session('alrdy_mated') }}
          </div>
        @endif
        <div class="reproduction-form mt-4">
            <div id="gestation" class="card-header d-flex align-items-center bg-gray-700">
                <h2 class="fs-5 fw-normal mb-0" style="color: #FFF">Enregistrer une Gestation</h2>
                <div class="ms-auto">
                </div>
            </div>
            <div id="gestation-form" class="card card-body border-0 shadow mb-4">
                <form action="" method="post">
                    @csrf
                    <div class="gestation_inputs">
                      <div class="row my-4">
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="female_uid">Identifiant de la femelle</label>
                                <input type="text" class="form-control uid female_uid" name="female_uid" id="female_uid" placeholder="F-001" required>
                                <div class="invalid-feedback">Cet identifiant est introuvable !</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="mating_date">Choisir un accouplement</label>                
                                <select class="mating_date form-control defered-select" type="text" name="mating_date" placeholder="Choisir">
                                <option value=""></option>
                                </select>
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
                                    <input class="form-control gestation_input" name="gestation_date" id="gestation_date" type="date" placeholder="dd/mm/yyyy" required>
                                </div>
                                <div class="invalid-feedback">Veuillez renseigner une date</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div>
                                <label for="babies_number">Nombre de lapereaux</label>
                                <input type="number" class="form-control babies_number" name="babies_number" id="babies_number" required>
                                
                            </div>
                        </div>
                        <!-- </div> -->
                        <div class="col-lg-4 col-sm-6">
                            <fieldset>
                                <legend class="h6">Santé après gestation</legend>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="veterinary_follow_up" id="veterinary_follow_upa" value="good" required>
                                    <label class="form-check-label" for="veterinary_follow_upa">
                                        Bonne
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="veterinary_follow_up" id="veterinary_follow_upb" value="low" required>
                                    <label class="form-check-label" for="veterinary_follow_upb">
                                        Mauvaise
                                    </label>
                                </div>
                            </fieldset>
                          </div>
                        <div class="col-lg-4 col-sm-6">
                            <div>
                                <label for="remark">Remarque</label>
                                <textarea type="text" class="form-control" name="remark" id="remark" rows='2'></textarea>
                            </div>
                        </div>
                    </div>
                    <div id="newGestationField"></div>
                    </div>
                    <div style="float:right">
                        <button type="button" id="addGestationField" class="btn btn-light" style="border-color: #374157">Ajouter +</button>&nbsp; <!-- -->
                        <button type="button" id="submitGestationForm" name="GestationForm" value="1" class="btn btn-gray-800">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-3 p-4">
        <div class="row" style="height: 100%">

            <div class="col-12 mb-0 p-0">
                <div class="card notification-cardd help-center border-0 shadow">
                    <div class="card-header d-flex align-items-center bg-light ">
                        <h2 class="fs-5 fw-bold mb-0">Aide </h2>
                        <div class="ms-auto"><a class="fw-bold d-inline-flex align-items-center" href="#">?</a></div>
                    </div>
                    <div class="p-3 pb-2">
                        <ol>
                            <li>Veuillez saisir l'identifiant manuellement (n'utilisez pas les suggestions)</li>
                            <li>Renseignez tous les champs.</li>
                            <li>Vous pouvez enregistrer plusieurs gestations à la fois.</li>
                            <!-- <li>Évitez d'enregistrer deux gestations pour une même lapine en même temps.</li> -->
                        </ol>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<!--Start code list product-->
<div class="card p-2">
  <table id="gestationTable" class="hover" style="width:100%">
    <thead>
      <tr>
        <th>N°</th>
        <th>Uid Femelle</th>
        <th>Nombre de Lapereaux</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
    </thead>
   <tfoot>
     <tr>
        <th>N°</th>
        <th>Uid Femelle</th>
        <th>Nombre de Lapereaux</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
    </tfoot>
  </table>

</div>
<!--End code list product-->

<!-- Modal information bunny-->
<div class="modal fade" id="bunnyModal" tabindex="-1" aria-labelledby="bunnyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bunnyModalLabel">Information du lapin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul>
          <li><strong>Identifiant :</strong> <span id="modalId"></span></li>
          <li><strong>UID Femelle :</strong> <span id="modalFemalUid"></span></li>
          <li><strong>Date de la gestation :</strong> <span id="modalDate"></span></li>
          <li><strong>Nombre de lapereaux :</strong> <span id="modalBabiesNumber"></span></li>
          <li><strong>Santé après mise bas :</strong> <span id="modalVeterinaryFollowUp"></span></li>
          <!-- Ajoutez d'autres propriétés ici selon vos besoins -->
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>


@endsection
@section('script')

<script>
  let gestations_url  = "{{route('get-gestations')}}"
  
    var table = new DataTable('#gestationTable', {
      scrollX: true,
      responsive: true, 
      dom: 'Bfrtip',
      stripeClasses: ['even', 'odd'],
      pageLength: 10,
      buttons: [
      {
      extend: 'copy',
      className: 'dataTable_button copy_button',
      text: 'Copier'
      },
      {
      extend: 'csv',
      className: 'dataTable_button export_button'
      },
      {
      extend: 'excel',
      className: 'dataTable_button export_button'
      },
      {
      extend: 'pdf',
      className: 'dataTable_button export_button'
      },
      {
      extend: 'print',
      className: 'dataTable_button export_button',
      text: 'Imprimer'
      },
      {
      extend: 'searchPanes',
      config: {
      cascadePanes: true
      },
      className: 'dataTable_button searchPanes_button',
      text: 'Filtrer'
      }
      ],
      ajax: {
        url: gestations_url,
        dataSrc: 'gestations'
      },
      processing: true,
      columns: [
        { data: 'id' },
        { data:'female_uid' },
        { 
          data: 'babies_number',
          visible: true
        },
        { 
          data: 'gestation_date',
          visible: true
        },
        {
          data: null,
          defaultContent: '<div class="btn-group"><button class="btn btn-gray-600">Prévisualiser</button><a href="#" id="editt" class="btn btn-secondary" style="font-weight:600">Modifier</a><a href="#" id="delete" class="btn btn-danger">Supprimer</button></a>',
          targets: -1
        },
      
      ],columnDefs: [
        {
          targets: 3,
          render: DataTable.render.date('D MMM YYYY')
        },
      ]
    });

    //lorsqu'on clique sur le bouton show more wire:
    table.on('click', 'button', function (e) {
      let data = table.row(e.target.closest('tr')).data();
      console.log(data);
      // Modifier le contenu du <h5> dans le modal-header
      $('#bunnyModalLabel').text('Information de la gestation n°'+data['id']);
      
      //Modifier le contenu du modal-body 
      $('#modalId').text(data.id);
      $('#modalFemalUid').text(data.female_uid);
      $('#modalBabiesNumber').text(data.babies_number);
      $('#modalDate').text(data.gestation_date);
      $('#modalVeterinaryFollowUp').text(data.veterinary_follow_up);
      
      // Afficher le modal
      $('#bunnyModal').modal('show'); 
    });

    table.on('click', '#edit', function (e) {
      let data = table.row(e.target.closest('tr')).data();
      console.log(data);
      let url='{{ route("get-bunny-data", ["%s"]) }}';
      url=url.replace('%s',data['id']);
      window.location.href =url ;
    });

    // Capturer l'événement de clic sur le bouton de suppression
    table.on('click', '#delete', function (e) {
      let data = table.row(e.target.closest('tr')).data();
      console.log(table.row(e.target.closest('tr')));
     
      // Afficher une boîte de dialogue de confirmation
      if (confirm('Êtes-vous sûr de vouloir supprimer cette gestation?')) {
        // L'utilisateur a confirmé, effectuer la suppression
        supprimerElement(table,$(this).parents('tr'),data.id);
       
      }
    });

    // Fonction pour effectuer la suppression avec AJAX
    function supprimerElement(table,row,id) {
     
      $.ajax({
        url: '{{ route("delete-gestation-ajax") }}',
        type: 'POST',
        data: {
          _token: '{{ csrf_token() }}', 
          id:id
          // Ajouter le jeton CSRF pour la sécurité
          // Ajouter d'autres données de la suppression si nécessaire (par exemple, l'ID de l'élément à supprimer)
        },
        success: function(response) {
          // Traitement en cas de succès de la suppression
          alert('gestation supprimée avec succès !');
          //delete the concerned row
          table.row( row ).remove().draw();
          
          //location.reload()
          // Vous pouvez ajouter d'autres actions après la suppression si nécessaire
        },
        error: function(xhr, status, error) {
          // Traitement en cas d'erreur lors de la suppression
          alert('Erreur lors de la suppression : ' + error);
        }
      });
    }

    $(document).ready(function () {
      $('.dataTable_button.searchPanes_button').text('Filtrer les résultats')
    })
    
</script>

<script src="{{ asset('vendor/virtual-select-master/dist/virtual-select.min.js') }}"></script>
<script>
    function initVirtualSelect() {
        VirtualSelect.init({
            ele: '.gestation3',
            multiple: false,    
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

  let g = 2;
  $("#addGestationField").click(function() {
  
  newGestationForm =
    '<div id="addedGestationField" class="row mb-4 pt-3" style="border: 1px solid lightgray; border-radius: 10px;" >' +
    '<p class="text-bold">' + g + 'ème gestation</p>' +
    '<div class="col-lg-4 col-sm-6">'+
    '<div class="mb-3">'+
    '<label for="female_uid_' + g + '">Identifiant de la femelle</label>'+
    '<input type="text" class="form-control uid female_uid_' + g + '" name="female_uid_' + g + '" id="female_uid_' + g + '" placeholder="F-001" required>'+
    '<div class="invalid-feedback">Cet identifiant est introuvable !</div>'+
    '</div>'+
    '</div>'+
    '<div class="col-lg-4 col-sm-6">'+
    '<div class="mb-3">'+
    '<label for="mating_date_' + g + '">Choisir un accouplement</label>'+
    '<select class="mating_date mating_date_' + g + ' form-control defered-select" type="text" name="mating_date_' + g + '" placeholder="Choisir">'+
    '<option value=""></option>'+
    '</select>'+
    '</div>'+
    '</div>'+
    '<div class="col-lg-4 col-sm-6">'+
    '<div class="mb-3">'+
    '<label for="gestation_date_' + g + '">Date de la gestation</label>'+
    '<div class="input-group">'+
    '<span class="input-group-text">'+
    '<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">'+
    '<path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>'+
    '</svg>'+
    '</span>'+
    '<input class="form-control gestation_input" name="gestation_date_' + g + '" id="gestation_date_' + g + '" type="date" placeholder="dd/mm/yyyy" required>'+
    '</div>'+
    '<div class="invalid-feedback">Veuillez renseigner une date</div>'+
    '</div>'+
    '</div>'+
    '<div class="col-lg-4 col-sm-6">'+
    '<div>'+
    '<label for="babies_number_' + g + '">Nombre de lapereaux</label>'+
    '<input type="number" class="form-control babies_number_' + g + '" name="babies_number_' + g + '" id="babies_number_' + g + '" required>'+
    '</div>'+
    '</div>'+
    '<div class="col-lg-4 col-sm-6">'+
    '<fieldset>'+
    '<legend class="h6">Santé après gestation</legend>'+
    '<div class="form-check">'+
    '<input class="form-check-input" type="radio" name="veterinary_follow_up_' + g + '" id="veterinary_follow_up_' + g + 'a" value="good" required>'+
    '<label class="form-check-label" for="veterinary_follow_up_' + g + 'a">Bonne</label>'+
    '</div>'+
    '<div class="form-check">'+
    '<input class="form-check-input" type="radio" name="veterinary_follow_up_' + g + '" id="veterinary_follow_up_' + g + 'b" value="low" required>'+
    '<label class="form-check-label" for="veterinary_follow_up_' + g + 'b">Mauvaise</label>'+
    '</div>'+
    '</fieldset>'+
    '</div>'+
    '<div class="col-lg-4 col-sm-6">'+
    '<div>'+
    '<label for="remark_' + g + '">Remarque</label>'+
    '<textarea type="text" class="form-control" name="remark_' + g + '" id="remark_' + g + '" rows="2"></textarea>'+
    '</div>'+
    '</div>'+
    '<div class="my-3" style="float:right">' +
    '<button type="button" id="deleteGestationField" class="btn btn-gray-300" style="float:right;">Retirer -</button>&nbsp;' +
    '</div>' +
    '</div>';

      $('#newGestationField').append(newGestationForm);
      initVirtualSelect();
      g += 1;
  })

  $("body").on("click", "#deleteGestationField", function() {
      $(this).parents("#addedGestationField").remove();
  })

  // $(document).ready(function(){
    // Validation inputs uid avec Ajax
    let url = "{{route('get-mated-id')}}"
    let available_uid

    function performSearch(search_uid, current_input, feed_back, date_field) {
        const apiUrl = url;
        $.get(apiUrl, {
          search: search_uid
        })
        .done(function(data) {
              console.log(data)
          if(!data.content[0].id){
              date_field.empty();
              feed_back.text("Aucun accouplement trouvé pour cet identifiant");
              current_input.removeClass("is-valid").addClass("is-invalid");
              return available_uid = false
          }else{
              console.log(data.content)
              current_input.removeClass("is-invalid").addClass("is-valid");
              date_field.empty();
              $.each(data.content, function(index, mating){
                let mating_date = mating.mating_date;
                date_field.append('<option value="'+mating_date +'">'+mating_date +'</option>')
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


    $('#gestation-form').click(function() {
      let uid_inputs = $('.uid');
      uid_inputs.each(function() {
        $(this).on('input', function(event) {
            event.preventDefault();
            let current_input = $(this);
            let feed_back = $(this).next('.invalid-feedback');
            let date_field = $(this).closest('.col-lg-4').nextAll('.col-lg-4').find('.mating_date');

            let search_uid = $(this).val();
            $(this).removeClass('default-red');
            console.log(date_field.length);
            performSearch(search_uid, current_input, feed_back, date_field);
        })
      })
    })

  let allFieldsValid = false
  $("#submitGestationForm").click(function() {
    $(".gestation_input").each(function() {
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

    let no_invalid_field = false
    if ($(".gestation_inputs .is-invalid").length>0){
        no_invalid_field = false
    }else{
        no_invalid_field = true
    }

    if (available_uid && no_invalid_field) {
        // All fields are valid, submit the form
        console.log('All is Right')
        $("#submitGestationForm").prop('type', 'submit');
    }
  });
  
  
// })

</script>

@endsection