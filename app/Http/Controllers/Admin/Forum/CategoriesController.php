<?php

namespace App\Http\Controllers\Admin\Forum;

use App\Http\Controllers\Controller;
use App\Models\Forum\ForumCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{

    /**
     * Show the form for creating a new resource and display all the resource items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ForumCategory::paginate(10);
        $deletedCategories = ForumCategory::onlyTrashed()->get();

        return view('admin.forum.category.index')
                                ->withCategories($categories)
                                ->withDeletedCategories($deletedCategories);
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
            'name' => 'required|max:255|min:3|string|unique:forum_categories,name',
        ]);

        $category = new ForumCategory;

        $category->name = $request->name;
        $category->slug = str_slug($request->name, '-');
        $category->color = $request->color;

        $category->save();

        Session::flash('success', 'You have created the forum category successfully!');

        return redirect()->route('admin.forum.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $category = ForumCategory::where('slug', $slug)->first();

        return view('admin.forum.category.show')
                                ->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = ForumCategory::where('slug', $slug)->first();

        return view('admin.forum.category.edit')
                                ->withCategory($category);
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
            'name' => 'required|max:255|min:3|string|unique:forum_categories,name,' . $id,
        ]);

        $category = ForumCategory::find($id);

        $category->name = $request->name;
        $category->slug = str_slug($request->name, '-');
        $category->color = $request->color;

        $category->save();

        Session::flash('success', 'You have saved the forum category successfully!');

        return redirect()->route('admin.forum.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ForumCategory::find($id);

        $category->delete();

        Session::flash('success', 'You have successfully deleted the Forum Category');

        return redirect()->route('admin.forum.category.index');
    }

    /**
     * Restore the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $category = ForumCategory::withTrashed()->find($id);

        $category->restore();

        $categories = ForumCategory::paginate(10);
        $deletedCategories = ForumCategory::onlyTrashed()->get();

        return view('admin.forum.category.index')
                                ->withCategories($categories)
                                ->withDeletedCategories($deletedCategories);
    }
}
