
@extends('layout.app')

@section('content')
<form action="{{ route('jadwal_kerja.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
<div class="row">
            <div class="col-lg-12 d-flex align-items-stretch grid-margin">
                <div class="col-12">
                  <div class="card">
                  <div class="card-body">
                      <h4 class="card-title">Tambah Data Jadwal Kerja</h4>
<br></br>

                        <div class="form-group">
                                    <label for="relawan" class="col-md-4 control-label">Nama Relawan <span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                    <select class="form-control" name="relawan" class="col-md-4 control-label">
                                        <option value="">-- Pilih Perawat --</option>
                                        @foreach($relawan as $k)
                                            <option value="{{$k->id}}">{{$k->nama}} </option>
                                        @endforeach
                                    </select>
                                    <div>
                            </div>
                        </div>


                        <!-- <div class="form-group{{ $errors->has('tgl_mulai') ? ' has-error' : '' }}" required>
                            <label for="tgl_mulai" class="col-md-4 control-label">tgl_mulai </label>
                            <div class="col-md-3">
                                <input id="tgl_mulai" type="date" class="form-control" name="tgl_mulai" value="{{ old('tgl_mulai') }}" >
                                @if ($errors->has('tgl_mulai'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_mulai') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tgl_selesai') ? ' has-error' : '' }}" required>
                            <label for="tgl_selesai" class="col-md-4 control-label">tgl_selesai </label>
                            <div class="col-md-3">
                                <input id="tgl_selesai" type="date" class="form-control" name="tgl_selesai" value="{{ old('tgl_selesai') }}" >
                                @if ($errors->has('tgl_selesai'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_selesai') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->
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


@section('js')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

$(".js-example-tags").select2({
  tags: true
});

} );
</script>


@stop

