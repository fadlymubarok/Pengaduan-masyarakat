@extends('layouts.master')

@section('topbar')
@include('layouts.topbar')
@endsection

@section('container-fluid')
<h2>Laporan Masyarakat</h2>

<div class="card shadow p-3 mt-3">
    <div class="table-responsive">
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success')}}
        </div>
        @endif

        @can('admin')
        <a href="/laporan/download" class="btn btn-success mb-2">
            <i class="fas fa-download"></i>
            Generate Laporan
        </a>
        @endcan
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Pelapor</th>
                    <th>Isi Laporan</th>
                    <th>Status</th>
                    @can('petugas')
                    <th>Opsi</th>
                    @endcan
                </tr>
                @if($data->count() > 0)
                @foreach($data as $row)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $row->tanggal_pengaduan }}</td>
                    <td>{{ $row->user->nama }}</td>
                    <td>{{ $row->isi_laporan }}</td>
                    <td>{!! $row->hasil !!}</td>
                    @can('petugas')
                    <td>
                        @if($row->status == 'terkirim' || $row->status == 'proses')
                        <a href="/laporan/{{ $row->id }}" class="btn btn-success">Validasi</a>
                        @else
                        <button type="submit" class="badge badge-info p-2  mt-1 border-0">Sudah diselesaikan</button>
                        @endif
                    </td>
                    @endcan
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="6">Data tidak ada</td>
                </tr>
                @endif
            </table>
        </div>
    </div>
</div>
@endsection