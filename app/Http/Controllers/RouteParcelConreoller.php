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

                // $file = $request->file('img_parcel');
                // $name = $file->getClientOriginalName();
                // $filesname = $request->route_barcode . time() . '_' . $name;
                // Storage::putFileAs('images', $request->file('img_parcel'),  $filesname);
                // $newRoute->img_parcel = $URL . '/images/' . $filesname;

                $files = $request->file('img_parcel');
                foreach ($files as $key => $value) {

                    // $file = $request->file('img_parcel');
                    $name = $value->getClientOriginalName();
                    $filesname = $request->route_barcode . time() . '_' . $name;
                    // Storage::putFileAs('images', $request->file('img_parcel'),  $filesname);
                    $value->move(public_path('images'), $filesname);

                    $newIMG = new LogPicture();
                    $newIMG->picture_userid = Auth::id();
                    $newIMG->picture_barcode = strtoupper($request->route_barcode);
                    $newIMG->picture_path = $URL . '/images/';
                    $newIMG->picture_name = $filesname;
                    $newIMG->save();

                    $newRoute->img_parcel = "na";
                }


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
                return response()->json(["result" => true, "file" => $file]);
            }
        } else {
            return response()->json(["result" => false, "Count" => $CheckDiplicate]);
        }
    }


    public function FirstMultiple(Request $request)
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
            $newRoute->img_parcel = "na";
            $newRoute->img_sign = "noSign";
            $rs = $newRoute->save();

            if (!$rs) {
                return response()->json(["result" => false]);
            } else {
                $datas =  RouteParcel::where('img_sign', 'noSign')->where('step', '1')->where('route_userid', Auth::id())->get();
                return response()->json(["result" => true, "datas" => $datas]);
            }
        } else {
            return response()->json(["result" => false, "Count" => $CheckDiplicate]);
        }
    }

    public function showmultiple()
    {
        $datas =  RouteParcel::where('img_sign', 'noSign')->where('step', '1')->where('route_userid', Auth::id())->get();
        return response()->json(["result" => true, "datas" => $datas]);
    }
    public function showmultipleStep3()
    {
        $datas =  RouteParcel::where('img_sign', 'noSign')->where('step', '3')->where('route_userid', Auth::id())->get();
        return response()->json(["result" => true, "datas" => $datas]);
    }


    public function delmultiple(Request $request)
    {
        $del = RouteParcel::find($request->id);
        $rs = $del->delete();
        if (!$rs) {
            return response()->json(["result" => false]);
        } else {
            $datas =  RouteParcel::where('img_sign', 'noSign')->where('step', '1')->where('route_userid', Auth::id())->get();
            return response()->json(["result" => true, "datas" => $datas]);
        }
    }


    public function SignMultiple(Request $request)
    {
        $random = uniqid();
        $URL = $request->root();


        $datas =  RouteParcel::where('img_sign', 'noSign')->where('route_userid', Auth::id())->get();

        /** Signature */
        $folder = public_path('images/signature/');
        $signature_picture = explode(';base64,', $request->signature_img);

        $image_type_aux = explode('image/', $signature_picture[0]);

        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($signature_picture[1]);

        $file =  $request->route_barcode . '_' . $random . '_FIRST.' . $image_type;
        file_put_contents($folder . $file, $image_base64);
        // $newRoute->img_sign = $URL . '/images/signature/' . $file;


        foreach ($datas as $key => $value) {
            $upd = RouteParcel::find($value->id);
            $upd->img_sign = $URL . '/images/signature/' . $file;
            $rs = $upd->update();
        }

        if (!$rs) {
            return response()->json(["result" => false]);
        } else {
            return response()->json(["result" => true]);
        }
    }



    public function ParcelStepSecond(Request $request)
    {
        $random = uniqid();
        $URL = $request->root();


        $datas = RouteParcel::where('route_barcode', $request->route_barcode)
            ->where('step', '1')
            ->first();



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

                $newRoute->route_ordbycustid = $datas->route_ordbycustid;

                $newRoute->remark = "na";
                $newRoute->step = "2";
                $newRoute->img_parcel = "na";
                $newRoute->img_sign = "na";

                $rs = $newRoute->save();
                if (!$rs) {
                    return response()->json(["result" => false]);
                } else {

                    $upst1 = RouteParcel::find($datas->id);
                    $upst1->route_status = '2';
                    $upst1->update();

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

    public function Dailyparcel(Request $request)
    {
        // $customer = OrderByCustomer::where('cust_barcode', $request->route_barcode)->first();
        // $customercount = OrderByCustomer::where('cust_barcode', $request->route_barcode)->where('cust_status', '2')->count();

        // if ($customercount > 0) {

        $checkDuplicate = OrderByCustomer::where('cust_date_pay', $request->cust_date_pay)
            ->where('cust_time_pay', $request->cust_time_pay)
            ->where('cust_customerid', Auth::id())
            ->count();
        if ($checkDuplicate < 1) {
            $lasrrId = $request->customerId;
            $URL = $request->root();
            $barcode = "-";

            if ($request->customer_name != "" && $request->customer_tell != "") {
                $customerAdd = new Customer();
                $customerAdd->customer_name = $request->customer_name;
                $customerAdd->customer_tell = $request->customer_tell;
                $customerAdd->customer_whatsapp = $request->customer_tell;
                $customerAdd->customer_address = "-";
                $customerAdd->save();
                $lasrrId = $customerAdd->id;
            }
            if ($request->cust_barcode != "") {
                $barcode = $request->cust_barcode;
            }

            $custOrder = new OrderByCustomer();
            $custOrder->cust_userid = Auth::id();
            $custOrder->cust_customerid = $lasrrId;
            $custOrder->cust_approve = "0";
            $custOrder->cust_whoid = "0";
            $custOrder->cust_count_transfer = $request->cust_count_transfer;
            $custOrder->cust_payment = $request->cust_payment;
            $custOrder->cust_barcode = $barcode;
            $custOrder->cust_date_pay = $request->cust_date_pay;
            $custOrder->cust_time_pay = $request->cust_time_pay;
            $custOrder->cust_nub_bill = $request->cust_nub_bill;
            $custOrder->cust_status = '1';
            /** cust_picturepayment */
            if ($request->hasFile('cust_picturepayment')) {

                $files = $request->file('cust_picturepayment');
                $name = $files->getClientOriginalName();
                $filesname = $lasrrId . '_' . time() . '_' . $name;
                $files->move(public_path('images'), $filesname);
                $custOrder->cust_picturepayment =  $URL .'/images/'. $filesname;
            }
            $rs = $custOrder->save();
            if (!$rs) {
                return response()->json(["result" => false]);
            } else {
                return response()->json(["result" => true]);
            }
        } else {
            return response()->json(["result" => false, "Count" => $checkDuplicate]);
        }

        //     $CheckDiplicate = RouteParcel::where('route_barcode', $request->route_barcode)
        //         ->where('step', '1')
        //         ->count();

        //     if ($CheckDiplicate < 1) {
        //         $random = uniqid();
        //         $URL = $request->root();

        //         $newRoute = new RouteParcel();
        //         $newRoute->route_barcode = strtoupper($request->route_barcode);
        //         $newRoute->route_userid = Auth::id();
        //         $newRoute->route_branchid = '0';
        //         $newRoute->route_titleid = '1';
        //         $newRoute->route_international = '1';
        //         $newRoute->route_status = '1';
        //         $newRoute->route_ordbycustid = $customer->cust_customerid;
        //         $newRoute->remark = "na";
        //         $newRoute->step = "1";
        //         if ($request->hasFile('img_parcel')) {

        //             $files = $request->file('img_parcel');
        //             foreach ($files as $key => $value) {

        //                 // $file = $request->file('img_parcel');
        //                 $name = $value->getClientOriginalName();
        //                 $filesname = $request->route_barcode . time() . '_' . $name;
        //                 // Storage::putFileAs('images', $request->file('img_parcel'),  $filesname);
        //                 $value->move(public_path('images'), $filesname);

        //                 $newIMG = new LogPicture();
        //                 $newIMG->picture_userid = Auth::id();
        //                 $newIMG->picture_barcode = strtoupper($request->route_barcode);
        //                 $newIMG->picture_path = $URL . '/images/';
        //                 $newIMG->picture_name = $filesname;
        //                 $newIMG->save();

        //                 $newRoute->img_parcel = "na";
        //             }


        //             /** Signature */
        //             $folder = public_path('images/signature/');
        //             $signature_picture = explode(';base64,', $request->signature_img);

        //             $image_type_aux = explode('image/', $signature_picture[0]);

        //             $image_type = $image_type_aux[1];
        //             $image_base64 = base64_decode($signature_picture[1]);

        //             $file =  $request->route_barcode . '_' . $random . '_FIRST.' . $image_type;
        //             file_put_contents($folder . $file, $image_base64);
        //             $newRoute->img_sign = $URL . '/images/signature/' . $file;
        //         }

        //         $rs = $newRoute->save();
        //         if (!$rs) {
        //             return response()->json(["result" => false]);
        //         } else {
        //             return response()->json(["result" => true, "file" => $file]);
        //         }
        //     } else {
        //         return response()->json(["result" => false, "Count" => $CheckDiplicate]);
        //     }
        // } else {
        //     return response()->json(["result" => false]);
        // }
    }

    public function Sendout(Request $request)
    {
        $CheckDiplicate = RouteParcel::where('route_barcode', $request->route_barcode)
            ->where('step', '4')
            ->count();
        $CheckDiplicate1 = RouteParcel::where('route_barcode', $request->route_barcode)
            ->where('step', '1')
            ->count();
        $CheckDiplicate2 = RouteParcel::where('route_barcode', $request->route_barcode)
            ->where('step', '2')
            ->count();
        $CheckDiplicate3 = RouteParcel::where('route_barcode', $request->route_barcode)
            ->where('step', '3')
            ->count();

        if ($request->branchid != "") {
            $branchid = $request->branchid;
        } else {
            $branchid = 0;
        }


        if ($CheckDiplicate < 1 && $CheckDiplicate1 >= 1 && $CheckDiplicate2 >= 1 && $CheckDiplicate3 >= 1) {
            $newRoute = new RouteParcel();
            $newRoute->route_barcode = strtoupper($request->route_barcode);
            $newRoute->route_userid = Auth::id();
            $newRoute->route_branchid = $branchid;
            $newRoute->route_titleid = '4';
            $newRoute->route_international = '1';
            $newRoute->route_status = '1';
            $newRoute->route_ordbycustid = '0';
            $newRoute->remark = "na";
            $newRoute->step = "4";
            $newRoute->img_parcel = "na";
            $newRoute->img_sign = "noSign";
            $rs = $newRoute->save();

            if (!$rs) {
                return response()->json(["result" => false]);
            } else {
                $datas = RouteParcelConreoller::ListStep4();
                return response()->json(["result" => true, "datas" => $datas]);
            }
        } else {
            return response()->json(["result" => false, "Count" => $CheckDiplicate]);
        }
    }

    function ListSendout()
    {
        $datas = RouteParcelConreoller::ListStep4();
        return response()->json(["result" => true, "datas" => $datas]);
    }

    public function listsendoutUpdate(Request $request)
    {
        $datas =  RouteParcel::leftjoin('parcels', 'parcels.parcel_barcode', '=', 'route_parcels.route_barcode')
            ->select('parcels.*', 'route_parcels.route_barcode', 'route_parcels.id as parId','route_parcels.route_branchid')
            ->where('img_sign', 'noSign')->where('step', '4')->where('route_userid', Auth::id())->get();
        foreach ($datas as $key => $value) {
            $parcelUpdate = RouteParcel::find($value->parId);
            $parcelUpdate->route_status = '2';
            $parcelUpdate->img_sign = 'na';
            $parcelUpdate->update();

            $ParcelDetail = Parcel::find($value->id);
            $ParcelDetail->parcel_outuserid = Auth::id();
            $ParcelDetail->paymenttype = '0';
            $ParcelDetail->parcel_branchid = $value->route_branchid;
            $ParcelDetail->parcel_outdate = date('Y-m-d');
            $ParcelDetail->parcel_status = '2';
            $ParcelDetail->update();
        }
    }

    public function ListStep4()
    {
        $datas =  RouteParcel::leftjoin('parcels', 'parcels.parcel_barcode', '=', 'route_parcels.route_barcode')
            ->leftjoin('customers', 'customers.id', '=', 'parcels.parcel_customerid')
            ->select('parcels.*', 'route_parcels.route_barcode', 'customers.customer_name', 'customers.customer_tell')
            ->where('img_sign', 'noSign')->where('step', '4')->where('route_userid', Auth::id())->get();
        return $datas;
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
