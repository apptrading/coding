<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\RouteParcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ParcelController extends Controller
{
    public function ParcelAdd(Request $request)
    {
        $CheckDiplicateST3 = RouteParcel::where('route_barcode', $request->parcel_barcode)
            ->where('step', '3')->count();

        if ($CheckDiplicateST3 > 0) {
            return response()->json(["result" => false]);
        } else {
            $newRoute = new RouteParcel();
            $newRoute->route_barcode = strtoupper($request->parcel_barcode);
            $newRoute->route_userid = Auth::id();
            $newRoute->route_branchid = '0';
            $newRoute->route_titleid = '3';
            $newRoute->route_international = '1';
            $newRoute->route_status = '1';
            $newRoute->route_ordbycustid = $request->custid;
            $newRoute->remark = "na";
            $newRoute->step = "3";
            $newRoute->img_parcel = "na";
            $newRoute->img_sign = "na";

            $rsRoute = $newRoute->save();

            if (!$rsRoute) {
                return response()->json(["result" => false]);
            } else {
                $random = uniqid();
                $URL = $request->root();


                $ParcelDES = new Parcel();
                $ParcelDES->parcel_inuserid = Auth::id();
                $ParcelDES->parcel_outuserid = "0";
                $ParcelDES->parcel_customerid = $request->custid;
                $ParcelDES->parcel_width = $request->parcel_width;
                $ParcelDES->parcel_length = $request->parcel_length;
                $ParcelDES->parcel_height = $request->parcel_height;
                $ParcelDES->parcel_kg = $request->parcel_kg;
                $ParcelDES->parcel_total = $request->parcel_total;
                $ParcelDES->parcel_barcode = $request->parcel_barcode;


                if ($request->hasFile('pacel_picture')) {
                    /** Picture */
                    $file = $request->file('pacel_picture');
                    $name = $file->getClientOriginalName();
                    $filesname = $request->parcel_barcode . time() . '_' . $name;
                    Storage::putFileAs('images', $request->file('pacel_picture'),  $filesname);
                    $ParcelDES->pacel_picture = $URL . '/images/' . $filesname;

                    /** Signature */
                    $folder = public_path('images/signature/');
                    $signature_picture = explode(';base64,', $request->parcel_signature);

                    $image_type_aux = explode('image/', $signature_picture[0]);

                    $image_type = $image_type_aux[1];
                    $image_base64 = base64_decode($signature_picture[1]);

                    $file =  $request->parcel_barcode . '_' . $random . '_FIRST.' . $image_type;
                    file_put_contents($folder . $file, $image_base64);
                    $ParcelDES->parcel_signature = $URL . '/images/signature/' . $file;
                } else {
                    $ParcelDES->pacel_picture = "na";
                    $ParcelDES->parcel_signature = "na";
                }

                $ParcelDES->parcel_picturepayment = "na";
                $ParcelDES->parcel_countpayment = $request->parcel_countpayment;
                $ParcelDES->parcel_receivedate = $request->datein;
                $ParcelDES->parcel_outdate = $request->dateout;
                $ParcelDES->parcel_shelfid = "0";
                $ParcelDES->parcel_status = "1";

                $rs = $ParcelDES->save();
                if (!$rs) {
                    return response()->json(["result" => false]);
                } else {
                    return response()->json(["result" => true]);
                }
            }
        }
    }

    public function CustomerRecieve(Request $request)
    {
        $parcel = Parcel::all();
        return view('App.System.Parcel.parcel_customer', ['datas' => $parcel]);
    }

    public function ParcelCustShow(Request $request)
    {
        $parcel = ParcelController::ParcelCustomer();

        return response()->json(["result" => true, 'datas' => $parcel]);
    }
    public function CustomerParcelRecieve()
    {
        return view('App.System.Parcel.parcel_customer_recieve');
    }

    public function ParcelCustomer($barcode = false)
    {
        $where = "";
        if ($barcode != false) $where = "";
        $parcel = Parcel::join('customers', 'customers.id', '=', 'parcels.parcel_customerid')
            ->select('customers.customer_name', 'customers.customer_tell', 'customers.customer_whatsapp', 'customers.customer_address', 'parcels.*')
            ->where('parcels.parcel_status', '1')
            ->get();
        return $parcel;
    }
}
