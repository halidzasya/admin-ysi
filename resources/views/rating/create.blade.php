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
                                    <label for="nama">Nama Relawan <span class="text-danger"></span></label>
                                    <select class="form-control select2" name="relawan_id" id="relawan_id" >
                                            <option value>-- Pilih Relawan --</option>
                                            @foreach($rel as $item)
                                                <option value="{{$item->id}}" >{{$item->nama}}</option>
                                            @endforeach
                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="rating">Reward Relawan <span class="text-danger"></span></label>
                                    <!-- <div class="rating"  required> -->
                                        <!-- <input type="radio" name="rating" id="star1" value="{{$item->rating}}"><label for="star1"></label></div> -->
                                        <div class="form-group" id="rating-ability-wrapper">

                                                <span class="field-label-info"></span>
                                                <input type="hidden" id="selected_rating" name="rating" value="{{$item->rating}}" required="required">
                                                </label>
                                                <h2 class="bold rating-header" style="">
                                                <span class="selected-rating">0</span><small> / 5</small>
                                                </h2>
                                                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </button>
                                            </input>
                                        </div>
                                        <!-- <input type="radio"  name="rating" id="star2" ><label for="star2"></label>
                                        <input type="radio"  name="rating" id="star3" ><label for="star3"></label>
                                        <input type="radio"  name="rating" id="star4" ><label for="star4"></label>
                                        <input type="radio"  name="rating" id="star5" ><label for="star5"></label> -->

                                        <!-- <input type="text" name="rating"   class="rating rating-loading" data-min="0" data-max="5" data-step="0.1"  id="input-id"/> -->

                                    <!-- <input id="input-id" name="rating" type="text"  title=""/> -->
                                    <!-- <input type="text" name="rating"   class="rating rating-loading" data-min="0" data-max="5" data-step="0.1"  id="input-id"/> -->
                                </div>

                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
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
<script type="text/javascript">
jQuery(document).ready(function($){

        $(".btnrating").on('click',(function(e) {


        var previous_value = $("#selected_rating").val();

        var selected_value = $(this).attr("data-attr");
        $("#selected_rating").val(selected_value);

        $(".selected-rating").empty();
        $(".selected-rating").html(selected_value);

        for (i = 1; i <= selected_value; ++i) {
        $("#rating-star-"+i).toggleClass('btn-warning');
        $("#rating-star-"+i).toggleClass('btn-default');
        }

        for (ix = 1; ix <= previous_value; ++ix) {
        $("#rating-star-"+ix).toggleClass('btn-warning');
        $("#rating-star-"+ix).toggleClass('btn-default');
        }

        }));


    });

</script>

@stop

@section('css')

@stop

