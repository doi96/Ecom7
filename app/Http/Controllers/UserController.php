<?php

namespace App\Http\Controllers;

use App\Category;
use App\Distribution;
use App\Post;
use App\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getProductbyCategory($id)
    {
        $getCategories = Category::where('status',1)->with('products')->get();
        $getProducts = Product::where('category_id',$id)->where('status',1)->get();
        $IdActive = $id;
        // dd($getCategories);
        return view('users.products.list_product')->with(compact('getProducts','getCategories','IdActive'));
    }

    public function allProduct()
    {
        $getCategories = Category::where('status',1)->with('products')->get();
        $products = Product::where('status',1)->orderByDesc('created_at','desc')->get();
        
        return view('users.products.all_products')->with(compact('products','getCategories'));
    }

    public function contact()
    {
        $getCategories = Category::where('status',1)->with('products')->get();
        return view('users.contact.contact')->with(compact('getCategories'));
    }

    public function abouts()
    {
        $getCategories = Category::where('status',1)->with('products')->get();
        $about = Post::where('type','about')->where('status',1)->orderByDesc('created_at','desc')->first();

        return view('users.about.about')->with(compact('about','getCategories'));
    }

    public function getPost($type)
    {
        $getCategories = Category::where('status',1)->with('products')->get();
        $posts = Post::where('status',1)->where('type',$type)->orderByDesc('created_at','desc')->paginate(5);

        // dd($posts);
        return view('users.post.list_post')->with(compact('posts','getCategories','type'));
    }

    public function readPost($type,$id)
    {
        $getCategories = Category::where('status',1)->with('products')->get();
        $post = Post::where('status',1)->where('id',$id)->first();
        $samePosts = Post::where('status',1)->where('type',$type)->orderByDesc('created_at','desc')->limit(10)->get();

        return view('users.post.read_post')->with(compact('post','type','getCategories','samePosts'));
    }

    public function searchPost(Request $request)
    {
        $value = $request->search;
        $getCategories = Category::where('status',1)->with('products')->get();

        $posts = Post::where(function($query) use($value){
            $query->where('title','LIKE','%'.$value.'%')->orWhere('description','LIKE','%'.$value.'%');
        })->where('status',1)->where('type','!=','about')->paginate(5);

        return view('users.post.list_post')->with(compact('posts','value','getCategories'));
    }

    public function searchProduct(Request $request)
    {
        $value = $request->search;
        $getCategories = Category::where('status',1)->with('products')->get();

        $products = Product::where(function($query) use($value){
            $query->where('name','LIKE','%'.$value.'%')->orWhere('description','LIKE','%'.$value.'%');
        })->where('status',1)->paginate(6);

        return view('users.products.list_search_product')->with(compact('products','value','getCategories'));
    }

    public function viewDistributor()
    {
        $getCategories = Category::where('status',1)->with('products')->get();
        $distri_north = Distribution::where('status',1)->where('area','north')->get();
        $distri_south = Distribution::where('status',1)->where('area','south')->get();
        $distri_middle = Distribution::where('status',1)->where('area','middle')->get();
        $distri_orther = Distribution::where('status',1)->where('area','orther')->get();

        return view('users.distribution.distributor_list')->with(compact('getCategories','distri_north','distri_south','distri_middle','distri_orther'));
    }

    public function searchDistributor(Request $request)
    {
        $value = $request->search;
        $getCategories = Category::where('status',1)->with('products')->get();

        $distributor_searchs = Distribution::where(function($query) use($value){
            $query->where('name','LIKE','%'.$value.'%')->orWhere('website','LIKE','%'.$value.'%')->orWhere('address','LIKE','%'.$value.'%');
        })->where('status',1)->paginate(5);

        return view('users.distribution.list_search')->with(compact('distributor_searchs','getCategories'));
    }
}
