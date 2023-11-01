<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKerjasama extends Model
{
    use HasFactory;
    protected $table =  'jenis_kerjasama';


    public function kegiatan(): BelongsTo
    {
        return $this->belongsTo(Kegiatan::class, 'kerjasama_id');
    }
}

