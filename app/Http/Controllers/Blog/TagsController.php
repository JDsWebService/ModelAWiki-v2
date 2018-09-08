<?php

namespace App\Http\Controllers\Blog;

use Session;
use App\Models\Blog\Tag;
use App\Traits\Blog\TagsTrait;
use App\Http\Requests\Blog\TagRequest;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{

    use TagsTrait;

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
        $tags = Tag::paginate(10);

        return view('tag.index')->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check Authorization
        $this->authorize('tag.create');

        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {   
        // Check Authorization
        $this->authorize('tag.create');
        
        $tag = new Tag;

        $this->processTagObject($tag, $request);

        $tag->save();

        Session::flash('success', 'Created Tag Successfully!');

        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Check Authorization
        $this->authorize('tag.view');

        $tag = Tag::find($id);

        return view('tag.show')->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Check Authorization
        $this->authorize('tag.edit');

        $tag = Tag::find($id);

        return view('tag.edit')->withTag($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TagRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        // Check Authorization
        $this->authorize('tag.update');

        $tag = Tag::find($id);

        $this->processTagObject($tag, $request);

        $tag->save();

        Session::flash('success', 'Saved Tag Successfully!');

        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Check Authorization
        $this->authorize('tag.delete');

        $tag = Tag::find($id);

        $tag->posts()->detach();

        $tag->delete();

        Session::flash('success', 'Tag has been deleted!');

        return redirect()->route('tag.index');
    }
}
