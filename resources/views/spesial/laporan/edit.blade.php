@extends('layouts.master')
@section('container-fluid')
<div class="mt-4">
    <h2>Form Pengaduan</h2>
    <hr />
    <form action="/laporan/{{ $data->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card shadow p-3 mb-5">
            <div class="mb-3">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" name="nik" value="{{ $data->user->nik }}" disabled>
            </div>
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $data->user->nama }}" disabled>
            </div>
            <div class="mb-3">
                <label for="tanggal_pengaduan">Tanggal Pengaduan</label>
                <input type="date" class="form-control @error('tanggal_pengaduan') is-invalid  @enderror" name="tanggal_pengaduan" value="{{ $data->tanggal_pengaduan }}" disabled>
                @error('tanggal_pengaduan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="foto">Foto bukti</label>
                <a href="/download/{{ $data->id }}" class="d-block">
                    <i class="fas fa-download"></i> Download
                </a>
            </div>
            <div class="mb-3">
                <label for="isi_laporan">Isi Laporan</label>
                <input type="text" class="form-control @error('isi_laporan') is-invalid @enderror" name="isi_laporan" value="{{ $data->isi_laporan }}" disabled>
                @error('isi_laporan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-warning" name="status" value="proses">Proses</button>
                <button type="submit" class="btn btn-success" name="status" value="selesai">Selesai</button>
            </div>
        </div>
    </form>
</div>
@endsection