<?php

namespace App\Http\Controllers;

use App\Models\RouteParcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteParcelConreoller extends Controller
{
    public function ParcelStepFirst(Request $request)
    {
        $CheckDiplicate = RouteParcel::where('route_barcode', $request->route_barcode)
            ->where('step', '1')
            ->count();
        if ($CheckDiplicate < 1) {
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

            $rs = $newRoute->save();
            if (!$rs) {
                return response()->json(["result" => false]);
            } else {
                return response()->json(["result" => true]);
            }
        } else {
            return response()->json(["result" => false, "Count" => $CheckDiplicate]);
        }
    }

    public function ParcelStepSecond(Request $request)
    {
        # code...
    }
    public function ParcelStepThird(Request $request)
    {
        # code...
    }
    public function ParcelStepFourth(Request $request)
    {
        # code...
    }
}
