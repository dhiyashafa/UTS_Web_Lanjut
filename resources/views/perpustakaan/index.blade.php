@extends('perpustakaan.layout')   
@section('content')     
<div class="row">         
    <div class="col-lg-12 margin-tb">             
        <div class="pull-left mt-2">                 
            <h2>PERPUSTAKAAN UMUM MALANG RAYA</h2>             
        </div>  
        <form class="float-right form-inline" id="searchForm" method="get" action="{{ route('perpustakaan.index') }}" role="search">           
        <div class="form-group">
            <input type="text" name="keyword" class="form-control" id="keyword" aria-describedby="keyword" placeholder="ID Buku nama atau Judul..." value="{{request()->query('keyword')}}">
        </div>
            <button type="submit" class="btn btn-primary mx-2">Search</button>
            <a href="{{ route('perpustakaan.index') }}">
                <button type="button" class="btn btn-danger">Reset</button>
            </a>
        </form>
        <div class="float-right mx-2">                 
            <a class="btn btn-success" href="{{ route('perpustakaan.create') }}"> Input data</a>             
        </div>  
        
    </div>    
</div>         
@if ($message = Session::get('success'))         
<div class="alert alert-success">             
    <p>{{ $message }}</p>         
</div>     
@endif         
<table class="table table-bordered my-2">
        <tr>
            <td>ID Buku</td>
            <td>Nama Peminjam</td>
            <td>Judul</td>
            <td>Penulis</td>
            <td>Tanggal Pinjam</td>
            <td>Tanggal Kembali</td>            
            <td>Action</td>
        </tr>
        @foreach ($data as $datas)
        <tr>
 
            <td>{{ $datas->id_buku }}</td>
            <td>{{ $datas->nama_peminjam}}</td>
            <td>{{ $datas->judul_buku }}</td>
            <td>{{ $datas->penulis_buku }}</td>
            <td>{{ $datas->tanggal_pinjam }}</td>
            <td>{{ $datas->tanggal_kembali }}</td>          
            <td>
                <form action="{{route('perpustakaan.destroy', $datas->id_buku) }}" method="POST">                            
                <a class="btn btn-info" href="{{ route('perpustakaan.show',$datas->id_buku) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('perpustakaan.edit',$datas->id_buku) }}">Edit</a>

                @csrf 
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex">
        {{ $data->links()}}
        </div> 
@endsection