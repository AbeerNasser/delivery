<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Settings_email;
use App\Models\Settings_phone;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/settings');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        
        // $data = $request->validate([
        //     // 'email01'=>'required|email',
        //     // 'email02'=>'email',
        //     // 'email03'=>'email',
        //     // 'email04'=>'email',
        //     // 'phone01'=>'required',
        //     // 'phone02'=>'required',
        //     // 'phone03'=>'required',
        //     // 'phone04'=>'required',
        //     // 'website_link'=>'required',
        //     // 'facebook_link'=>'required',
        //     // 'instgram_link'=>'required',
        //     // 'youtube_link'=>'required',
        //     // 'twitter_link'=>'required',
        // ]);
        // $data=$request->all();

        // $settings = Setting::create($data);

        // return redirect('admin/settings')->with('succeess','inserted');
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
        //
    }
}
