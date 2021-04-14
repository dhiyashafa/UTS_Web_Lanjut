<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\perpustakaan as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model; //Model Eloquent

class perpustakaan extends Model //definisi model
{
    use HasFactory;
    protected $table="data"; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswas     
    public $timestamps= false;      
    protected  $primaryKey = 'id_buku'; // Memanggil isi DB Dengan primarykey     
    /**      * The attributes that are mass assignable. 
    *      
    * @var array      
    */     
    protected $fillable = [         
        'Id_Buku',      
        'Nama_Peminjam', 
        'Judul_Buku',         
        'Penulis_Buku',         
        'Tanggal_Pinjam',         
        'Tanggal_Kembali',  
    ];
}
