<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

class PagesController extends Controller
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
	    $pages = Pages::paginate(20);
		return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$page_id = Str::random(9);
		return view('admin.pages.create', compact('page_id'));
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
            'title' => 'required|max:255',
        ]);
		$pageData = new Pages();
		$pageData['page_id'] = $request->page_id;
		$pageData['title'] = $request->title;
		$pageData['description'] = $request->description;
		if($request->file('image'))
		{
			$file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/Banners'), $filename);
            $pageData['image'] = $filename;
		}
		$pageData['meta_title'] = $request->meta_title;
		$pageData['keywords'] = $request->keywords;
		$pageData['meta_description'] = $request->meta_description;
		$pageData['g_schema'] = $request->g_schema;
		$pageData['status'] = $request->status;
		$pageData['page_visibility'] = $request->page_visibility;
		$pageData['page_settings'] = json_encode(array($request->page_settings));
		$pageData['listing_id'] = json_encode(array($request->listing_id));
		$pageData['product_ids'] = json_encode(array($request->product_ids));
		$pageData['blog_ids'] = json_encode(array($request->blog_ids));
		$pageData['route_name'] = $request->route_name;
		$pageData->save();
        return redirect()->route('pages')->with('success', 'Page is successfully cerated.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show(Pages $pages)
    {
        return view('admin.pages.show',compact('pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit(Pages $pages, $id)
    {
		$pageData = Pages::find($id);
        return view('admin.pages.edit',compact('pageData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
		$validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);
		$id = $request->id;
        $pageData = Pages::find($id);
		$pageData->page_id = $request->page_id;
		$pageData->title = $request->title;
		$pageData->description = $request->description;
		if($request->file('image'))
		{
			$file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/Banners'), $filename);
            $pageData->image = $filename;
		}
		$pageData->meta_title = $request->meta_title;
		$pageData->keywords = $request->keywords;
		$pageData->meta_description = $request->meta_description;
		$pageData->g_schema = $request->g_schema;
		$pageData->status = $request->status;
		$pageData->page_visibility = $request->page_visibility;
		$pageData->page_settings = json_encode(array($request->page_settings));
		$pageData->listing_id = json_encode(array($request->listing_id));
		$pageData->product_ids = json_encode(array($request->product_ids));
		$pageData->blog_ids = json_encode(array($request->blog_ids));
		$pageData->save();
        return redirect()->route('pages')->with('success', 'Page is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pages $pages)
    {
        $pages->delete();
		return redirect()->route('pages')->with('success','Page has been deleted successfully.');
    }
	
	public function removePage(Pages $pages,$id)
	{
		$pageData = Pages::find($id);
		$pageData->status = 2;
		$pageData->save();
		return redirect()->route('pages')->with('success', 'Page have been successfully removed.');
	}
}
