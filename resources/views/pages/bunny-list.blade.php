@extends('layouts.base')

@section('content')
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
        <th>Uid</th>
        <th>Gender</th>
        <th>Destination</th>
        <th>Date birth</th>
        <th>Action</th>
      </tr>
    </thead>
   <tfoot>
     <tr>
        <th>Id</th>
        <th>Uid</th>
        <th>Gender</th>
        <th>Destination</th>
        <th>Date birth</th>
        <th>Action</th>
      </tr>
    </tfoot>
  </table>

</div>
<!--End code list product-->



@endsection
@section('script')
<script>
  let url = "{{route('get-list-bunny')}}"

      var table = new DataTable('#bunnyTable', {
          responsive: true, 
          dom: 'Bfrtip',
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
            { data: 'id' },
            { data: 'uid' },
            { data:'gender' },
            { data: 'destination' },
            { 
              data: 'date_birth',
              visible: false
            },
            {
              data: null,
              defaultContent: '<button class="dataTable_button dataTable_more_button">Developper</button>',
              targets: -1
            }
          
          ],columnDefs: [
            {
              targets: 4,
              render: DataTable.render.date('D MMM YYYY')
            },
          ]
      });

      table.on('click', 'button', function (e) {
        let data = table.row(e.target.closest('tr')).data();
        console.log(data);
        alert(data[0] + "'s salary is: " + data["Uid"]);
      });
</script>
@endsection