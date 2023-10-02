<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orang;
use App\Models\Vaksin;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.data', [
            'title' => 'Data Siswa PKBM Lestari',
            'datas' => Orang::latest()->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('layouts.edit-data', [
            'title' => 'Edit Data Siswa',
            'vaksin' => Orang::findOrFail($id),
            'jeniss' => Vaksin::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $data = Orang::where('id', $id)->update($validateData);

        // pesan yang dikirim jika berhasil atau gagal
        if ($data) {
            return redirect('/data')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Gagal mengubah data!');
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // untuk menghapus data 
        Orang::find($id)->delete();
        // pesan jika berhasil hapus
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
