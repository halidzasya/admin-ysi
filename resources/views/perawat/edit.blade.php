

@extends('layout.app')

@section('content')

<form action="{{ route('perawat.update', $data->id) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
        {{ method_field('put') }}
<div class="row justify-content-center">
            <!-- <div class="col-lg-12 d-flex align-items-stretch grid-margin"> -->
                <div class="col-md-8">
                  <div class="card">
                  <div class="card-header">
                      <h3>Edit Data Perawat</h3>
                    </div>
                  <div class="card-body">

                        <div class="form-group{{ $errors->has('nama_perawat') ? ' has-error' : '' }}">
                            <label for="nama_perawat" class="col-md-4 control-label">Nama Perawat</label>
                            <div class="col-md-10">
                                <input id="nama_perawat" type="varchar" class="form-control" name="nama_perawat" value="{{ $data->nama_perawat }}" required required >
                                @if ($errors->has('nama_perawat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_perawat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('jeniskelamin') ? ' has-error' : '' }}">
                            <label for="jeniskelamin" class="col-md-4 control-label">Jenis Kelamin</label>
                            <div class="col-md-10">
                            <select class="form-control" name="jeniskelamin" required>
                            <option value="" >-- Pilih Jenis Kelamin -- </option>
                            <option value="L" {{ ($data->jeniskelamin == 'L') ? 'selected' : '' }}>Laki - Laki</option>
					    	<option value="P" {{ ($data->jeniskelamin == 'P') ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('agama') ? ' has-error' : '' }}">
                            <label for="agama" class="col-md-4 control-label">Agama</label>
                            <div class="col-md-10">
                            <select class="form-control" name="agama" required>
                            <option value="" >-- Pilih Agama -- </option>
                            <option value="islam" {{ ($data->agama == 'islam') ? 'selected' : '' }} >Islam</option>
                            <option value="nonis" {{ ($data->agama == 'nonis') ? 'selected' : '' }} >Non-Is</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nohp') ? ' has-error' : '' }}">
                            <label for="nohp" class="col-md-4 control-label">No Hp</label>
                            <div class="col-md-10">
                                <input id="nohp" type="varchar" class="form-control" name="nohp" value="{{ $data->nohp }}" required >
                                @if ($errors->has('nohp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nohp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tempatlahir') ? ' has-error' : '' }}">
                            <label for="tempatlahir" class="col-md-4 control-label">Tempat Lahir</label>
                            <div class="col-md-10">
                                <input id="tempatlahir" type="varchar" class="form-control" name="tempatlahir" value="{{ $data->tempatlahir }}" required required >
                                @if ($errors->has('tempatlahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempatlahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ttl') ? ' has-error' : '' }}" required>
                            <label for="ttl" class="col-md-4 control-label">Tanggal Lahir</label>
                            <div class="col-md-10">
                                <input id="ttl" type="date" class="form-control" name="ttl" value="{{ $data->ttl }}" required >
                                @if ($errors->has('ttl'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ttl') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat KTP</label>
                            <div class="col-md-10">
                                <input id="alamat" type="varchar" class="form-control" name="alamat"value="{{ $data->alamat }}"  required >
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('domisili') ? ' has-error' : '' }}">
                            <label for="domisili" class="col-md-4 control-label">Domisili *Kota</label>
                            <div class="col-md-10">
                                <input id="domisili" type="varchar" class="form-control" name="domisili" value="{{ $data->domisili }}"  required >
                                @if ($errors->has('domisili'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('domisili') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-10">
                            <select class="form-control" name="status" required>
                            <option value="M" {{ ($data->status == 'M') ? 'selected' : '' }} >Menikah</option>
					    	<option value="BM" {{ ($data->status == 'BM') ? 'selected' : '' }}>Belum Menikah</option>
                            </select>
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('statuskerja') ? ' has-error' : '' }}">
                            <label for="statuskerja" class="col-md-4 control-label">Status Perawat</label>
                            <div class="col-md-10">
                            <select class="form-control" name="statuskerja" required>
                            <option value="" >-- Pilih Status Perawat -- </option>
                            <option value="Aktif" {{ ($data->statuskerja == 'Aktif') ? 'selected' : '' }}>Aktif </option>
					    	<option value="Non Aktif" {{ ($data->statuskerja == 'Non Aktif') ? 'selected' : '' }}>Non Aktif</option>
                            <option value="Training" {{ ($data->statuskerja == 'Training') ? 'selected' : '' }}>Training</option>

                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('pengalaman') ? ' has-error' : '' }}">
                            <label for="pengalaman" class="col-md-4 control-label">Pengalaman</label>
                            <div class="col-md-10">
                                <input id="pengalaman" type="text" class="form-control" name="pengalaman" value="{{ $data->pengalaman }}" required >
                                @if ($errors->has('pengalaman'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pengalaman') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fotoktp" class="col-md-4 control-label">Foto KTP</label>
                            <div class="col-md-10">
                                <img width="200" height="200" @if($data->fotoktp) src="{{ asset('images/perawat/'.$data->fotoktp) }}" @endif/>
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="fotoktp">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sks" class="col-md-4 control-label">Surat Ket Sehat</label>
                            <div class="col-md-10">
                                <img width="200" height="200" @if($data->sks) src="{{ asset('images/perawat /'.$data->sks) }}" @endif />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="sks">
                            </div>
                        </div>
                        <div class="float-left">
                        <button type="submit" class="btn btn-primary mr-2" id="submit">
                                    Update
                        </button>
                        <a href="{{route('perawat.index')}}" class="btn btn-light pull-right">Kembali</a>
                        </div>
                    </div>
                  </div>
            </div>
              </div>
            </div>

<!-- </div> -->
</form>
@endsection