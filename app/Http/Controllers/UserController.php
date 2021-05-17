<?php

namespace App\Http\Controllers;

use App\Category;
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
        $typePost = $type;
        return view('users.post.uses_post')->with(compact('posts','getCategories','typePost'));
    }

    public function readPost($type,$id)
    {
        $getCategories = Category::where('status',1)->with('products')->get();
        $use = Post::where('status',1)->where('id',$id)->first();
        $usesSame = Post::where('status',1)->where('type','uses')->orderByDesc('created_at','desc')->limit(10)->get();

        return view('users.post.read_post')->with(compact('use','getCategories','usesSame'));
    }
}
