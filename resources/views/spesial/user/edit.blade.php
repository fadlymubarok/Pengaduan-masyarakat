@extends('layouts.master')
@section('container-fluid')
<div class="mt-4">
    <h2>Form Pengaduan</h2>
    <hr />
    <form action="/data-user/{{ $data->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card shadow p-3 mb-5">
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $data->nama }}" disabled>
            </div>
            <div class="mb-3">
                <label for="telp">No. Telepon</label>
                <input type="text" class="form-control" name="telp" value="{{ $data->telp }}" disabled>
            </div>
            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" value="{{ $data->username }}" disabled>
            </div>
            <div class="mb-3">
                <label for="level">Posisi</label>
                <select class="custom-select @error('level') is-invalid @enderror" name="level">
                    <option value="">-- Pilih Posisi --</option>
                    <option value="petugas" {{ $data->level == 'petugas' ? 'selected' : ''}}>Petugas</option>
                    <option value="masyarakat" {{ $data->level == 'masyarakat' ? 'selected' : ''}}>Masyarakat</option>
                </select>
            </div>

            <div class="mb-3">
                <a href="/data-user" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-warning">Ubah</button>
            </div>
        </div>
    </form>
</div>
@endsection