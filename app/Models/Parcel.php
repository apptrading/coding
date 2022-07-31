<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;
    protected $fillable = [
        'parcel_inuserid',
        'parcel_outuserid',
        'parcel_customerid',
        'parcel_width',
        'parcel_length',
        'parcel_height',
        'parcel_kg',
        'parcel_total',
        'parcel_barcode',
        'parcel_signature',
        'pacel_picture',
        'parcel_picturepayment',
        'parcel_countpayment',
        'parcel_receivedate',
        'parcel_outdate',
        'parcel_shelfid',
        'parcel_status',
    ];
}
