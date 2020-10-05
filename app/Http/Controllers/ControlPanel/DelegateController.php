<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delegate;

class DelegateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delegats = Delegate::get();
        return view('pages/salesReps', ['delegats' => $delegats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/addNewSalesRep');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required',
            'sn_no'=>'required',
            'phone'=>'required',
            'password'=>'required|confirmed',
            'sn_img'=>'mimes:png,jpg,jpeg,svg|max:1024',
            'notes'=>'nullable|data',
        ]);

        $delegate = DB::select('select max(id) from delegates');
       
        $newID = get_object_vars($delegate[0]);
        foreach($newID as $maxID)
        $maxID+=1;
        
        $delegateId=DB::update('ALTER TABLE delegates AUTO_INCREMENT ='.$maxID);

        $imgName = $maxID.'.'.$request->sn_img->extension();
        $request->sn_img->move(public_path('img'),$imgName);
        // $data =$request->except(['_token','_method']);
        $data=$request->all();
        $data['sn_img']=$imgName;
        $data['id']=$delegateId;
dd($data);
        $delegate = Delegate::create($data);

        return redirect('admin/delegats')->with('success','inserted');
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
        //
    }
}
