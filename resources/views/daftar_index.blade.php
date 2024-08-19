@extends('layouts.app_modern')
@section('content')
    <div class="card">
                <div class="card">
                    <div class="card-header">Data Pendaftaran</div>
                    <div class="card-body">
                        <h3>Data Pendaftaran</h3>
                        <a href="/daftar/create" class="btn btn-primary btn-sm mt-3">
                            Tambah Data
                        </a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Poli</th>
                                    <th>Keluhan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($daftar as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->pasien->nama }}</td>
                                        <td>{{ $item->pasien->jenis_kelamin }}</td>
                                        <td>{{ $item->tanggal_daftar }}</td>
                                        <td>{{ $item->poli->nama }}</td>
                                        <td>{{ $item->keluhan }}</td>
                                        <td>
                                            <a href="/daftar/{{ $item->id }}" class="btn btn-info btn-sm">Detail</a>
                                            <form action="/daftar/{{ $item->id }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm ml-2"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
    </div>
@endsection