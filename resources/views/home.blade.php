@extends('layout.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info ">
          <div class="inner">
            <h3>{{$perawat->count()}}</h3>
            <p>Total Perawat</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-nurse" style="color:#F9F9F9;"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$relawan->count()}}<sup style="font-size: 20px"></sup></h3>
            <p>Total Relawan</p>
          </div>
          <div class="icon">
            <i class="fas fa-users" style="color:white;"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box" style="background-color:#ED8B2F; color:white;"  >
          <div class="inner">
            <h3>{{$user->count()}}</h3>
            <p s>User Registrasi</p>
          </div>
          <div class="icon" >
            <i class="fas  fa-user " style="color:#F9F9F9;" ></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box " style="background-color:#D83A3A; color:white;">
          <div class="inner">
            <h3>{{$jadwal->count()}}</h3>
            <p> Shift Perawat</p>
          </div>
          <div class="icon">
            <i class="fas fa-clock " style="color:#F9F9F9;"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
  <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" role="alert" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
            </div>
                <div class="card">
                <div class="card-header">
                        <h2 class="float-left">Reward Relawan</h2>
                        <div class="float-right">
                        <a href="{{ route('rating.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Data</a>                        </div>
                        </div>
                    <div class="card-body ">
                    <!-- <div class="table-responsive"> -->
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Relawan</th>
                                    <th >Reward</th>
                                    <th width="200px">Action</th>
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
                                       <a > <button class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></button> </a>
                                      <a > <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" title="Hapus"><i class="fa fa-trash"></i></button> </a>
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
<!-- /.content -->
@endsection

@section('js')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@stop