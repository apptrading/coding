<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProsernalProfileController;
use App\Http\Controllers\BranchsController;
use App\Http\Controllers\ShelfController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\RouteParcelConreoller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ParcelController;



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
        return view('App.System.Parcel.parcel_normal');
    })->name('app.system.parcel.normal');



    /** transfer form */
    Route::get('/app/parcel/transfer', function () {
        return view('App.System.Parcel.parcel_transfer');
    })->name('app.system.parcel.transfer');

    /** Reviever */
    Route::get('/app/parcel/receiver', [CustomerController::class, 'Index'])->name('app.system.parcel.receiver');




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
    Route::post('/app/route/step-second', [RouteParcelConreoller::class, 'ParcelStepSecond'])->name('app.parcelstepsecond');
    /** Reviever */
    Route::get('/app/parcel/receiver/{barcode}/{custid}', [RouteParcelConreoller::class, 'index_reciever'])->name('app.system.parcel.receiver.barcode');



    /** Customer */
    Route::post('/app/customer/add', [CustomerController::class, 'CustomerAdd'])->name('app.customer.add');
    Route::post('/app/customer/check', [CustomerController::class, 'CustomerCheck'])->name('app.customer.check');


    /** Parcel */
    Route::post('/app/parcel/add', [ParcelController::class, 'ParcelAdd'])->name('app.parcel.add');
    Route::get('/app/parcel/customer/show', [ParcelController::class, 'ParcelCustShow'])->name('app.parcel.cusr.show');
    Route::get('/app/parcel/customer', [ParcelController::class, 'CustomerRecieve'])->name('app.parcel.cust.recieve');
    Route::get('/app/parcel/customer/{barcode}', [ParcelController::class, 'CustomerParcelRecieve'])->name('app.parcel.customer');
});
