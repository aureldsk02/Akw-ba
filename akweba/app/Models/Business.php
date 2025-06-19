<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'business_type',
        'website',
        'email',
        'phone',
        'address',
        'postal_code',
        'city',
        'country',
        'theme',
        'has_ecommerce'
    ];

    protected $casts = [
        'has_ecommerce' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function businessHours()
    {
        return $this->hasMany(BusinessHour::class);
    }

    public function socialLinks()
    {
        return $this->hasMany(SocialLink::class);
    }
} 