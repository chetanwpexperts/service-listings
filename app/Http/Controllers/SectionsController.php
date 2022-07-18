<?php

namespace App\Http\Controllers;

use App\Models\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

class SectionsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();
	    $sections = Sections::paginate(20);
		return view('admin.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'section_heading' => 'required|max:255',
            'section_name' => 'required|max:255',
        ]);
		$sectionData = new Sections();
		$sectionData['section_heading'] = $request->section_heading;
		$sectionData['section_name'] = $request->section_name;
		$sectionData['description'] = $request->description;
		if($request->file('image'))
		{
			$file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/sections'), $filename);
            $sectionData['image'] = $filename;
		}
		$sectionData->save();
        return redirect()->route('sections')->with('success', 'Section is successfully cerated.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(Sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(Sections $sections, $id)
    {
        $sectionData = sections::find($id);
        return view('admin.sections.edit',compact('sectionData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sections $sections)
    {
        $validatedData = $request->validate([
            'section_heading' => 'required|max:255',
            'section_name' => 'required|max:255',
        ]);
		$id = $request->id;
        $sectionData = Sections::find($id);
		$sectionData['section_heading'] = $request->section_heading;
		$sectionData['section_name'] = $request->section_name;
		$sectionData['description'] = $request->description;
		if($request->file('image'))
		{
			$file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/sections'), $filename);
            $sectionData['image'] = $filename;
		}
		$sectionData->save();
        return redirect()->route('sections')->with('success', 'Section is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sections $sections)
    {
        //
    }
}
