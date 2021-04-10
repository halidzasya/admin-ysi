
@extends('admin.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Belajar CRUD di Laravel 7</h2>
            </div>
            <!-- <div class="pull-right">
                <a class="btn btn-success" href="{{ route('biodata.create') }}"> Input Data</a>
            </div> -->
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($relawan as $rel)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $rel->nama }}</td>
            <td>{{ $rel->email }}</td>
            <td>{{ $rel->status }}</td>
            <td>
                <!-- <form action="{{ route('relawan.destroy',$bio->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('relawan.show',$bio->id) }}">Tampil</a>
    
                    <a class="btn btn-primary" href="{{ route('relawan.edit',$bio->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form> -->
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $biodata->links() !!}
      
@endsection