<?php

namespace App\Http\Controllers\Site;

use Session;
use Purifier;
use App\Http\Controllers\Controller;
use App\Models\Pages\About;
use Illuminate\Http\Request;

class AboutController extends Controller
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
        $settings = About::all()->first();

        return view('admin.site.about')
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
            'mission_statement' => 'sometimes|string',
            'our_story' => 'sometimes|string'
        ]);

        if($id) {
            $settings = About::find($id);
        } else {
            $settings = new About;
        }

        $settings->mission_statement = Purifier::clean($request->mission_statement);
        $settings->our_story = Purifier::clean($request->our_story);

        $settings->timestamps = false;
        $settings->save();

        Session::flash('success', 'About Page has been updated');

        return redirect()->route('admin.dashboard');
    }

}
