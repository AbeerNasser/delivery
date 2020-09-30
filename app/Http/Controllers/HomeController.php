<?php
//admin auth
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Restaurant;
use App\Models\Delegate;
use App\Models\City;
use App\Models\Group;
use App\Models\District;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */

    //مدير دعم فني 
    public function index()
    {
        return view('pages/support');
    }

    //مدير عام 
    public function handleAdmin()
    {
        $users = User::select('*')->get();
        $districts = District::select('*')->get();
        $cities = City::select('*')->get();
        $groups = Group::select('*')->get();
        $delegates = Delegate::select('*')->get();
        $restaurants = Restaurant::select('*')->get();
        //dd($users);
        return view("pages/dashboard", 
        compact('users','districts','cities','groups','delegates','restaurants'));
    } 
}
