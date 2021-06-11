@section('js')

<script src="assets/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="assets/timepicker.js"></script>

<script>
$(function(){
 $('.timepicker').timepicker({
       showInputs: false,
        format: 'HH:mm'
    })
});
</script>
@stop
@extends('layout.app')

@section('content')
<form action="{{ route('jadwal.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
<div class="row">
            <div class="col-lg-12 d-flex align-items-stretch grid-margin">
                <div class="col-12">
                  <div class="card">
                  <div class="card-body">
                      <h4 class="card-title">Tambah Data Jadwal</h4>
<br></br>
                        <div class="form-group{{ $errors->has('jadwal') ? ' has-error' : '' }}">
                            <label for="jadwal" class="col-md-4 control-label">Jadwal</label>
                            <div class="col-md-6">
                                <input id="jadwal" type="varchar" class="form-control" name="jadwal" value="{{ old('jadwal') }}" required >
                                @if ($errors->has('jadwal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jadwal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jam_masuk') ? ' has-error' : '' }}" required>
                            <label for="jam_masuk" class="col-md-4 control-label">Jam Masuk </label>
                            <div class="col-md-3">
                            <input id="timepicker" type="time" class="form-control " name="jam_masuk" value="{{ old('jam_masuk') }}" >
                                @if ($errors->has('jam_masuk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jam_masuk') }}</strong>
                                    </span>
                                @endif
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('jam_keluar') ? ' has-error' : '' }}" required>
                            <label for="jam_keluar" class="col-md-4 control-label">Jam Keluar </label>
                            <div class="col-md-3">
                            <input id="timepicker" type="time" class="form-control timepicker" name="jam_keluar" value="{{ old('jam_masuk') }}" >
                                @if ($errors->has('jam_keluar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jam_keluar') }}</strong>
                                    </span>
                                @endif
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Tambah
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('relawan.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
</div>
              </div>
            </div>

</div>
</form>
@endsection
