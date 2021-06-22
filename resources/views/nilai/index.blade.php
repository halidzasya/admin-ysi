@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Penilaian Calon Perawat</h2>
                        <div class="float-right">
                            <a href="{{route('alternatif.create')}}" class="btn btn-primary"><i class="fa fa-plus mr-1"></i>Tambah Alternatif</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">Kode</th>
                                    <th class="text-center">Nama</th>
                                    @foreach($kriteria as $krit)
                                        <th class="text-center">{{$krit->nama}}</th>
                                    @endforeach
                                    <th class="text-center" style="width:5%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($alternatif))
                                    @foreach($alternatif as $data)
                                        <tr>
                                            <td>{{$data->kode_alternatif}}</td>
                                            <td>{{$data->nama_alternatif}}</td>
                                            @foreach($data->crip as $crip)
                                                <td>{{$crip->nama_crip}}</td>
                                            @endforeach
                                            <td class="text-center">
                                                    <a href="{{route('nilai.edit',['id' => $data->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="{{(count($kriteria)+1)}}" class="text-center">Data tidak ditemukan</td>
                                    </tr>
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