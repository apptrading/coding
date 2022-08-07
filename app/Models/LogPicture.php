<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPicture extends Model
{
    use HasFactory;
    protected $fillable = [
        'picture_userid',
        'picture_barcode',
        'picture_path',
        'picture_name',
    ];
}
