<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        //by zaidan
        return view('pasien_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    //by zaidan
    $requestData = $request->validate([
        'no_pasien' => 'required|unique:pasiens,no_pasien',
        'nama' => 'required',
        'umur' => 'required|numeric',
        'jenis_kelamin' => 'required|in:laki-laki,perempuan',
        'alamat' => 'nullable',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
    ]);
    $pasien = new \App\Models\Pasien();
    $pasien->no_pasien = $requestData['no_pasien'];
    $pasien->nama = $requestData['nama'];
    $pasien->umur = $requestData['umur'];
    $pasien->jenis_kelamin = $requestData['jenis_kelamin'];
    $pasien->alamat = $requestData['alamat'];
    $pasien->save();
    if ($request->hasFile('foto')) {
        $request->file('foto')->move('images/', $request->file('foto')->getClientOriginalName());
        $pasien->foto = $request->file('foto')->getClientOriginalName();
        $pasien->save();
    }
    return redirect('/pasien')->with('pesan', 'Data sudah disimpan');
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
        $data['pasien'] = \App\Models\Pasien::findOrFail($id);
        return view('pasien_edit', $data);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $requestData = $request->validate([
        'nama' => 'required|min:3',
        'no_pasien' => 'required|unique:pasiens,no_pasien,' . $id,
        'umur' => 'required',
        'alamat' => 'nullable',
        'jenis_kelamin' => 'required',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:10000',
    ]);
    $pasien = \App\Models\Pasien::findOrfail($id);
    $pasien->fill($requestData);
    if ($request->hasFile('foto')) {
        // /Storage::delete($pasien->foto);
        $pasien->foto = $request->file('foto')->store('public');
    }
    $pasien->save();
    return redirect('/pasien')->with('pesan', 'data sudah diupdate');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->delete();
        return back()->with('pesan', 'Data sudah dihapus');
    }
    
<<<<<<< HEAD
}
=======
}
>>>>>>> origin/PSTS
