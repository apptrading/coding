<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RouteParcel;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function Index()
    {
        $customer = Customer::all();
        return view('App.System.Parcel.parcel_receiver', ['customer' => $customer]);
    }

    public function CustomerAdd(Request $request)
    {

        $checkDuplicate = Customer::where('customer_tell', $request->customer_tell)->count();
        if ($checkDuplicate > 0) {
            return response()->json(['result' => false]);
        } else {
            $newAdd = new Customer();
            $newAdd->customer_name = $request->customer_name;
            $newAdd->customer_tell = $request->customer_tell;
            $newAdd->customer_whatsapp = $request->customer_whatsapp;
            $newAdd->customer_address = $request->customer_address;
            $rs = $newAdd->save();
            if (!$rs) {
                return response()->json(['result' => false]);
            } else {
                return response()->json(['result' => true]);
            }
        }
    }

    public function CustomerCheck(Request $request)
    {
        $CheckDiplicateST1 = RouteParcel::where('route_barcode', $request->route_barcode)
            ->where('step', '1')->count();
        $CheckDiplicateST2 = RouteParcel::where('route_barcode', $request->route_barcode)
            ->where('step', '2')->count();
        $CheckDiplicateST3 = RouteParcel::where('route_barcode', $request->route_barcode)
            ->where('step', '3')->count();

        if ($CheckDiplicateST1 == 1 && $CheckDiplicateST2 == 1 && $CheckDiplicateST3 < 1) {
            return response()->json(["result" => true]);
        } else {
            return response()->json(["result" => false, 'st1' => $CheckDiplicateST1, 'st2' => $CheckDiplicateST2, 'st3' => $CheckDiplicateST3]);
        }
    }
}
