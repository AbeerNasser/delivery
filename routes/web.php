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

Auth::routes();
// مدير دعم فني 
Route::get('/home', 'HomeController@index')->name('home');
//مدير عام  
Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route')->middleware('admin');

Route::middleware('admin')->prefix('admin/')->group(function () {

    Route::resource('restaurants','ControlPanel\RestController'); 
    Route::resource('districts','ControlPanel\DistrictController'); 
    Route::resource('cities','ControlPanel\cityController'); 
    Route::resource('groups','ControlPanel\GroupController'); 
    Route::resource('delegats','ControlPanel\DelegateController'); 
    Route::resource('orders','ControlPanel\OrderController'); 
    Route::resource('users','ControlPanel\userController'); 
    Route::resource('offers','ControlPanel\OfferController'); 
    Route::resource('support','ControlPanel\supportController'); 
    Route::resource('settings','ControlPanel\settingsController'); 
});