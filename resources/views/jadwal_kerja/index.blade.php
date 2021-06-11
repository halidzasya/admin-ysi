
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
                    <li class="breadcrumb-item active">Jam Kerja</li>
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
            <!-- <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" role="alert" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
            </div> -->
                <div class="card">
                    <div class="card-body ">
                    <h3 class=" left">Data Jadwal Kerja Perawat
                    <a href="{{ route('jadwal_kerja.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Data</a>

                    </h3>
                    <div class="table-responsive">
                        <table id="table" class="table table-hover text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Relawan</th>
                                    <th>Jadwal Shift</th>

                                    <th width="260px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($relawan as $data)
                                <tr>

                                    <td>{{$data->nama}}</td>

                                    <td>{{$data->nama_jadwal}}</td>
                                    <td width="">
		                	<a href="{!!route('jadwal_kerja.edit', $data->id)!!}" > <button class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></button> </a>
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
		                	<a > <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" title="Hapus"><i class="fa fa-trash"></i></button> </a>
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
    </div>
</section>
@endsection

@section('js')


<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
    });
  }, 5000);
</script>

@stop