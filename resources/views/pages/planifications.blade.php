@extends('layouts.base')
@section('style')
<link href="{{ asset('vendor/virtual-select-master/dist/virtual-select.min.css') }}" rel="stylesheet">

<style>
  .label {
    font-size: 12px;
  }

  .label,
  .value {
    text-wrap: nowrap;
  }

  .pl-actions button {
    text-wrap: nowrap;
    padding: 2px 4px;
    color: white
  }

  .pl-actions .btn-info {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0
  }

  .pl-actions .btn-success {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }

  .pl-actions .btn-success:hover {
    color: white
  }

  .pl-deadline {
    border-radius: 8px;
  }

  .pl-deadline.close {
    padding: 2px 4px;
    color: black;
    background-color: #f0bc74;
  }

  .pl-deadline.next {
    padding: 2px 4px;
    color: white;
    background-color: #10b981;
  }
</style>

@endsection
@section('content')


<div class="row">
  <div class="col-12">
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
      <div class="row">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-4">
          <h2 class="p-0 m-0">Planifications</h2>
          <form class="navbar-search form-inline" id="navbar-search-main">
            <div class="input-group input-group-merge search-bar">
              <span class="input-group-text" id="topbar-addon">
                <svg class="icon icon-xs" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd"></path>
                </svg>
              </span>
              <input type="text" class="form-control" id="topbarInputIconLeft"
                placeholder="Rechercher un identifiant" aria-label="Search" aria-describedby="topbar-addon">
            </div>
          </form>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div id="" class="card-header d-flex align-items-center bg-success">
            <h2 class="fs-5 fw-normal " style="color: #FFF">Accouplements du jour</h2>
          </div>
          <div id="" class="card card-body border-0 shadow mb-4 gap-2 p-0">
            <div class="p-0">
              <ul class="list-group">
                <li class="list-group-item p-2 d-flex justify-content-between px-3 py-2">
                  <div class="p-1 d-grid ">
                    <span class="label">Femelle</span>
                    <span class="value">F-004</span>
                  </div>
                  <div class="p-1 d-grid ">
                    <span class="label">Mâle</span>
                    <span class="value">M-012</span>
                  </div>
                  <div class="p-1 d-grid ">
                    <span class="label">Délai</span>
                    <span class="value pl-deadline next ">11-18 avril</span>
                  </div>
                  <div class="p-1 d-flex ">
                    <div class="pl-actions d-flex py-1">
                      <button class="btn btn-info">Fait 🗸</button>
                      <button class="btn btn-success">Commencer</button>
                    </div>
                  </div>
                </li>
                <li class="list-group-item p-2 d-flex justify-content-between px-3 py-2">
                  <div class="p-1 d-grid ">
                    <span class="label">Femelle</span>
                    <span class="value">F-004</span>
                  </div>
                  <div class="p-1 d-grid ">
                    <span class="label">Mâle</span>
                    <span class="value">M-012</span>
                  </div>
                  <div class="p-1 d-grid ">
                    <span class="label">Délai</span>
                    <span class="value pl-deadline close ">11-18 avril</span>
                  </div>
                  <div class="p-1 d-flex ">
                    <div class="pl-actions d-flex py-1">
                      <button class="btn btn-info">Fait 🗸</button>
                      <button class="btn btn-success">Commencer</button>
                    </div>
                  </div>
                </li>
                <li class="list-group-item p-2 d-flex justify-content-between px-3 py-2">
                  <div class="p-1 d-grid ">
                    <span class="label">Femelle</span>
                    <span class="value">F-004</span>
                  </div>
                  <div class="p-1 d-grid ">
                    <span class="label">Mâle</span>
                    <span class="value">M-012</span>
                  </div>
                  <div class="p-1 d-grid ">
                    <span class="label">Délai</span>
                    <span class="value pl-deadline  ">11-18 avril</span>
                  </div>
                  <div class="p-1 d-flex ">
                    <div class="pl-actions d-flex py-1">
                      <button class="btn btn-info">Fait 🗸</button>
                      <button class="btn btn-success">Commencer</button>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div id="" class="card-header d-flex align-items-center bg-info">
            <h2 class="fs-5 fw-normal mb-0" style="color: #FFF">Accouplements à venir</h2>
            <div class="ms-auto">
            </div>
          </div>
          <div id="" class="card card-body border-0 shadow mb-4">
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div id="" class="card-header d-flex align-items-center bg-danger">
            <h2 class="fs-5 fw-normal mb-0" style="color: #FFF">Accouplements interdits</h2>
            <div class="ms-auto">
            </div>
          </div>
          <div id="" class="card card-body border-0 shadow mb-4">
            <div class="card p-2">
              <table id="bunnyTable" class="hover" style="width:100%">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th class="nowrap">Identifiant</th>
                    <th class="nowrap">Identifiant</th>
                    <th class="nowrap">Enregistré le</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Id</th>
                    <th class="nowrap">Identifiant</th>
                    <th class="nowrap">Identifiant</th>
                    <th class="nowrap">Enregistré le</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>

            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div id="" class="card-header d-flex align-items-center bg-gray-700">
            <h2 class="fs-5 fw-normal mb-0" style="color: #FFF">Programmer un accouplement</h2>
            <div class="ms-auto">
            </div>
          </div>
          <div id="" class="card card-body border-0 shadow mb-4">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





@endsection
@section('script')
<script>
  let url = "{{route('get-list-bunny')}}"
  
    var table = new DataTable('#bunnyTabled', {
      scrollX: true,
      responsive: true, 
      dom: 'Bfrtip',
      stripeClasses: ['even', 'odd'],
      pageLength: 10,
      buttons: [
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
        { data: 'uid'},
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
        { 
          data: 'date_birth',
          visible: true,
        },
        {
          data: null,
          defaultContent: '<div class="btn-group"><button class="btn btn-gray-700">Prévisualiser</button><button class="btn btn-success">Prévisualiser</button>',
          targets: -1
        },
      
      ],columnDefs: [
        {
          targets: 4,
          render: DataTable.render.date('D MMM YYYY')
        },
      ]
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