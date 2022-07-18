<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listings;
use App\Models\Categories;
use App\Models\PageSettings;
use App\Models\Pages;
use App\Models\Sections;
use App\Models\Countries;
use App\Models\States;
use App\Models\Cities;
use App\Models\User;
use App\Models\Userdp;
use App\Models\Userinfo;
use App\Models\Services;
use App\Models\Offers;
use App\Models\Ratings;
use App\Models\Likes;
use App\Models\ListingOtherInfomration;
use App\Models\ListingGallery;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;

class FrontlistingController extends Controller
{
    public $settings;
    public $websettings;
	public $page;
	public $pagename;

    public function __construct()
	{
		$this->settings = PageSettings::all();
        $this->websettings = getSettings(1);
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = $this->settings;
        $websettings = $this->websettings;
		$page = new \stdClass();
        $page->meta_title = "Profile";
        $page->keywords = "Edit Profile";
        $page->meta_description = "Edit or update user information";
        $page->id = random_int(1,10000);
        $user = Auth::user();
        $userdp = array();
		$userinfo = array();
        if(Auth::check())
		{
            $userinfo = Userinfo::where('member_id', $user->member_id)->first();
		    $userdp = Userdp::where('member_id', $user->member_id)->first();
        }
        Paginator::useBootstrap();
	    $listings = Listings::paginate(20);
	    $categories = Categories::all();

        return view('front/listing', compact('websettings','page','settings','user','userinfo','userdp','listings','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoryinfo = Categories::where('id', $id)->first();
        $settings = $this->settings;
        $websettings = $this->websettings;
		$page = new \stdClass();
        $page->meta_title = "Listing Details - " . $id;
        $page->keywords = "Show Details of the listing";
        $page->meta_description = "Show Details of the listing";
        $page->id = random_int(1,10000);
        $user = Auth::user();
        $userdp = array();
		$userinfo = array();
        if(Auth::check())
		{
            $userinfo = Userinfo::where('member_id', $user->member_id)->first();
		    $userdp = Userdp::where('member_id', $user->member_id)->first();
        }
        Paginator::useBootstrap();
	    $listing = Listings::where('listing_id', $id)->first();
        $categories = Categories::all();
        return view('front/details', compact('websettings','page','settings','user','userinfo','userdp','listing','categories'));
    }

    public function getDetailsBySlug($listing_slug)
    {
        $sub_categories = array();
        $listingDetails = Listings::where('listing_slug', '=', $listing_slug)->first();
        $category = Categories::where('id', '=', $listingDetails->category_id)->first();
        $settings = $this->settings;
        $websettings = $this->websettings;
		$page = new \stdClass();
        $page->meta_title = "Listing Details - " . $listingDetails->listing_slug;
        $page->keywords = "Show Details of the listing";
        $page->meta_description = "Show Details of the listing";
        $page->id = random_int(1,10000);
        $userdp = array();
		$userinfo = array();
        $user = User::where('member_id', $listingDetails->member_id)->first();
        if(Auth::check())
		{
            $user = Auth::user();
            $userinfo = Userinfo::where('member_id', $user->member_id)->first();
		    $userdp = Userdp::where('member_id', $user->member_id)->first();
        }else{

        }

        $memberInfo = Userinfo::where('member_id', $listingDetails->member_id)->first();
        $memberdp = Userdp::where('member_id', $listingDetails->member_id)->first();
        Paginator::useBootstrap();
        $socialUrl = URL::to('/listing/details/'.$listing_slug);
	    $listing = Listings::where('listing_id', $listingDetails->listing_id)->first();
        $categories = Categories::all();
        $services = Services::where('listing_id', $listingDetails->id)->get();
        $gallery = ListingGallery::where('listing_id', $listingDetails->id)->get();
        $offers = Offers::where('listing_id', $listingDetails->id)->get();
        return view('front/details', compact('sub_categories','websettings','page','settings','user','userinfo','userdp','listing','categories','category','socialUrl','services','gallery','offers','memberInfo','memberdp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function categories()
    {
        $settings = $this->settings;
        $websettings = $this->websettings;
		$page = new \stdClass();
        $page->meta_title = "All Categories ";
        $page->keywords = "Show Details of the listing";
        $page->meta_description = "Show Details of the listing";
        $page->id = random_int(1,10000);
        $user = Auth::user();
        $userdp = array();
		$userinfo = array();
        if(Auth::check())
		{
            $userinfo = Userinfo::where('member_id', $user->member_id)->first();
		    $userdp = Userdp::where('member_id', $user->member_id)->first();
        }
        Paginator::useBootstrap();
	    $categories = Categories::paginate(20);
        return view('front/categories', compact('websettings','page','settings','user','userinfo','userdp','categories'));
    }

    public function categorylisting($category_slug)
    {
        $category = Categories::where('category_slug', '=', $category_slug)->first();
        $settings = $this->settings;
        $websettings = $this->websettings;
		$page = new \stdClass();
        $page->meta_title = $category->seo_title;
        $page->keywords = $category->keywords;
        $page->meta_description = $category->seo_description;
        $page->id = random_int(1,10000);
        $user = Auth::user();
        $userdp = array();
		$userinfo = array();
        if(Auth::check())
		{
            $userinfo = Userinfo::where('member_id', $user->member_id)->first();
		    $userdp = Userdp::where('member_id', $user->member_id)->first();
        }
        Paginator::useBootstrap();
	    $listings = Listings::where('category_id', $category->id)->paginate(20);
        $otherinfo = getOtherInformation($category->id);
        $faqs = getFAQs($category->id);
        $categories = Categories::all();
        $sub_categories = getSubCateories($category->id);
        return view('front/listing', compact('websettings','page','settings','user','userinfo','userdp','listings','categories','category','otherinfo','faqs','sub_categories'));
    }

    public function subcategorylisting($parent, $category_slug=null)
    {
        $category = Categories::where('category_slug', $category_slug)->first();
        $settings = $this->settings;
        $websettings = $this->websettings;
		$page = new \stdClass();
        $page->meta_title = $category->seo_title;
        $page->keywords = $category->keywords;
        $page->meta_description = $category->seo_description;
        $page->id = random_int(1,10000);
        $user = Auth::user();
        $userdp = array();
		$userinfo = array();
        if(Auth::check())
		{
            $userinfo = Userinfo::where('member_id', $user->member_id)->first();
		    $userdp = Userdp::where('member_id', $user->member_id)->first();
        }
        Paginator::useBootstrap();
	    $listings = Listings::where('sub_category_id', 'LIKE', '%'.$category->id.'%')->paginate(20);
        $categories = Categories::all();
        $otherinfo = getOtherInformation($category->id);
        return view('front/listing', compact('websettings','page','settings','user','userinfo','userdp','listings','categories','category','otherinfo'));
    }

    public function citylisting($city)
    {
        $city = Cities::where('name', '=', $city)->first();
        $settings = $this->settings;
        $websettings = $this->websettings;
		$page = new \stdClass();
        $page->meta_title = $city->name . " " . "Listing";
        $page->keywords = $city->name;
        $page->meta_description = $city->name . " " . "Listing";
        $page->id = random_int(1,10000);
        $userdp = array();
		$userinfo = array();
        $user = array();
        if(Auth::check())
		{
            $user = Auth::user();
            $userinfo = Userinfo::where('member_id', $user->member_id)->first();
		    $userdp = Userdp::where('member_id', $user->member_id)->first();
        }

        Paginator::useBootstrap();
       // DB::enableQueryLog();
	    $listings = Listings::where('city', 'LIKE', '%'.$city->id.'%')->paginate(20);
        //$query = DB::getQueryLog();
        //dd($query);
        $categories = Categories::all();
        $sub_categories = array();
        return view('front/citylisting', compact('websettings','page','settings','user','userinfo','userdp','listings','categories','city','sub_categories'));
    }

    function saveRatings(Request $request)
    {
        if(Auth::check())
		{
            $checkifrated = alreadyRated($request->listing_id, $request->member_id);
            if($checkifrated == 1)
            {
                $ratings = new Ratings();
                $ratings->member_id = $request->member_id;
                $ratings->listing_id = $request->listing_id;
                $ratings->rating = $request->rating;
                $ratings->save();
                echo 1;
            }else{
                echo "You have given rating already";
            }
        }else{
            echo "Please Login to continue...";
        }

        die;
    }

    function saveLike(Request $request)
    {
        if(Auth::check())
		{
            $checkifliked = alreadyLiked($request->listing_id, $request->member_id);
            if($checkifliked == 1)
            {
                $likes = new Likes();
                $likes->member_id = $request->member_id;
                $likes->listing_id = $request->listing_id;
                $likes->save();
                echo 1;
            }else{
                echo "You have liked already";
            }
        }else{
            echo "Please Login to continue...";
        }

        die;
    }

    public function listingViews(Request $request)
    {
        $listing_id = $request->listing_id;
        $listing = Listings::find($listing_id);
        $views = 1;
        if($listing->views >= 1)
        {
            $views = $listing->views + 1;
        }
        $listing->views = $views;
        $listing->save();
    }

    public function createNewListing()
    {
        $settings = $this->settings;
        $websettings = $this->websettings;
		$page = new \stdClass();
        $page->meta_title = "New Listing";
        $page->keywords = "New Listing";
        $page->meta_description = "New Listing";
        $page->id = random_int(1,10000);
        $user = Auth::user();
        $userdp = array();
		$userinfo = array();
        if(Auth::check())
		{
            $userinfo = Userinfo::where('member_id', $user->member_id)->first();
		    $userdp = Userdp::where('member_id', $user->member_id)->first();
        }
        $listings = Listings::all();
        Paginator::useBootstrap();
        $categories = Categories::all();
        return view('front/newlisting', compact('websettings','page','settings','user','userinfo','userdp','listings','categories'));
    }

    public function saveDuplicateListing(Request $request)
    {
        if(Auth::check())
		{
            $user = Auth::user();
            $listing = Listings::find($request->listing_id);
            $newListing = $listing->replicate();
            $newListing->listing_id = random_strings(8);
            $newListing->listing_name = $request->listing_name;
            $newListing->member_id = $user->member_id;
            $newListing->listing_slug = Str::slug($request->listing_name);
            $newListing->created_by = $user->name . "_" . $user->member_id;
            $newListing->veryfied = "No";
            $newListing->save();

            return redirect()->route('getalllisting')->with('success', 'Listing has been successfully cerated.');
        }

        return redirect("/memberlogin")->withError('Sorry! You are not allowed without login');
    }

    public function formNewListing()
    {
        $settings = $this->settings;
        $websettings = $this->websettings;
		$page = new \stdClass();
        $page->meta_title = "New Listing - New";
        $page->keywords = "New Listing";
        $page->meta_description = "New Listing";
        $page->id = random_int(1,10000);
        $user = Auth::user();
        $userdp = array();
		$userinfo = array();
        if(Auth::check())
		{
            $userinfo = Userinfo::where('member_id', $user->member_id)->first();
		    $userdp = Userdp::where('member_id', $user->member_id)->first();
        }
        $listings = Listings::all();
        Paginator::useBootstrap();
        $categories = Categories::all();
        return view('front/listingsteps/step1', compact('websettings','page','settings','user','userinfo','userdp','listings','categories'));
    }

    public function loadStepForm(Request $request)
    {
        $stepTemplate = $request->step;
        $settings = $this->settings;
        $websettings = $this->websettings;
		$page = new \stdClass();
        $page->meta_title = "New Listing - New";
        $page->keywords = "New Listing";
        $page->meta_description = "New Listing";
        $page->id = random_int(1,10000);
        $user = Auth::user();
        $userdp = array();
		$userinfo = array();
        if(Auth::check())
		{
            $userinfo = Userinfo::where('member_id', $user->member_id)->first();
		    $userdp = Userdp::where('member_id', $user->member_id)->first();
        }
        $listings = Listings::all();
        Paginator::useBootstrap();
        $categories = Categories::all();
        return View::make("front/listingsteps/".$stepTemplate)->with('websettings','page','settings','user','userinfo','userdp','listings','categories')->render();
    }
}
