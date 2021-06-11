@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Tambah Reward Relawan</h2>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <form  action="{{ route('rating.store') }}" method="POST" class="col-md-12">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="nama">Nama Relawan <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="relawan_id" id="relawan_id" >
                                            <option disabled value>Pilih Relawan</option>
                                            @foreach($rel as $item)
                                                <option value="{{$item->id}}" >{{$item->nama}}</option>
                                            @endforeach
                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="rating">rating <span class="text-danger">*</span></label>
                                    <input type="text" name="rating"   class="rating rating-loading" data-min="0" data-max="5" data-step="0.1"  id="input-id"/>
                                </div>


                                <div class="float-right">
                                    <button type="submit" class="btn btn-success">Tambah</button>
                                </div>

                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<!-- <script type="text/javascript">
 $(document).ready(function(){
  var $inp = $('#rating-input');
  $inp.rating({
                min: 0,
                max: 5,
                step: 1,
                size: 'sm',
                showClear: false
            });
  $inp.on('rating.change', function () {
   alert('Nilai rating : '+$('#rating-input').val());
  });
 });
</script> -->

<script type="text/javascript">
    $("#input-id").rating();
</script>

@stop