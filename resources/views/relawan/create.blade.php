
<!-- @section('js')
    <script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })


var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('submit').disabled = false;
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('submit').disabled = true;
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
    </script>
@stop -->

@extends('layout.app')

@section('content')

<form action="{{ route('relawan.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
<div class="row  justify-content-center">
            <!-- <div class="col-lg-12 d-flex align-items-stretch grid-margin"> -->
                <div class="col-md-10">
                  <div class="card">
                  <div class="card-header">
                      <h3>Tambah Data Relawan</h3>
                    </div>
                  <div class="card-body">

                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama Lengkap</label>
                            <div class="col-md-10">
                                <input id="nama" type="varchar" class="form-control" name="nama" value="{{ old('nama') }}" required >
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
                            <option value="L" >Laki - Laki</option>
					    	<option value="P" >Perempuan</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('agama') ? ' has-error' : '' }}">
                            <label for="agama" class="col-md-4 control-label">Agama</label>
                            <div class="col-md-10">
                            <select class="form-control" name="agama" required>
                            <option value="islam" >Islam</option>
                            <option value="nonis" >Non-Is</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nohp') ? ' has-error' : '' }}">
                            <label for="nohp" class="col-md-4 control-label">No Hp</label>
                            <div class="col-md-10">
                                <input id="nohp" type="varchar" class="form-control" name="nohp" value="{{ old('nohp') }}" required >
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
                                <input id="tempatlahir" type="varchar" class="form-control" name="tempatlahir" value="{{ old('tempatlahir') }}" required >
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
                                <input id="ttl" type="date" class="form-control" name="ttl" value="{{ old('ttl') }}" >
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
                                <input id="domisili" type="varchar" class="form-control" name="domisili" value="{{ old('domisili') }}" required >
                                @if ($errors->has('domisili'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('domisili') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat KTP</label>
                            <div class="col-md-10">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required >
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
                            <option value="PL" >Pelajar</option>
					    	<option value="MH" >Mahasiswa</option>
                            <option value="BK" >Bekerja</option>
                            </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Tambah
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('relawan.index')}}" class="btn btn-light pull-right">Kembali</a>
                    </div>
                  </div>
</div>
              </div>
            </div>

<!-- </div> -->
</form>
@endsection