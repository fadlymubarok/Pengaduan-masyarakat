@extends('layouts.master')

@section('topbar')
@include('layouts.topbar')
@endsection

@section('container-fluid')
<h1>Home</h1>
<div class="row mb-3 mt-3">
    @can('masyarakat')
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Pengaduan anda</div>
                        <div class="h5 mt-3 font-weight-bold text-gray-800">{{ $pengaduan }}</div>
                    </div>
                    <div class="col-auto mt-3">
                        <i class="fas fa-list-alt fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Terkirim</div>
                        <div class="h5 mt-3 font-weight-bold text-gray-800">{{ $terkirim }}</div>
                    </div>
                    <div class="col-auto mt-3">
                        <i class="fas fa-check fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Proses</div>
                        <div class="h5 mt-3 font-weight-bold text-gray-800">{{ $proses }}</div>
                    </div>
                    <div class="col-auto mt-3">
                        <i class="fas fa-sync fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Selesai</div>
                        <div class="h5 mt-3 font-weight-bold text-gray-800">{{ $selesai }}</div>
                    </div>
                    <div class="col-auto mt-3">
                        <i class="fas fa-check-square fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    @if(!auth()->user() || auth()->user()->level != 'masyarakat')
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Pengaduan masyarakat</div>
                        <div class="h5 mt-3 font-weight-bold text-gray-800">{{ $pengaduan }}</div>
                    </div>
                    <div class="col-auto mt-4">
                        <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Pengaduan Diproses</div>
                        <div class="h5 mt-4 font-weight-bold text-gray-800">{{ $proses }}</div>
                    </div>
                    <div class="col-auto mt-4">
                        <i class="fas fa-sync fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Pengaduan Selesai</div>
                        <div class="h5 mt-4 font-weight-bold text-gray-800">{{ $selesai }}</div>
                    </div>
                    <div class="col-auto mt-4">
                        <i class="fas fa-check-square fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Petugas</div>
                        <div class="h5 mt-4 font-weight-bold text-gray-800">{{ $petugas }}</div>
                    </div>
                    <div class="col-auto mt-4">
                        <i class="fas fa-user-cog fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection