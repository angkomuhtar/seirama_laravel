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
        'type_peserta',
        'mou',
        'no_mou',
        'sumber_dana',
        'cakupan_kerjasama',
        'sasaran_kerjasama',
    ];

    public function kerjasama()
    {
        return $this->hasOne(JenisKerjasama::class, 'id', 'kerjasama_id');
    }

    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'kegiatan_id', 'id');
    }

    public function getTotalPesertaAttribute()
    {
        return $this->hasMany(Peserta::class, 'kegiatan_id', 'id')->where('kegiatan_id', $this->id)->count();
    }

    public function sertifikat()
    {
        return $this->hasOne(Sertifikat::class, 'kegiatan_id', 'id');
    }
    
}
