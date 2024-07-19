<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'cate_id',
        'name',
        'description',
        'slug',
        'image',
        'weight',
        'original_price',
        'selling_price',
        'quantity',
        'tax',
        'status',
        'trending',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'cate_id', 'id');
    }
}
