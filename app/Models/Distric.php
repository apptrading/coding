<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distric extends Model
{
    use HasFactory;
    protected $fillable = [
        'dr_name',
        'dr_name_en',
        'pr_id',
    ];
}
