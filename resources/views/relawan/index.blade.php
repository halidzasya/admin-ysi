
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
                  <div class="alert alert-{{ Session::get('message_type') }}" role="alert" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  @endif
            </div>
            <div class="card">
            <div class="card-header">
                        <h2 class="float-left">Data Relawan</h2>
                        <div class="float-right">
                        <a href="{{ route('relawan.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Data</a>                        </div>
                    </div>
                    <div class="card-body ">
                    <!-- <div class="table-responsive"> -->
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th >Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Hp</th>
                                    <th>Domisili</th>
                                    <th>Status</th>
                                    <th width="180px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $i => $data)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->jk === "L" ? "Laki - Laki" : "Perempuan"}}</td>
                                    <td>{{ $data->nohp }}</td>
                                    <td>{{ $data->domisili }}</td>
                                    <td>
                                        @if($data->Status == 'PL')
                                            Pelajar
                                        @elseif($data->status == 'MH')
                                            Mahasiswa
                                        @else
                                            Bekerja
                                        @endif
                                        </td>
                                    <td width="">
		                	<a href="{!!route('relawan.show', $data->id)!!}"> <button class="btn btn-success" title="Detail"><i class="fa fa-eye"></i></button> </a>
		                	<a href="{!!route('relawan.edit', $data->id)!!}"> <button class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></button> </a>
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
		                	<a href="{{route('hapusrelawan', $data->id)}}"> <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" title="Hapus"><i class="fa fa-trash"></i></button> </a>
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
</section>
@endsection




@section('js')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@stop