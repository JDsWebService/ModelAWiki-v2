<?php

namespace App\Http\Controllers\Parts;

use Session;
use App\Models\Parts\Section;
use App\Traits\Parts\SectionsTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Parts\SectionRequest;

class SectionsController extends Controller
{   
    use SectionsTrait;

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
        $sections = Section::paginate(10);

        return view('admin.part.section.index')->withSections($sections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check Authorization
        $this->authorize('part.section.create');

        return view('admin.part.section.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Parts\SectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        // Check Authorization
        $this->authorize('part.section.create');
        
        $section = new Section;

        $this->processSectionObject($section, $request);

        $section->save();

        Session::flash('success', 'Created the Section successfully!');

        return redirect()->route('part.section.index');
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
        $this->authorize('part.section.view');

        $section = Section::find($id);

        $parts = Section::find($id)->parts()->paginate(10);

        return view('admin.part.section.show')->withSection($section)->withParts($parts);
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
        $this->authorize('part.section.edit');

        $section = Section::find($id);

        return view('admin.part.section.edit')->withSection($section);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Parts\SectionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SectionRequest $request, $id)
    {
        // Check Authorization
        $this->authorize('part.section.update');

        $section = Section::find($id);

        $this->processSectionObject($section, $request);

        $section->save();

        Session::flash('success', 'Saved the Section successfully!');

        return redirect()->route('part.section.index');
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
        $this->authorize('part.section.delete');

        $section = Section::find($id);

        $section->delete();

        Session::flash('success', 'You deleted the section successfully!');

        return redirect()->route('part.section.index');
    }

    
}
