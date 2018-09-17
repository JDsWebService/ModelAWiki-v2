<?php

namespace App\Http\Controllers\Site;

use Session;
use App\Models\Admin\SocialLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialLinksController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = SocialLink::paginate(20);

        return view('admin.social_links.index')
                                ->withLinks($links);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social_links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the Input
        $this->validate($request, [
            'name' => 'required|max:255|string',
            'link' => 'required|active_url|max:255'
        ]);

        // Store the Input
        $link = new SocialLink;

        $link->name = $request->name;
        $link->link = $request->link;

        $link->save();

        // Flash the session
        Session::flash('success', 'You have saved the link successfully!');

        // Redirect
        return redirect()->route('admin.site.social-links.index');
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
        $link = SocialLink::find($id);

        return view('admin.social_links.edit')
                                ->withLink($link);
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
        // Validate the Input
        $this->validate($request, [
            'name' => 'required|max:255|string',
            'link' => 'required|active_url|max:255'
        ]);

        // Store the Input
        $link = SocialLink::find($id);

        $link->name = $request->name;
        $link->link = $request->link;

        $link->save();

        // Flash the session
        Session::flash('success', 'You have saved the link successfully!');

        // Redirect
        return redirect()->route('admin.site.social-links.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = SocialLink::find($id);

        $link->delete();

        Session::flash('success', 'The link has been successfully deleted');

        return redirect()->route('admin.site.social-links.index');
    }
}
