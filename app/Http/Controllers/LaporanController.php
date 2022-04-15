<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $title = 'Laporan';
        $data = Pengaduan::all()->sortBy('updated_at');
        return view('spesial.laporan.index', compact('title', 'data'));
    }
    public function show($id)
    {
        $data = Pengaduan::findOrFail($id);
        $title = 'validasi';
        return view('spesial.laporan.edit', compact('data', 'title'));
    }

    public function update(Request $req, $id)
    {
        $update = $req->validate([
            'status' => 'required'
        ]);

        Pengaduan::where('id', $id)->update($update);
        return redirect('/laporan')->with('success', 'Berhasil Tersimpan');
    }

    public function download()
    {
        $pengaduan = Pengaduan::all();
        $pdf = PDF::loadview('spesial.laporan.download', ['data' => $pengaduan]);
        return $pdf->download('laporan-pengaduan.pdf');
    }
}
