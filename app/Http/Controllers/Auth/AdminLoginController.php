<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    
    public function showLoginForm()
    {
      return view('admins.admins.login');
    }
    
    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
      ]);
      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
        $admin = Admin::where('id',auth()->user()->id)->with('adminProfiles')->fisrt();
        // dd($admin);
        return redirect()->intended(route('admin.dashboard'))->with(compact('admin'));
      } 
      // if unsuccessful, then redirect back to the login with the form data
      Session::flash('error_message','Email or Password is not correct!');
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
