
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

<form action="{{ route('jadwal_kerja.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-lg-12 d-flex align-items-stretch grid-margin">
                <div class="col-lg-12">
                  <div class="card">
                  <div class="card-body">
                      <h4 class="card-title">Edit Data Relawan</h4>
<br></br>
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama Lengkap</label>
                            <div class="col-md-6">
                                <input id="nama" type="varchar" class="form-control" name="nama" value="{{ $relawan->nama }}" required="read only" >
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                                    <label for="nama_jadwal" class="col-md-4 control-label">Jadwal Shift <span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                    <select class="form-control" name="nama_jadwal" id="nama_jadwal" class="col-md-4 control-label">
                                        <option value="Shift1" {{ ($data->nama_jadwal == 'Shift1') ? 'selected' : '' }}>Shift 1 </option>
					    	            <option value="Shift2" {{ ($data->nama_jadwal == 'Shift2') ? 'selected' : '' }}>Shift 2</option>
					    	            <option value="Shift3" {{ ($data->nama_jadwal == 'Shift3') ? 'selected' : '' }}>Shift 2</option>

                                    </select>
                                    <div>
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

</div>
</form>
@endsection