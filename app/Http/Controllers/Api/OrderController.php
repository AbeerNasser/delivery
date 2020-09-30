<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\District;
use App\Models\Restaurant;
use App\Models\Delegate;
use App\Traits\GeneralTrait;


class OrderController extends Controller
{
    use GeneralTrait;
    
    public function createOrder(Request $request)
    {
        //payment_ways enum values
        $type = DB::select( DB::raw("SHOW COLUMNS FROM orders WHERE Field = 'payment_way'") )[0]->Type;
        preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
        $enum = explode("','", $matches[1]);

        //all districts
        $districts = District::get('name');

        //price for every district
        $districtsPrice = DB::table('districts')
            ->join('cities', 'districts.city_id', '=', 'cities.id')
            ->join('groups', 'cities.group_id', '=', 'groups.id')
            ->select('districts.id', 'districts.name', 'groups.price')
            ->get();

        $data['districtsPrice']=$districtsPrice;
        $data['enum']=$enum;
        $data['districts']=$districts;
      
        return $this -> returnData('new order',$data,'سعر التوصيل لكل حي');
    }

    public function storeOrder(Request $request)
    {
        $restaurant = Restaurant::find($request -> id);

        //validation
        $request->validate([
            'order_price' => 'required',
            // 'order_status' => 'required',
            'payment_way' => 'required',
            // 'price' => 'required',//delivery_price
            'phone' => 'required',//client_phone
            'address' => 'required',//district_name
        ]);

        $data =$request->all();
        $request->total_price = $request -> order_price + $request -> price;
        $total_price= $request->total_price;
        $data['total_price']=$total_price;
        $data['restaurant_id']=$request -> id;

        $order = Order::create($data);

        return $this -> returnData('newOrder',$order,'تم تقديم الطلب بنجاح');
    }

    public function orderTracking(Request $request)
    {
        $order = Order::select('id','order_price',
        'address', 'order_status')->where('id', $request -> id)
        ->addSelect(['delegate_phone' => Delegate::select('phone')
        ->whereColumn('id', 'orders.delegate_id')])
        ->get();
        return $this -> returnData('order',$order,'تتبع الطلب');
    }

    public function index()
    {
         $orders = Order::orderBy('created_at', 'desc')->get(['id','order_price','created_at']);
        return $this -> returnData('orders',$orders,'الطلبات من الاحدث الي الاقدم');
    }

    public function show(Request $request)
    {
        $order = Order::find($request -> id);
        if(!$order)
            return $this->returnError('001','هذاالطلب غير موجود');
        return $this -> returnData('order',$order,'تم جلب البيانات الطلب بنجاح');
    }

//get all active users only
//     $users = App\User::all();

// $names = $users->reject(function ($user) {
//     return $user->active === false;
// })
// ->map(function ($user) {
//     return $user->name;
// });
}
