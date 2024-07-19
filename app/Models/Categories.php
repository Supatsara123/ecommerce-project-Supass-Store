<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'popular',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

        // Electronics
        // Beauty and personal care
        // Food and Beverages
        // Furniture
        // Baby and Toys
        // DIY and hardware
        // Health and Wellness

    public function products()
    {
        return $this->hasMany(Products::class);
    }

}
