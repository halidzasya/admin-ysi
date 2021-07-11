
@extends('layout.app')

@section('content')
	<div class="row ">
		  <div class="col-xs-12 col-sm-4 col-md-8">
		  <div class="card">
		  <div class="box box-info">

		  	<div class="box-header with-border">
              <h4 class="box-title p-2">Detail Data Perawat</h4>
            </div>

			<div class="box-body">
				<table class="table table-stripped" width="100%">
					<tr>
						<td width="35%">Nama Lengkap </td>
						<td width="1%"> : </td>
						<td>{{$datas->nama_perawat}}</td>
					</tr>
					<tr>
						<td width="35%">Jenis Kelamin</td>
						<td width="1%"> : </td>
						<td>
							@if($datas->jeniskelamin == 'L') Laki - Laki @endif
							@if($datas->jeniskelamin == 'P') Perempuan @endif
						</td>
					</tr>
					<tr>
						<td width="35%">Agama</td>
						<td width="1%"> : </td>
						<td>
							@if($datas->agama == 'islam') Islam @endif
							@if($datas->agama == 'nonis') Nonis @endif
						</td>
					</tr>
					<tr>
						<td width="35%">No Hp</td>
						<td width="1%"> : </td>
						<td>{{$datas->nohp}}</td>
					</tr>
					<tr>
						<td width="35%">Tempat Lahir </td>
						<td width="1%"> : </td>
						<td>{{$datas->tempatlahir}}</td>
					</tr>
					<tr>
						<td width="35%">Tanggal Lahir </td>
						<td width="1%"> : </td>
						<td>{{$datas->ttl}}</td>
					</tr>
					<tr>
						<td width="35%">Alamat KTP </td>
						<td width="1%"> : </td>
						<td>{{$datas->alamat}}</td>
					</tr>
					<tr>
						<td width="35%">Domisili </td>
						<td width="1%"> : </td>
						<td>{{$datas->domisili}}</td>
					</tr>
					<tr>
						<td width="35%">Status</td>
						<td width="1%"> : </td>
						<td>
							@if($datas->status == 'M') Menikah
							@else($datas->status == 'BM') Bekerja @endif
						</td>
					</tr>
					<tr>
						<td width="35%">Status Kerja</td>
						<td width="1%"> : </td>
						<td>{{$datas->statuskerja}}</td>
					</tr>
					<tr>
						<td width="35%">Penngalaman</td>
						<td width="1%"> : </td>
						<td>{{$datas->pengalaman}}</td>
					</tr>


					</table>
				<br>
				 <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10">
						<button type="submit" onclick="window.location='{{ route("perawat.index")}}'" class="btn btn-primary">Kembali</button>
					</div>
				</div>
			</div>
</div>
		</div>
</div>
		</div>

@endsection
