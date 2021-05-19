
@extends('layout.app')

@section('content')
	<div class="row">
		  <div class="col-xs-12 col-sm-4 col-md-8">
		  <div class="card">
		  <div class="box box-info">

		  	<div class="box-header with-border">
              <h4 class="box-title p-2">Detail Data Relawan</h4>
            </div>

			<div class="box-body">
				<table class="table table-stripped" width="100%">
					<tr>
						<td width="35%">Nama Lengkap </td>
						<td width="1%"> : </td>
						<td>{{$datas->nama}}</td>
					</tr>
					<tr>
						<td width="35%">Jenis Kelamin</td>
						<td width="1%"> : </td>
						<td>
							@if($datas->jk == 'L') Laki - Laki @endif
							@if($datas->jk == 'P') Perempuan @endif
						</td>
					</tr>
					<tr>
						<td width="35%">Agama</td>
						<td width="1%"> : </td>
						<td>{{$datas->agama}}</td>
					</tr>
					<tr>
						<td width="35%">No Hp</td>
						<td width="1%"> : </td>
						<td>{{$datas->nohp}}</td>
					</tr>
					<tr>
						<td width="35%">Tempat Lahir </td>
						<td width="1%"> : </td>
						<td>{{$datas->tmpt_lahir}}</td>
					</tr>
					<tr>
						<td width="35%">Tanggal Lahir </td>
						<td width="1%"> : </td>
						<td>{{$datas->ttl}}</td>
					</tr>
					<tr>
						<td width="35%">Alamat KTP </td>
						<td width="1%"> : </td>
						<td>{{$datas->domisili}}</td>
					</tr>
					<tr>
						<td width="35%">Domisili </td>
						<td width="1%"> : </td>
						<td>{{$datas->domisili}}</td>
					</tr>
					<tr>
						<td width="35%">Email </td>
						<td width="1%"> : </td>
						<td>{{$datas->email}}</td>
					</tr>
					<tr>
						<td width="35%">Status</td>
						<td width="1%"> : </td>
						<td>
							@if($datas->status == 'PL') Pelajar
							@elseif($datas->status == 'MH') Mahasiswa
							@else($datas->status == 'BK') Bekerja @endif
						</td>
					</tr>
					<tr>
						<td width="35%">Motivasi </td>
						<td width="1%"> : </td>
						<td>{{$datas->motivasi}}</td>
					</tr>
					</table>
				<br>
				 <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10">
						<button type="submit" onclick="window.location='{{ route("relawan.index")}}'" class="btn btn-primary">Kembali</button>
					</div>
				</div>
			</div>
</div>
		</div>
</div>
		</div>

@endsection
