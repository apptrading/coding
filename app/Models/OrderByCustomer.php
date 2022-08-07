<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderByCustomer extends Model
{
    use HasFactory;
    protected $fillable = [
        'cust_userid',
        'cust_customerid',
        'cust_approve',
        'cust_whoid',
        'cust_count',
        'cust_payment',
        'cust_barcode',
        'cust_picturepayment',
        'cust_status',
    ];
}
