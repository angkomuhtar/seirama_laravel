<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        "judul",
        "kerjasama_id",
        "pelaksana",
        "waktu",
        "tempat",
        "pengajar",
        "instansi",
        "sarana",
        "peserta",
    ];

    public function kerjasama()
    {
        return $this->hasOne(JenisKerjasama::class, 'id', 'kerjasama_id');
    }
}
