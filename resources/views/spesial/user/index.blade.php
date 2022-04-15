@extends('layouts.master')

@section('topbar')
@include('layouts.topbar')
@endsection

@section('container-fluid')
<h2>Data User</h2>

<div class="card shadow p-3 mt-3">
    <div class="table-responsive">
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success')}}
        </div>
        @endif
        <form action="/pengaduan" method="get">
            <div class="mb-1 d-flex justify-content-end">
                <label for="search" class="mt-1">Search :</label>
                <input class="form-control form-control-sm w-25 ml-2" type="text">
            </div>
        </form>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No. Telepon</th>
                <th>Username</th>
                <th>Posisi</th>
                <th>Opsi</th>
            </tr>
            @if($data->count() > 0)
            @foreach($data as $row)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->telp }}</td>
                <td>{{ $row->username}}</td>
                <td>{{ $row->level }}</td>
                <td>
                    <a href="/data-user/{{ $row->id }}/edit" class="btn btn-warning mr-1">Edit</a>
                </td>
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
@endsection