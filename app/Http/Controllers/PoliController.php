<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poli = \App\Models\Poli::orderBy('nama', 'DESC')->paginate(10);
        $data['poli'] = $poli;
        return view ('poli_index', $data);
        // Novan Nur Zulhilmi Yardana XIU4
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('poli_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request -> validate([
            'nama'      => 'required',
            'biaya'      => 'required|numeric',
        ]);
        $poli = new \App\Models\Poli();
        $poli -> nama   = $requestData['nama'];
        $poli -> biaya  = $requestData['biaya'];
        $poli -> save();
        return redirect ('/poli') -> with ('pesan', 'Data Berhasil Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resouwrce.
     */
    public function edit(string $id)
    {
        $data['poli'] = \App\Models\Poli::findOrFail($id);
        return view ('poli_edit', $data);
        // Novan Nur Zulhilmi Yardana XIU4
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Novan Nur Zulhilmi Yardana XIU4
        $requestData = $request -> validate([
            'nama'      => 'required',
            'biaya'     => 'required|numeric',
        ]);
        $poli = \App\Models\Poli::findOrFail($id);
        $poli -> nama   = $requestData['nama'];
        $poli -> biaya  = $requestData['biaya'];
        $poli -> save();
        return redirect ('/poli') -> with ('pesan', 'Data Berhasil Tersimpan');
    }

    /**
     * Remove the specified resource from storage.
     */

    // Novan Nur Zulhilmi Yardana XIU4
    public function destroy(string $id)
    {
        $poli            = \App\Models\Poli::findOrFail($id);
        $poli           -> delete();
        return back()   -> with ('pesan', 'Data berhasil dihapus');
    }
}