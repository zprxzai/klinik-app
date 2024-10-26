{{-- Novan Nur Zulhilmi Yardana --}}
@extends('layouts.app_modern', ['title' => 'Tambah Data Poli'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">Form Poli</div> --}}
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Poli</h5>
                        <form action="/poli" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-1 mb-3">
                                <label for="nama">Nama Poli</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ old('nama') }}">
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                            </div>
                            {{-- // Novan Nur Zulhilmi Yardana XIU4 --}}
                            <div class="form-group mt-1 mb-3">
                                <label for="biaya">Biaya</label>
                                <input type="number" class="form-control @error('biaya') is-invalid @enderror"
                                    id="biaya" name="biaya" value="{{ old('biaya') }}">
                                <span class="text-danger">{{ $errors->first('biaya') }}</span>
                            </div>
                            <div class="form-group mt-1 mb-3 float-end">
                            <button type="reset" class ="btn btn-warning">RESET</button>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>&nbsp;
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection