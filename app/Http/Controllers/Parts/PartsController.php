<?php

namespace App\Http\Controllers\Parts;


use Session;
use App\Models\Parts\Part;
use App\Models\Parts\Section;
use App\Traits\Parts\PartsTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Parts\PartRequest;


class PartsController extends Controller
{

	use PartsTrait;

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
        $parts = Part::orderBy('part_number', 'desc')->paginate(10);

        return view('part.index')->withParts($parts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check Authorization
        $this->authorize('part.create');

        $sections = Section::orderBy('name', 'asc')->get();

        if(!$this->doSectionsExist($sections)) {
        	return redirect()->route('part.section.index');
        }

        return view('part.create')->withSections($sections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Parts\PartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartRequest $request)
    {   
        // Check Authorization
        $this->authorize('part.create');
        
        // Create a new Part Object
        $part = New Part;

        // Process the Part Object using the Request
        $this->processPartObject($part, $request);

        // Save the part into the database
        $part->save();

        // Flash the Session
        Session::flash('success', 'Part has successfully been added into the database');

        // Return the redirect
        return redirect()->route('part.index');
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
        $this->authorize('part.view');

        $part = Part::find($id);

        return view('part.show')->withPart($part);
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
        $this->authorize('part.edit');

        // Grab the Part from the Database using the Part Number
        $part = Part::find($id);

        // Grab the Start Month, Start Year, End Month, and End Year
        $part->date_start_month = $this->getMonth($part->date_start);
        $part->date_start_year = $this->getYear($part->date_start);
        $part->date_end_month = $this->getMonth($part->date_end);
        $part->date_end_year = $this->getYear($part->date_end);

        // Get all the sections as a collection
        $sections = Section::orderBy('name', 'asc')->get();

        // Return the view with the part variable
        return view('part.edit')
                                ->withPart($part)
                                ->withSections($sections);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Parts\PartRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartRequest $request, $id)
    {
        // Check Authorization
        $this->authorize('part.update');

        // Grab the Part from the database
        $part = Part::find($id);

        // Process the Part Object using the Request
        $this->processPartObject($part, $request);

        // Save the part into the database
        $part->save();

        // Flash the Session
        Session::flash('success', 'Part has successfully been changed.');

        // Return the redirect
        return redirect()->route('part.index');
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
        $this->authorize('part.delete');

        $part = Part::find($id);

        $this->deleteImages($part->featured_image);

        $part->delete();

        Session::flash('success', 'The part has been successfully deleted');

        return redirect()->route('part.index');
    }
}
