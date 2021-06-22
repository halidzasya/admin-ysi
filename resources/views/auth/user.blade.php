
@extends('layout.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="col-lg-12">
                    @if (Session::has('message'))
                    <div class="alert alert-{{ Session::get('message_type') }}" role="alert" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    @endif
              </div>
                <div class="card">
                  <div class="card-header">
                          <h2 class="float-left">Data Users</h2>
                          <div class="float-right">
                          <a href="{{ route('user.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah User</a>
                          </div>
                    </div>
                <div class="card-body">
                  <!-- <div class="table-responsive"> -->
                    <table id="example" class="table table-striped "  style="width:100%">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Level</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <td class="py-1">
                          @if($data->gambar)
                            <img src="{{url('images/user', $data->gambar)}}" alt="image" style="margin-right: 10px;" />
                          @else
                            <img src="{{url('images/user/default.png')}}" alt="image" style="margin-right: 10px;" />
                          @endif
                            {{$data->name}}
                          </td>
                          <td>
                          <a href="{{route('user.show', $data->id)}}">
                          {{$data->username}}
                          </a>
                          </td>
                          <td>
                            {{$data->email}}
                          </td>
                          <td>
                            {{$data->level}}
                          </td>

                          <td width="">
		                	<a href="{{route('user.edit', $data->id)}}"> <button class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></button> </a>
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
		                	<a href="{{route('hapususer',['id' => $data->id])}}"> <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" title="Hapus"><i class="fas fa-trash"></i></button> </a>
					                </td>


                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  <!-- </div> -->
                  {{-- {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
  </section>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>
$('div.alert').delay(3000).slideUp(300);
</script>

<script>

$("document").ready(function(){
    setTimeout(function(){
        $("#waktu2").remove();
    }, 3000 );
});

</script>

<script>
$('div.alert').delay(5000).slideUp(300);
</script>
@stop