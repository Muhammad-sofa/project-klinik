@extends('mylayout', ['title' => 'Data Pasien'])
@section('content')
     <div class="card">
          <div class="card-body">
               <h3>Data Pasien</h3>
               <a href="/pasien/create" class="btn btn-primary">Tambah Data</a>
               <table class="table table-striped">
                    <thead>
                         <tr>
                              <th>NO</th>
                              <th>No Pasien</th>
                              <th>Nama</th>
                              <th>Umur</th>
                              <th>Jenis Kelamin</th>
                              <th>Tanggal Buat</th>
                              <th>Aksi</th>
                         </tr>
                    </thead>
                    <tbody>
                         @foreach($pasien as $item)
                              <tr>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $item->no_pasien }}</td>
                                   <td>
                                        @if ($item->foto)
                                             <img src="{{ \Storage::url($item->foto) }}" width="50">
                                        @endif
                                   </td>
                                   <td>{{ $item->nama }}</td>
                                   <td>{{ $item->umur }}</td>
                                   <td>{{ $item->jenis_kelamin }}</td>
                                   <td>{{ $item->created_at }}</td>
                                   <td>
                                        <a href="/pasien/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a>
                                        <form action="/pasien/{{ $item->id }}" method="POST" class="d-inline">
                                             @csrf
                                             @method('DELETE')
                                             <button class="btn btn-danger btn-sm ml-2"
                                                  onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
                                                  Hapus Data Yang ingin dihapus
                                             </button>
                                        </form>
                                   </td>
                              </tr>
                         @endforeach
                    </tbody>
               </table>
               {!! $pasien->links() !!}
          </div>
     </div>
@endsection