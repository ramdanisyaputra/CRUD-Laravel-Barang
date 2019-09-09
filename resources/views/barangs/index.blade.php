@extends('barangs.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel CRUD Barang</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('barangs.create') }}"> Create New Barang</a>
            </div>
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
            <th>Name</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($barangs as $barang)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $barang->name }}</td>
            <td>{{ $barang->harga }}</td>
            <td>{{ $barang->kategori }}</td>
            <td>{{ $barang->stok }}</td>
            <td>
                <form action="{{ route('barangs.destroy',$barang->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('barangs.show',$barang->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('barangs.edit',$barang->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $barangs->links() !!}
      
@endsection