<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\RouteParcel;
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

    public function StockThai()
    {
        return view('App.Report_IO.thai_stock');
    }
    public function StockThaidetail()
    {
        $thaiStock = RouteParcel::leftjoin('order_by_customers', 'order_by_customers.cust_barcode', '=', 'route_parcels.route_barcode')
            ->leftjoin('customers', 'customers.id', '=', 'order_by_customers.cust_customerid')

            ->leftjoin('users', 'users.id', '=', 'route_parcels.route_userid')
            ->select('route_parcels.*', 'users.name', 'customers.customer_name', 'customers.customer_tell', 'customers.customer_whatsapp', 'order_by_customers.cust_payment')
            ->where('route_parcels.route_status', '1')
            ->where('route_parcels.step', '1')
            ->get();
        return response()->json(["result" => true, "datas" => $thaiStock]);
    }

    public function Thaitransfer()
    {
        return view('App.Report_IO.thai_transfer');
    }

    public function Thaitransferdetail()
    {
        $thaiStock = RouteParcel::leftjoin('order_by_customers', 'order_by_customers.cust_barcode', '=', 'route_parcels.route_barcode')
            ->leftjoin('customers', 'customers.id', '=', 'order_by_customers.cust_customerid')

            ->leftjoin('users', 'users.id', '=', 'route_parcels.route_userid')
            ->select('route_parcels.*', 'users.name', 'customers.customer_name', 'customers.customer_tell', 'customers.customer_whatsapp', 'order_by_customers.cust_payment')
            ->where('route_parcels.route_status', '1')
            ->where('route_parcels.step', '2')
            ->get();
        return response()->json(["result" => true, "datas" => $thaiStock]);
    }


    public function Dashboard_view()
    {
        return view('App.Report_IO.dashboard');
    }
    public function Dashboard()
    {
        // $parcel = Parcel::join('customers', 'customers.id', '=', 'parcels.parcel_customerid')
        //     ->leftjoin('users', 'users.id', '=', 'parcels.parcel_outuserid')
        //     ->select('customers.customer_name', 'customers.customer_tell', 'customers.customer_whatsapp', 'customers.customer_address', 'users.name', 'parcels.*')
        // ->where('parcels.parcel_status', '2')
        // ->where('','')
        // ->get();
        $parcel = RouteParcel::leftjoin('parcels', 'parcels.parcel_barcode', '=', 'route_parcels.route_barcode')
            ->leftjoin('customers', 'customers.id', '=', 'parcels.parcel_customerid')
            ->leftjoin('branchs', 'branchs.branch_id', '=', 'parcels.parcel_branchid')
            ->select('customers.customer_name', 'customers.customer_tell', 'customers.customer_whatsapp', 'route_parcels.route_barcode', 'route_parcels.route_status', 'branchs.branch_name', 'parcels.*')
            ->orderby('route_parcels.id', 'desc')
            ->where('route_parcels.step', '1')
            // ->
            ->get();
        return response()->json(["result" => true, "datas" => $parcel]);
    }
    public function sentOut()
    {
        return view('App.Report_IO.sent_out');
    }
    public function sentOutList()
    {
        $parcel = RouteParcel::leftjoin('parcels', 'parcels.parcel_barcode', '=', 'route_parcels.route_barcode')
            ->leftjoin('customers', 'customers.id', '=', 'parcels.parcel_customerid')
            ->leftjoin('branchs', 'branchs.branch_id', '=', 'parcels.parcel_branchid')
            ->select(
                'customers.customer_name',
                'customers.customer_tell',
                'customers.customer_whatsapp',
                'route_parcels.route_barcode',
                'route_parcels.route_status',
                'branchs.branch_name',
                'parcels.*'
            )
            ->orderby('route_parcels.id', 'desc')
            ->where('route_parcels.step', '4')
            // ->
            ->get();
        return response()->json(["result" => true, "datas" => $parcel]);
    }
    public function Inside()
    {
        return view('App.Report_IO.inside');
    }
    public function InsideList()
    {
        $parcel = RouteParcel::leftjoin('parcels', 'parcels.parcel_barcode', '=', 'route_parcels.route_barcode')
            ->leftjoin('customers', 'customers.id', '=', 'parcels.parcel_customerid')
            ->leftjoin('branchs', 'branchs.branch_id', '=', 'parcels.parcel_branchid')
            ->select(
                'customers.customer_name',
                'customers.customer_tell',
                'customers.customer_whatsapp',
                'route_parcels.route_barcode',
                'route_parcels.route_status',
                'branchs.branch_name',
                'parcels.*'
            )
            ->orderby('route_parcels.id', 'desc')
            ->where('route_parcels.step', '3')
            ->where('parcels.parcel_status', '1')
            // ->
            ->get();
        return response()->json(["result" => true, "datas" => $parcel]);
    }
    public function Daily()
    {
        return view('App.Report_IO.daily');
    }
    public function Dailylist()
    {
        $parcel = RouteParcel::leftjoin('parcels', 'parcels.parcel_barcode', '=', 'route_parcels.route_barcode')
            ->leftjoin('customers', 'customers.id', '=', 'parcels.parcel_customerid')
            ->leftjoin('branchs', 'branchs.branch_id', '=', 'parcels.parcel_branchid')
            ->select(
                'customers.customer_name',
                'customers.customer_tell',
                'customers.customer_whatsapp',
                'route_parcels.route_barcode',
                'route_parcels.route_status',
                'branchs.branch_name',
                'parcels.*'
            )
            ->orderby('route_parcels.id', 'desc')
            ->where('route_parcels.step', '3')
            ->where('parcels.parcel_paycod', '!=', '0.00')
            // ->
            ->get();
        return response()->json(["result" => true, "datas" => $parcel]);
    }
}
