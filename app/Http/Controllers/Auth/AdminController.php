<?php

namespace App\Http\Controllers\Auth;

use App\AdminProfile;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

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

    public function avatar(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $imageName = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('images/back_images/admin_avatar'), $imageName);
        
        $profileAdmin = AdminProfile::where('admin_id',auth()->user()->id)->update(['avatar'=>$imageName]);
        
        return back();
    }
}
