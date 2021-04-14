<?php

namespace App\Http\Controllers;

use App\Models\Perpustakaan;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class PerpusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        //$mahasiswas = Mahasiswa::all()->paginate(5); //Mengambil semua isi tabel
       /* $mahasiswas = Mahasiswa::orderBy('nim', 'desc')->paginate(5); 
        //$mahasiswa = User::find($nim);
        return view('mahasiswa.index', compact('mahasiswas'));         
        with('i', (request()->input('page', 1) - 1) * 5); */
        $data = Perpustakaan::where([
            ['id_buku', '!=', null, 'OR', 'judul_buku', '!=', null], //jika form kosong maka request akan null
            [function ($query) use ($request) {
                if (($keyword = $request->keyword)) {
                    $query->orWhere('id_buku', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('judul_buku', 'LIKE', '%' . $keyword . '%')->get(); //jika pencarian terisi request tidak null
                }
            }]
        ])
        ->orderBy('id_buku', 'desc')->paginate(5);
        return view('perpustakaan.index', compact('data'))->
        with('i', (request()->input('page', 1) - 1) * 5);

        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perpustakaan.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data         
        $request->validate([             
            'Id_Buku' => 'required',       
            'Nama_Peminjam' => 'required',  
            'Judul_Buku' => 'required',             
            'Penulis_Buku' => 'required',             
            'Tanggal_Pinjam' => 'required',             
            'Tanggal_Kembali' => 'required',      
            ]); 
 
        //fungsi eloquent untuk menambah data         
        Perpustakaan::create($request->all()); 
 
        //jika data berhasil ditambahkan, akan kembali ke halaman utama         
        return redirect()->route('perpustakaan.index')
        ->with('success', 'Data Berhasil Ditambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_buku)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa         
        $data = Perpustakaan::find($id_buku);         
        return view('perpustakaan.detail', compact('data')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_buku)
    {
         //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit         
         $data = Perpustakaan::find($id_buku);         
         return view('perpustakaan.edit', compact('data')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_buku)
    {
         //melakukan validasi data         
         $request->validate([             
            'Id_Buku' => 'required',          
            'Nama_Peminjam' => 'required',   
            'Judul_Buku' => 'required',             
            'Penulis_Buku' => 'required',             
            'Tanggal_Pinjam' => 'required',             
            'Tanggal_Kembali' => 'required', 
                     
             ]); 
 
        //fungsi eloquent untuk mengupdate data inputan kita         
            Perpustakaan::find($id_buku)->update($request->all()); 
 
        //jika data berhasil diupdate, akan kembali ke halaman utama         
        return redirect()->route('perpustakaan.index')             
            ->with('success', 'Data Berhasil Diupdate'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_buku)
    {
        //fungsi eloquent untuk menghapus data
        Perpustakaan::find($id_buku)->delete();
        return redirect()->route('perpustakaan.index')
        -> with('success', 'Data Berhasil Dihapus');
    }
}
