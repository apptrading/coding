<?php

namespace App\Http\Controllers;

use App\Models\Shelf;
use Illuminate\Http\Request;

class ShelfController extends Controller
{
    public function Index(Request $request)
    {
        return view('App.SettingBackEnd.Selfs.shelf');
    }

    public function showShelf()
    {
        $shelf = Shelf::all();
        return $shelf;
    }

    public function ShelfProfiles()
    {
        return response()->json(["result" => true, "datas" => ShelfController::showShelf()]);
    }


    public function ShelfAdd(Request $request)
    {
        $newShelf = new Shelf();
        $newShelf->shelf_name = $request->shelf_name;
        $newShelf->branch_id = '0';

        $rs = $newShelf->save();
        if (!$rs) {
            return response()->json(["result" => false]);
        } else {
            return response()->json(["result" => true, "datas" => ShelfController::showShelf()]);
        }
    }

    public function ShelfEdit(Request $request)
    {
        $edit = Shelf::find($request->shelfId);
        return response()->json(["result" => true, "datas" => $edit]);
    }

    public function ShelfUpdate(Request $request)
    {
        $update = Shelf::find($request->id);
        $update->shelf_name = $request->shelf_name_edit;

        $rs = $update->update();
        if (!$rs) {
            return response()->json(["result" => false]);
        } else {
            return response()->json(["result" => true, "datas" => ShelfController::showShelf()]);
        }
    }
}
