<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaksin;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.program', [
            'title' => 'Data Jenis Vaksin',
            'vaksins' => Vaksin::latest()->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.tambah', [
            'title' => 'Tambah data jenis vaksin'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi data yang diinputkan dari form
        $validateData = $request->validate([
            'jenis' => 'required|unique:vaksins'
        ]);


        // jika data sudah didapat semua, proses update dilakukan.
        $data = Vaksin::create($validateData);

        // pesan yang dikirim jika berhasil atau gagal
        if ($data) {
            return redirect('/program')->with('success', 'Data berhasil ditambah');
        } else {
            return redirect()->back()->with('error', 'Gagal menambah data!');
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('layouts.edit-program', [
            'title' => 'Tambah data jenis vaksin',
            'vaksin' => Vaksin::find($id)
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
            'jenis' => 'required|unique:vaksins'
        ]);


        // jika data sudah didapat semua, proses update dilakukan.
        $data = Vaksin::where('id', $id)->update($validateData);

        // pesan yang dikirim jika berhasil atau gagal
        if ($data) {
            return redirect('/program')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Gagal update data!');
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
        Vaksin::find($id)->orangs()->delete();
        // untuk menghapus data 
        Vaksin::find($id)->delete();
        // pesan jika berhasil hapus
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
