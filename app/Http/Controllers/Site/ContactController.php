<?php

namespace App\Http\Controllers\Site;

use Session;
use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = SiteSetting::all()->first();

        // dd($settings->id);

        return view('admin.site.contact')
                        ->withSettings($settings);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        $this->validate($request, [
            'phone' => 'sometimes|string',
            'email' => 'sometimes|email',
            'address' => 'sometimes|string'
        ]);

        if($id) {
            $settings = SiteSetting::find($id);
        } else {
            $settings = new SiteSetting;
        }

        $settings->phone = $request->phone;
        $settings->email = $request->email;
        $settings->address = $request->address;

        $settings->timestamps = false;
        $settings->save();

        Session::flash('success', 'Contact Page Settings have been updated');

        return redirect()->route('admin.dashboard');
    }
}
