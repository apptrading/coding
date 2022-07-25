<?php

namespace App\Http\Controllers;

use App\Models\Branchs;
use App\Models\Distric;
use App\Models\Province;
use App\Models\Village;
use Illuminate\Http\Request;
use PDO;

class BranchsController extends Controller
{
    public function Index()
    {
        return view('App.SettingBackEnd.Branchs.branchs', ["provinces" => BranchsController::Provinces()]);
    }

    public function ShowDataAll()
    {
        $data = Branchs::where('status', '1')
            ->leftjoin('provinces', 'provinces.pr_id', '=', 'branchs.pr_id')
            ->leftjoin('districs', 'districs.dr_id', '=', 'branchs.dr_id')
            ->leftjoin('villages', 'villages.vill_id', '=', 'branchs.vill_id')
            ->orderBy('branchs.pr_id', 'asc')
            ->orderBy('branchs.dr_id', 'asc')
            ->orderBy('branchs.vill_id', 'asc')
            ->get();
        return $data;
    }
    public function Provinces()
    {
        $province = Province::all();
        return $province;
    }
    public function District(Request $request)
    {
        $district = Distric::where("pr_id", $request->prId)->get();
        return response()->json(["district" => $district]);
    }
    public function Villages(Request $request)
    {
        $villages = Village::where("dr_id", $request->drId)->get();
        return response()->json(["villages" => $villages]);
    }

    public function BranchAdd(Request $request)
    {
        $newBranchs = new Branchs();
        $newBranchs->branch_name = $request->branch_name;
        $newBranchs->pr_id = $request->provinces;
        $newBranchs->dr_id = $request->districts;
        $newBranchs->vill_id = $request->villages;
        $newBranchs->status = '1';
        if ($request->location != "") {
            $newBranchs->location = $request->location;
        } else {
            $newBranchs->location = "na";
        }
        $rs = $newBranchs->save();
        if (!$rs) {
            return response()->json(["result" => false]);
        } else {
            return response()->json(["result" => true, "datas" => BranchsController::ShowDataAll()]);
        }
    }

    public function BShowProfile()
    {
        return response()->json(["result" => true, "datas" => BranchsController::ShowDataAll()]);
    }

    public function EditProfile(Request $request)
    {
        $edit = Branchs::where("branch_id", $request->branchId)->first();
        $district = Distric::where("pr_id", $edit->pr_id)->get();
        $villages = Village::where("dr_id", $edit->dr_id)->get();


        return response()->json(["result" => true, "datas" => $edit, "district" => $district, "villages" => $villages]);
    }

    public function BranchUpdate(Request $request)
    {
        $branchUpdate = Branchs::where('branch_id', $request->branch_id);
        $rs = $branchUpdate->update([
            "branch_name" => $request->branch_name_edit,
            "pr_id" => $request->provinces_edit,
            "dr_id" => $request->districts_edit,
            "vill_id" => $request->villages_edit,
            "location" => $request->location_edit
        ]);

        if (!$rs) {
            return response()->json(["result" => false]);
        } else {
            return response()->json(["result" => true, "datas" => BranchsController::ShowDataAll()]);
        }
    }
    public function DeleteProfile(Request $request)
    {
        return response()->json(["result" => true]);
    }
}
