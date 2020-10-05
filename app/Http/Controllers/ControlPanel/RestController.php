<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\District;
use App\Models\City;
use DB;

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
        //
    }

    // public function destroy(Artikel $artikel)
    // {
    //     $result = $artikel->delete();
    //     if ($result == true){
    //         http_response_code(204);
    //     } else {
    //         http_response_code(404);
    //     }
    //     return;
    // }
}
