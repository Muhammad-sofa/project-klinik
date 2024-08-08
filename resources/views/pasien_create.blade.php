@extends('mylayout', ['title' => 'Tambah Data Pasien'])

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Form Pasien</h3>
            <form action="/pasien" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="nama">Nama Pasien</label>
                    <input id="nama" class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" value="{{ old('nama') }}">
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label for="no_pasien">No. Pasien</label>
                    <input id="no_pasien" class="form-control @error('no_pasien') is-invalid @enderror" type="text" name="no_pasien" value="{{ old('no_pasien') }}">
                    <span class="text-danger">{{ $errors->first('no_pasien') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label for="umur">Umur</label>
                    <input id="umur" class="form-control @error('umur') is-invalid @enderror" type="text" name="umur" value="{{ old('umur') }}">
                    <span class="text-danger">{{ $errors->first('umur') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="laki-laki"
                            {{ old('jenis_kelamin') === 'perempuan' ? 'checked' : '' }}>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                        name="alamat" value="{{ old('alamat') }}">
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label for="alamat_klinik">Alamat Klinik</label>
                    <input type="text" class="form-control @error('alamat_klinik') is-invalid @enderror" name="alamat_klinik" id="alamat_klinik"
                        name="alamat_klinik" value="{{ old('alamat_klinik') }}">
                    <span class="text-danger">{{ $errors->first('alamat_klinik') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label for="kota_klinik">Kota</label>
                    <input type="text" class="form-control @error('kota_klinik') is-invalid @enderror" name="kota_klinik" id="kota_klinik"
                        name="kota_klinik" value="{{ old('kota_klinik') }}">
                        <span class="text-danger">{{ $errors->first('kota_klinik') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection