<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'judul',
        'kerjasama_id',
        'pelaksana',
        'start',
        'end',
        'tempat',
        'pengajar',
        'instansi',
        'sarana',
        'peserta',
        'jenis_peserta',
    ];

    public function kerjasama()
    {
        return $this->hasOne(JenisKerjasama::class, 'id', 'kerjasama_id');
    }

    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'kegiatan_id', 'id');
    }
}
