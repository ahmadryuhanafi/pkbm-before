<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orang;
use App\Models\Vaksin;

class DaftarController extends Controller
{
    public function index() 
    {
        return view('daftar', [
            'vaksins' => Vaksin::all()
        ]);
    }   

    public function store(Request $request)
    {
        // validasi data yang diinputkan dari form
        $validateData = $request->validate([
            'nama' => 'required',
            'nohp' => 'required',
            'nik' => 'required|unique:orangs|max:16',
            'vaksin_ke' => 'required',
            'jenis_id' => 'required'
        ]);


        // jika data sudah didapat semua, proses update dilakukan.
        $data = Orang::create($validateData);

        // pesan yang dikirim jika berhasil atau gagal
        if ($data) {
            return redirect('/daftar')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Gagal menambah data!');
        }  
    }
}
