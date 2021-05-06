<?php

namespace App\Http\Controllers;

use App\Category;
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
}
