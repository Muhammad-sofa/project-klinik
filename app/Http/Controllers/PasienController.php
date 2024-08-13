<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
