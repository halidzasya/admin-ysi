
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
                    <li class="breadcrumb-item active">Absensi</li>
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
                        <h2 class="float-left">Absensi</h2>
                        <div class="float-right">
                        <a class="btn btn-primary btn-rounded btn-fw" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Absensi</a>                        </div>
                    </div>
                    <div class="card-body ">
                    <!-- <div class="table-responsive"> -->
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <!-- <table id="table" class="table table-hover text-nowrap table-bordered"> -->
                            <thead>
                                <tr>

                                    <th>Tanggal</th>
                                    <th>Status Kehadiran</th>
                                    <th>Jam</th>
                                    <th>Aktivitas</th>
                                    <th width="260px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                <tr>

                                    <td>{{ date('d/m/y', strtotime($data->tanggal)) }}</td>
                                    <td>{{ $data->kehadiran }}</td>
                                    <!-- <td>{{ $data->jam_masuk }}</td>
                                    <td>{{ $data->jam_keluar }}</td> -->

                                    <td>
                                    @if(empty($data->jam_masuk))
                                    {{ date('H:i', strtotime($data->jam_masuk)) }} -
                                    {{ date('H:i', strtotime($data->jam_keluar)) }}
                                    @else(empty($data->jam_keluar ))
                                    {{ date('H:i', strtotime($data->jam_masuk)) }} -
                                    {{ date('H:i', strtotime($data->jam_keluar)) }}

                                    @endif
                                    </td>
                                    <td>{{ $data->aktivitas }}</td>
                                    <td width="">
		                	<!-- <a href="{!!route('relawan.show', $data->id)!!}"> <button class="btn btn-success" title="Detail"><i class="fa fa-eye"></i></button> </a> -->
		                	<button class="btn btn-warning" data-toggle="modal" data-target="#myModal{{$data->id}}" data-id="{{ $data->id }}" ><i class="fas fa-edit"></i></button>
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
		                	<a  href="{{route('hapusabsensi', $data->id)}}"> <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" title="Hapus"><i class="fas fa-trash"></i></button> </a>
					                </td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{--  {!! $datas->links() !!} --}}
                </div>
            </div>
        </div>
    </div>
     <!-- Modal -->
                        <div class="modal fade" id="exampleModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                            <form action="{{ route('absensi.store') }}" method="post" enctype="multipart/form-data">
                             {{ csrf_field() }}
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Absensi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}" required>
                            <label for="tanggal" id="myDatepicker2" class="col-md-6 control-label">Tanggal </label>
                            <div class="col-md-12">
                                <input id="tanggal" type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}" >
                                @if ($errors->has('tanggal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kehadiran') ? ' has-error' : '' }}">
                            <label for="kehadiran" class="col-md-4 control-label">Status Kehadiran</label>
                            <div class="col-md-12">
                                <!-- <input id="kehadiran" type="radio" name="kehadiran" value="{{ old('kehadiran') }}" required > -->

                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="kehadiran" id="exampleRadios1" value="Hadir" check >
                                    <label class="form-check-label" for="exampleRadios1" style="margin-right:20px;">
                                       Hadir
                                    </label>
                                    <input class="form-check-input" type="radio" name="kehadiran" id="exampleRadios1" value="Izin" checked>
                                    <label class="form-check-label" for="exampleRadios1" style="margin-right:20px;">
                                       Izin
                                    </label>
                                    <input class="form-check-input" type="radio" name="kehadiran" id="exampleRadios1" value="Sakit" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                       Sakit
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row col-md-12" required>
                            <div class="col-md-6">
                            <label for="jam_masuk" class="control-label">Jam Masuk </label>
                            <input id="timepicker" type="time" class="form-control " name="jam_masuk" value="{{ old('jam_masuk') }}" style="width:213px;" >
                                @if ($errors->has('jam_masuk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jam_masuk') }}</strong>
                                    </span>
                                @endif
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <label for="jam_keluar" class=" control-label">Jam Keluar </label>
                            <input id="timepicker" type="time" class="form-control " name="jam_keluar" value="{{ old('jam_keluar') }}" style="width:213px;"  >
                                @if ($errors->has('jam_keluar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jam_keluar') }}</strong>
                                    </span>
                                @endif
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('aktivitas') ? ' has-error' : '' }}">
                            <label for="aktivitas" class="col-md-4 control-label">Aktivitas/Keterangan*</label>
                            <div class="col-md-12">
                            <textarea class="form-control" id="aktivitas" rows="2" name="aktivitas" value="{{ old('aktivitas') }}" ></textarea>
                                <!-- <input id="aktivitas" type="varchar" class="form-control" name="aktivitas" value="{{ old('aktivitas') }}"  > -->
                                @if ($errors->has('aktivitas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aktivitas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit"  id="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            </div>
                            </form>
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
$('#myDatepicker2').datetimepicker(
    {
        format: 'DD MM YYYY'
    }
);

</script>
<script>
$('#timepicker').datetimepicker(
    {
        format: 'HH MM'
    }
);

</script>
<!-- <script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
    });
  }, 5000);
</script> -->


@stop
