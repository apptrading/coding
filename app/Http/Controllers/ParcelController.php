<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\LogPicture;
use App\Models\OrderByCustomer;
use App\Models\Parcel;
use App\Models\RouteParcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDO;

class ParcelController extends Controller
{
    public function ParcelAdd(Request $request)
    {
        $CheckDiplicateST3 = RouteParcel::where('route_barcode', $request->parcel_barcode)
            ->where('step', '3')->count();

        $datas = RouteParcel::where('route_barcode', $request->parcel_barcode)
            ->where('step', '2')
            ->first();



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
                // $random = uniqid();
                $URL = $request->root();


                $ParcelDES = new Parcel();
                $ParcelDES->parcel_inuserid = Auth::id();
                $ParcelDES->parcel_outuserid = "0";
                $ParcelDES->parcel_customerid = $request->custid;
                $ParcelDES->parcel_width = str_replace(',', '', $request->parcel_width);
                $ParcelDES->parcel_length = str_replace(',', '', $request->parcel_length);
                $ParcelDES->parcel_height = str_replace(',', '', $request->parcel_height);
                $ParcelDES->parcel_kg = str_replace(',', '', $request->parcel_kg);
                $ParcelDES->parcel_total = str_replace(',', '', $request->parcel_total);
                $ParcelDES->parcel_barcode = $request->parcel_barcode;
                $ParcelDES->paymenttype = "0";
                $ParcelDES->parcel_payment = "0";

                if ($request->hasFile('pacel_picture')) {
                    /** Picture */
                    // $file = $request->file('pacel_picture');
                    // $name = $file->getClientOriginalName();
                    // $filesname = $request->parcel_barcode . time() . '_' . $name;
                    // Storage::putFileAs('images', $request->file('pacel_picture'),  $filesname);
                    // $ParcelDES->pacel_picture = $URL . '/images/' . $filesname;

                    $files = $request->file('pacel_picture');
                    foreach ($files as $key => $value) {

                        // $file = $request->file('img_parcel');
                        $name = $value->getClientOriginalName();
                        $filesname = $request->route_barcode . time() . '_' . $name;
                        // Storage::putFileAs('images', $request->file('img_parcel'),  $filesname);
                        $value->move(public_path('images'), $filesname);

                        $newIMG = new LogPicture();
                        $newIMG->picture_userid = Auth::id();
                        $newIMG->picture_barcode = strtoupper($request->parcel_barcode);
                        $newIMG->picture_path = $URL . '/images/';
                        $newIMG->picture_name = $filesname;
                        $newIMG->save();

                        $ParcelDES->pacel_picture = "na";
                    }

                    $ParcelDES->parcel_signature = "na";
                } else {
                    $ParcelDES->pacel_picture = "na";
                    $ParcelDES->parcel_signature = "na";
                }

                $ParcelDES->parcel_picturepayment = "na";
                $ParcelDES->parcel_countpayment = str_replace(',', '', $request->parcel_countpayment);
                $ParcelDES->parcel_receivedate = $request->datein;
                $ParcelDES->parcel_outdate = $request->dateout;
                $ParcelDES->parcel_shelfid = "0";
                $ParcelDES->parcel_status = "1";

                $rs = $ParcelDES->save();

                if (!$rs) {
                    return response()->json(["result" => false]);
                } else {
                    $upst1 = RouteParcel::find($datas->id);
                    $upst1->route_status = '2';
                    $upst1->update();

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
    public function CustomerParcelRecieve(Request $request)
    {
        $customer = OrderByCustomer::where('cust_barcode', $request->barcode)->first();
        $customercount = OrderByCustomer::where('cust_barcode', $request->barcode)->count();
        if ($customercount > 0) {
            $customerCount = $customer->cust_payment;
        } else {
            $customerCount = 0;
        }

        $parcel = ParcelController::ParcelCustomerDES($request->barcode);
        return view('App.System.Parcel.parcel_customer_recieve', ['datas' => $parcel, 'customerCount' => $customerCount]);
    }

    public function ParcelCustomer()
    {
        $parcel = Parcel::join('customers', 'customers.id', '=', 'parcels.parcel_customerid')
            ->select('customers.customer_name', 'customers.customer_tell', 'customers.customer_whatsapp', 'customers.customer_address', 'parcels.*')
            ->where('parcels.parcel_status', '1')
            ->get();
        return $parcel;
    }
    public function ParcelCustomerDES($barcode)
    {
        $parcel = Parcel::leftjoin('customers', 'customers.id', '=', 'parcels.parcel_customerid')
            ->leftjoin('users', 'users.id', '=', 'parcels.parcel_inuserid')
            ->select('users.name', 'customers.customer_name', 'customers.customer_tell', 'customers.customer_whatsapp', 'customers.customer_address', 'parcels.*')
            ->where('parcels.parcel_status', '1')
            ->where('parcels.parcel_barcode', $barcode)
            ->first();
        return $parcel;
    }
    public function ParcelCustomerRecieve(Request $request)
    {
        $random = uniqid();
        $URL = $request->root();


        $update = Parcel::find($request->id);
        $update->parcel_outuserid = Auth::id();
        $update->parcel_outdate = $request->parcel_outdate;
        $update->paymenttype = $request->paymenttype;
        $update->parcel_payment = str_replace(',', '', $request->parcel_payment);
        $update->parcel_status = "2";

        if ($request->hasFile('filepayment')) {
            /** Picture */
            $file = $request->file('filepayment');
            $name = $file->getClientOriginalName();
            $filesname = $request->parcel_barcode . time() . '_' . $name;
            Storage::putFileAs('images', $request->file('filepayment'),  $filesname);
            $update->parcel_picturepayment = $URL . '/images/' . $filesname;
        } else {
            $update->parcel_picturepayment = "na";
        }

        /** Signature */
        $folder = public_path('images/signature/');
        $signature_picture = explode(';base64,', $request->signature_img);

        $image_type_aux = explode('image/', $signature_picture[0]);

        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($signature_picture[1]);

        $file =  $request->parcel_barcode . '_' . $random . '_FIRST.' . $image_type;
        file_put_contents($folder . $file, $image_base64);
        $update->parcel_signature = $URL . '/images/signature/' . $file;



        $rs_update = $update->update();
        if (!$rs_update) {
            return response()->json(["result" => false]);
        } else {
            return response()->json(["result" => true]);
        }
    }

    public function DailyparcelView(Request $request)
    {
        return view('App.System.Parcel.parcel_daily');
    }

    public function AdddataParcel(Request $request)
    {
        $datasSent =  RouteParcel::where('img_sign', 'noSign')->where('step', '3')->where('route_userid', Auth::id())->get();

        $lasrrId = $request->customerId;

        if ($request->customer_name != "" && $request->customer_tell != "") {
            $customerAdd = new Customer();
            $customerAdd->customer_name = $request->customer_name;
            $customerAdd->customer_tell = $request->customer_tell;
            $customerAdd->customer_whatsapp = $request->customer_tell;
            $customerAdd->customer_address = "-";
            $customerAdd->save();
            $lasrrId = $customerAdd->id;
        }



        foreach ($datasSent as $key => $value) {

            $ParcelDES = new Parcel();
            $ParcelDES->parcel_inuserid = Auth::id();
            $ParcelDES->parcel_outuserid = "0";
            $ParcelDES->parcel_customerid = $lasrrId;
            $ParcelDES->parcel_width = str_replace(',', '', $request->parcel_width);
            $ParcelDES->parcel_length = str_replace(',', '', $request->parcel_length);
            $ParcelDES->parcel_height = str_replace(',', '', $request->parcel_height);
            $ParcelDES->parcel_kg = str_replace(',', '', $request->parcel_kg);
            $ParcelDES->parcel_total = str_replace(',', '', $request->parcel_total);
            $ParcelDES->parcel_barcode = strtoupper($value->route_barcode);
            $ParcelDES->parcel_branchid = $request->branchid;
            $ParcelDES->parcel_typeparcel = $request->type_parcel;
            $ParcelDES->paymenttype = "0";
            $ParcelDES->parcel_payment = "0";
            $ParcelDES->pacel_picture = "na";
            $ParcelDES->parcel_remark = $request->parcel_remark;
            $ParcelDES->parcel_picturepayment = "na";
            $ParcelDES->parcel_countpayment = str_replace(',', '', $request->parcel_countpayment);
            $ParcelDES->parcel_paycod = str_replace(',', '', $request->parcel_paycod);
            $ParcelDES->parcel_receivedate = date('Y-m-d');
            $ParcelDES->parcel_shelfid = "0";
            $ParcelDES->parcel_status = "1";
            $rs = $ParcelDES->save();

            $Routeparcel = RouteParcel::find($value->id);
            $Routeparcel->route_status = "2";
            $Routeparcel->img_sign = "na";
            $Routeparcel->update();
        }

        if (!$rs) {
            return response()->json(["result" => false]);
        } else {
            return response()->json(["result" => true]);
        }
    }
}
