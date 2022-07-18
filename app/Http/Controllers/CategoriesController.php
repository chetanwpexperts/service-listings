<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Categorinfo;
use App\Models\Categoryfaq;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

class CategoriesController extends Controller
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
        $websettings = getSettings(1);
		Paginator::useBootstrap();
	    $categories = Categories::paginate(10);
		return view('admin.categories.index', compact('categories','websettings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $websettings = getSettings(1);
        return view('admin.categories.create',compact('websettings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$category_namearr = array();
        $category_seotitlearr = array();
        $category_seodescriptionarr = array();
        $category_seokeywords = array();
		$files = array();
		$category_name_array = $request->input('category_name');
        $category_seotitle_array = $request->input('seo_title');
        $category_seodescription_array = $request->input('seo_description');
        $category_seokeywords_array = $request->input('keywords');
		$images = $request->file('image');
		
		foreach($category_name_array as $category_name)
		{
			$validatedData = $request->validate([
				'category_name' => 'required|max:255',
			]);
			
			$category_namearr[] = $category_name;
		}

        foreach($category_seotitle_array as $category_seotitle)
		{
			$category_seotitlearr[] = $category_seotitle;
		}

        foreach($category_seodescription_array as $category_seodesc)
		{
			$category_seodescriptionarr[] = $category_seodesc;
		}

        foreach($category_seokeywords_array as $category_keywords)
		{
			$category_seokeywords[] = $category_keywords;
		}
		
		if($request->hasfile('category_image'))
        {
            foreach($request->file('category_image') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('public/listing-categories'), $name);  
                $files[] = $name;  
            }
        }
		
		foreach($category_namearr as $key => $name)
		{
			$category = new Categories();
			$category->category_name = $name;
			$category->category_image = $files[$key];
			$category->category_slug = Str::slug($name);
            $category->seo_title = $category_seotitlearr[$key];
            $category->seo_description = $category_seodescriptionarr[$key];
            $category->keywords = $category_seokeywords[$key];
			$category->save();
		}
		return redirect()->route('listingcategories')->with('success', 'Categories successfully cerated.');
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
        $websettings = getSettings(1);
        $category = Categories::find($id);
        $categoryinfo = Categorinfo::where('category_id', $id)->get();
        $categoryfaq = Categoryfaq::where('category_id', $id)->get();
        return view('admin.categories.edit',compact('category','categoryinfo','categoryfaq','websettings'));
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
		$validatedData = $request->validate([
			'category_name' => 'required|max:255',
		]);
		
        $category = Categories::find($id);
		$category->category_name = $request->category_name;
        
		if($request->file('category_image'))
		{
			$file = $request->file('category_image');
			$filename= date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('public/listing-categories'), $filename);
			$category->category_image = $filename;
		}
		$category->category_slug = Str::slug($request->category_name);
        $category->seo_title = $request->seo_title;
        $category->seo_description = $request->seo_description;
        $category->keywords = $request->keywords;
		$category->save();
		
		return redirect()->route('listingcategories')->with('success', 'Category has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $categories, $id)
    {
        $categories->delete();
		return redirect()->route('listingcategories')->with('success','Category has been deleted successfully.');
    }
	
	/**
	* subcategories methods **/
	
    public function getSubCategories(Request $request)
    {
        $cid = $request->category_id;
		$subcategories = Categories::where('parent_id', '=', $cid)->get();
        $option = '';
		foreach($subcategories as $subcategory)
		{
			$option.= '<option value="'.$subcategory->id.'">'.$subcategory->category_name.'</option>';
		}
		echo $option;
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subcategories(Request $request)
    {
        $websettings = getSettings(1);
		Paginator::useBootstrap();
	    $categories = Categories::all();
		$categories = Categories::where('parent_id', '!=', 0)->get();
		return view('admin.categories.sub_index', compact('categories','websettings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subcreate()
    {
        $websettings = getSettings(1);
		$categories = Categories::all();
        return view('admin.categories.create_sub',compact('categories','websettings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function substore(Request $request)
    {
		$category_namearr = array();
        $category_seotitlearr = array();
        $category_seodescriptionarr = array();
        $category_seokeywords = array();
		$files = array();
		$category_name_array = $request->input('category_name');
        $category_seotitle_array = $request->input('seo_title');
        $category_seodescription_array = $request->input('seo_description');
        $category_seokeywords_array = $request->input('keywords');
		$images = $request->file('image');
		
		foreach($category_name_array as $category_name)
		{
			$validatedData = $request->validate([
				'category_name' => 'required|max:255',
			]);
			
			$category_namearr[] = $category_name;
		}

        foreach($category_seotitle_array as $category_seotitle)
		{
			$category_seotitlearr[] = $category_seotitle;
		}

        foreach($category_seodescription_array as $category_seodesc)
		{
			$category_seodescriptionarr[] = $category_seodesc;
		}

        foreach($category_seokeywords_array as $category_keywords)
		{
			$category_seokeywords[] = $category_keywords;
		}
		
		if($request->hasfile('category_image'))
        {
            foreach($request->file('category_image') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('public/listing-categories'), $name);  
                $files[] = $name;  
            }
        }
		foreach($category_namearr as $key => $name)
		{
			$category = new Categories();
			$category->parent_id = $request->input('parent_id');
			$category->category_name = $name;
			$category->category_image = $files[$key];
			$category->category_slug = Str::slug($name);
            $category->seo_title = $category_seotitlearr[$key];
            $category->seo_description = $category_seodescriptionarr[$key];
            $category->keywords = $category_seokeywords[$key];
			$category->save();
		}
		return redirect()->route('listingsubcategories')->with('success', 'Categories successfully cerated.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subshow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subedit($id)
    {
        $websettings = getSettings(1);
        $categories = Categories::all();
        $editcategory = Categories::find($id);
        return view('admin.categories.edit_sub',compact('categories','editcategory','websettings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subupdate(Request $request, $id)
    {
		$validatedData = $request->validate([
			'category_name' => 'required|max:255',
		]);
		
        $category = Categories::find($id);
		$category->category_name = $request->category_name;
		if($request->file('category_image'))
		{
			$file = $request->file('category_image');
			$filename= date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('public/listing-categories'), $filename);
			$category->category_image = $filename;
		}
		$category->category_slug = Str::slug($request->category_name);
        $category->seo_title = $request->seo_title;
        $category->seo_description = $request->seo_description;
        $category->keywords = $request->keywords;
		$category->save();
		
		return redirect()->route('listingsubcategories')->with('success', 'Category has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subdestroy(Categories $categories, $id)
    {
        $categories->delete();
		return redirect()->route('listingsubcategories')->with('success','Category has been deleted successfully.');
    }

    public function categoryOtherInfo(Request $request)
    {
        $category_infarr = array();
        $category_infheadingarr = array();
        $otherinfoArr = $request->input('otherinfo');
        $otherinfoHeadingArr = $request->input('heading');
        $otherinfoIds = $request->input('infoid');
        foreach($otherinfoArr as $cotherinfo)
		{
			$category_infarr[] = $cotherinfo;
		}
        foreach($otherinfoHeadingArr as $cotherinfohead)
		{
			$category_infheadingarr[] = $cotherinfohead;
		}
        
        foreach($category_infarr as $ky => $info)
        {
            $categoryinfo = new Categorinfo();
            $categoryinfo->category_id = $request->input('id');
            $categoryinfo->otherinfo = $info;
            $categoryinfo->heading = $category_infheadingarr[$ky];
            $categoryinfo->type = $request->input('type');
            $categoryinfo->save();
        }

        return redirect()->route('listingcategories')->with('success','Category Info has been added successfully.');
       
    }

    public function categoryOtherInfoUpdate(Request $request, $id)
    {
        $category_infarr = array();
        $category_infheadingarr = array();
        $otherinfoArr = $request->input('otherinfo');
        $otherinfoHeadingArr = $request->input('heading');
        $otherinfoIds = $request->input('infoid');
        foreach($otherinfoArr as $cotherinfo)
		{
			$category_infarr[] = $cotherinfo;
		}
        foreach($otherinfoHeadingArr as $cotherinfohead)
		{
			$category_infheadingarr[] = $cotherinfohead;
		}
        foreach($category_infarr as $ky => $info)
        {
            $categoryinfo = Categorinfo::where('id', $otherinfoIds[$ky])->where('category_id', $id)->first();
            $categoryinfo->otherinfo = $info;
            $categoryinfo->heading = $category_infheadingarr[$ky];
            $categoryinfo->type = $request->input('type');
            $categoryinfo->update();
        }

        return redirect()->route('listingcategories')->with('success','Category Info has been added successfully.');
    }

    public function addCategoryFAQ(Request $request)
    {
        $category_infarr = array();
        $category_infheadingarr = array();
        $otherinfoArr = $request->input('otherinfo');
        $otherinfoHeadingArr = $request->input('heading');
        $otherinfoIds = $request->input('infoid');
        foreach($otherinfoArr as $cotherinfo)
		{
			$category_infarr[] = $cotherinfo;
		}
        foreach($otherinfoHeadingArr as $cotherinfohead)
		{
			$category_infheadingarr[] = $cotherinfohead;
		}
        
        foreach($category_infarr as $ky => $info)
        {
            $categoryinfo = new Categoryfaq();
            $categoryinfo->category_id = $request->input('id');
            $categoryinfo->otherinfo = $info;
            $categoryinfo->heading = $category_infheadingarr[$ky];
            $categoryinfo->type = $request->input('type');
            $categoryinfo->save();
        }

        return redirect()->route('listingcategories')->with('success','Category Info has been added successfully.');
       
    }

    public function updateCategoryFAQ(Request $request, $id)
    {
        $category_infarr = array();
        $category_infheadingarr = array();
        $otherinfoArr = $request->input('otherinfo');
        $otherinfoHeadingArr = $request->input('heading');
        $otherinfoIds = $request->input('infoid');
        foreach($otherinfoArr as $cotherinfo)
		{
			$category_infarr[] = $cotherinfo;
		}
        foreach($otherinfoHeadingArr as $cotherinfohead)
		{
			$category_infheadingarr[] = $cotherinfohead;
		}
        foreach($category_infarr as $ky => $info)
        {
            $categoryinfo = categoryfaq::where('id', $otherinfoIds[$ky])->where('category_id', $id)->first();
            $categoryinfo->otherinfo = $info;
            $categoryinfo->heading = $category_infheadingarr[$ky];
            $categoryinfo->type = $request->input('type');
            $categoryinfo->update();
        }

        return redirect()->route('listingcategories')->with('success','Category Info has been added successfully.');
    }
}
