<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clock extends Model
{
    use HasFactory;

    protected $table = 'clocks';

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Clock_location::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id', 'user_id');
    }

    public function work_hours()
    {
        return $this->belongsTo(WorkHours::class);
    }
}
