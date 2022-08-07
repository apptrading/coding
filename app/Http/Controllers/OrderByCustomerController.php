<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\OrderByCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderByCustomerController extends Controller
{
    public function IndexOrderByCust()
    {
        $customer = Customer::all();
        return view('App.System.Parcel.order_by_cust', ['customer' => $customer]);
    }
    public function OrderByCustCheck(Request $request)
    {
        $check = OrderByCustomer::where('cust_userid', $request->customerId)->where('cust_barcode', $request->route_barcode)->count();
        if ($check > 0) {
            return response()->json(["result" => false]);
        } else {
            return response()->json(["result" => true]);
        }
    }

    public function OrderByCustDetail(Request $request)
    {

        $cust = Customer::find($request->custid);
        return view('App.System.Parcel.order_by_cust_detail', ["barcode" => $request->barcode, "Cust" => $cust]);
    }

    public function Register_OrderByCust(Request $request)
    {
        $random = uniqid();
        $URL = $request->root();


        $register = new OrderByCustomer();
        $register->cust_userid = Auth::id();
        $register->cust_customerid = $request->id;
        $register->cust_approve = "0";
        $register->cust_whoid = "0";
        $register->cust_count = "0";
        $register->cust_payment = $request->count_payment;
        $register->cust_barcode = $request->barcode;
        $register->cust_status = "1";
        if ($request->hasFile('filespayment')) {

            $file = $request->file('filespayment');
            $name = $file->getClientOriginalName();
            $filesname = $URL . '/images/' . $request->barcode . "_payment" . '_' . $name;
            $file->move(public_path('images'), $filesname);

            $register->cust_picturepayment = $filesname;
        }
        $rs = $register->save();
        if (!$rs) {
            return response()->json(["result" => false]);
        } else {
            return response()->json(["result" => true]);
        }
    }

    public function OrderCustCheck()
    {
        return view('App.System.Parcel.order_by_customer_checked');
    }
    public function dataConfrim()
    {
        $ord = OrderByCustomer::leftjoin('customers', 'customers.id', '=', 'order_by_customers.cust_customerid')
            ->leftjoin('users', 'users.id', '=', 'order_by_customers.cust_approve')
            ->select('users.name', 'customers.customer_name', 'customers.customer_tell', 'customers.customer_whatsapp', 'order_by_customers.*')
            ->get();
        return $ord;
    }
    public function OrderCustCheckShow()
    {
        $ord = OrderByCustomerController::dataConfrim();
        return response()->json(["result" => true, "datas" => $ord]);
    }
    public function OrderCustconfirm(Request $request)
    {
        $updeteConfirm = OrderByCustomer::find($request->id);
        $updeteConfirm->cust_approve = Auth::id();
        $updeteConfirm->cust_status = "2";
        $rs = $updeteConfirm->update();
        if (!$rs) {
            return response()->json(["result" => false]);
        } else {
            $ord = OrderByCustomerController::dataConfrim();
            return response()->json(["result" => true, "datas" => $ord]);
        }
    }
    public function OrderCustupdate(Request $request)
    {
        $update = OrderByCustomer::find($request->id);
        $update->cust_barcode = $request->barcode;
        $rs = $update->update();
        if (!$rs) {
            return response()->json(["result" => false]);
        } else {
            $ord = OrderByCustomerController::dataConfrim();
            return response()->json(["result" => true, "datas" => $ord]);
        }
    }
}
