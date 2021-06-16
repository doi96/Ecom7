<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\ProductImage;

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
            'video' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $image_tmp = $request->file('image');

        //move image to folder
        $large_image_path = 'images/front_images/product/large/'.$imageName;
        $medium_image_path = 'images/front_images/product/medium/'.$imageName;
        $small_image_path = 'images/front_images/product/small/'.$imageName;
        // Resize Image code
        Image::make($image_tmp)->save($large_image_path);
        Image::make($image_tmp)->resize(720,720)->save($medium_image_path);
        Image::make($image_tmp)->resize(360,360)->save($small_image_path);
        // Store image name in products table


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

    public function editProduct($id)
    {
        $product = Product::where('id',$id)->first();
        $categories = Category::get();
        return view('admins.products.edit_product')->with(compact('product','categories'));
    }

    public function updateProduct($id, Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
        ]);

        $data = $request->all();

        // add image
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $image_tmp = $request->file('image');
            
            //move image to folder
            $large_image_path = 'images/front_images/product/large/'.$imageName;
            $medium_image_path = 'images/front_images/product/medium/'.$imageName;
            $small_image_path = 'images/front_images/product/small/'.$imageName;

            //remove old file
            $oldImage = Product::where('id',$id)->select('image')->first();
            if (file_exists($large_image_path.$oldImage->image)) {
            unlink($large_image_path.$oldImage->image);
            }

            // Resize Image code
            Image::make($image_tmp)->save($large_image_path);
            Image::make($image_tmp)->resize(720,720)->save($medium_image_path);
            Image::make($image_tmp)->resize(360,360)->save($small_image_path);
            // Store image name in products table

            
        }else {
            $image = Product::where('id',$id)->select('image')->first();
            $imageName = $image->image;
        }

        // add video
        if (isset($request->video)) {
            $videoName = time().'.'.$request->video->extension();  
            $request->video->move(public_path('videos/front_videos/products'), $videoName);
        }else {
            $video = Product::where('id',$id)->select('video')->first();
            $videoName = $video->video;
        }

        $status = isset($data['status'])?$data['status']:0;
        $feature = isset($data['feature'])?$data['feature']:0;

        $product = Product::where('id',$id)->update(['name'=>$data['product_name'],'description'=>$data['description'],'category_id'=>$data['category_id'],'price'=>$data['price'],'image'=>$imageName,'video'=>$videoName,'status'=>$status,'feature'=>$feature]);
        
        Session::flash('success_message','Product has been updated successfully!');
        return redirect()->route('admin.product');
    }

    public function deleteProduct($id)
    {
        //move image to folder
        $large_image_path = 'images/front_images/product/large/';
        $medium_image_path = 'images/front_images/product/medium/';
        $small_image_path = 'images/front_images/product/small/';

        $product = Product::where('id',$id)->first();
        // Deleted Larger Image if not exits in Folder
        if (file_exists($large_image_path.$product->image)) {
            unlink($large_image_path.$product->image);
        }
        // Deleted Medium Image if not exits in Folder
        if (file_exists($medium_image_path.$product->image)) {
            unlink($medium_image_path.$product->image);
        }
        // Deleted Small Image if not exits in Folder
        if (file_exists($small_image_path.$product->image)) {
            unlink($small_image_path.$product->image);
        }

        if($product->video!=NULL){
            if (file_exists('videos/front_videos/products/'.$product->video)) {
                unlink('videos/front_videos/products/'.$product->video);
            }
        }

        //delete slide about product
        $slide = DB::table('slides')->where('type','product')->where('link',$id)->delete();
        $product = Product::where('id',$id)->delete();

        Session::flash('success_message','Product has been deleted successfully!');

        return back();
    }

    public function productImage($id)
    {
      $images = ProductImage::where('product_id',$id)->get();
      return view('admins.products.add_product_image',compact('id','images'));
    }

    public function storeProductImage(Request $request)
    {
        $request->validate([
          'files' => 'required',
        ]);

        if ($request->hasfile('files')) {
          $files = $request->file('files');

          foreach($files as $file) {

            if ($file->extension()=='png' || $file->extension()=='jpg') {
              $name = time().$file->getClientOriginalName();
              $path = 'images/front_images/product_image/';

              Image::make($file)->resize(720,720)->save($path.$name);

              ProductImage::create([
                  'product_id' => $request->product_id,
                  'name' => $name,
                  'path' => $path
                ]);

            }else{

              return back()->with('error', 'Only support file PNG or JPG');

            }
            
            }

            return back()->with('success', 'Files uploaded successfully');
         }
        
    }

    public function deleteProductImage($id)
    {
        $image = ProductImage::where('id',$id)->first();

        if (file_exists('images/front_images/product_image/'.$image->name)) {
            unlink('images/front_images/product_image/'.$image->name);
        }
        $image = ProductImage::where('id',$id)->delete();

        return back()->with('success','Product Image has been deleted successfully!');
    }

}
