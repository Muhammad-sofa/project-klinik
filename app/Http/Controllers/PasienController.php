<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PasienController extends Controller
{
    public function index()
    {
        $data['pasien'] = \App\Models\Pasien::latest()->paginate(10);
        return view('pasien_index', $data);
    }

    public function create()
    {
        return view('pasien_create');
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'no_pasien' => 'required|unique:pasiens, no_pasien',
            'nama' => 'required|min:3',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pasien = new \App\Models\Pasien();
        $pasien->fill($requestData);
        $pasien->foto = $request->file('foto')->store('public');
        $pasien->save();

        return back()->with('pesan', 'Data Berhasil Disimpan');
    }

    public function edit(string $id)
    {
        $data['pasien'] = \App\Models\Pasien::findOrFail($id);
        return view('pasien_edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'no_pasien' => 'required|unique:pasiens, no_pasien,' . $id,
            'nama' => 'required',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'alamat' => 'nullable',
        ]);
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->fill($requestData);
        
        if ($request->hasFile('foto')) {
            Storage::delete($pasien->foto);
            $pasien->foto = $request->files('foto')->store('public');
        }
        $pasien->save();
        flash('Data Berhasil DiPerbarui')->success();
        return redirect('/pasien');
    }

    public function destroy(string $id)
    {
        $pasien = \App\Models\Pasien::findOrFail($id);
        if ($pasien->foto != null && Storage::exists($pasien->foto)) {
            Storage::delete($pasien->foto);
        }

        $pasien->delete();
        flash('Data Berhasil Dihapus')->success();
        return back();
    }
}
