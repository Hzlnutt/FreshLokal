<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category',
        'stock',
        'status',
        'is_available'
    ];

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            // Update status berdasarkan stock
            $product->status = $product->stock > 0 ? 'ada' : 'habis';
        });
    }
} 