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
            'no_pasien'     => 'required|unique:pasiens,no_pasien',
            'nama'          => 'required',
            'umur'          => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat'        => 'nullable',
            'foto'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $pasien = new \App\Models\Pasien();
        $pasien->no_pasien = $requestData['no_pasien'];
        $pasien->nama = $requestData['nama'];
        $pasien->umur = $requestData['umur'];
        $pasien->jenis_kelamin = $requestData['jenis_kelamin'];
        $pasien->alamat = $requestData['alamat'];
        if ($request->hasFile('foto')) {
            $fotoName = time().'.'.$request->foto->extension();
            $request->file('foto')->storeAs('public/images', $fotoName);
            $pasien->foto = $fotoName;
        }
        $pasien->save();
        return redirect('/pasien')->with('pesan', 'Data sudah disimpan');
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
