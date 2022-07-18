<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageSettings;
use App\Models\Pages;
use App\Models\Sections;
use App\Models\User;
use App\Models\Userinfo;
use App\Models\Userdp;
use App\Models\Categories;
use App\Models\Company;
use App\Models\Listings;
use App\Models\Featuredlisting;
use App\Models\Services;
use App\Models\Offers;
use App\Models\Ratings;
use App\Models\ListingOtherInfomration;
use App\Models\ListingGallery;
use Hash;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Coutries;
use App\Models\States;
use App\Models\Cities;
use Illuminate\Pagination\Paginator;

class WebController extends Controller
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
    public function index($pagename=null)
    {
		$allListing = Listings::where('views', ">", 10)->paginate(8);
		$popularServices = array();
		if(!empty($allListing))
		{
			foreach($allListing as $otherlisting)
			{
				$popularServices[] = $otherlisting;
			}
		}
		$page = Pages::firstWhere('route_name',$pagename);
		$sections = Sections::all();
		$featuredListingArr = array();
		$cityListingArr = array();
		$featuredListings = Featuredlisting::paginate(6);
		if(!empty($featuredListings))
		{
			foreach($featuredListings as $featuredListing )
			{
				$listing = Listings::where('listing_id', $featuredListing->listing_id)->first();
				$featuredListingArr[] = $listing;
			}
		}
		/**
		 * 	$category = $listing->category_id;
		 * 	$city = json_decode($listing->city);
		 * 	if(!empty($city))
		 * 	{
		 *		$cids = $city[0];
		 *	}
		 */
		$settings = $this->settings;
		$websettings = $this->websettings;
		$categories = Categories::all();
		if(Auth::check())
		{
			
			$userdp = Userdp::where("member_id", "=", Auth::user()->member_id)->first();
			$userinfo = Userinfo::where("member_id", "=", Auth::user()->member_id)->first();
			$sub_categories = array();
			return view('front/index', compact('popularServices','featuredListingArr','websettings','page','settings','sections','userdp','userinfo','categories','sub_categories'));
		}else{
			$userdp = array();
			$userinfo = array();
			$sub_categories = array();
			return view('front/index', compact('popularServices','featuredListingArr','websettings','page','settings','sections','userdp','userinfo','categories','sub_categories'));
		}
       
    }
	
	public function pages($pagename)
	{
		$settings = $this->settings;
		$websettings = $this->websettings;
		$page = Pages::firstWhere('route_name',$pagename);
		$categories = Categories::all();
		$sub_categories = array();
		if(Auth::check())
		{
			$userdp = Userdp::where("member_id", "=", Auth::user()->member_id)->first();
			$userinfo = Userinfo::where("member_id", "=", Auth::user()->member_id)->first();
			return view('front/show', compact('page','settings','userdp','userinfo','categories','sub_categories'));
		}else{
			$userdp = array();
			$userinfo = array();
			 return view('front/show', compact('websettings','page','settings','userdp','userinfo','categories','sub_categories'));
		}
	}
	
	public function memberlogin($pagename)
	{
		$settings = $this->settings;
		$websettings = $this->websettings;
		$page = Pages::firstWhere('route_name',$pagename);
		$categories = Categories::all();
		if($page == null)
		{
			if(Auth::check())
			{
				$page = new \stdClass();
				$page->meta_title = "Dashbaord";
				$page->keywords = "dashbaord, user dashboard";
				$page->meta_description = "User dashboard to see account details";
				$page->id = random_int(1,10000);
				$userdp = Userdp::where("member_id", "=", Auth::user()->member_id)->first();
				$userinfo = Userinfo::where("member_id", "=", Auth::user()->member_id)->first();
				$user = Auth::user();
				$companyprofile = Company::where("member_id", "=", Auth::user()->member_id)->first();
				return view('front/' . $pagename, compact('page','settings','userdp', 'userinfo','categories','companyprofile','user'));
			}

			return redirect("/memberlogin")->withError('Sorry! You are not authorized user');
		}else{
			return view('front/show', compact('page','settings','websettings'));
		}
	}
	
	public function checkLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) 
        {
            /*if(Auth::user()->user_type == "")
            {
                return redirect()->intended('newuser')
                                    ->withSuccess('Please select what type of account you want to gp with?');
                
            }else{ */
				$member_id = "";
				if(Auth::user()->member_id == null)
				{
					$member_id = "0000001";
				}else{
					$member_id = Auth::user()->member_id;
				}
                Session::put('mid', $member_id);
                Session::put('email', Auth::user()->email);
                Session::put('Name', Auth::user()->name);
                Session::put('joining', Auth::user()->created_at);
                Session::put('memberlogin', "Yes");
                Session::put('verified', Auth::user()->verified);
                $request->session()->save();
                return redirect()->intended('member-dashboard')
                                    ->with('success','Logged in successfully.');
            /* } */
        }

        return redirect("/memberlogin")->withError('Sorry! You have entered invalid credentials');
    }
	
	public function memberRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:10',
			'type' => 'required'
        ]);
		$otp = generateNumericOTP(6);
        $member_id = random_int(10000000, 99999999);
		$inputdata = array(
			'name' => $request->input("name"),
			'email' => $request->input("email"),
			'phone' => $request->input("phone"),
			'password' => Hash::make($request->input("password")),
			'member_id' => $member_id,
			'type' => $request->input("type"),
			'otp' => $otp
		);
		$response = User::create($inputdata);
		if($response)
		{
			Session::put('verifyotp', "Yes");
            $request->session()->save();	
			sendotp($request->input("phone"), $otp);
			sendotponemail($request->input("email"), $otp, $request->input("name"));
			return Redirect::to('/memberlogin?login=register&success=1')->with('success', 'Please verify your phone or email to enter OTP sent on yout email and phone number.');
		}else{
			return Redirect::to('memberlogin?login=register&error=1')->with('error', 'Something wrong in user registeration.');
		}
    }
	
	public function verifyOTP(Request $request)
    {
        $otp = $request->input('otp');
        $user = User::where("otp", '=', $otp)->first();
        if ($user === null)
        {
            return false;
        }else{
            
            User::where('id', $user->id)
            ->update(array('verified' => 1));
			Session::flush();
			Session::put('regsiter', "success");
            $request->session()->save();
			return Redirect::to('/memberlogin?success=1')->with('success', 'You are successfully regsitered, Please login.');
        }
    }
	
	public function memberlogout() 
    {
        Session::flush();
        Auth::logout();
        return Redirect::to('/memberlogin');
    }
}
