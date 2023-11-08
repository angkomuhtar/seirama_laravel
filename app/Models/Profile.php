<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $table = 'profiles';

    protected $fillable = [
        'nama', 
        'ktp', 
        'tmp_lahir', 
        'tgl_lahir',
        'alamat',
        'telp',
        'jenkel',
        'status_pernikahan',
        'agama',
        'user_id',
        'isASN'
        ];

    public function religions () {
        return $this->belongsTo(Options::class, 'religion', 'id');
    }
    public function marriages () {
        return $this->belongsTo(Options::class, 'marriage', 'id');
    }
    public function educations () {
        return $this->belongsTo(Options::class, 'education', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
