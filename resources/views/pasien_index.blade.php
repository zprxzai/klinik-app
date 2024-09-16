@extends('layouts.app', ['title' => 'Data Pasien'])
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
                                    <th>NO</th>
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
                                        <td>{{ $item->foto }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->aksi }}
                                            <a href='form-edit.php?id=".$siswa['id']."'>Edit</a> |
                                            <a href='hapus.php? id=".$siswa['id']."' onclick='return confirm(\"apakah anda yakin?\")'>Hapus</a>
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