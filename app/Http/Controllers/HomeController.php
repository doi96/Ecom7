<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $slides = DB::table('slides')->where('status',1)->get();
        $getCategories = Category::where('status',1)->get();
        $getNewProducts = Product::where('status',1)->orderByDesc('created_at','desc')->limit(3)->get();
        $getFeatureProducts = Product::where('status',1)->where('feature',1)->orderByDesc('created_at','desc')->limit(6)->get();
        
        return view('users.home')->with(compact('getCategories','slides','getNewProducts','getFeatureProducts'));
    }
}
