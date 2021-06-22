@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    <table class="table table-responsive">
                        <form action="/absen" method="post">
                            {{csrf_field()}}
                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="keterangan..." name="note">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-flat btn-primary" name="btnIn" >ABSEN MASUK</button>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-flat btn-primary" name="btnOut" >ABSEN KELUAR</button>
                                </td>
                            </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Riwayat Absensi</div>

                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
                  Launch Default Modal
                </button>
                <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                        </div>
                <div class="panel-body">
                    <table class="table table-responsive table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data_absen as $absen)
                                <tr>
                                    <td>{{$absen->date}}</td>
                                    <td>{{$absen->time_in}}</td>
                                    <td>{{$absen->time_out}}</td>
                                    <td>{{$absen->note}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"><b><i>TIDAK ADA DATA UNTUK DITAMPILKAN</i></b></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {!! $data_absen->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
