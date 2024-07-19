<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'house_number',
        'moo',
        'soi',
        'road',
        'province',
        'district',
        'sub_district',
        'postal_code',
        'status',
        'message',
        'tracking_no',
    ];
}
