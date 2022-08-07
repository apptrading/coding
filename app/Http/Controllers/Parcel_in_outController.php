<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use Illuminate\Http\Request;

class Parcel_in_outController extends Controller
{
    public function Menu()
    {
        return view('App.Report_IO.menu');
    }
    public function In_laos()
    {
        return view('App.Report_IO.laoStock');
    }
    public function out_to_cust()
    {
        return view('App.Report_IO.out_customer');
    }

    public function out_laos()
    {
        $parcel = Parcel::join('customers', 'customers.id', '=', 'parcels.parcel_customerid')
            ->leftjoin('users', 'users.id', '=', 'parcels.parcel_outuserid')
            ->select('customers.customer_name', 'customers.customer_tell', 'customers.customer_whatsapp', 'customers.customer_address', 'users.name', 'parcels.*')
            ->where('parcels.parcel_status', '2')
            ->get();
        return response()->json(["result" => true, "datas" => $parcel]);
    }

    public function out_customer_detail(Request $request)
    {
        $parcel = Parcel::where('parcel_barcode', $request->barcode)->leftjoin('customers', 'customers.id', '=', 'parcels.parcel_customerid')
            ->leftjoin('users', 'users.id', '=', 'parcels.parcel_outuserid')
            ->select('customers.customer_name', 'customers.customer_tell', 'customers.customer_whatsapp', 'customers.customer_address', 'users.name', 'parcels.*')
            ->where('parcels.parcel_status', '2')
            ->first();
        return view('App.Report_IO.out_customer_detail', ["parcel" => $parcel]);
    }
}
