@extends('layouts.master')
@section('container-fluid')
<div class="mt-4">
    <h2>Form Pengaduan</h2>
    <hr />
    <form action="/pengaduan" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow p-3 mb-5">
            <div class="mb-3">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" name="nik" value="{{ auth()->user()->nik }}" disabled>
            </div>
            <div class="mb-3">
                <label for="tanggal_pengaduan">Tanggal Pengaduan</label>
                <input type="date" class="form-control @error('tanggal_pengaduan') is-invalid  @enderror" name="tanggal_pengaduan">
                @error('tanggal_pengaduan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="foto">Foto bukti</label>
                <input type="file" class="form-control @error('foto') is-invalid  @enderror" name="foto">
                @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="isi_laporan">Isi Laporan</label>
                <input type="text" class="form-control @error('isi_laporan') is-invalid  @enderror" name="isi_laporan">
                @error('isi_laporan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <a href="/pengaduan" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </div>
    </form>
</div>
@endsection