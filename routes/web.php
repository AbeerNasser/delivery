<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth/login');
});
// Route::get('users/create', function () {
//     return view('pages/addNewUser');
// });

Auth::routes();
// مدير دعم فني 
Route::get('/home', 'HomeController@index')->name('home');
//مدير عام  
Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route')->middleware('admin');

Route::middleware('admin')->prefix('admin/')->group(function () {

    Route::resource('restaurants','ControlPanel\RestController'); 
    Route::get('showGroups/{id}','ControlPanel\RestController@showGroups'); 
    Route::post('storeGroup/{id}','ControlPanel\RestController@storeGroup'); 
    Route::post('activeRest/{id}','ControlPanel\RestController@activeRest'); 
    Route::resource('districts','ControlPanel\DistrictController'); 
    Route::resource('cities','ControlPanel\cityController'); 
    Route::resource('groups','ControlPanel\GroupController'); 
    Route::resource('PricingGroup','ControlPanel\PricingGroupController'); 
    Route::resource('delegats','ControlPanel\DelegateController');
    Route::post('activeDelegate/{id}','ControlPanel\DelegateController@activeDelegate'); 
    Route::resource('orders','ControlPanel\OrderController'); 
    Route::resource('users','ControlPanel\userController');  
    //Route::get('/status/{id}/{st}','employeesController@editStatus');
    Route::resource('offers','ControlPanel\OfferController'); 
    Route::post('offer','ControlPanel\OfferController@removeOffer'); 
    Route::resource('support','ControlPanel\supportController'); 
    Route::resource('settings','ControlPanel\SettingController'); 
    //??
    Route::resource('reports','ControlPanel\ReportController'); 
});


Route::view('forgot_password', 'auth.passwords.reset')->name('password.reset');
