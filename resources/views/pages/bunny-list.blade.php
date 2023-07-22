@extends('layouts.base')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
   <a  href="{{ route('create-bunny', []) }}"
    class="btn btn-outline-gray-500  dashed-outline new-card" ><svg class="icon icon-xs me-2" fill="none"
      stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
      </path>
    </svg>Record new Rabbit</a>
    
   
  </div>
  <!--Start code list product-->
 <div class="card p-2">
    <table id="bunnyTable" class="display">
        <thead>
          <tr>
            <th>Id</th>
            <th>Uid</th>
            <th>Gender</th>
            <th>Destination</th>
            <th>Date birth</th>
          </tr>
        </thead>
        <tbody>
      
        </tbody>
      </table>
    
  </div>
  <!--End code list product-->
  
 

@endsection
@section('script')
<script>
  let url = "{{route('get-list-bunny')}}"
      $('#bunnyTable').DataTable( {
        ajax: {
          url: url,
          dataSrc: 'bunnies'
        },
        processing: true,
        columns: [
          { data: 'id' },
          { data: 'Uid' },
          { data:'gender' },
          { data: 'destination' },
          { data: 'date_birth' },
        ]
      } );
</script>
@endsection