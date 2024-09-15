<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPasienController extends Controller
{
    public function create() {
        return view('laporan_pasien_create');
    }

    public function index(Request $request) {

        $pasien = \App\Models\Pasien::query();

        if ($request->filled('tanggal_mulai')) {
            $pasien->whereDate('created_at', '>=', $request->input('tanggal_mulai'));
        }

        if ($request->filled('tanggal_selesai')) {
            $pasien->whereDate('created_at', '<=', $request->input('tanggal_selesai'));
        }

        if ($request->filled('jenis_kelamin') && $request->jenis_kelamin != 'semua') {
            $pasien->where('jenis_kelamin', $request->input('jenis_kelamin'));
        }

        if ($request->filled('umur')) {
            if ($request->umur == '>=17<=35') {
                $pasien->where('umur', '>=', 17)->where('umur', '<=', 35);
            }
            if ($request->umur == '>=36<=45'){
                $pasien->where('umur', '>=', 36)->where('umur', '<=', 45);
            }
        }

        $data['models'] = $pasien->latest()->get();
        return view('laporan_pasien_index', $data);
    }
}
