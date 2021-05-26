<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
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
        $getNews = Post::where('type','news')->where('status',1)->orderByDesc('created_at','desc')->limit(1)->get();
        $getPost = Post::where(function($query) {
            $query->where('type','uses')->orWhere('type','tutorial')->orWhere('type','orther');
        })->where('status',1)->orderByDesc('created_at','desc')->limit(1)->get();

        //meta SEO website
        $meta_title = 'GCAPVN | Trang chủ | CÔNG TY TNHH GCAPVN';
        $getAbout = Post::where('type','about')->where('status',1)->orderByDesc('created_at','desc')->first();
        $meta_description = $getAbout->description;
        $meta_keywords = 'GCAPVN, RONG NHO VN, RONG NHO KHANH HOA, RONG NHO TUOI, RONG NHO KHO, RONG NHO BOT, RONG NHO DONG GOI';

        return view('users.home')->with(compact('getCategories','slides','getNewProducts','getFeatureProducts','getPost','getNews','meta_title','meta_description','meta_keywords'));
    }
}
