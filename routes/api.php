<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::group([
//     'middleware' => ['api','checkPassword'],
//     'prefix' => 'delegates'

//     ], function ($router) {
//         Route::post('login', 'AuthController@login');
//         Route::post('register', 'AuthController@register');
//         Route::post('logout', 'AuthController@logout');
//         Route::post('refresh', 'AuthController@refresh');
//         Route::get('user-profile', 'AuthController@userProfile');


//     //     Route::post('getAllRestaurants', 'RestaurantController@index');
//     //     Route::post('getRestaurantByID', 'RestaurantController@show');

// });


Route::group(['middleware' => ['api','checkPassword'] ], function () {

    //Restaurants apis
    Route::post('getAllRestaurants', 'RestaurantController@index');

    Route::group(['prefix' => 'restaurant'],function (){
        Route::post('register', 'AuthRestaurantController@register');
        Route::post('login', 'AuthRestaurantController@login');
        
        Route::group(['middleware' => ['checkRestaurantToken::restaurant-api']], function () {
            Route::post('getRestaurantByID', 'RestaurantController@show');
            Route::post('newOrder', 'OrderController@createOrder');
            Route::post('confirmOrder', 'OrderController@storeOrder');
            Route::post('orderTracking', 'OrderController@orderTracking');
            Route::post('allOrders', 'OrderController@index');
            Route::post('getOrderByID', 'OrderController@show');

            Route::post('requestTechnicalSupport', 'TechnicalSupportController@requestTechnicalSupport');
                       

        });
    });

    //Delegates apis
    Route::group(['prefix' => 'delegate'],function (){
        Route::post('register', 'AuthDelegateController@register');
        Route::post('login', 'AuthDelegateController@login');
        
        Route::group(['middleware' => ['checkDelegateToken::delegate-api']], function () {

            Route::post('availableOrdersDelivery','DelegateController@AvailableOrdersDelivery');
            Route::post('allMyOrders','DelegateController@allMyOrders');
            Route::post('myOrdersOnDelivery','DelegateController@myOrdersOnDelivery');
            Route::post('orderDetails', 'DelegateController@OrderDetails');
            Route::post('myOrderDetails', 'DelegateController@myOrderDetails');
            Route::post('requestDelegateTechnicalSupport', 'TechnicalSupportController@requestDelegateTechnicalSupport');
            // Route::post('confirmOrder', 'OrderController@storeOrder');
            // Route::post('orderTracking', 'OrderController@orderTracking');
            // Route::post('allOrders', 'OrderController@index');                       
        });
    });

});