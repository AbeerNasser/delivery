<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;

class RestaurantController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $restaurant = District::find($request -> id);
        // $city = District::with('city')->get();
        // $groupName = City::with('group')->get();
        $restaurants = Restaurant::get();
        return $this -> returnData('restaurants',$restaurants);
    }

    public function show(Request $request)
    {
        $restaurant = Restaurant::find($request -> id);
        if(!$restaurant)
            return $this->returnError('001','هذاالمطعم غير موجود');
        return $this -> returnData('restaurant',$restaurant,'تم جلب البيانات بنجاح');
    }
}
