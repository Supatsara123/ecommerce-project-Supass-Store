<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    use HasFactory;
    protected $table = 'promotions'; // Make sure this matches your actual table name
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'start_date',
        'end_date',
    ];
}
