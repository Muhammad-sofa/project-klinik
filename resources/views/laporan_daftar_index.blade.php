<div>
    @extends('layouts.app_modern')
    @section('content')
    <h3>Laporan Data Pendaftaran Pasien</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td width="1%">No.</td>
                <td>No. Pasien</td>
                <td>Nama</td>
                <td>Umur</td>
                <td>Jenis Kelamin</td>
                <td>Tgl Daftar</td>
                <td>Poli</td>
            </tr>
        </thead>
        <tbody>
            @foreach($models as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->pasien->no_pasien }}</td>
                    <td>{{ $item->pasien->nama }}</td>
                    <td>{{ $item->pasien->umur }}</td>
                    <td>{{ $item->pasien->jenis_kelamin }}</td>
                    <td>{{ $item->tanggal_daftar }}</td>
                    <td>{{ $item->poli }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
