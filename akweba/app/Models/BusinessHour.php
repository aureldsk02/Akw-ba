<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'day',
        'open_morning',
        'close_morning',
        'open_afternoon',
        'close_afternoon',
        'is_closed'
    ];

    protected $casts = [
        'is_closed' => 'boolean',
        'open_morning' => 'datetime',
        'close_morning' => 'datetime',
        'open_afternoon' => 'datetime',
        'close_afternoon' => 'datetime'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
} 