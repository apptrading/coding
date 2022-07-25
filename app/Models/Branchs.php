<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branchs extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch_id',
        'branch_name',
        'pr_id',
        'dr_id',
        'vill_id',
        'status',
        'location',
    ];
}
