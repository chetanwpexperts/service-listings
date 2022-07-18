<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;
use App\Models\Countries;
use App\Models\States;
use App\Models\Cities;
use App\Models\Settings;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $websettings = getSettings(1);
        return view('dashboard',compact('websettings'));
    }

    public function adminSettings()
    {
        $settings = Settings::find(1);
        $countries = Countries::all();
        $websettings = getSettings(1);
        return view('admin.settings.index', compact('settings', 'countries','websettings'));
    }

    public function settingupdate(Request $request, $id)
    {
        $input = $request->all();
        $setting = Settings::find($id);
        if($request->file('header_logo'))
        {
            $file= $request->file('header_logo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/admin/settings'), $filename);
            $setting->header_logo = $filename;
        }

        if($request->file('home_page_fav_icon'))
        {
            $file= $request->file('home_page_fav_icon');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/admin/settings'), $filename);
            $setting->home_page_fav_icon = $filename;
        }

        if($request->file('home_page_banner'))
        {
            $file= $request->file('home_page_banner');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/admin/settings'), $filename);
            $setting->home_page_banner = $filename;
        }

        if($request->file('admin_photo'))
        {
            $file= $request->file('admin_photo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/admin/settings'), $filename);
            $setting->admin_photo = $filename;
        }
        $setting->admin_countries = json_encode($request->input('admin_countries'));
        $response = $setting->save();
        if($response)
        {
            return redirect()->route('admin.settings')
                            ->with('success','Settings updated successfully');
        }
    }
}
