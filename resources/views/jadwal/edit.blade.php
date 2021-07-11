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

<form action="{{ route('jadwal.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row justify-content-center">
                <div class="col-md-6">
                  <div class="card">
                  <div class="card-header">
                      <h3>Edit Data Shift</h3>
                    </div>
                  <div class="card-body">

                        <div class="form-group{{ $errors->has('jadwal') ? ' has-error' : '' }}">
                            <label for="jadwal" class="col-md-4 control-label">jadwal</label>
                            <div class="col-md-8">
                                <input id="jadwal" type="varchar" class="form-control" name="jadwal" value="{{  $data->jadwal }}" required >
                                @if ($errors->has('jadwal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jadwal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jam_masuk') ? ' has-error' : '' }}" required>
                            <label for="jam_masuk" class="col-md-4 control-label">Jam Masuk </label>
                            <div class="col-md-8">
                            <input id="timepicker" type="time" class="form-control " name="jam_masuk" value="{{  $data->jam_masuk }}" >
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
                            <div class="col-md-8">
                            <input id="timepicker" type="time" class="form-control timepicker" name="jam_keluar" value="{{  $data->jam_keluar }}" >
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
                                    Update
                        </button>
                        <a href="{{route('relawan.index')}}" class="btn btn-light pull-right">Kembali</a>
                    </div>
                  </div>
</div>
              </div>
            </div>

</form>

@endsection