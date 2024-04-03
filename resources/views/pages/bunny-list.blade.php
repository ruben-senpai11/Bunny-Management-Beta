@extends('layouts.base')

@section('content')

<style>
  .nowrap{
    white-space: nowrap;
  }
  .dt-buttons{
    padding-top: 5px;
    padding-bottom: 5px;
  }
</style>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
  <h3>Catalogue de Lapins</h3>
  <a href="{{ route('create-bunny', []) }}" class="btn btn-gray-700  dashed-outline new-card"><svg
      class="icon icon-xs me-2" fill="none" stroke="currentColor" viewbox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
      </path>
    </svg>Nouvel Enregistrement</a>
</div>

<!--Start code list product-->
<div class="card p-2">
  <table id="bunnyTable" class="hover" style="width:100%">
    <thead>
      <tr>
        <th>Id</th>
        <th class="nowrap">Identifiant</th>
        <th>Sexe</th>
        <th>Emplacement</th>
        <th>Race</th>
        <th class="nowrap" >Enregistré le</th>
        <th>Action</th>
      </tr>
    </thead>
   <tfoot>
     <tr>
        <th>Id</th>
        <th class="nowrap">Identifiant</th>
        <th>Sexe</th>
        <th>Emplacement</th>
        <th>Race</th>
        <th class="nowrap" >Enregistré le</th>
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
          <!-- <li><strong>Identifiant :</strong> <span id="modalId"></span></li> -->
          <li><strong>Identifiant :</strong> <span id="modalUid"></span></li>
          <li><strong>Genre :</strong> <span id="modalGender"></span></li>
          <li><strong>Destination :</strong> <span id="modalDestination"></span></li>
          <li><strong>Date d'enregsistrement :</strong> <span id="modalBirth"></span></li>
          <li><strong>Age :</strong> <span id="modalAge"></span></li>
          <li><strong>Etat de santé :</strong> <span id="modalState"></span></li>
          <li><strong>Poids :</strong> <span id="modalWeight"></span></li>
          <li><strong>Race :</strong> <span id="modalRace"></span></li>
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
  let url = "{{route('get-list-bunny')}}"
  
    var table = new DataTable('#bunnyTable', {
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
        url: url,
        dataSrc: 'bunnies'
      },
      processing: true,
      columns: [
        { data: 'id',
          visible: false
        },
        { data: 'uid',},
        { data:'gender',
          render: function(data, type, row) {
            if (row.gender === 'male') {
              return '<span style="color: blufe;"> M </span>'; 
            } else if (row.gender === 'female') {
              return '<span style="color: redf;"> F </span>'; 
            } else {
              return data;
            }
          }
        },
        { data: 'destination',
          render: function(data, type, row) {
            if (row.destination === 'mating') {
              return '<span style="color: blufe;"> Accouplement </span>'; 
            } else if (row.destination === 'fattening') {
              return '<span style="color: redf;"> Engraissement </span>'; 
            } else {
              return data;
            }
          }
        },
        { data: 'race' },
        { 
          data: 'date_birth',
          visible: true,
        },
        {
          data: null,
          defaultContent: '<div class="btn-group"><button class="btn btn-gray-700">Prévisualiser</button><a href="#" id="edit" class="btn btn-secondary" style="font-weight:600">Modifier</a><a href="#" id="delete" class="btn btn-danger">Supprimer</button></a>',
          targets: -1
        },
      
      ],columnDefs: [
        {
          targets: 4,
          render: DataTable.render.date('D MMM YYYY')
        },
      ]
    });

    //lorsqu'on clique sur le bouton show more wire:
    table.on('click', 'button', function (e) {
      let data = table.row(e.target.closest('tr')).data();
      console.log(data);
      // Modifier le contenu du <h5> dans le modal-header
      $('#bunnyModalLabel').text('Information du lapin '+data['uid']);
      
      //Modifier le contenu du modal-body 
      $('#modalId').text(data.id);
      $('#modalUid').text(data.uid);
      $('#modalGender').text(data.gender);
      $('#modalDestination').text(data.destination);
      $('#modalBirth').text(data.date_birth);
      $('#modalAge').text(data.age);
      $('#modalState').text(data.state);
      $('#modalWeight').text(data.weight);
      $('#modalRace').text(data.race);

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
      if (confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')) {
        // L'utilisateur a confirmé, effectuer la suppression
        supprimerElement(table,$(this).parents('tr'),data.id);
       
      }
    });

    // Fonction pour effectuer la suppression avec AJAX
    function supprimerElement(table,row,id) {
     
      $.ajax({
        url: '{{ route("delete-bunny-ajax") }}',
        type: 'POST',
        data: {
          _token: '{{ csrf_token() }}', 
          id:id
          // Ajouter le jeton CSRF pour la sécurité
          // Ajouter d'autres données de la suppression si nécessaire (par exemple, l'ID de l'élément à supprimer)
        },
        success: function(response) {
          // Traitement en cas de succès de la suppression
          alert('Élément supprimé avec succès !');
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
@endsection