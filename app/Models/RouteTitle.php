<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteTitle extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_name',
        'title_status',
    ];
}
