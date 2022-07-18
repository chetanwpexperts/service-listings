<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Countries;
use App\Models\States;
use App\Models\Cities;
use App\Models\Userinfo;
use App\Models\Userdp;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Pagination\Paginator;
    
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Paginator::useBootstrap();
        $data = User::orderBy('id','DESC')->paginate(20);
        return view('admin.users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.create',compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $countries = Countries::all();
        $cities = Cities::all();
        $states = States::all();
        $userinfo = Userinfo::where('member_id', $user->member_id)->first();
        
        $stateOption = "";
        $cityOption = "";
        if(!empty($userinfo))
        {
            foreach($states as $state)
            {
                if($userinfo->state == $state->id)
                {
                    $stateOption .= '<option value="'.$state->id.'" selected>'.$state->name.'</option>';
                }
            }

            $cityOption = "";
            foreach($cities as $city)
            {
                if($userinfo->city == $city->id)
                {
                    $cityOption .= '<option value="'.$city->id.'" selected>'.$city->name.'</option>';
                }
            }
        }

		$userdp = Userdp::where('member_id', $user->member_id)->first();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('admin.users.edit',compact('user','roles','userRole','countries','states','cities','userinfo','userdp','stateOption', 'cityOption'));
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
        $this->validate($request, [
            'type' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $response = $user->update($input);
        if($response)
        {
            $roles = $request->input('type');
            $userinfo = Userinfo::where('member_id', $user->member_id)->first();
            if(empty($userinfo))
            {
                $userinfo = new Userinfo();
            }
            $userinfo->member_id = $user->member_id;
            $userinfo->country = $request->country;
            $userinfo->state = $request->state;
            $userinfo->city = $request->city;
            $userinfo->roles = $roles;
            $userinfo->facebook_url = $request->input('facebook_url');
            $userinfo->twitter_url = $request->input('twitter_url');
            $userinfo->website = $request->input('website');
            $userinfo->save();
            
            $userdp = Userdp::where('member_id', $user->member_id)->first();
            if(empty($userdp))
            {
                $userdp = new Userdp();
            }
            if($request->file('profile_image'))
			{
				$file= $request->file('profile_image');
				$filename= date('YmdHi').$file->getClientOriginalName();
				$file->move(public_path('public/user/dp'), $filename);
				$userdp['image'] = $filename;
			}
            $userdp->member_id = $user->member_id;
            $userdp->save();

            DB::table('model_has_roles')->where('model_id',$id)->delete();
            
            $user->assignRole($roles);
        
            return redirect()->route('users')
                            ->with('success','User updated successfully');
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}