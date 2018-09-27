<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserSocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $links = Auth::guard('admin')->user()->socialLinks()->get();

        return view('admin.profile.social.index')
                                ->withLinks($links);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.social.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'site' => 'required|string',
            'link' => 'required|active_url'
        ]);

        if($this->validateLink($request->link, $request->site)) {
            $user = Auth::guard('admin')->user();

            $link = UserSocialLink::where('admin_id', $user->id)->where('site', $request->site)->first();
            if(!$link) {
                $link = new UserSocialLink;
            }

            $link->admin_id = $user->id;
            $link->site = $request->site;
            $link->link = $request->link;
            $link->icon = $this->getIcon($request->site);

            $link->save();

            Session::flash('success', 'Added New Social Media Link');

            return redirect()->route('admin.profile.social-links.index');
        }

        // Something went wrong
        return redirect()->route('admin.profile.social-links.create');

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = UserSocialLink::find($id);

        return view('admin.profile.social.edit')
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
        $this->validate($request, [
            'site' => 'required|string',
            'link' => 'required|active_url'
        ]);

        if($this->validateLink($request->link, $request->site)) {
            $user = Auth::guard('admin')->user();

            $link = UserSocialLink::find($id);

            $link->admin_id = $user->id;
            $link->site = $request->site;
            $link->link = $request->link;
            $link->icon = $this->getIcon($request->site);

            $link->save();

            Session::flash('success', 'Added New Social Media Link');

            return redirect()->route('admin.profile.social-links.index');
        }

        // Something went wrong
        return redirect()->route('admin.profile.social-links.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = UserSocialLink::find($id);

        $link->delete();

        Session::flash('success', 'You have successfully deleted your social media link');

        return redirect()->route('admin.profile.social-links.index');
    }


    // Get the associated Social Media Site Icon
    protected function getIcon($site) {
        switch($site) {
            case 'facebook':
                return '/images/icons/facebook.png';
                break;
            case 'google':
                return '/images/icons/google-plus.png';
                break;
            case 'instagram':
                return '/images/icons/instagram.png';
                break;
            case 'pinterest':
                return '/images/icons/pinterest.png';
                break;
            case 'twitter':
                return '/images/icons/twitter.png';
                break;
        }
    }

    // Validate the link contains the site
    protected function validateLink($link, $site) {

        if(strpos($link, $site) == true) {
            return true;
        }

        Session::flash('danger', 'Your link isn\'t a ' . $site . ' link!');

        return false;

    }
}
