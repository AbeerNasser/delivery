<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['api','checkPassword'] ], function () {

    //Restaurants apis
    Route::post('getAllRestaurants', 'Api\RestaurantController@index');

    Route::group(['prefix' => 'restaurant'],function (){
        Route::post('register', 'Api\AuthRestaurantController@register');
        Route::post('login', 'Api\AuthRestaurantController@login');
        
        Route::group(['middleware' => ['checkRestaurantToken::restaurant-api']], function () {
            Route::post('getRestaurantByID', 'Api\RestaurantController@show');
            Route::post('newOrder', 'Api\OrderController@createOrder');
            Route::post('confirmOrder', 'Api\OrderController@storeOrder');
            Route::post('orderTracking', 'Api\OrderController@orderTracking');
            Route::post('allOrders', 'Api\OrderController@index');
            Route::post('getOrderByID', 'Api\OrderController@show');

            Route::post('requestTechnicalSupport', 'Api\TechnicalSupportController@requestTechnicalSupport');
                       

        });
    });

    //Delegates apis
    Route::group(['prefix' => 'delegate'],function (){
        Route::post('register', 'Api\AuthDelegateController@register');
        Route::post('login', 'Api\AuthDelegateController@login');
        
        Route::group(['middleware' => ['checkDelegateToken::delegate-api']], function () {

            Route::post('availableOrdersDelivery','Api\DelegateController@AvailableOrdersDelivery');
            Route::post('allMyOrders','Api\DelegateController@allMyOrders');
            Route::post('myOrdersOnDelivery','Api\DelegateController@myOrdersOnDelivery');
            Route::post('orderDetails', 'Api\DelegateController@OrderDetails');
            Route::post('myOrderDetails', 'Api\DelegateController@myOrderDetails');
            Route::post('requestDelegateTechnicalSupport', 'Api\TechnicalSupportController@requestDelegateTechnicalSupport');
            // Route::post('confirmOrder', 'OrderController@storeOrder');
            // Route::post('orderTracking', 'OrderController@orderTracking');
            // Route::post('allOrders', 'OrderController@index');                       
        });
    });

});