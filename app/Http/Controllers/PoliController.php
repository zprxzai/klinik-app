<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poli = \App\Models\Poli::orderBy('nama', 'ASC')->paginate(10);
        $data['poli'] = $poli;
        return view('poli_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poli_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama'          => 'required',
            'biaya'         => 'required|numeric',
        ]);
        $poli = new \App\Models\Poli();
        $poli->nama = $requestData['nama'];
        $poli->biaya = $requestData['biaya'];
        $poli->save();
        return redirect('/poli')->with('pesan', 'Data sudah disimpan');
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
        $data['poli'] = \App\Models\Poli::findOrFail($id);
        return view('poli_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nama'          => 'required|min:2',
            'biaya'          => 'required|numeric',
        ]);
        $poli = \App\Models\Poli::findOrFail($id);
        $poli->nama = $requestData['nama'];
        $poli->biaya = $requestData['biaya'];
        $poli->save();
        return redirect('/poli')->with('pesan', 'Data sudah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poli = \App\Models\Poli::findOrFail($id);
        $poli->delete();
        return redirect('/poli')->with('pesan', 'Data sudah dihapus');
    }
}