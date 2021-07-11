
@extends('layout.app')

@section('content')

<form action="{{ route('relawan.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

<div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="card ">
                    <div class="card-header">
                      <h3>Edit Data Relawan</h3>
                    </div>
                  <div class="card-body">

                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama Lengkap</label>
                            <div class="col-md-10">
                                <input id="nama" type="varchar" class="form-control" name="nama" value="{{ $data->nama }}" required >
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            <label for="level" class="col-md-4 control-label">Jenis Kelamin</label>
                            <div class="col-md-10">
                            <select class="form-control" name="jk" required>
                            <option value="L" {{ ($data->jk == 'L') ? 'selected' : '' }}>Laki - Laki</option>
					    	<option value="P" {{ ($data->jk == 'P') ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('agama') ? ' has-error' : '' }}">
                            <label for="agama" class="col-md-4 control-label">Agama</label>
                            <div class="col-md-10">
                            <select class="form-control" name="agama" required>
                            <option value="islam" {{ ($data->agama == 'islam') ? 'selected' : '' }} >Islam</option>
                            <option value="nonis" {{ ($data->agama == 'nonis') ? 'selected' : '' }} >Non-Is</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nohp') ? ' has-error' : '' }}">
                            <label for="nohp" class="col-md-4 control-label">No Hp</label>
                            <div class="col-md-10">
                                <input id="nohp" type="varchar" class="form-control" name="nohp" value="{{ $data->nohp }}"  required >
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
                                <input id="tempatlahir" type="text" class="form-control" name="tempatlahir" value="{{ $data->tempatlahir }}" required >
                                @if ($errors->has('tempatlahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempatlahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ttl') ? ' has-error' : '' }}" required>
                            <label for="ttl" class="col-md-4 control-label">Tanggal Lahir </label>
                            <div class="col-md-10">
                                <input id="ttl" type="date" class="form-control" name="ttl" value="{{ $data->ttl }}" >
                                @if ($errors->has('ttl'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ttl') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                        <div class="form-group{{ $errors->has('domisili') ? ' has-error' : '' }}">
                            <label for="domisili" class="col-md-4 control-label">Domisili</label>
                            <div class="col-md-10">
                                <input id="domisili" type="varchar" class="form-control" name="domisili" value="{{ $data->domisili }}" required >
                                @if ($errors->has('domisili'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('domisili') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-10">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ $data->alamat }}" required >
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-10">
                            <select class="form-control" name="status" required>
                            <option value="PL" {{ ($data->status == 'PL') ? 'selected' : '' }}>Pelajar</option>
					    	<option value="MH" {{ ($data->status == 'MH') ? 'selected' : '' }}>Mahasiswa</option>
                            <option value="BK" {{ ($data->status == 'BK') ? 'selected' : '' }}>Bekerja</option>

                            </select>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary mr-2" id="submit">
                                    Update
                        </button>
                        <button type="submit" href="{{route('relawan.index')}}" class="btn btn-light pull-right" >
                                    Kembali
                        </button>
                    </div>

                  </div>
              </div>
</div>


</form>
@endsection