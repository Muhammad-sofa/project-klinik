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
            'nama' => 'required|min:3',
            'no_pasien' => 'required',
            'umur' => 'required',
            'alamat' => 'nullable',
            'jenis_kelamin' => 'required'
        ]);

        $pasien = new \App\Models\Pasien;
        $pasien->fill($requestData);
        $pasien->save();

        return back()->with('pesan', 'Data Berhasil Disimpan');
    }
}
