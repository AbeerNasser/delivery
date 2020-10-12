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
        // $districts = District::get('name');

        //price for every district
        $districts = DB::table('districts')
            // ->join('cities', 'districts.city_id', '=', 'cities.id')
            ->join('groups', 'districts.group_id', '=', 'groups.id')
            ->select('districts.id', 'districts.name', 'groups.price')
            ->get();

        // $data['districtsPrice']=$districtsPrice;
        $data['enum']=$enum;
        $data['districts']=$districts;
      
        return $this -> returnData('data',$data,'سعر التوصيل لكل حي');
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

        return $this -> returnData('data',$order,'تم تقديم الطلب بنجاح');
    }

    public function orderTracking(Request $request)
    {
        $order = Order::select('id','order_price',
        'address', 'order_status')->where('id', $request -> id)
        ->addSelect(['delegate_phone' => Delegate::select('phone')
        ->whereColumn('id', 'orders.delegate_id')])
        ->get();
        $ord = Order::find($request -> id);
        if(!$ord)
            return $this->returnError('S001','');
        return $this -> returnData('data',$order,'تتبع الطلب');  
    }

    public function restOrders(Request $request)
    {
        $orders = Order::orderBy('created_at', 'desc')->where('restaurant_id',$request->id)->get();
        
        $ord = Restaurant::find($request -> id);
        if(!$ord)
            return $this->returnError('S001','');
        return $this -> returnData('data',$orders,'الطلبات من الاحدث الي الاقدم');

    }

    public function show(Request $request)
    {
        $order = Order::find($request -> id);
        if(!$order)
            return $this->returnError('001','هذاالطلب غير موجود');
        return $this -> returnData('data',$order,'تم جلب البيانات الطلب بنجاح');
    }

}
