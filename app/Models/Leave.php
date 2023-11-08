<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $table = 'leaves';

    protected $fillable = [
        'user_id',
        's_date',
        'e_date',
        'leave_type_id',
        'tot_day',
        'attachment',
        'approver_note',
        'note',
        'status',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function leave_type(): BelongsTo
    {
        return $this->belongsTo(LeaveType::class, 'leave_type_id', 'id');
    }
}
