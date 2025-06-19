<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'name',
        'slug',
        'description',
        'price',
        'image_path',
        'is_active',
        'is_featured',
        'stock',
        'sku'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
} 