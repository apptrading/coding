<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\OrderByCustomer;
use App\Models\Parcel;
use App\Models\RouteParcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function Index()
    {
        $customer = Customer::all();
        return view('App.System.Parcel.parcel_receiver', ['customer' => $customer]);
    }

    public function Index_store()
    {
        return view('App.System.Parcel.parcel_receive_center');
    }

    public function Customer_Receive()
    {
        return view('App.System.Parcel.parcel_customer_receive');
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


    public function Add_store(Request $request)
    {
        $CheckDiplicateST1 = RouteParcel::where('route_barcode', $request->parcel_barcode)
            ->where('step', '1')->count();
        $CheckDiplicateST2 = RouteParcel::where('route_barcode', $request->parcel_barcode)
            ->where('step', '2')->count();
        $CheckDiplicateST3 = RouteParcel::where('route_barcode', $request->parcel_barcode)
            ->where('step', '3')->count();
        if ($CheckDiplicateST1 == 1 && $CheckDiplicateST2 == 1 && $CheckDiplicateST3 < 1) {

            $CheckDiplicateST3 = RouteParcel::where('route_barcode', $request->parcel_barcode)
                ->where('step', '3')->count();

            $datas = RouteParcel::where('route_barcode', $request->parcel_barcode)
                ->where('step', '2')
                ->first();

            $newRoute = new RouteParcel();
            $newRoute->route_barcode = strtoupper($request->parcel_barcode);
            $newRoute->route_userid = Auth::id();
            $newRoute->route_branchid = '0';
            $newRoute->route_titleid = '3';
            $newRoute->route_international = '1';
            $newRoute->route_status = '1';
            $newRoute->route_ordbycustid = "0";
            $newRoute->remark = "na";
            $newRoute->step = "3";
            $newRoute->img_parcel = "na";
            $newRoute->img_sign = "noSign";

            $rsRoute = $newRoute->save();

            if (!$rsRoute) {
                return response()->json(["result" => false]);
            } else {
                // $ParcelDES = new Parcel();
                // $ParcelDES->parcel_inuserid = Auth::id();
                // $ParcelDES->parcel_outuserid = "0";
                // $ParcelDES->parcel_customerid = "0";
                // $ParcelDES->parcel_width = "0";
                // $ParcelDES->parcel_length = "0";
                // $ParcelDES->parcel_height = "0";
                // $ParcelDES->parcel_kg = "0";
                // $ParcelDES->parcel_total = "0";
                // $ParcelDES->parcel_barcode = $request->parcel_barcode;
                // $ParcelDES->paymenttype = "0";
                // $ParcelDES->parcel_payment = "0";
                // $ParcelDES->pacel_picture = "na";
                // $ParcelDES->parcel_signature = "na";
                // $ParcelDES->parcel_picturepayment = "na";
                // $ParcelDES->parcel_countpayment = "0";
                // // $ParcelDES->parcel_receivedate = $request->datein;
                // // $ParcelDES->parcel_outdate =;
                // $ParcelDES->parcel_shelfid = "0";
                // $ParcelDES->parcel_status = "1";
                // $rs = $ParcelDES->save();

                // if (!$rs) {
                // return response()->json(["result" => false]);
                // } else {
                
                $upst1 = RouteParcel::find($datas->id);
                $upst1->route_status = '2';
                $upst1->update();


                $datasSent =  RouteParcel::where('img_sign', 'noSign')->where('step', '3')->where('route_userid', Auth::id())->get();

                return response()->json(["result" => true, "datas" => $datasSent]);
                // }
            }
        } else {
            return response()->json(["result" => false]);
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
        $customer = OrderByCustomer::where('cust_barcode', $request->route_barcode)->first();
        $customercount = OrderByCustomer::where('cust_barcode', $request->route_barcode)->count();

        if ($customercount > 0) {
            $cust_customerid = $customer->cust_customerid;
        } else {
            $cust_customerid = "0";
        }

        if ($CheckDiplicateST1 == 1 && $CheckDiplicateST2 == 1 && $CheckDiplicateST3 < 1) {
            return response()->json(["result" => true, 'customerid' => $cust_customerid]);
        } else {
            return response()->json(["result" => false, 'customerid' => $cust_customerid, 'st1' => $CheckDiplicateST1, 'st2' => $CheckDiplicateST2, 'st3' => $CheckDiplicateST3]);
        }
    }

    public function CustomerList()
    {
        $customer = Customer::all();
        return response()->json(["result" => true, "datas" => $customer]);
    }
}
