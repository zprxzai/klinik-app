<div>
    @extends('layouts.app_modern', ['title' => 'Data Pasien'])
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Form Pasien</div>
                        <div class="card-body">
                            <h3>Data pasien</h3>
                            <div class="row mb-3 mt-3">
                                <div class="col-md-6">
                                    <a href="/pasien/create" class="btn btn-primary btn-sm">Tambah Pasien</a>
                                </div>
                            </div>
                            <table class="table table-striped">
                            
                             
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Pasien</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Umur</th>
                                        <th>Foto</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pasien as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->no_pasien }}</td>
                                            <td>
                                                {{ $item->nama }}
                                            </td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item->umur }}</td>
                                            <?php $foto=$item->foto ? $item->foto : '0.jpg' ?>
                                            <td><img src="{{ $item->foto ? asset('storage/images/' . $item->foto) : asset('storage/images/0.jpg') }}" alt="0.jpg" width="70px" style="aspect-ratio: 1/1"></td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>
                                                    <a href="/pasien/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">
                                                        Edit
                                                    </a>
                                                    <form action="/pasien/{{ $item->id }}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm ml-2"
                                                            onclick="return confirm('Yakin ingin menghapus data?')">
                                                            Hapus
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
                </div>
            </div>
        </div>
    @endsection
    
    
</div>
