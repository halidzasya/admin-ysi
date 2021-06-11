
@extends('layout.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <!-- <h1 class="m-0 text-dark">Tim Yayasan</h1> -->
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Relawan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" role="alert" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
            </div>
                <div class="card">
                <div class="card-header">
                        <h2 class="float-left">Data Perawat</h2>
                        <div class="float-right">
                        <a href="{{ route('perawat.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Data</a>                        </div>
                    </div>
                    <div class="card-body ">
                    <!-- <div class="table-responsive"> -->
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Domisili</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $i => $data)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td class="text-capitalized">{{ $data->nama_perawat }}</td>
                                    <td  class="text-capitalized">{{$data->jeniskelamin === "L" ? "Laki - Laki" : "Perempuan"}}</td>
                                    <td  class="text-capitalized">{{ $data->domisili }}</td>
                                    <td  class="text-capitalized">{{ $data->email }}</td>
                                    <td>
                                    @if($data->statuskerja == "aktif")
                                        <label class="badge badge-warning">{{$data->statuskerja}}</label>
                                    @else($data->statuskerja == "nonaktif")
                                        <label class="badge badge-success">{{$data->statuskerja}}</label>
                                    @endif
                                    </td>
                                    <td width="">
		                	<a href="{!!route('perawat.show', $data->id)!!}"> <button class="btn btn-success" title="Detail"><i class="fa fa-eye"></i></button> </a>
		                	<a href="{{route('perawat.edit', $data->id)}}"> <button class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></button> </a>
		                	<a href="{{route('perawat.hapus',['id' => $data->id])}}"> <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" title="Hapus"><i class="fas fa-trash"></i></button> </a>
					                </td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{--  {!! $->links() !!} --}}
                    </div>
                </div>
            </div>
        </div>


</section>
@endsection

@section('js')
<!-- <script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script> -->

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
    });
  }, 5000);
</script>


@stop
