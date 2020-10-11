<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\District;
use App\Models\City;
use App\Models\Group;
use DB;
use Illuminate\Support\Facades\Hash;

class RestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = DB::table('restaurants')
        ->join('districts', 'restaurants.district_id', '=', 'districts.id')
        ->join('cities', 'districts.city_id', '=', 'cities.id')
        ->select('restaurants.*','cities.name as city_name', 'districts.name as district_name')
        ->get();
        // ->take(4);
        // dd($restaurants);
        return view('pages/restaurants', ['restaurants' => $restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/addNewRest');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requesont  $request
     * @return \Illuminate\Http\Respse
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'name'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
            'notes'=>'nullable|data',
        ]);

        // $data['password']=$request->restaurant()->fill([
        //     'password' => Hash::make($request->password)
        // ])->save();

        // $data['password'] = bcrypt($request->password);
        $data=$request->all();

        $restaurant = Restaurant::create($data);

        return redirect('admin/restaurants')->with('succeess','inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = DB::table('restaurants')
        ->where('restaurants.id',$id)
        ->join('districts', 'restaurants.district_id', '=', 'districts.id')
        ->join('cities', 'districts.city_id', '=', 'cities.id')
        ->select('restaurants.*','cities.name as city_name', 'districts.name as district_name')
        ->get();

        return view('pages/restaurant', ['restaurant' => $restaurant[0]]);
    }

    public function showGroups($id)
    {
        $groups = DB::table('restaurants')
        ->join('districts', 'restaurants.district_id', '=', 'districts.id')
        ->join('cities', 'districts.city_id', '=', 'cities.id')
        ->join('groups', 'cities.group_id', '=', 'groups.id')
        ->select('groups.*','cities.name as city_name','districts.name as district_name')
        ->where('restaurants.id',$id)
        ->get();
        // $groups = DB::table('cities')
        // ->join('groups', 'cities.group_id', '=', 'groups.id')
        // ->select('groups.*','cities.name as city_name')
        // ->get();

        $districts=Restaurant::where('id',$id)->with('district')->get();
        //dd($districts);
        return view('pages/PricingGroup',['groups' => $groups,'districts' => $districts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::find($id);
        return view('pages/addNewRest', ['restaurant' => $restaurant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $data = $request->validate([
            'name'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
            'notes'=>'nullable|data',
        ]);
        //$data-> password =$request->password = bcrypt('JohnDoe');
        $data=$request->except(['_method','_token','password_confirmation']);
        $restaurant = Restaurant::where('id', '=', $id)->update($data);

        return redirect('admin/restaurants')->with('succeess','updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $restaurant=DB::delete('delete from restaurants where id = ?',[$id]);
        // return redirect('/restaurants');
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();
        
        return redirect('admin/restaurants');
    }
}
