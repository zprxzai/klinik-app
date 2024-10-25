<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**zaidan */
    public function index()
    {
        $pasien = \App\Models\Pasien::latest()->paginate(10);
        $data['pasien'] = $pasien;
        return view('pasien_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien_create');  
    }

    /**
     * Store a newly created resource in storage.
     */
    /**zaidan*/
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'no_pasien' => 'required|unique:pasiens,no_pasien',
            'nama' => 'required',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        $pasien = new \App\Models\Pasien(); //membuat objek kosong
        $pasien->fill($requestData); //mengisi objek dengan data yang sudah divalidasi requestData
        $pasien->foto = $request->file('foto')->store('public'); //mengisi objek dengan pathFoto
        $pasien->save();
        return back()->with('pesan', 'Data sudah disimpan');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
