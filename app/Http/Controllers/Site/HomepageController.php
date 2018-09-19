<?php

namespace App\Http\Controllers\Site;

use File;
use Image;
use Session;
use Purifier;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\HomepageRequest;
use App\Models\Pages\HomepageEntry;

class HomepageController extends Controller
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
        $entries = HomepageEntry::paginate(10);

        return view('admin.homepage.index')
                            ->withEntries($entries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homepage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Site\  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomepageRequest $request)
    {
        $entry = new HomepageEntry;

        $entry->title = $request->title;
        $entry->description = Purifier::clean($request->description);
        $entry->type = $request->type;
        $entry->url = $request->url;

        $entry->image = $this->uploadImage($request, null, $request->type);

        $entry->save();

        Session::flash('success', 'Created the Homepage Entry successfully!');

        return redirect()->route('admin.site.homepage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entry = HomepageEntry::find($id);

        return view('admin.homepage.show')
                                ->withEntry($entry);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entry = HomepageEntry::find($id);

        return view('admin.homepage.edit')
                                ->withEntry($entry);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Site\  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HomepageRequest $request, $id)
    {
        $entry = HomepageEntry::find($id);

        // Check type and delete image if there is a change
        if($entry->type != $request->type) {
            $this->validate($request, ['image' => 'required|image']);
            $this->deleteImage($entry->image);
        }

        $entry->title = $request->title;
        $entry->description = Purifier::clean($request->description);
        $entry->type = $request->type;
        $entry->url = $request->url;

        if($request->file('image')) {
            $entry->image = $this->uploadImage($request, $entry, $request->type);
        } else {
            $entry->image = $entry->image;
        }

        $entry->save();

        Session::flash('success', 'Saved the Homepage Entry successfully!');

        return redirect()->route('admin.site.homepage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entry = HomepageEntry::find($id);

        $this->deleteImage($entry->image);

        $entry->delete();

        Session::flash('success', 'Successfully deleted the homepage entry!');

        return redirect()->route('admin.site.homepage.index');
    }

    // Upload Image
    protected function uploadImage($request, $entry = NULL, $type = NULL) {
    
        // Check if the type exists
        if($type == NULL) {
            die('Entry Type has not been passed');
        }

        if($request->isMethod('PUT')) {
            // Check to see if part_id is null
            if($entry == NULL) {
                die('Homepage Entry Object has not been passed.');
            }
            // Delete old image
            $this->deleteImage($entry->image);
        }
        
        // Grab the file out of the request
        $image = $request->file('image');

        // Created a filename
        $filename = time() . '.' . $image->getClientOriginalExtension();

        // Save the entry Image
            // Choose a location for the file
            $location = public_path('images/homepage/' . $filename);
            // Create the Image, resize it, and save it to the path
            switch($type) {
                case "Carousel":
                    Image::make($image)->fit(1280,512)->save($location);
                    break;
                case "Card":
                    Image::make($image)->fit(140,140)->save($location);
                    break;
                case "Story":
                    Image::make($image)->fit(500,500)->save($location);
                    break;
            }

        // Put path into the DB
        return $filename;
    }

    // Delete Image
    public function deleteImage($image) {
        // Delete the old files
        File::delete('images/homepage/' . $image);
    }
}
