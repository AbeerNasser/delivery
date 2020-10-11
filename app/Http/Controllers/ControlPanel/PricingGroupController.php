<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\District;
use App\Models\City;
use DB;

class PricingGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
    //     $groups = DB::table('cities')
    //     ->join('groups', 'cities.group_id', '=', 'groups.id')
    //     ->select('groups.*','cities.name as city_name')
    //     ->get();
    //     $cities=City::get(['name','id']);
    //     return view('pages/PricingGroup',['groups' => $groups,'cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // 
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except('_token','_method');
// dd($data);
        // $restaurant = Restaurant::find($id); 
        
        // $data[ 'restaurant_id']=$restaurant->id;

        $group = Group::insert($data);
    
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
       // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $groups=DB::delete('delete from groups where id = ?',[$id]);
        // return redirect('pages/PricingGroup');
    }
}
