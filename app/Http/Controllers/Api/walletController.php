<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delegate;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\City;
use App\Models\District;
use App\Models\Group;
use App\Models\Wallet;
use DB;
use App\Traits\GeneralTrait;

class walletController extends Controller
{
    use GeneralTrait;
    
    public function addToWallet(Request $request)
    {
         $data =$request->all();
         
         $delegateStatus=Delegate::where('id',$request->delegate_id)
         ->pluck('delegate_status')->first();
         
        $order_status=Order::where('delegate_id',$request->delegate_id)->pluck('order_status')->first();
       // $orderID=Order::where('delegate_id',$request->delegate_id)->pluck('id')->first();
        
       if ($delegateStatus==0 && $order_status==2) 
       {

        $walets = Wallet::where('delegate_id',$request->delegate_id)
        ->get();

        $delegate=Delegate::select('total_price')->where('id',$request->delegate_id)
        ->get();
        
        $wallet['walets']=$walets;
        $wallet['total_price']=$delegate;

        // $orders =Wallet::select('*')->addSelect(['order' => Restaurant::select('*')
        //     ->whereColumn('id', 'wallets.order_id')])
        //     ->get();
        // $orders = Wallet::where('delegate_id',$request->delegate_id)
        //     ->join('orders', 'orders.id', '=', 'wallets.order_id') 
        //     ->select('*')
        //     ->get();


            // $restaurant_id=Order::where('delegate_id',$request->delegate_id)
            // ->with('restaurant')
            // ->pluck('restaurant_id')->first();

            // $district_id=Restaurant::where('id',$restaurant_id)
            // ->with('restaurant')
            // ->pluck('district_id')->first();

            // $city_id=District::where('id',$district_id)
            // ->with('district')
            // ->pluck('city_id')->first();

            // $group_id=City::where('id',$city_id)
            // ->with('city')
            // ->pluck('group_id')->first();

            // $orders =Order::addSelect(['restaurant_id' => Restaurant::select('name')
            // ->whereColumn('id', 'orders.restaurant_id')])
            // ->get(['restaurants.name','groups.price', 'groups.percentage','orders.created_at']);
            
            // $order = Order::where('delegate_id',$request->delegate_id)
            // ->join('restaurants', 'orders.restaurant_id', '=', 'restaurants.id')
            // ->join('districts', 'restaurants.district_id', '=', 'districts.id')
            // ->join('cities', 'districts.city_id', '=', 'cities.id')
            // ->join('groups', 'cities.group_id', '=', 'groups.id')
            // ->select('orders.id','restaurants.name','groups.price', 'groups.percentage','orders.created_at')
            // ->get();
            
            
           // $order -> money = $order -> price * $order -> percentage;
            // $order-> total_price  = + $order -> money;

            // DB::table('wallets')->insert(
            //     ['order_id'=>$order->id,'delegate_id' => $request->delegate_id, 'money' =>  $order -> money]
            // );
           
            // $delegate=Delegate::where('id',$request->delegate_id)
            // ->update(['total_price' => $order-> total_price]);


            return $this -> returnData('data',$wallet,' تم اضافه النسبه الي حسابك');
        }
        return $this -> returnError('000','');
    }
}
