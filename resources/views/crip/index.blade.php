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
                    <li class="breadcrumb-item active">Crips</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Skala Nilai Kriteria</h2>
                        <form action="{{route('crip')}}" class="form-inline float-right" method="GET">
                        <div class="form-group">
                            <select name="k" onchange="this.form.submit()" class="form-control">
                                <option value="">-- Pilih Kriteria --</option>
                                @foreach($kriteria as $k)
                                    <option value="{{$k->id}}" {{(request('k') == $k->id)?'selected':''}}>{{$k->kode." - ".$k->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="float-right">
                            <a href="{{route('crip.create')}}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i>Tambah Nilai Crips</a>
                        </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    <th>Keterangan</th>
                                    <th>Nilai</th>
                                    <th class="text-center" style="width:15%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($crips->isEmpty() || empty($crips))
                                    <tr>
                                        <td colspan="4" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @else
                                    @foreach($crips as $data)
                                        <tr>
                                            <td>{{$data->kriteria->nama}}</td>
                                            <td>{{$data->nama_crip}}</td>
                                            <td>{{$data->nilai_crip}}</td>
                                            <td class="text-center">
                                                <form action="{{route('crip.hapus',['id' => $data->id])}}" method="POST">
                                                    @csrf
                                                    <a href="{{route('crip.edit',['id' => $data->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
