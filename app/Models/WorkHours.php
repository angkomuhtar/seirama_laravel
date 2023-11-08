<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkHours extends Model
{
    use HasFactory;

    protected $table = 'work_hours';

    protected $fillable = [
        'shift_id',
        'start',
        'end',
        'name',
    ];

    public function shift(): BelongsTo
    {
        return $this->belongsTo(Shift::class);
    }
}
