@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

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
                    <div class="card-body ">
                    <h3 class=" left">Data Relawan
                    <a href="{{ route('relawan.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Data</a>

                    </h3>
                    <div class="table-responsive">
                        <table id="table" class="table table-hover text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Hp</th>
                                    <th>Tgl Lahir</th>
                                    <th>Domisili</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th width="260px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                <?php $i = 1; ?>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{$data->jk === "L" ? "Laki - Laki" : "Perempuan"}}</td>
                                    <td>{{ $data->nohp }}</td>
                                    <td>{{ $data->ttl }}</td>
                                    <td>{{ $data->domisili }}</td>
                                    <td>{{ $data->email }}</td>
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
		                	<a href="{!!route('relawan.destroy', $data->id)!!}"> <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" title="Hapus"><i class="fa fa-trash"></i></button> </a>
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

