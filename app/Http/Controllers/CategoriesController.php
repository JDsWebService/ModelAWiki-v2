<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Category;
use App\Traits\PostsTrait;
use App\Traits\CategoriesTrait;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{   
    use PostsTrait;
    use CategoriesTrait;

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
        //
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
