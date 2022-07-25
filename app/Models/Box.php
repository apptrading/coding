<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;
    protected $fillable = [
        'box_name',
        'box_width',
        'box_height',
        'box_length',
        'box_price',
        'box_status',
    ];
}
