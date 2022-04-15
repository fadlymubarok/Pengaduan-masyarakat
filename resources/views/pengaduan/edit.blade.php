@extends('layouts.master')
@section('container-fluid')
<div class="mt-4">
    <h2>Form Edit Pengaduan</h2>
    <hr />
    <form action="/pengaduan/{{ $data->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card shadow p-3 mb-5">
            <div class="mb-3">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" name="nik" value="{{ $data->user->nik }}" disabled>
            </div>
            <div class="mb-3">
                <label for="tanggal_pengaduan">Tanggal Pengaduan</label>
                <input type="date" class="form-control @error('tanggal_pengaduan') is-invalid  @enderror" name="tanggal_pengaduan" value="{{ $data->tanggal_pengaduan }}">
                @error('tanggal_pengaduan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="foto">Foto bukti</label>
                <img class="d-block mb-2" src="{{ asset('storage/foto_bukti/'.$data->foto) }}" alt="{{ $data->foto}}" width="200px" height="100px">
                <input type="file" class="form-control @error('foto') is-invalid  @enderror" name="foto" value="{{ $data->foto }}">
                @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="isi_laporan">Isi Laporan</label>
                <input type="text" class="form-control @error('isi_laporan') is-invalid @enderror" name="isi_laporan" value="{{ $data->isi_laporan }}">
                @error('isi_laporan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            @if($data->status == 'terkirim')
            <div class="mb-3">
                <a href="/pengaduan" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-warning">Ubah</button>
            </div>
            @else
            <a class="badge badge-info p-2 mt-2" href="/pengaduan">Sudah diproses / selesai</a>
            @endif
        </div>
    </form>
</div>
@endsection