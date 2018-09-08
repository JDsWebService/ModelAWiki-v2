<?php

namespace App\Http\Controllers\Blog;

use Session;
use App\Models\Blog\Category;
use App\Traits\Blog\PostsTrait;
use App\Traits\Blog\CategoriesTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CategoryRequest;

class CategoriesController extends Controller
{   
    use PostsTrait;
    use CategoriesTrait;

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
        $categories = Category::paginate(10);

        return view('category.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check Authorization
        $this->authorize('category.create');

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // Check Authorization
        $this->authorize('category.create');
        
        $category = new Category;

        $this->processCategoryObject($category, $request);

        $category->save();

        Session::flash('success', 'Created the Category successfully!');

        return redirect()->route('category.index');
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
        $this->authorize('category.view');

        $category = Category::find($id);

        return view('category.show')->withCategory($category);
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
        $this->authorize('category.edit');

        $category = Category::find($id);

        return view('category.edit')->withCategory($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        // Check Authorization
        $this->authorize('category.update');

        $category = Category::find($id);

        $this->processCategoryObject($category, $request);

        $category->save();

        Session::flash('success', 'Saved the Category successfully!');

        return redirect()->route('category.index');
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
        $this->authorize('category.delete');

        $category = Category::find($id);

        $posts = $category->posts;

        foreach($posts as $post) {
            $post->tags()->detach();
            $this->deleteImage($post->image);
        }

        $category->delete();

        Session::flash('success', 'You deleted the category successfully!');

        return redirect()->route('category.index');
    }

    
}
