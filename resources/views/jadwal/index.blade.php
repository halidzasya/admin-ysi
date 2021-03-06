
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
                    <li class="breadcrumb-item active">Shift Perawat</li>
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
                  <div class="alert alert-{{ Session::get('message_type') }}" role="alert" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  @endif
            </div>
                <div class="card">


                    <div class="card-header">
                        <h2 class="float-left">Data Shift Perawat</h2>
                        <div class="float-right">
                        @if (isset(Auth::user()->id) && Auth::user()->level == 'admin')
                        <a href="{{ route('jadwal.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Shift</a>
                        @endif
                        </div>
                    </div>
                    <div class="card-body ">
                    <!-- <div class="table-responsive"> -->
                        <table id="example" class="table table-hover text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jadwal Shift</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                     @if (isset(Auth::user()->id) && Auth::user()->level == 'admin')
                                    <th width="260px">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $i => $data)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $data->jadwal }}</td>
                                    <td>  {{ date('H:i', strtotime($data->jam_masuk)) }}</td>
                                    <td>  {{ date('H:i', strtotime($data->jam_keluar)) }}</td>
                                    @if (isset(Auth::user()->id) && Auth::user()->level == 'admin')
                                    <td width="">
		                	<!-- <a href="{!!route('relawan.show', $data->id)!!}"> <button class="btn btn-success" title="Detail"><i class="fa fa-eye"></i></button> </a> -->
		                	<a href="{!!route('jadwal.edit', $data->id)!!}"> <button class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></button> </a>
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
		                	<a href="{!!route('relawan.destroy', $data->id)!!}"> <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" title="Hapus"><i class="fas fa-trash"></i></button> </a>
					                </td>
                                    @endif

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{--  {!! $datas->links() !!} --}}
                    </div>
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
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
    });
  }, 5000);
</script>


@stop

