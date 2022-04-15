<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $search = Pengaduan::where('user_id', $id);
        if (request('search')) {
            $search->where('tanggal_pengaduan', 'like', '%' . Request('search') . '%')
                ->orWhere('status', 'like', '%' . Request('search') . '%');
        }
        $data = $search->latest()->get();

        return view('pengaduan.index', [
            'title' => 'pengaduan',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengaduan.create', [
            'title' => 'buat pengaduan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'tanggal_pengaduan' => 'required',
            'isi_laporan' => 'required|min:5|max:255',
            'foto' => 'required|file|image|max:5000'
        ]);

        $validate['user_id'] = auth()->user()->id;

        $name = $request->file('foto')->getClientOriginalName();
        $validate['foto'] = $name;
        $request->file('foto')->storeAs('foto_bukti', $name);

        $validate['updated_at'] = null;
        $validate['status'] = 'terkirim';

        Pengaduan::create($validate);
        return redirect('/pengaduan')->with('success', 'Terimakasih telah membuat pengaduan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pengaduan::findOrFail($id);
        $title = 'ubah data';
        return view('pengaduan.edit', compact('data', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        $validate = $request->validate([
            'tanggal_pengaduan' => 'required',
            'isi_laporan' => 'required|min:5|max:255',
            'foto' => 'required|file|image|max:5000'
        ]);

        if ($request->file('foto') != $pengaduan->foto) {
            $name = $request->file('foto')->getClientOriginalName();
            $validate['foto'] = $name;
            $request->file('foto')->storeAs('foto_bukti', $name);
        }

        $pengaduan->update($validate);
        return redirect('/pengaduan')->with('success', 'Data berhasil terubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();
        return redirect('/pengaduan')->with('success', 'Data berhasil dihapus');
    }
}
