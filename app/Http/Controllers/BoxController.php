<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function Index()
    {
        return view('App.SettingBackEnd.Prices_of_parcel.prices-parcel');
    }

    public function ShowBox()
    {
        $box = Box::where('box_status', '1')->get();
        return $box;
    }

    public function PriceOfParcelAdd(Request $request)
    {
        $newBox = new Box();
        $newBox->box_name = $request->box_name;
        $newBox->box_width = $request->box_width;
        $newBox->box_height = $request->box_height;
        $newBox->box_length = $request->box_length;
        $newBox->box_price = $request->box_price;
        $newBox->box_status = "1";
        $rs = $newBox->save();
        if (!$rs) {
            return response()->json(["result" => false]);
        } else {
            return response()->json(["result" => true, "datas" => BoxController::ShowBox()]);
        }
    }
    public function PriceOfParcelShow()
    {
        return response()->json(["result" => true, "datas" => BoxController::ShowBox()]);
    }


    public function PriceOfParcelEdit(Request $request)
    {
        $Box = Box::find($request->boxId);
        return response()->json(["result" => true, "datas" => $Box]);
    }

    public function PriceOfParcelUpdate(Request $request)
    {
        $BoxUpdate = Box::find($request->id);
        $BoxUpdate->box_name = $request->box_name_edit;
        $BoxUpdate->box_width = $request->box_width_edit;
        $BoxUpdate->box_height = $request->box_height_edit;
        $BoxUpdate->box_length = $request->box_length_edit;
        $BoxUpdate->box_price = $request->box_price_edit;
        $rs = $BoxUpdate->save();
        if (!$rs) {
            return response()->json(["result" => false]);
        } else {
            return response()->json(["result" => true, "datas" => BoxController::ShowBox()]);
        }
    }

    public function PriceOfParcelDelete(Request $request)
    {
        $delete = Box::find($request->boxId);
        $delete->box_status = "0";
        $rs = $delete->update();
        if (!$rs) {
            return response()->json(["result" => false]);
        } else {
            return response()->json(["result" => true, "datas" => BoxController::ShowBox()]);
        }
    }
}
