<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKerjasama extends Model
{
    use HasFactory;
    protected $table = 'user_kerjasama';
    protected $fillable = [
        'instansi',
        'kerjasama_id',
        'nm_kegiatan',
        'lokasi',
        'start',
        'end',
        'cp',
        'status',
        'surat',
        'id_kegiatan',
        'user_id',
    ];

    public function jenis_kerjasama()
    {
        return $this->belongsTo(JenisKerjasama::class, 'kerjasama_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
