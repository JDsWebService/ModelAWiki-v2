<?php

namespace App\Http\Controllers\Site;

use Purifier;
use Session;
use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingsController extends Controller
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

        return view('admin.site.setting')
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
            'tos' => 'sometimes|string',
            'privacy' => 'sometimes|string'
        ]);

        if($id) {
            $settings = SiteSetting::find($id);
        } else {
            $settings = new SiteSetting;
        }

        $settings->tos = Purifier::clean($request->tos);
        $settings->privacy = Purifier::clean($request->privacy);

        $settings->timestamps = false;
        $settings->save();

        Session::flash('success', 'Site Terms of Service and Privacy Policy Page(s) has been updated');

        return redirect()->route('admin.dashboard');
    }
}
