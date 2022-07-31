<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RouteParcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RouteParcelConreoller extends Controller
{
    public function ParcelStepFirst(Request $request)
    {
        $CheckDiplicate = RouteParcel::where('route_barcode', $request->route_barcode)
            ->where('step', '1')
            ->count();
        if ($CheckDiplicate < 1) {
            $random = uniqid();
            $URL = $request->root();

            $newRoute = new RouteParcel();
            $newRoute->route_barcode = strtoupper($request->route_barcode);
            $newRoute->route_userid = Auth::id();
            $newRoute->route_branchid = '0';
            $newRoute->route_titleid = '1';
            $newRoute->route_international = '1';
            $newRoute->route_status = '1';
            $newRoute->route_ordbycustid = '0';
            $newRoute->remark = "na";
            $newRoute->step = "1";
            if ($request->hasFile('img_parcel')) {
                $file = $request->file('img_parcel');
                $name = $file->getClientOriginalName();
                $filesname = $request->route_barcode . time() . '_' . $name;
                Storage::putFileAs('images', $request->file('img_parcel'),  $filesname);
                $newRoute->img_parcel = $URL . '/images/' . $filesname;

                /** Signature */
                $folder = public_path('images/signature/');
                $signature_picture = explode(';base64,', $request->signature_img);

                $image_type_aux = explode('image/', $signature_picture[0]);

                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($signature_picture[1]);

                $file =  $request->route_barcode . '_' . $random . '_FIRST.' . $image_type;
                file_put_contents($folder . $file, $image_base64);
                $newRoute->img_sign = $URL . '/images/signature/' . $file;
            }

            $rs = $newRoute->save();
            if (!$rs) {
                return response()->json(["result" => false]);
            } else {


                $folder = public_path('images/signature/');
                $signature_picture = explode(';base64,', $request->signature_img);

                $image_type_aux = explode('image/', $signature_picture[0]);

                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($signature_picture[1]);

                $file = $folder . $request->route_barcode . '_' . uniqid() . '_FIRST.' . $image_type;
                file_put_contents($file, $image_base64);

                return response()->json(["result" => true, "file" => $file]);
            }
        } else {
            return response()->json(["result" => false, "Count" => $CheckDiplicate]);
        }
    }

    public function ParcelStepSecond(Request $request)
    {
        $random = uniqid();
        $URL = $request->root();


        $CheckDiplicate = RouteParcel::where('route_barcode', $request->route_barcode)
            ->where('step', '2')
            ->count();
        if ($CheckDiplicate < 1) {
            $CheckDiplicateST1 = RouteParcel::where('route_barcode', $request->route_barcode)
                ->where('step', '1')
                ->count();
            if ($CheckDiplicateST1 == '1') {
                $newRoute = new RouteParcel();
                $newRoute->route_barcode = strtoupper($request->route_barcode);
                $newRoute->route_userid = Auth::id();
                $newRoute->route_branchid = '0';
                $newRoute->route_titleid = '2';
                $newRoute->route_international = '1';
                $newRoute->route_status = '1';
                $newRoute->route_ordbycustid = '0';
                $newRoute->remark = "na";
                $newRoute->step = "2";
                $newRoute->img_parcel = "na";
                $newRoute->img_sign = "na";

                $rs = $newRoute->save();
                if (!$rs) {
                    return response()->json(["result" => false]);
                } else {

                    return response()->json(["result" => true]);
                }
            } else {
                return response()->json(["result" => false, "err" => "ຂ້າມສະເຕັບ"]);
            }
        } else {
            return response()->json(["result" => false, "Count" => $CheckDiplicate]);
        }
    }


    public function index_reciever(Request $request)
    {
        $customer = Customer::find($request->custid);
        return view('App.System.Parcel.parcel_receiver_to storage', ['barcode' => $request->barcode, 'custid' => $customer]);
    }

    // public function ParcelStepThird(Request $request)
    // {
    //     # code...
    // }
    // public function ParcelStepFourth(Request $request)
    // {
    //     # code...
    // }
}
