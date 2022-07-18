<?php

use Illuminate\Support\Facades\DB;
use App\Models\Ratings;

function sendotp($phone, $otp)
{
	$authkeyUrl = "https://api.authkey.io/request?";
	$paramArray = Array(
		 'authkey' => '7ba688615da3e864',
		 'mobile' => $phone,
		 'country_code' => '91',
		 'sid' => '5093',
		 'company' => 'Future Touch Account',
		 'otp' => $otp
	);
	$parameters = http_build_query($paramArray);
	$url = $authkeyUrl . $parameters;
	$curl = curl_init();
	curl_setopt_array($curl, array(
		 CURLOPT_URL => $url,
		 CURLOPT_RETURNTRANSFER => true,
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) 
	{
		 return "cURL Error #:" . $err;
	} else {
		 return $response;
	}
}

function generateNumericOTP($n=6, $otp2=NULL) 
{
	$generator = ($otp2 != NULL) ? "7902653814" : "1357902468";
	$result = "";
	for ($i = 1; $i <= $n; $i++) 
	{
		$result .= substr($generator, (rand()%(strlen($generator))), 1);
	}
	return $result;
}

function sendotponemail($email, $otp, $username)
{
	$arr = array(
		"mail_id"=> 7,
		"subject"=> "OTP to verify email",
		"body"=> "Yout otp is " . $otp . "",
		"to"=>array(
				array(
					"email"=> $email,
					"name" => $username
				)
			)
	);

	$arr = json_encode($arr);

	$url = 'https://liveapps.face2friend.com/api/sendEmail';
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);
}

function getCategoryName($parent_id)
{
	$data = DB::table('listing_categories')->where('id', $parent_id )->first();
	return $data->category_name;
}

function random_strings($length_of_string)
{
 
    // String of all alphanumeric character
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
 
    // Shuffle the $str_result and returns substring
    // of specified length
    return substr(str_shuffle($str_result),
                       0, $length_of_string);
}

function getMemberName($mid)
{
	$data = DB::table('users')->where('member_id', $mid )->first();
	return $data->name;
}

function getCityName($city_id)
{
	$data = DB::table('cities')->where('id', $city_id )->first();
	return $data->name;
}

function getSubCateories($parent_id)
{
	$categories = DB::table('listing_categories')->where('parent_id', '=', $parent_id)->get();
	return $categories;
}

function getMemberLisitngCount($member_id)
{
	$data = DB::table('listings')->where('member_id', $member_id)->get();
	echo count($data);
}

function getCategoryListingCount($parent=null, $child=null)
{
	if($parent != null)
	{
		$data = DB::table('listings')->where('category_id', $parent)->get();
		echo count($data);
	}

	if($child != null)
	{
		$data = DB::table('listings')->where('sub_category_id', 'LIKE', '%'.$child.'%')->get();
		echo count($data);
	}
}

function alreadyLiked($listing_id, $member_id)
{
	$data = DB::table('likes')->where('member_id', $member_id)->where('listing_id', $listing_id)->first();
	if(empty($data))
	{
		return 1;
	}else{
		return 0;
	}
}

function alreadyRated($listing_id, $member_id)
{
	$data = DB::table('ratings')->where('member_id', $member_id)->where('listing_id', $listing_id)->first();
	if(empty($data))
	{
		return 1;
	}else{
		return 0;
	}
}

function like($listing_id, $member_id)
{
	$data = DB::table('likes')->where('member_id', $member_id)->where('listing_id', $listing_id)->first();
	if(empty($data))
	{
		return false;
	}else{
		return $data;
	}
}

function getratings($listing_id, $member_id)
{
	$data = DB::table('ratings')->where('member_id', $member_id)->where('listing_id', $listing_id)->first();
	if(empty($data))
	{
		return false;
	}else{
		return number_format($data->rating,1);
	}
}

function getavgrating($listing_id)
{
	$data = Ratings::where('listing_id',$listing_id)->selectRaw('SUM(rating)/COUNT(listing_id) AS avg_rating')->first();
	if(empty($data))
	{
		return false;
	}else{
		return number_format($data->avg_rating,1);
	}
}

function countFollowing($member_id)
{
	$data = DB::table('follow')->where('followed', $member_id)->count();
	echo $data;
}

function countUsers()
{
	$data = DB::table('users')->where('member_id', '!=', "")->count();
	echo $data;
}

function getOtherInformation($cat_id)
{
	$data = DB::table('categorinfo')->where('category_id', $cat_id)->get();
	return $data;
}

function getFAQs($cat_id)
{
	$data = DB::table('categoryfaq')->where('category_id', $cat_id)->get();
	return $data;
}

function getUserDp($member_id)
{
	$data = DB::table('userdp')->where('member_id', $member_id)->first();
	$imgSrc = asset('public/images/defaultimg.png');
	if(!empty($data))
	{			
		if($data->image != "" || $data->image != null)
		{
			$imgSrc = asset('public/public/user/dp/' . $data->image);
		}
	}
	return $imgSrc;
}

function getSettings($id)
{
	$data = DB::table('settings')->where('id', $id)->first();
	$arr = array();
	$arr['logo'] = $data->header_logo;
	$arr['mobile_logo'] = $data->mobile_view_logo;
	$arr['fav_icon'] = $data->home_page_fav_icon;
	$arr['email'] = $data->admin_primary_email;
	$arr['url'] = $data->website_complete_url;
	$arr['currency'] = $data->currency_symbol;
	$arr['home_page_banner'] = $data->home_page_banner;
	$arr['copyright_year'] = $data->copyright_year;
	$arr['copyright_website'] = $data->copyright_website;
	$arr['copyright_website_link'] = $data->copyright_website_link;
	$arr['admin_photo'] = $data->admin_photo;
	$arr['footer_mobile'] = $data->footer_mobile;
	$arr['footer_address'] = $data->footer_address;

	return $arr;
}

function getcategorySlug($category_id)
{
	$data = DB::table('listing_categories')->where('id', $category_id)->first();
	return $data->category_slug;
}