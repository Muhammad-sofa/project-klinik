<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->filled('q')){
            $data['daftar'] = \App\Models\Daftar::search(request('q'))->paginate(10);
        }else {
            $data['daftar'] = \App\Models\Daftar::latest()->paginate(10);
        }
        return view('daftar_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['listPasien'] = \App\Models\Pasien::orderBy('nama', 'asc')->get();
        $data['listPoli'] = \App\Models\Poli::orderBy('nama', 'asc')->get();

        return view('daftar_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'tanggal_daftar' => 'required',
            'pasien_id' => 'required',
            'poli_id' => 'required',
            'keluhan' => 'required',
        ]);

        $daftar = new Daftar();
        $daftar->fill($requestData);
        $daftar->save();
        flash('Data Berhasil Disimpan')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['daftar'] = Daftar::findOrFail($id);
        return view('daftar_show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daftar $daftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'tindakan' => 'required',
            'diagnosis' => 'required',
        ]);

        $daftar = Daftar::findOrFail($id);
        $daftar->fill($requestData);
        $daftar->save();
        flash('Data Berhasil Disimpan')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $daftar = Daftar::findOrFail($id);
        $daftar->delete();
        flash('Data Berhasil Dihapus')->success();
        return back();
    }
}
