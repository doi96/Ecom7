<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getProductbyCategory($id)
    {
        $getCategories = Category::where('status',1)->get();
        $getProducts = Product::where('category_id',$id)->where('status',1)->get();
        
        return view('users.products.list_product')->with(compact('getProducts','getCategories'));
    }
}
