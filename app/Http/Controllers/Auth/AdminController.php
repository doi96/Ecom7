<?php

namespace App\Http\Controllers\Auth;

use App\AdminProfile;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.admins.dashboard');
    }

    public function profile()
    {
        $admin = Admin::where('id',auth()->user()->id)->with('adminProfiles')->first();
        // dd($admin);

        return view('admins.admins.profile')->with(compact('admin'));
    }

    public function editProfile(Request $request)
    {
        $data = $request->all();
        $admin = Admin::where('id',auth()->user()->id)->update(['name'=>$data['name'],'email'=>$data['email']]);
        $profileAdmin = AdminProfile::where('admin_id',auth()->user()->id)->update(['full_name'=>$data['full_name'],'phone_number'=>$data['phone'],'address'=>$data['address']]);

        Session::flash('success_message','Your profile has been updated successfully!');
        return back();
    }

    public function avatar(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $imageName = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('images/back_images/admin_avatar'), $imageName);
        
        $profileAdmin = Admin::where('id',auth()->user()->id)->update(['avatar'=>$imageName]);
        
        Session::flash('success_message','Your avatar has been updated successfully!');
        return back();
    }

    public function editPassword()
    {
        return view('admins.admins.change_password');
    }

    public function changePassword(Request $request)
    {
        if (Hash::check($request->current_password, auth()->user()->password)) {

            $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);
            
            if (Hash::check($request->password, auth()->user()->password)) {

                Session::flash('error_message','New password must not same current password!');

                return back();

            }else {
                $new_pwd = Hash::make($request->password);
                $admin = Admin::where('id',auth()->user()->id)->update(['password'=>$new_pwd]);
                Session::flash('success_message','Password has been updated successfully!');
                return back();
            }

        }else {
            Session::flash('error_message','Current password not correct!');
            return back();
        }
        
    }
}
