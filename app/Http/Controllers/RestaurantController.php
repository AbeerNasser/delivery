<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;
use App\Models\City;
use App\Models\District;
use App\Models\Group;
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
        $restaurant = District::find($request -> id);
        $city = District::with('city')->get();
        $groupName = City::with('group')->get();
        // $restaurants = Restaurant::get();
        //return response()->json($restaurants);  
        return $this -> returnData('groupName',$groupName);
    }

    public function show(Request $request)
    {
        $restaurant = Restaurant::find($request -> id);
        if(!$restaurant)
            return $this->returnError('001','هذاالمطعم غير موجود');
        return $this -> returnData('restaurant',$restaurant,'تم جلب البيانات بنجاح');
    }

    public function createOrder(Request $request){

        $restaurant = Restaurant::find($request -> id);
        $district = Restaurant::find($request -> district_id);
         
        //validation
        $storeData = $request->validate([
            // 'phone' => 'required',
            'order_price' => 'required',
            'total_price' => 'required',
            'order_status' => 'required',
            'payment_way' => 'required',
            'price' => 'required',
            //client_phone
            'phone' => 'required',
            'district_name' => 'required',
        ]);

        //store data in db

        //return json request


        //$employee = DB::table('viewemployeeparking')->simplePaginate(4);
        // $storeData = $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|max:255',
        //     'phone' => 'required|numeric',
        //     'password' => 'required|max:255',
        // ]);
        // $student = Student::create($storeData);

        // return redirect('/students')->with('completed', 'Student has been saved!');

        // $city = DB::select('select City_Id from city');
       
        // $request->validate(
        //     [
        //     'Parking_Name'=>'required',    
        //     'Capacity'=>'required',
        //     'Slot_FeesPerHour'=>'required',
        //     'latitude'=>'required',
        //     'longitude'=>'required'
        //     ]);
        // $data =$request->except(['_token']);
        // DB::table('parking')->insert($data);
        // return redirect('/parkings')->with('success','Parking Has Been Added');
    }
}
