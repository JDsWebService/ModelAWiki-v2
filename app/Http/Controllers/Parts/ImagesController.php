<?php

namespace App\Http\Controllers\Parts;

use App\Http\Controllers\Controller;
use App\Models\Parts\Image;
use App\Models\Parts\Part;
use App\Traits\Parts\PartImagesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;

class ImagesController extends Controller
{

    use PartImagesTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function publicIndex(Request $request)
    {
        $part = Part::where('slug', $request->route('slug'))->first();
        $images = Image::where('part_id', $part->id)->where('approved', '1')->get();

        if(!$images->count()) {
            Session::flash('warning', 'There are no more images yet for this part!');

            return redirect()->route('wiki.part', $part->slug);
        }

        return view('wiki.partGallery')
                                ->withPart($part)
                                ->withImages($images);

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
            'caption' => 'required|max:300|min:25|string',
            'image' => 'required|image'
        ]);

        $partSlug = $request->route('slug');
        $part = Part::where('slug', $partSlug)->first();

        $partImage = new Image;

        $partImage->part_id = $part->id;
        $partImage->user_id = Auth::guard('user')->user()->id;
        $partImage->approved = 0;
        $partImage->caption = Purifier::clean($request->caption);
        $partImage->image = $this->uploadImage($request, $part);

        $partImage->save();

        Session::flash('success', 'Your Image Has Been Submitted. The Admin Team Will Review Your Submission Soon!');

        return redirect()->route('wiki.part', $part->slug);

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
