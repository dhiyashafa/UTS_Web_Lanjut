@extends('perpustakaan.layout')    
@section('content') 
 
<div class="container mt-5">     
    <div class="row justify-content-center align-items-center">         
        <div class="card" style="width: 24rem;">             
            <div class="card-header">             
            Detail Data Peminjam            
            </div> 
            <div class="card-body">                 
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID Buku: </b>{{$data->id_buku}}</li>     
                    <li class="list-group-item"><b>Nama Peminjam: </b>{{$data->nama_peminjam}}</li>               
                    <li class="list-group-item"><b>Judul Buku: </b>{{$data->judul_buku}}</li>                     
                    <li class="list-group-item"><b>Penulis Buku: </b>{{$data->penulis_buku}}</li>                     
                    <li class="list-group-item"><b>Tanggal Pinjam: </b>{{$data->tanggal_pinjam}}</li>                      
                    <li class="list-group-item"><b>Tanggal Kembali: </b>{{$data->tanggal_kembali}}</li>                 
                </ul>             
            </div>             
            <a class="btn btn-success mt3" href="{{ route('perpustakaan.index') }}">Kembali</a> 
        </div>     
    </div> 
</div>
@endsection 