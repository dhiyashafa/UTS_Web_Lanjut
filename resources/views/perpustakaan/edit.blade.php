@extends('perpustakaan.layout')   
 @section('content')     
 <div class="container mt-5">         
    <div class="row justify-content-center align-items-center">         
        <div class="card" style="width: 24rem;">             
            <div class="card-header">             
            Edit Data Peminjam             
            </div>             
            <div class="card-body">                 
            @if ($errors->any())                 
            <div class="alert alert-danger">                     
                <strong>Whoops!</strong> There were some problems with your input.<br><br>                     
                <ul>                         
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>                         
                    @endforeach                     
                </ul>                 
                </div>             
                @endif             
                <form method="post" action="{{ route('perpustakaan.update', $data->id_buku) }}" id="myForm">             
                @csrf             
                @method('PUT')
                <div class="form-group">                     
                    <label for="Id_Buku">ID Buku</label>
                    <input type="text" name="Id_Buku" class="form-control" id="Id_Buku" value="{{ $data->Id_Buku }}" aria-describedby="Id_Buku" > 
                </div>          
                <div class="form-group">                     
                    <label for="Nama_Peminjam">Nama Peminjam</label>
                    <input type="Nama_Peminjam" name="Nama_Peminjam" class="form-control" id="Nama_Peminjam" value="{{ $data->Nama_Peminjam }}" aria-describedby="Nama_Peminjam" > 
                </div>        
                <div class="form-group">
                    <label for="Judul_Buku">Judul Buku</label>
                    <input type="text" name="Judul_Buku" class="form-control" id="Judul_Buku" value="{{ $data->Judul_Buku }}" aria-describedby="Judul_Buku" > 
                </div>                 
                <div class="form-group"> 
                    <label for="Penulis_Buku">Penulis Buku</label> 
                    <input type="Penulis_Buku" name="Penulis_Buku" class="form-control" id="Penulis_Buku" value="{{ $data->Penulis_Buku }}" aria-describedby="Penulis_Buku" >                                 
                </div>                 
                <div class="form-group">                     
                    <label for="Tanggal_Pinjam">Tanggal Pinjam</label>
                    <input type="Tanggal_Pinjam" name="Tanggal_Pinjam" class="form-control" id="Tanggal_Pinjam" value="{{ $data->Tanggal_Pinjam }}" aria-describedby="Tanggal_Pinjam" >                                 
                </div>                 
                <div class="form-group">                     
                    <label for="Tanggal_Kembali">Tanggal Kembali</label>
                    <input type="Tanggal_Kembali" name="Tanggal_Kembali" class="form-control" id="Tanggal_Kembali" value="{{ $data->Tanggal_Kembali }}" aria-describedby="Tanggal_Kembali" >                                 
                </div>               
                <button type="submit" class="btn btn-primary">Submit</button>   
                <a class="btn btn-success mt3" href="{{ route('perpustakaan.index') }}">Kembali</a>           
                </form>             
            </div>         
        </div>    
    </div>
</div> 
@endsection 
 