<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Delegate;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\CustomerSupport;
use Illuminate\Http\Request;
use DB;
use App\Traits\GeneralTrait;

class DelegateController extends Controller
{
    use GeneralTrait;

    public function AvailableOrdersDelivery()
    {
        $orders = Order::select('id','created_at')->where('order_status','==',0)->addSelect(['restaurant_name' => Restaurant::select('name')
        ->whereColumn('id', 'orders.restaurant_id')
        ])->get();
        return $this -> returnData('orders',$orders,'الطلبات المتاحه للتوصيل');
    }

    public function OrderDetails(Request $request)
    {
        $order = Order::select('id','total_price')->where('order_status','==',0)
        ->addSelect(['restaurant_name' => Restaurant::select('name')
        ->whereColumn('id', 'orders.restaurant_id'),
        'restaurant_address' => Restaurant::select('address')
        ->whereColumn('id', 'orders.restaurant_id')
        ])->find($request -> id);

        return $this -> returnData('order',$order,'تفاصيل الطلب');
    }

    public function allMyOrders(Request $request)
    {
        $orders = Order::select('id','order_status')->where('delegate_id','=', $request->id)->addSelect(['restaurant_name' => Restaurant::select('name')
        ->whereColumn('id', 'orders.restaurant_id')
        ])->get();
        return $this -> returnData('myOrders',$orders,'جميع طلباتي');
    }

    public function myOrderDetails(Request $request)
    {
        $order = Order::select('total_price','order_price','address','order_status')
        ->where('delegate_id','=', $request->delegate_id)
        ->addSelect(['restaurant_name' => Restaurant::select('name')
        ->whereColumn('id', 'orders.restaurant_id'),
        'restaurant_address' => Restaurant::select('address')
        ->whereColumn('id', 'orders.restaurant_id')
        ])->find($request -> id);

        $order -> delivery_price = $order->total_price - $order -> order_price;

        return $this -> returnData('myOrder',$order,'تفاصيل الطلب');
    }

    public function myOrdersOnDelivery(Request $request)
    {
        $orders = Order::select('id')
        ->where('delegate_id','=', $request->id)
        ->where('order_status','==', 0)
        ->addSelect(['restaurant_name' => Restaurant::select('name')
        ->whereColumn('id', 'orders.restaurant_id')
        ])->get();
        return $this -> returnData('myDeliveryOrders',$orders,'طلباتي التي قيد التوصيل حتي الان');
    }
}
