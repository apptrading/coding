<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProsernalProfileController;
use App\Http\Controllers\BranchsController;
use App\Http\Controllers\ShelfController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\RouteParcelConreoller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ParcelController;
use App\Http\Controllers\OrderByCustomerController;
use App\Http\Controllers\Parcel_in_outController;

/***
 * 
 * Middleware
 */

use App\Http\Middleware\UserLogin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** front End */
/** Default */
Route::get('/', function () {
    return redirect('/la/home');
});
/** Home */
Route::get('/{lang}/home', function ($lang) {
    App::setLocale($lang);
    session(['langs' => $lang]);
    return view('Pages.Home.home');
})->name('home');

/** tracking */
Route::get('/{lang}/tracking', function ($lang) {
    App::setLocale($lang);
    session(['langs' => $lang]);
    return view('Pages.Tracking.tracking');
})->name('tracking');

/** check price */
Route::get('/{lang}/check-price', function ($lang) {
    App::setLocale($lang);
    session(['langs' => $lang]);
    return view('Pages.Check-Price.check-price');
})->name('check-price');


/** condition */
Route::get('{lang}/condition', function ($lang) {
    App::setLocale($lang);
    session(['langs' => $lang]);
    return view('Pages.Condition.condition');
})->name('condition');
/** promotion */
Route::get('{lang}/promotion', function ($lang) {
    App::setLocale($lang);
    session(['langs' => $lang]);
    return view('Pages.Promotion.promotion');
})->name('promotion');
/** FAQ */
Route::get('{lang}/faq', function ($lang) {
    App::setLocale($lang);
    session(['langs' => $lang]);
    return view('Pages.FAQ.faq');
})->name('faq');
/** Contact */
Route::get('{lang}/contact', function ($lang) {
    App::setLocale($lang);
    session(['langs' => $lang]);
    return view('Pages.Contact.contact');
})->name('contact');

/** Service cod */
Route::get('{lang}/service/cod', function ($lang) {
    App::setLocale($lang);
    session(['langs' => $lang]);
    return view('Pages.Service.service-cod');
})->name('service.cod');
/** Service collection */
Route::get('{lang}/service/collection', function ($lang) {
    App::setLocale($lang);
    session(['langs' => $lang]);
    return view('Pages.Service.service-collection');
})->name('service.collection');
/** Service 3 */
Route::get('{lang}/service-three', function ($lang) {
    App::setLocale($lang);
    session(['langs' => $lang]);
    return view('Pages.Service.service-details3');
})->name('service-three');
/** Service claim */
Route::get('{lang}/service/claim', function ($lang) {
    App::setLocale($lang);
    session(['langs' => $lang]);
    return view('Pages.Service.claim');
})->name('service.claim');
/** End front end */



/** Back End */

/** Login */
Route::get('/app/login', function () {
    return view('App.Login.login');
})->name('app.login');

/** Register */
Route::get('/app/register', [UserController::class, 'FrmRegister'])->name('app.FrmRegister');
Route::post('/app/post/register', [UserController::class, 'RegisterUser'])->name('app.RegisterUser');
Route::post('/app/post/login', [UserController::class, 'LoginUser'])->name('app.LoginUser');
Route::get('/app/post/logout', [UserController::class, 'LogoutUser'])->name('app.LogoutUser');



Route::middleware([UserLogin::class])->group(function () {


    /** Dashboard */
    Route::get('/app/dashboard', function () {
        return view('App.Dashboard.dashboard');
    })->name('app.dashboard');


    /*** parcel */
    Route::get('/app/parcel', function () {
        return view('App.System.Parcel.parcel_manu');
    })->name('app.system.parcel');

    Route::get('/app/parcel/normal', function () {
        return view('App.System.Parcel.parcel_menu_scan');
    })->name('app.system.parcel.normal.parcel_menu_scan');

    Route::get('/app/parcel/normal/scand', function () {
        return view('App.System.Parcel.parcel_normal');
    })->name('app.system.parcel.normal');

    Route::get('/app/parcel/normal/scand/multiple', function () {
        return view('App.System.Parcel.parcel_normal_multiple');
    })->name('app.system.parcel.normal_multiple');


    /** transfer form */
    Route::get('/app/parcel/transfer', function () {
        return view('App.System.Parcel.parcel_transfer');
    })->name('app.system.parcel.transfer');

    /** Reviever */
    Route::get('/app/parcel/receiver', [CustomerController::class, 'Index'])->name('app.system.parcel.receiver');
    Route::get('/app/parcel/receiver/store', [CustomerController::class, 'Index_store'])->name('app.system.parcel.receiverstore');
    Route::get('/app/parcel/customer/receiver', [CustomerController::class, 'Customer_Receive'])->name('app.system.parcel.customer_Receive');

    Route::post('/app/parcel/receiver/add/store', [CustomerController::class, 'Add_store'])->name('app.parcel.recievestore');



    /*** Setting BackEnd */
    Route::get('/app/user', [UserController::class, 'UserList'])->name('app.UserList');
    Route::get('/app/user/add', [UserController::class, 'UserAdd'])->name('app.user.add');

    Route::post('/app/user/add/profiles', [ProsernalProfileController::class, 'AddProfile'])->name('app.AddProfile');
    Route::post('/app/user/update/profiles', [ProsernalProfileController::class, 'UpdateProfile'])->name('app.UpdateProfile');
    Route::get('/app/user/show/profiles', [ProsernalProfileController::class, 'ShowProfile'])->name('app.ShowProfile');
    Route::get('/app/user/edit/{userid}', [ProsernalProfileController::class, 'EditProfile'])->name('app.EditProfile');
    Route::get('/app/user/delete/{userid}', [ProsernalProfileController::class, 'DeleteProfile'])->name('app.DeleteProfile');


    /*** Branchs */
    Route::get('/app/branchs', [BranchsController::class, 'Index'])->name('app.branchs');
    Route::get('/app/branchs/district/{prId}', [BranchsController::class, 'District'])->name('app.district');
    Route::get('/app/branchs/villages/{drId}', [BranchsController::class, 'Villages'])->name('app.villages');
    Route::get('/app/branchs/show/profiles', [BranchsController::class, 'BShowProfile'])->name('app.BshowProfile');
    Route::get('/app/branchs/edit/{branchId}', [BranchsController::class, 'EditProfile'])->name('app.BeditProfile');
    Route::post('/app/branchs/add', [BranchsController::class, 'BranchAdd'])->name('app.addbranchs');
    Route::post('/app/branchs/update', [BranchsController::class, 'BranchUpdate'])->name('app.updatebranchs');
    Route::get('/app/branchs/delete/{branchId}', [BranchsController::class, 'DeleteProfile'])->name('app.BdeleteProfile');
    Route::get('/app/parcel/receiver/store/branch', [BranchsController::class, 'Branchlist'])->name('app.customer.branch.select');

    /** Shelf */
    Route::get('/app/shelf', [ShelfController::class, 'Index'])->name('app.shelfs');
    Route::get('/app/shelf/profiles', [ShelfController::class, 'ShelfProfiles'])->name('app.profiles');
    Route::get('/app/shelf/edit/{shelfId}', [ShelfController::class, 'ShelfEdit'])->name('app.shelfedit');
    Route::post('/app/shelf/add', [ShelfController::class, 'ShelfAdd'])->name('app.shelfsadd');
    Route::post('/app/shelf/update', [ShelfController::class, 'ShelfUpdate'])->name('app.shelfupdate');

    /** Box */
    Route::get('/app/price-parcel', [BoxController::class, 'Index'])->name('app.priceofparcel');
    Route::get('/app/price-parcel/show', [BoxController::class, 'PriceOfParcelShow'])->name('app.PriceOfParcelShow');
    Route::get('/app/price-parcel/edit/{boxId}', [BoxController::class, 'PriceOfParcelEdit'])->name('app.PriceOfParcelEdit');
    Route::get('/app/price-parcel/delete/{boxId}', [BoxController::class, 'PriceOfParcelDelete'])->name('app.PriceOfParceldelete');
    Route::post('/app/price-parcel/add', [BoxController::class, 'PriceOfParcelAdd'])->name('app.priceofparceladd');
    Route::post('/app/price-parcel/update', [BoxController::class, 'PriceOfParcelUpdate'])->name('app.priceofparcelupdate');


    /** Parcel Route */
    Route::post('/app/route/step-first', [RouteParcelConreoller::class, 'ParcelStepFirst'])->name('app.parcelstepfirst');
    Route::post('/app/route/step-first/multiple', [RouteParcelConreoller::class, 'FirstMultiple'])->name('app.parcelstepfirst.FirstMultiple');
    Route::post('/app/route/step-first/multiple/sign', [RouteParcelConreoller::class, 'SignMultiple'])->name('app.parcelstepfirst.SignMultiple');
    Route::get('/app/route/show/multiple', [RouteParcelConreoller::class, 'showmultiple'])->name('app.parcelstepfirst.show.multiple');
    Route::get('/app/route/show/multiple/3', [RouteParcelConreoller::class, 'showmultipleStep3'])->name('app.parcelstepfirst.show.multipleStep3');

    Route::get('/app/route/del/multiple/{id}', [RouteParcelConreoller::class, 'delmultiple'])->name('app.parcelstepfirst.del.multiple');

    Route::post('/app/route/step-second', [RouteParcelConreoller::class, 'ParcelStepSecond'])->name('app.parcelstepsecond');

    Route::get('/app/route/signature', function () {
        return view('App.System.Parcel.signature');
    })->name('signature');


    /** Reviever */
    Route::get('/app/parcel/receiver/{barcode}/{custid}', [RouteParcelConreoller::class, 'index_reciever'])->name('app.system.parcel.receiver.barcode');
    Route::post('/app/parcel/daily/add', [RouteParcelConreoller::class, 'Dailyparcel'])->name('app.parcel.Dailyparcel');

    /** customer receive */
    Route::post('/app/parcel/sent/out', [RouteParcelConreoller::class, 'Sendout'])->name('app.parcel.sendout');
    Route::get('/app/parcel/list/sent/out', [RouteParcelConreoller::class, 'ListSendout'])->name('app.parcel.listsendout');
    Route::get('/app/parcel/list/sent/out-update', [RouteParcelConreoller::class, 'listsendoutUpdate'])->name('app.parcel.listsendoutUpdate');


    /** Customer */
    Route::post('/app/customer/add', [CustomerController::class, 'CustomerAdd'])->name('app.customer.add');
    Route::post('/app/customer/check', [CustomerController::class, 'CustomerCheck'])->name('app.customer.check');
    Route::get('/app/parcel/store/customer', [CustomerController::class, 'CustomerList'])->name('app.customer.customer.select');



    /** Parcel */
    Route::post('/app/parcel/add', [ParcelController::class, 'ParcelAdd'])->name('app.parcel.add');
    Route::get('/app/parcel/customer/show', [ParcelController::class, 'ParcelCustShow'])->name('app.parcel.cusr.show');
    Route::get('/app/parcel/customer', [ParcelController::class, 'CustomerRecieve'])->name('app.parcel.cust.recieve');
    Route::get('/app/parcel/customer/{barcode}', [ParcelController::class, 'CustomerParcelRecieve'])->name('app.parcel.customer');
    Route::post('/app/parcel/customer/reciever', [ParcelController::class, 'ParcelCustomerRecieve'])->name('app.parcel.ParcelCustomerRecieve');
    Route::get('/app/parcel/daily', [ParcelController::class, 'DailyparcelView'])->name('app.parcel.DailyparcelView');
    Route::post('/app/parcel/reciever/datas', [ParcelController::class, 'AdddataParcel'])->name('app.parcel.AdddataParcel');


    /** Print Out */
    Route::get('/app/print/out', function () {
        return view('App.System.Parcel.print_out');
    })->name('print_out');




    Route::get('/app/parcel/cust/order', [OrderByCustomerController::class, 'IndexOrderByCust'])->name('app.parcel.custOrder');
    Route::post('/app/parcel/cust/order/check', [OrderByCustomerController::class, 'OrderByCustCheck'])->name('app.parcel.OrderByCustCheck');
    Route::get('/app/parcel/cust/order/{barcode}/{custid}', [OrderByCustomerController::class, 'OrderByCustDetail'])->name('app.parcel.CustomerOrder');
    Route::post('/app/parcel/cust/order/add', [OrderByCustomerController::class, 'Register_OrderByCust'])->name('app.parcel.Register_OrderByCust');
    Route::get('/app/parcel/cust/order/checked', [OrderByCustomerController::class, 'OrderCustCheck'])->name('app.parcel.checkcustOrder');
    Route::get('/app/parcel/cust/order/show', [OrderByCustomerController::class, 'OrderCustCheckShow'])->name('app.parcel.cusr.show.checked');
    Route::get('/app/parcel/cust/confirm/{id}/{status}', [OrderByCustomerController::class, 'OrderCustconfirm'])->name('app.parcel.cusr.OrderCustconfirm');
    Route::post('/app/parcel/cust/conf/update', [OrderByCustomerController::class, 'OrderCustupdate'])->name('app.parcel.cusr.OrderCustupdate');



    /**Report  */
    Route::get('/app/report/IO', [Parcel_in_outController::class, 'Menu'])->name('report.menu');
    Route::get('/app/report/in/laos', [Parcel_in_outController::class, 'In_laos'])->name('report.In_laos');
    Route::get('/app/report/dashboard/list', [Parcel_in_outController::class, 'Dashboard'])->name('report.dashboardList');
    Route::get('/app/report/dashboard', [Parcel_in_outController::class, 'Dashboard_view'])->name('report.dashboard');
    Route::get('/app/report/out/laos', [Parcel_in_outController::class, 'out_to_cust'])->name('report.out_to_cust');
    Route::get('/app/report/sent-out', [Parcel_in_outController::class, 'sentOut'])->name('report.sent_out');
    Route::get('/app/report/sent-out/list', [Parcel_in_outController::class, 'sentOutList'])->name('report.sentoutList');
    Route::get('/app/report/out/laos/detail/{barcode}', [Parcel_in_outController::class, 'out_customer_detail'])->name('report.out_customer_detail');
    Route::get('/app/report/out/laos/data', [Parcel_in_outController::class, 'out_laos'])->name('report.out_laos');
    Route::get('/app/report/in/thai', [Parcel_in_outController::class, 'StockThai'])->name('report.stockthai');
    Route::get('/app/report/stock/thai/data', [Parcel_in_outController::class, 'StockThaidetail'])->name('report.stockthaidetail');
    Route::get('/app/report/transfer/thai', [Parcel_in_outController::class, 'Thaitransfer'])->name('report.Thaitransfer');
    Route::get('/app/report/in-side', [Parcel_in_outController::class, 'Inside'])->name('report.inside');
    Route::get('/app/report/in-side/list', [Parcel_in_outController::class, 'InsideList'])->name('report.insidelist');
    Route::get('/app/report/transfer/thai/data', [Parcel_in_outController::class, 'Thaitransferdetail'])->name('report.thaitransferdetail');
    Route::get('/app/report/daily', [Parcel_in_outController::class, 'Daily'])->name('report.daily');
    Route::get('/app/report/daily/list', [Parcel_in_outController::class, 'Dailylist'])->name('report.dailylist');


    /** Confirm */
    Route::get('app/confirm/parcel', [ConfirmController::class, 'ConfirmIndex'])->name('app.confirm');
});
