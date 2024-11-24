@extends('layouts.app_modern', ['title' => 'Data Pendaftaran Pasien'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Pendaftaran Pasien</div>
                    <div class="card-body">
                        <div class="row mb-3 mt-3">
                            <div class="col-md-4 h3">
                                Data Daftar Pasien
                            </div>
                            <div class="col-md-5">
                                <form class="d-flex">
                                    <input class="form-control me-2" type="text" name="q" placeholder="Cari Nama, No Pasien atau Poli" value="{{ request('q') }}" aria-label="Search">
                                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <a href="/daftar/create" class="btn btn-primary btn-md float-end">Tambah Pendaftaran</a>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No Pasien</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Poli</th>
                                    <th>Keluhan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftar as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->pasien->nama }}</td>
                                        <td>{{ $item->pasien->no_pasien }}</td>
                                        <td>{{ $item->pasien->jenis_kelamin }}</td>
                                        <td>{{ $item->tanggal_daftar->format('d M Y') }}</td>
                                        <td>{{ $item->poli->nama }}</td>
                                        <td>{{ $item->keluhan }}</td>
                                        <td>
                                            <a href="/daftar/{{ $item->id }}" class="btn btn-info btn-sm ml-2">
                                                Detail
                                            </a>&nbsp;
                                            <form action="/daftar/{{ $item->id }}" method="post" class="d-inline">
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
                        {{ $daftar->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection