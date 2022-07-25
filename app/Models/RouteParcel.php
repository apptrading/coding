<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteParcel extends Model
{
    use HasFactory;
    protected $fillable = [
        'route_barcode',
        'route_userid',
        'route_branchid',
        'route_titleid',
        'route_international',
        'route_status',
        'route_ordbycustid',
    ];
}
