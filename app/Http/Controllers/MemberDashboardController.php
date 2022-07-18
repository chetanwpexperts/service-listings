<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageSettings;
use App\Models\Pages;
use App\Models\Sections;
use App\Models\User;
use App\Models\Userdp;
use App\Models\Userinfo;
use App\Models\Countries;
use App\Models\States;
use App\Models\Cities;
use App\Models\Categories;
use App\Models\Listings;
use App\Models\Company;
use App\Models\Follow;
use Hash;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MemberDashboardController extends Controller
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
    public function index($pagename)
	{
		$settings = $this->settings;
		$websettings = $this->websettings;
		$page = Pages::firstWhere('route_name',$pagename);
		if(Auth::check())
        {
            $user = Auth::user();
			$categories = Categories::all();
            return view('front/dashboard', compact('websettings','user','page', 'settings', 'categories'));
        }
	}
	
	public function profileEdit()
	{
		$settings = $this->settings;
		$websettings = $this->websettings;
		$page = Pages::firstWhere('route_name',"profile");
		if($page == null)
		{
			if(Auth::check())
			{
				$user = Auth::user();
				$page = new \stdClass();
				$page->meta_title = "Profile";
				$page->keywords = "Edit Profile";
				$page->meta_description = "Edit or update user information";
				$countries = Countries::all();
				$cities = Cities::all();
				$states = States::all();
				$userinfo = Userinfo::where('member_id', $user->member_id)->first();
				$userdp = Userdp::where('member_id', $user->member_id)->first();
				$stateOption = "";
				$cityOption = "";
				if(!empty($userinfo))
				{
					foreach($states as $state)
					{
						if($userinfo->state == $state->id)
						{
							$stateOption .= '<option value="'.$state->id.'">'.$state->name.'</option>';
						}
					}

					$cityOption = "";
					foreach($cities as $city)
					{
						if($userinfo->city == $city->id)
						{
							$cityOption .= '<option value="'.$city->id.'">'.$city->name.'</option>';
						}
					}
				}
				$page->id = random_int(1,10000);
				$categories = Categories::all();
				return view('front/profileupdate', compact('websettings','page','settings','user','countries','cities','states','userinfo','userdp','stateOption', 'cityOption','categories'));
			}
		}
	}
	
	public function updateProfile(Request $request, $mid)
	{
		$settings = $this->settings;
		$websettings = $this->websettings;
		$page = Pages::firstWhere('route_name',"updateProfile");
		if($page == null)
		{
			if(Auth::check())
			{
				$user = Auth::user();
				$page = new \stdClass();
				$page->meta_title = "Profile Update";
				$page->keywords = "Update Profile";
				$page->meta_description = "Update user information ";
				$page->id = random_int(1,10000);
				
				$userData = User::find($user->id);
				$userData->phone = $request->phone;
				$userData->save();
				
				if($request->file('image'))
				{
					$file= $request->file('image');
					$filename= date('YmdHi').$file->getClientOriginalName();
					$file->move(public_path('public/user/dp'), $filename);
					
					$userdp = Userdp::where("member_id", "=", $mid)->first();
					if(empty($userdp))
					{
						$inputdata = array(
							'image' => $filename,
							'member_id' => $user->member_id
						);
						Userdp::create($inputdata);
					}else{
						$affected = DB::table('userdp')
						  ->where('member_id', $mid)
						  ->update(['image' => $filename]);
					}
				}
				
				$userinfo = Userinfo::where("member_id", "=", $mid)->first();
				if(empty($userinfo))
				{
					$inputdata = array(
						'city' => $request->input("city"),
						'country' => $request->input("country"),
						'state' => $request->input("state"),
						'facebook_url' => $request->input("facebook_url"),
						'twitter_url' => $request->input("twitter_url"),
						'member_id' => $user->member_id
					);
					Userinfo::create($inputdata);
				}else{
					$inputdata = array(
						'city' => $request->input("city"),
						'country' => $request->input("country"),
						'state' => $request->input("state"),
						'facebook_url' => $request->input("facebook_url"),
						'twitter_url' => $request->input("twitter_url")
					);
					$affected = DB::table('userinfo')
						  ->where('member_id', $mid)
						  ->update($inputdata);
				}

				return redirect()->route('profileedit')->with('success', 'Profile has been successfully updated.');
			}
		}
	}
	
	public function getStates(Request $request)
	{
		$country = $request->country_id;
		$states = States::where('country_id', '=', $country)->get();
		$option = '';
		foreach($states as $state)
		{
			$option.= '<option value="'.$state->id.'">'.$state->name.'</option>';
		}
		echo $option;
		die;
	}
	
	public function getCities(Request $request)
	{
		$state = $request->state_id;
		$cities = Cities::where('state_id', '=', $state)->get();
		$option = '<option value="">Select City</option>';
		foreach($cities as $city)
		{
			$option.= '<option value="'.$city->id.'">'.$city->name.'</option>';
		}
		echo $option;
		die;
	}

	public function profileView($member_id)
	{
		$settings = $this->settings;
		$websettings = $this->websettings;
		$page = Pages::firstWhere('route_name',"viewprofile");
		if($page == null)
		{
			$user = array();
			if(Auth::check())
			{
				$checkUser = Session::get('auth');
				if(empty($checkUser))
				{
					$user = Auth::user();
					$member_id = $user->member_id;
				}else{
					$user = new \stdClass();
					$user->member_id = $member_id;
				}
			}
			
			$page = new \stdClass();
			$page->meta_title = "Profile View";
			$page->keywords = "View Profile";
			$page->meta_description = "View user information";
			$countries = Countries::all();
			$cities = Cities::all();
			$states = States::all();
			$userinfo = Userinfo::where('member_id', $member_id)->first();
			$userdp = Userdp::where('member_id', $member_id)->first();
			$member = User::where('member_id', $member_id)->first();
			$memberdp = Userdp::where('member_id', $user->member_id)->first();
			$stateOption = "";
			$cityOption = "";
			if(!empty($userinfo))
			{
				foreach($states as $state)
				{
					if($userinfo->state == $state->id)
					{
						$stateOption .= '<option value="'.$state->id.'">'.$state->name.'</option>';
					}
				}

				$cityOption = "";
				foreach($cities as $city)
				{
					if($userinfo->city == $city->id)
					{
						$cityOption .= '<option value="'.$city->id.'">'.$city->name.'</option>';
					}
				}
			}
			$page->id = random_int(1,10000);
			$categories = Categories::all();
			$sub_categories = array();
			$isFollow = Follow::where('followed_by', $user->member_id)->where('followed', $member_id)->first();
			return view('front/profile', compact('websettings','page','settings','user','countries','cities','states','userinfo','userdp','stateOption', 'cityOption','categories','member','memberdp','isFollow','sub_categories'));
		}
	}

	public function allListing()
	{
		$settings = $this->settings;
		$websettings = $this->websettings;
		$page = Pages::firstWhere('route_name',"getalllisting");
		if($page == null)
		{
			if(Auth::check())
			{
				$user = Auth::user();
				$page = new \stdClass();
				$page->meta_title = "All memebr listing";
				$page->keywords = "View all member listing";
				$page->meta_description = "View all member listing";
				$page->id = random_int(1,10000);
				
				$countries = Countries::all();
				$cities = Cities::all();
				$states = States::all();
				$userinfo = Userinfo::where('member_id', $user->member_id)->first();
				$userdp = Userdp::where('member_id', $user->member_id)->first();
				$stateOption = "";
				$cityOption = "";
				if(!empty($userinfo))
				{
					foreach($states as $state)
					{
						if($userinfo->state == $state->id)
						{
							$stateOption .= '<option value="'.$state->id.'">'.$state->name.'</option>';
						}
					}

					$cityOption = "";
					foreach($cities as $city)
					{
						if($userinfo->city == $city->id)
						{
							$cityOption .= '<option value="'.$city->id.'">'.$city->name.'</option>';
						}
					}
				}
				$listings = Listings::where('member_id', $user->member_id)->get();
				$categories = Categories::all();
				return view('front/memberlisting', compact('websettings','page','settings','user','countries','cities','states','userinfo','userdp','stateOption', 'cityOption','categories','listings'));
			}
		}
	}

	public function companyProfileEdit()
	{
		$settings = $this->settings;
		$websettings = $this->websettings;
		$page = Pages::firstWhere('route_name',"viewcompanyprofile");
		if($page == null)
		{
			$user = Auth::user();
			$page = new \stdClass();
			$page->meta_title = "Company Profile View";
			$page->keywords = "View Company Profile";
			$page->meta_description = "View Company Profile";
			$countries = Countries::all();
			$cities = Cities::all();
			$states = States::all();
			$userinfo = Userinfo::where('member_id', $user->member_id)->first();
			$userdp = Userdp::where('member_id', $user->member_id)->first();
			$stateOption = "";
			$cityOption = "";
			if(!empty($userinfo))
			{
				foreach($states as $state)
				{
					if($userinfo->state == $state->id)
					{
						$stateOption .= '<option value="'.$state->id.'">'.$state->name.'</option>';
					}
				}

				$cityOption = "";
				foreach($cities as $city)
				{
					if($userinfo->city == $city->id)
					{
						$cityOption .= '<option value="'.$city->id.'">'.$city->name.'</option>';
					}
				}
			}
			$page->id = random_int(1,10000);
			$categories = Categories::all();
			return view('front/company-profile-edit', compact('websettings','page','settings','user','countries','cities','states','userinfo','userdp','stateOption', 'cityOption','categories'));
		}
	}

	public function companyProfileStore(Request $request)
	{	
		$company = "";
		$validatedData = $request->validate([
            'name' => 'required',
			'address' => 'required',
			'phone' => 'required',
			'email' => 'required',
			'logo' => 'required'
        ]);

		if(Auth::check())
		{
			$user = Auth::user();
			$member_id = $user->member_id;
			$companyExists = Company::where('member_id', '=', $member_id)->first();
			if ($companyExists === null) 
			{
				$company = new Company();
			}else{
				$company = $companyExists;
			}

			if($request->file('logo'))
			{
				$file= $request->file('logo');
				$filename= date('YmdHi').$file->getClientOriginalName();
				$file->move(public_path('public/company/logo'), $filename);
				$company['logo'] = $filename;
			}

			if($request->file('bannerlogo'))
			{
				$file= $request->file('bannerlogo');
				$filename= date('YmdHi').$file->getClientOriginalName();
				$file->move(public_path('public/company/bannerlogo'), $filename);
				$company['bannerlogo'] = $filename;
			}

			if($request->file('banner'))
			{
				$file= $request->file('banner');
				$filename= date('YmdHi').$file->getClientOriginalName();
				$file->move(public_path('public/company/banner'), $filename);
				$company['banner'] = $filename;
			}

			$company->member_id = $member_id;
			$company->name = $request->name;
			$company->address = $request->address;
			$company->phone = $request->phone;
			$company->email = $request->email;
			$company->website = $request->website;
			$company->taxno = $request->taxno;
			$company->social_accounts = json_encode(array($request->social_accounts));
			$company->description = $request->description;
			$company->products = json_encode($request->products);
			$company->blogs = json_encode($request->blogs);
			$company->seo_description = $request->seo_description;
			$company->seo_keywords = $request->seo_keywords;
			$company->save();

			return redirect()->route('companyprofile')->with('success', 'Profile has been successfully updated.');
		}
		
		return redirect("/memberlogin")->withError('Sorry! You have entered invalid credentials');
	}

	public function getCompanyProfile()
	{
		$settings = $this->settings;
		$websettings = $this->websettings;
		$page = Pages::firstWhere('route_name',"viewcompanyprofile");
		if($page == null)
		{
			$user = Auth::user();
			$page = new \stdClass();
			$page->meta_title = "Company Profile View";
			$page->keywords = "View Company Profile";
			$page->meta_description = "View Company Profile";
			$countries = Countries::all();
			$cities = Cities::all();
			$states = States::all();
			$userinfo = Userinfo::where('member_id', $user->member_id)->first();
			$userdp = Userdp::where('member_id', $user->member_id)->first();
			$stateOption = "";
			$cityOption = "";
			if(!empty($userinfo))
			{
				foreach($states as $state)
				{
					if($userinfo->state == $state->id)
					{
						$stateOption .= '<option value="'.$state->id.'">'.$state->name.'</option>';
					}
				}

				$cityOption = "";
				foreach($cities as $city)
				{
					if($userinfo->city == $city->id)
					{
						$cityOption .= '<option value="'.$city->id.'">'.$city->name.'</option>';
					}
				}
			}
			$page->id = random_int(1,10000);
			$categories = Categories::all();
			$company = Company::where('member_id', '=', $user->member_id)->first();
			return view('front/company-profile', compact('websettings','page','settings','user','countries','cities','states','userinfo','userdp','stateOption', 'cityOption','categories','company'));
		}
	}

	public function companyViews(Request $request)
    {
        $company_id = $request->company_id;
        $company = Company::find($company_id);
        $views = 1;
        if($company->views >= 1)
        {
            $views = $company->views + 1;
        }
        $company->views = $views;
        $company->save();
    }

	public function followMember(Request $request)
	{
		$followed = $request->followed;
		$followed_by = $request->followed_by;
        $following = new Follow();
        $following->followed = $followed;
		$following->followed_by = $followed_by;
        $following->save();
		echo 1;
	}

	public function unfollowMember(Request $request)
	{
		$followed = $request->followed;
		$followed_by = $request->followed_by;
        $followedData = Follow::where('followed_by', $followed_by)->where('followed', $followed)->first();
		$followedData->delete();
		echo 1;
	}
}
