<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listings;
use App\Models\Categories;
use App\Models\Pages;
use App\Models\Sections;
use App\Models\Countries;
use App\Models\States;
use App\Models\Cities;
use App\Models\User;
use App\Models\Services;
use App\Models\Offers;
use App\Models\Ratings;
use App\Models\ListingOtherInfomration;
use App\Models\ListingGallery;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chooseType()
    {
		return view('admin.listings.listingtype');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();
	    $listings = Listings::paginate(20);
		return view('admin.listings.index', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where("member_id", '!=', NULL)->get();
        $countries = Countries::all();
        $states = States::all();
        $cities = Cities::all();
        $categories = Categories::all();
        return view('admin.listings.create', compact('users', 'states', 'cities', 'countries','categories'));
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
            'listing_name' => 'required|max:255',
            'listing_email' => 'required',
            'listing_address' => 'required',
            'listing_pincode' => 'required',
            'country' => 'required',
            'state' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'listing_description' => 'required'
        ]);

        $files = array();

        $listings = new Listings();
        $listings['listing_id'] = random_strings(8);
        $listings['member_id'] = $request->member_id;
		$listings['listing_name'] = $request->listing_name;
        $listings['listing_slug'] = Str::slug($request->listing_name);
		$listings['listing_phone'] = $request->listing_mobile;
        $listings['listing_email'] = $request->listing_email;
        $listings['listing_whatsapp_number'] = $request->listing_whatsapp;
        $listings['company_website_link'] = $request->listing_website;
        $listings['company_address'] = $request->listing_address;
        $listings['pincode'] = $request->listing_pincode;
        $listings['country'] = $request->country;
        $listings['state'] = $request->state;
        $listings['city'] = json_encode(array($request->city_id));
        $listings['category_id'] = $request->category_id;
        $listings['sub_category_id'] = json_encode(array($request->sub_category_id));
        $listings['listing_description'] = $request->listing_description;
        if($request->file('image'))
		{
			$file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/listings/image'), $filename);
            $listings['image'] = $filename;
		}
        if($request->file('banner'))
		{
			$file= $request->file('banner');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/listings/banner'), $filename);
            $listings['banner'] = $filename;
		}
        $listings['service_locations'] = $request->service_locations;
        $listings['google_map'] = $request->google_map;
        $listings['view_360'] = $request->view_360;
        $listings['status'] = 'active';
        $listings['created_by'] = (Auth::user()->member_id == "") ? 'Admin' : ucfirst(Auth::user()->name . "_" . Auth::user()->id);
        $listings['veryfied'] = "Yes";
        $listings->save();
        $listingId = DB::getPdo()->lastInsertId();
        if(!empty($listingId))  
        {
            /**
             * other info save
             */
            
            $data = array();
            $otherinfodata = array();
            $matavalues = $request->meta_value;
            foreach($request->meta_name as $key => $metaname)
            {
                $data['listing_id'] = $listingId;
                $data['meta_name'] = $metaname;
                $data['meta_value'] = $matavalues[$key];
                $otherinfodata[] = $data;
            }
            foreach($otherinfodata as $key => $infoother)
            {
                $otherInfo = new ListingOtherInfomration();
                $otherInfo['listing_id'] = $infoother['listing_id'];
                $otherInfo['meta_name'] = $infoother['meta_name'];
                $otherInfo['meta_value'] = $infoother['meta_value'];
                $otherInfo->save();
            }
            
            /**
             * services offering save
             */
            $seviceData = array();
            $mainservices = array();
            if($request->hasfile('service_image'))
            {
                foreach($request->file('service_image') as $file)
                {
                    $name = time().rand(1,100).'.'.$file->extension();
                    $file->move(public_path('public/listing/services'), $name);  
                    $files[] = $name;  
                }
            }

            foreach($request->service_name as $key => $servicenam)
            {
                $seviceData['listing_id'] = $listingId;
                $seviceData['service_name'] = $servicenam;
                $seviceData['service_image'] = $files[$key];
                $mainservices[] = $seviceData;
            }

            foreach($mainservices as $key => $mservice)
            {
                $serviceObj = new Services();
                $serviceObj['listing_id'] = $mservice['listing_id'];
                $serviceObj['service_name'] = $mservice['service_name'];
                $serviceObj['service_image'] = $mservice['service_image'];
                $serviceObj->save();
            }

            /**
             * special offers save
             */
            $offersData = array();
            $specialOffer = array();
            if($request->hasfile('offer_image'))
            {
                foreach($request->file('offer_image') as $file)
                {
                    $name = time().rand(1,100).'.'.$file->extension();
                    $file->move(public_path('public/listing/offers'), $name);  
                    $files[] = $name;  
                }
            }
            $offer_details = $request->offer_details;
            $offer_price = $request->offer_price;
            $offer_view_more_link = $request->offer_view_more_link;
            foreach($request->offer_name as $key => $offernam)
            {
                $offersData['listing_id'] = $listingId;
                $offersData['offer_name'] = $offernam;
                $offersData['offer_image'] = $files[$key];
                $offersData['offer_details'] = $offer_details[$key];
                $offersData['offer_price'] = $offer_price[$key];
                $offersData['offer_view_more_link'] = $offer_view_more_link[$key];
                $specialOffer[] = $offersData;
            }

            foreach($specialOffer as $key => $spoffer)
            {
                $offersObj = new Offers();
                $offersObj['listing_id'] = $spoffer['listing_id'];
                $offersObj['offer_name'] = $spoffer['offer_name'];
                $offersObj['offer_image'] = $spoffer['offer_image'];
                $offersObj['offer_details'] = $spoffer['offer_details'];
                $offersObj['offer_price'] = $spoffer['offer_price'];
                $offersObj['offer_view_more_link'] = $spoffer['offer_view_more_link'];
                $offersObj->save();
            }

            /**
             * listing gallery save
             */
            $imgArr = array();
            $mainimagearr = array();
            $type = "";
            if($request->hasfile('gallery_image'))
            {
                foreach($request->file('gallery_image') as $file)
                {
                    $name = time().rand(1,100).'.'.$file->extension();
                    $file->move(public_path('public/listing/gallery'), $name);  
                    $type = "image"; 
                    $files[] = $name;
                }
            }

            foreach($request->gallery_video as $key => $video)
            {
                $imgArr['listing_id'] = $listingId;
                $imgArr['video'] = $video;
                $imgArr['image'] = $files[$key];
                $imgArr['type'] = ( $type == "") ? "video" : "image";
                $mainimagearr[] =  $imgArr;
            }
            foreach($mainimagearr as $key => $gimage)
            {
                $galleryObj = new ListingGallery();
                $galleryObj['listing_id'] = $gimage['listing_id'];
                $galleryObj['image'] = $files[$key];
                $galleryObj['video'] = $gimage['video'];
                $galleryObj['type'] = $gimage['type'];
                $galleryObj->save();
            }
        }

        return redirect()->route('listings')->with('success', 'Listing has been successfully cerated.');
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
}
