<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Delegate;
use App\Models\Order;
use App\Models\Wallet;
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
        $orders = Order::select('id','created_at')
        ->where('order_status','==',0)
        ->where('delegate_id',null)
        ->addSelect(['restaurant_name' => Restaurant::select('name')
        ->whereColumn('id', 'orders.restaurant_id')
        ])->get();
        return $this -> returnData('data',$orders,'الطلبات المتاحه للتوصيل');
    }

    public function OrderDetails(Request $request)
    {
        $order = Order::select('id','total_price')->where('order_status','==',0)
        ->addSelect(['restaurant_name' => Restaurant::select('name')
        ->whereColumn('id', 'orders.restaurant_id'),
        'restaurant_address' => Restaurant::select('address')
        ->whereColumn('id', 'orders.restaurant_id')
        ])->find($request -> id);

        return $this -> returnData('data',$order,'تفاصيل الطلب');
    }

    public function allMyOrders(Request $request)
    {
        $orders = Order::select('id','order_status','total_price','order_price','created_at')
        ->where('delegate_id','=', $request->id)
        ->where('order_status','=',2)
        ->addSelect(['restaurant_name' => Restaurant::select('name')
        ->whereColumn('id', 'orders.restaurant_id')
        ])->get();
        return $this -> returnData('data',$orders,'جميع طلباتي');
    }

    public function myOrderDetails(Request $request)
    {
        $order = Order::select('total_price','order_price','address',
        'order_status','date')
        ->where('delegate_id','=', $request->delegate_id)
        ->addSelect(['restaurant_name' => Restaurant::select('name')
        ->whereColumn('id', 'orders.restaurant_id'),
        'restaurant_address' => Restaurant::select('address')
        ->whereColumn('id', 'orders.restaurant_id')])
        ->addSelect(['delegate_status' => Delegate::select('delegate_status')
        ->whereColumn('id', 'orders.delegate_id')])
        ->find($request -> id);

        $order -> delivery_price = $order->total_price - $order -> order_price;

        return $this -> returnData('data',$order,'تفاصيل الطلب');
    }

    public function myOrdersOnDelivery(Request $request)
    {
        $orders = Order::select('id','order_status')
        ->where('delegate_id','=', $request->id)
        ->where('order_status','!=', 2)
        ->addSelect(['restaurant_name' => Restaurant::select('name')
        ->whereColumn('id', 'orders.restaurant_id')])->get();
        // ->addSelect(['delegate_status' => Delegate::select('delegate_status')
        // ->whereColumn('id', 'orders.delegate_id')])
        
        return $this -> returnData('data',$orders,'طلباتي التي قيد التوصيل حتي الان');
    }

    public function chooseOrder(Request $request)
   {
        $data =$request->all();
        
        $delegateStatus=Delegate::where('id',$request->delegate_id)
        ->pluck('delegate_status')->first();

        if ($delegateStatus==0) {

            $order = DB::table('orders')
            ->where('id', $request->order_id)
            ->update(['order_status' => 0,'delegate_id'=>$request->delegate_id,'date'=>\Carbon\Carbon::parse($request->date)->timestamp]);
            
            $delegateStatus = DB::table('delegates')
           ->where('id', $request->delegate_id)
           ->update(['delegate_status' => 1]);


            return $this -> returnData('data',$order,'تم اختيار الطلب');   
        } 
        return $this -> returnError('000','هذا المندوب  معه طلب اخر');
   }

   public function startDelivery(Request $request)
   {
        $data =$request->all();
        
        $delegateStatus=Delegate::where('id',$request->delegate_id)
        ->pluck('delegate_status')->first();

        
       $deledateID=Order::where('delegate_id',$request->delegate_id)->pluck('id')->first();

        if ($delegateStatus==1 && $deledateID) {
            $order = DB::table('orders')
            ->where('id', $request->order_id)
            ->update(['order_status' => 1]);

            return $this -> returnData('data',$order,'تم قبول الطلب');
        }
        return $this -> returnError('000','');
   }

   public function finishRequest(Request $request)
   {
        $total_price=0;  
        $data =$request->all();
        
        $delegateStatus=Delegate::where('id',$request->delegate_id)
        ->pluck('delegate_status')->first();

       $orderStatus=Order::where('delegate_id',$request->delegate_id)->pluck('order_status')->first();

        if ($delegateStatus==1 && $orderStatus==1) 
        {
            $order = Order::where('id', $request->order_id)
            ->update(['order_status' => 2]);

            $delegateStatus = Delegate::where('id', $request->delegate_id)
            ->update(['delegate_status' => 0]);
           
            $ord = Order::where('delegate_id',$request->delegate_id)
                ->join('restaurants', 'orders.restaurant_id', '=', 'restaurants.id')
                ->join('districts', 'restaurants.district_id', '=', 'districts.id')
                ->join('cities', 'districts.city_id', '=', 'cities.id')
                ->join('groups', 'cities.group_id', '=', 'groups.id')
                ->select('groups.price', 'groups.percentage')
                ->first();
           
            $money = $ord -> price * $ord -> percentage;

            $total_price  = $total_price + $money;

            // $order -> money = $order -> price * $order -> percentage;
            // $order-> total_price  = + $order -> money;

            Wallet::insert(
                ['order_id'=>$request->order_id,
                'delegate_id' => $request->delegate_id,
                'money' => $money,
                'created_at'=>Carbon\Carbon::now(),
                'updated_at'=> now()
                ]
            );
           
        
            Delegate::where('id', $request->delegate_id)
            ->update(['total_price' => $total_price]);

           return $this -> returnData('data',$order,' تم تسليم الطلب الي العميل');
       }
        return $this -> returnError('000','');
   }

}
