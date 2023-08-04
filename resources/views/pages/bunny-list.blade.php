@extends('layouts.base')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
  <a href="{{ route('create-bunny', []) }}" class="btn btn-outline-gray-500  dashed-outline new-card"><svg
      class="icon icon-xs me-2" fill="none" stroke="currentColor" viewbox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
      </path>
    </svg>Record new Rabbit</a>


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

<!-- Modal information bunny-->
<div class="modal fade" id="bunnyModal" tabindex="-1" aria-labelledby="bunnyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bunnyModalLabel">Information du lapin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Contenu du Modal
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
          responsive: true, 
          dom: 'Bfrtip',
          buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print',{
              extend: 'searchPanes',
              config: {
                cascadePanes: true
              }
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
              defaultContent: '<div class="btn-group"><button class="btn btn-primary " >Click!</button><a href="#" id="edit" class="btn btn-primary">Edit</a><a href="#" id="delete" class="btn btn-danger">delete</button></a>',
              targets: -1
            },
          
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

      table.on('click', '#edit', function (e) {
        let data = table.row(e.target.closest('tr')).data();
        console.log(data);
        let url='{{ route("get-bunny-data", ["%s"]) }}';
        url=url.replace('%s',data['id']);
        window.location.href =url ;
      });
</script>
@endsection