<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['api','checkPassword'],
    'prefix' => 'delegates'

    ], function ($router) {
        Route::post('login', 'AuthController@login');
        Route::post('register', 'AuthController@register');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::get('user-profile', 'AuthController@userProfile');


    //     Route::post('getAllRestaurants', 'RestaurantController@index');
    //     Route::post('getRestaurantByID', 'RestaurantController@show');

});

//all routes / restaurant api authenticated
Route::group(['middleware' => ['api','checkPassword'] ], function () {
    
    Route::post('getAllRestaurants', 'RestaurantController@index');

    Route::group(['prefix' => 'restaurant'],function (){
        Route::post('register', 'AuthRestaurantController@register');
        Route::post('login', 'AuthRestaurantController@login');
        
        Route::group(['middleware' => ['checkRestaurantToken::restaurant-api']], function () {
            Route::post('getRestaurantByID', 'RestaurantController@show');
            Route::post('newOrder', 'RestaurantController@createOrder');
        
        });
    });

    // Route::group(['prefix' => 'delegate'],function (){
    //     Route::post('login', 'AuthDelegateController@login');
    //     Route::post('register', 'AuthDelegateController@register');
    // });

});