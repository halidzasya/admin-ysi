@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop

@include('admin.admin')
<h1>hahaha</h1>
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Belajar CRUD di Laravel 7</h2>
            </div>
            
        </div>
    </div>
   
    <!-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif -->
   
  <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($datas as $data)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->status }}</td>
           
        </tr>
        @endforeach
    </table>
    {!! $datas->links() !!}

      
@endsection