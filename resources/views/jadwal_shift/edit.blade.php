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
<form action="{{ url('jadwal_shift', $per->id) }}" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}
        {{ method_field('put') }}

<div class="row">
            <div class="col-lg-12 d-flex align-items-stretch grid-margin">
                <div class="col-12">
                  <div class="card">
                  <div class="card-body">
                      <h4 class="card-title">Edit Data Jadwal</h4>
<br></br>
                        <div class="form-group">
                            <label for="nama_perawat" class="col-md-4 control-label">Nama Perawat</label>
                            <div class="col-md-6">
                                <input id="nama_perawat" type="varchar" class="form-control" name="nama_perawat" value="{{$per->nama_perawat}}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jadwal" class="col-md-4 control-label">Jadwal</label>
                            <div class="col-md-6">
                                <select class="form-control select2" name="jadwal_id" id="jadwal_id" >
                                <option disabled value>Pilih Jadwal</option>
                                <option value="{{$per->jabatan_id}}" >{{$per->jadwal->jadwal}}</option>

                                @foreach($jad as $item)
                                    <option value="{{$item->id}}" >{{$item->jadwal}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>

                        <a href="{{route('relawan.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
              </div>
            </div>

</div>
</form>
@endsection
