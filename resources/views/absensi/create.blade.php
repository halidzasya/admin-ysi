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
<form action="{{ route('absensi.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
<div class="row">
            <div class="col-lg-12 d-flex align-items-stretch grid-margin">
                <div class="col-12">
                  <div class="card">
                  <div class="card-body">
                      <h4 class="card-title">Tambah Aktivitas</h4>
<br></br>
                        <div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}" required>
                            <label for="tanggal" class="col-md-4 control-label">Tanggal </label>
                            <div class="col-md-3">
                                <input id="tanggal" type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}" >
                                @if ($errors->has('tanggal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kehadiran') ? ' has-error' : '' }}">
                            <label for="kehadiran" class="col-md-4 control-label">Status Kehadiran</label>
                            <div class="col-md-6">
                                <!-- <input id="kehadiran" type="radio" name="kehadiran" value="{{ old('kehadiran') }}" required > -->

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kehadiran" id="exampleRadios1" value="Hadir" check>
                                    <label class="form-check-label" for="exampleRadios1">
                                       Hadir
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kehadiran" id="exampleRadios1" value="Izin" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                       Izin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kehadiran" id="exampleRadios1" value="Sakit" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                       Sakit
                                    </label>
                                </div>

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
                        <div class="form-group{{ $errors->has('aktivitas') ? ' has-error' : '' }}">
                            <label for="aktivitas" class="col-md-4 control-label">Aktivitas</label>
                            <div class="col-md-6">
                                <input id="aktivitas" type="varchar" class="form-control" name="aktivitas" value="{{ old('aktivitas') }}" required >
                                @if ($errors->has('aktivitas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aktivitas') }}</strong>
                                    </span>
                                @endif
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
