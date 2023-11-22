<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsnData extends Model
{
    use HasFactory;
    protected $table = 'asn_data';

    protected $fillable = [
        'nip' ,
        'npwp' ,
        'jabatan' ,
        'golongan' ,
        'gol_jabatan' ,
        'education' ,
        'unit_kerja' ,
        'unit_eselon' ,
        'unit_address' ,
        'telp' ,
        'propinsi' ,
        'kabupaten',
        'user_id'
    ];
}
