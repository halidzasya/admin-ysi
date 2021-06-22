
@extends('layout.app')

@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <!-- <h1 class="m-0 text-dark">Tim Yayasan</h1> -->
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Reward</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" role="alert" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  @endif
            </div>
                <div class="card">
                <div class="card-header">
                        <h2 class="float-left">Reward Relawan</h2>
                        <div class="float-right">
                        <a href="{{ route('rating.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body ">
                    <!-- <div class="table-responsive"> -->
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Relawan</th>
                                    <th >Reward</th>
                                    <th width="200px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($dtRating as $i => $item)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td class="text-capitalized">{{ $item->relawan->nama }}</td>
                                    <td >
                                    {!! str_repeat('<i class="fa fa-star" style="color:#FDD73C;" aria-hidden="true"></i>', $item->rating) !!}
                                    <!-- <i class="fa fa-star" value="{{$item->rating}}"> -->
                                    <!-- <input id="input-id" type="text" class="rating" data-size="xs"  value="{{$item->rating}}" > -->
                                    <!-- <input id="rating-input" type="text" value="{{$item->rating}}" title=""/> -->
                                    <!-- <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" data-size="xs" disabled="" value="{{$item->rating}}"> -->
                                    </td>
                                    <td width="">
                                       <a > <button class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></button> </a>
                                      <a href="{{route('rating.hapus',['id' => $item->id])}}" > <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" title="Hapus"><i class="fas fa-trash"></i></button> </a>
					                          </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    {{--  {!! $->links() !!} --}}

                  </div>
               </div>
              </div>
  </div>

  </section>


<!-- <form class="form-horizontal poststars"  id="addStar" method="POST">
  {{ csrf_field() }}
<div class="form-group" id="rating-ability-wrapper">
	    <label class="control-label" for="rating">
	    <span class="field-label-header">Reward untuk relawan</span><br>
	    <span class="field-label-info"></span>
        <input type="hidden" id="selected_rating" name="rating" value="" required="required">
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
</form> -->


@endsection


@section('js')


<script>
// with plugin options (do not attach the CSS class "rating" to your input if using this approach)
$("#input-id").rating({'size':'xs'});
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


<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>


<script>
$("#input-id").rating();
</script>


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/star-rating.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
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
</script>
<script>
$("#input-id").rating();
</script>

@stop



