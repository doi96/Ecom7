<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Null_;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admins.products.index')->with(compact('products'));
    }

    public function createProduct()
    {
        $categories = Category::where('status',1)->get();
        return view('admins.products.add_product')->with(compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
            'video' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        
        $request->image->move(public_path('images/front_images/product'), $imageName);

        if (isset($request->video)) {
            $videoName = time().'.'.$request->video->extension();  
            $request->video->move(public_path('videos/front_videos/products'), $videoName);
        }
        $data = $request->all();
        $product = new Product();
        $product->name = $data['product_name'];
        $product->description = $data['description'];
        $product->category_id = $data['category_id'];
        $product->price = $data['price'];
        $product->slug = Str::of($data['product_name'])->slug('-');
        $product->image = $imageName;
        $product->video = isset($videoName)?$videoName:NULL;
        $product->status = isset($request->status)?$request->status:0;
        $product->feature = isset($request->feature)?$request->feature:0;
        $product->save();

        Session::flash('success_message','Product has been added successfully!');

        return redirect()->route('admin.product');
    }

    public function readProduct($id)
    {
        $product = Product::where('id',$id)->with('category')->first();
        // dd($product);
        return view('admins.products.read_product')->with(compact('product'));
    }
}
