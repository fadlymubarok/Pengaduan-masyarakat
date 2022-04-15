<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['hasil'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getHasilAttribute()
    {
        if ($this->status == 'terkirim') {
            return $hasil = '<span class="badge badge-danger p-2 mt-2">Terkirim</span>';
        } elseif ($this->status == 'proses') {
            return $hasil = '<span class="badge badge-warning p-2 mt-2">Proses</span>';
        } elseif ($this->status == 'selesai') {
            return $hasil = '<span class="badge badge-success p-2 mt-2">Selesai</span>';
        }
    }
}
