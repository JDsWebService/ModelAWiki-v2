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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::paginate(10);

        return view('part.section.index')->withSections($sections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('part.section.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Parts\SectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
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
        $section = Section::find($id);

        return view('part.section.show')->withSection($section);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = Section::find($id);

        return view('part.section.edit')->withSection($section);
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
        $section = Section::find($id);

        $section->delete();

        Session::flash('success', 'You deleted the section successfully!');

        return redirect()->route('part.section.index');
    }

    
}
