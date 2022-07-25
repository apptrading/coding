<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProsernalProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'userid',
        'fullname',
        'tell',
        'ages',
        'gender',
        'bightday',
        'picture',
        'documents',
        'status',
    ];
}
