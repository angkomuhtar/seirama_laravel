<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $table = 'shifts';

    protected $fillable = [
        'shift',
    ];

    public function work_hours()
    {
        return $this->hasMany(WorkHours::class);
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
