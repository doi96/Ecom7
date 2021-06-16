<?php

namespace App\Http\Controllers;

use App\Category;
use App\Distribution;
use App\LegalImage;
use App\Post;
use App\Product;
use App\ProductImage;
use App\ReturnPolicy;
use App\Traceability;
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

    public function productDetail($id)
    {
        $getCategories = Category::where('status',1)->with('products')->get();
        $product = Product::where('id',$id)->where('status',1)->with('productImages')->first();
        // dd($product);
        $meta_title = 'GCAPVN | Chi tiết sản phẩm | CÔNG TY TNHH GCAPVN';
        $meta_description = $product->description;
        $meta_keywords = 'GCAPVN, RONG NHO VN, RONG NHO KHANH HOA, RONG NHO TUOI, RONG NHO KHO, RONG NHO BOT, RONG NHO DONG GOI,'.$product->name;

        return view('users.products.product_detail',compact('getCategories','product','meta_title','meta_description','meta_keywords'));
    }

    public function abouts()
    {
        $getCategories = Category::where('status',1)->with('products')->get();
        $about = Post::where('type','about')->where('status',1)->orderByDesc('created_at','desc')->first();

        $meta_title = 'GCAPVN | Giới thiệu | CÔNG TY TNHH GCAPVN';
        $getAbout = Post::where('type','about')->where('status',1)->orderByDesc('created_at','desc')->first();
        $meta_description = $getAbout->description;
        $meta_keywords = 'GCAPVN, RONG NHO VN, RONG NHO KHANH HOA, RONG NHO TUOI, RONG NHO KHO, RONG NHO BOT, RONG NHO DONG GOI';

        return view('users.about.about')->with(compact('about','getCategories','meta_title','meta_description','meta_keywords'));
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

        $meta_title = 'GCAPVN | Xem bài viết | CÔNG TY TNHH GCAPVN';
        $getAbout = Post::where('status',1)->where('id',$id)->first();
        $meta_description = $getAbout->description;
        $meta_keywords = 'GCAPVN, RONG NHO VN, RONG NHO KHANH HOA, RONG NHO TUOI, RONG NHO KHO, RONG NHO BOT, RONG NHO DONG GOI, PHAN PHOI RONG NHO';

        return view('users.post.read_post')->with(compact('post','type','getCategories','samePosts','meta_title','meta_description','meta_keywords'));
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

        $meta_title = 'GCAPVN | Tìm sản phẩm | CÔNG TY TNHH GCAPVN';
        $getAbout = Post::where('type','about')->where('status',1)->orderByDesc('created_at','desc')->first();
        $meta_description = $getAbout->description;
        $meta_keywords = 'GCAPVN, RONG NHO VN, RONG NHO KHANH HOA, RONG NHO TUOI, RONG NHO KHO, RONG NHO BOT, RONG NHO DONG GOI, PHAN PHOI RONG NHO';

        return view('users.products.list_search_product')->with(compact('products','value','getCategories','meta_title','meta_description','meta_keywords'));
    }

    public function viewDistributor()
    {
        $getCategories = Category::where('status',1)->with('products')->get();
        $distri_north = Distribution::where('status',1)->where('area','north')->get();
        $distri_south = Distribution::where('status',1)->where('area','south')->get();
        $distri_middle = Distribution::where('status',1)->where('area','middle')->get();
        $distri_orther = Distribution::where('status',1)->where('area','orther')->get();

        $meta_title = 'GCAPVN | Phân phối | CÔNG TY TNHH GCAPVN';
        $getAbout = Post::where('type','about')->where('status',1)->orderByDesc('created_at','desc')->first();
        $meta_description = $getAbout->description;
        $meta_keywords = 'GCAPVN, RONG NHO VN, RONG NHO KHANH HOA, RONG NHO TUOI, RONG NHO KHO, RONG NHO BOT, RONG NHO DONG GOI, PHAN PHOI RONG NHO';

        return view('users.distribution.distributor_list')->with(compact('getCategories','distri_north','distri_south','distri_middle','distri_orther','meta_title','meta_description','meta_keywords'));
    }

    public function searchDistributor(Request $request)
    {
        $value = $request->search;
        $getCategories = Category::where('status',1)->with('products')->get();

        $distributor_searchs = Distribution::where(function($query) use($value){
            $query->where('name','LIKE','%'.$value.'%')->orWhere('website','LIKE','%'.$value.'%')->orWhere('address','LIKE','%'.$value.'%');
        })->where('status',1)->paginate(5);

        $meta_title = 'GCAPVN | Tìm địa nhà phân phối | CÔNG TY TNHH GCAPVN';
        $getAbout = Post::where('type','about')->where('status',1)->orderByDesc('created_at','desc')->first();
        $meta_description = $getAbout->description;
        $meta_keywords = 'GCAPVN, RONG NHO VN, RONG NHO KHANH HOA, RONG NHO TUOI, RONG NHO KHO, RONG NHO BOT, RONG NHO DONG GOI, PHAN PHOI RONG NHO';
        
        return view('users.distribution.list_search')->with(compact('distributor_searchs','getCategories','meta_title','meta_description','meta_keywords'));
    }

    public function viewDistribution()
    {
        $getCategories = Category::where('status',1)->with('products')->get();

        $distri_infor = ReturnPolicy::where('status',1)->where('type','infor')->orderByDesc('created_at','desc')->limit(1)->get();
        $distri_shipping = ReturnPolicy::where('status',1)->where('type','shipping')->orderByDesc('created_at','desc')->limit(1)->get();
        $distri_commit = ReturnPolicy::where('status',1)->where('type','commit')->orderByDesc('created_at','desc')->limit(1)->get();
        $distri_return = ReturnPolicy::where('status',1)->where('type','return')->orderByDesc('created_at','desc')->limit(1)->get();

        $meta_title = 'GCAPVN | Phân phối | CÔNG TY TNHH GCAPVN';
        $getAbout = Post::where('type','about')->where('status',1)->orderByDesc('created_at','desc')->first();
        $meta_description = $getAbout->description;
        $meta_keywords = 'GCAPVN, RONG NHO VN, RONG NHO KHANH HOA, RONG NHO TUOI, RONG NHO KHO, RONG NHO BOT, RONG NHO DONG GOI, PHAN PHOI RONG NHO';

        return view('users.distribution.distribution_policy')->with(compact('getCategories','distri_infor','distri_shipping','distri_commit','distri_return','meta_title','meta_description','meta_keywords'));
    }

    public function traceability($id)
    {
        $trace = Traceability::where('id',$id)->first();
        $getCategories = Category::where('status',1)->with('products')->get();
        $meta_title = 'GCAPVN | Truy xuất nguồn gốc | CÔNG TY TNHH GCAPVN';
        $getAbout = Post::where('type','about')->where('status',1)->orderByDesc('created_at','desc')->first();
        $meta_description = $getAbout->description;
        $meta_keywords = 'GCAPVN, RONG NHO VN, RONG NHO KHANH HOA, RONG NHO TUOI, RONG NHO KHO, RONG NHO BOT, RONG NHO DONG GOI, PHAN PHOI RONG NHO';
        
        return view('users.tracea.view_tracea',compact('trace','getCategories','meta_title','meta_description','meta_keywords'));
    }

    public function searchTracea(Request $request)
    {
        $getCategories = Category::where('status',1)->with('products')->get();
        $meta_title = 'GCAPVN | Truy xuất nguồn gốc | CÔNG TY TNHH GCAPVN';
        $getAbout = Post::where('type','about')->where('status',1)->orderByDesc('created_at','desc')->first();
        $meta_description = $getAbout->description;
        $meta_keywords = 'GCAPVN, RONG NHO VN, RONG NHO KHANH HOA, RONG NHO TUOI, RONG NHO KHO, RONG NHO BOT, RONG NHO DONG GOI, PHAN PHOI RONG NHO';

        $trace = Traceability::where('traceacode',$request->search)->first();
        return view('users.tracea.view_search',compact('trace','getCategories','meta_title','meta_description','meta_keywords'));
    }

    public function legal()
    {
        $getCategories = Category::where('status',1)->with('products')->get();
        $meta_title = 'GCAPVN | Chứng nhận và Bản quyền | CÔNG TY TNHH GCAPVN';
        $getAbout = Post::where('type','about')->where('status',1)->orderByDesc('created_at','desc')->first();
        $meta_description = $getAbout->description;
        $meta_keywords = 'GCAPVN, RONG NHO VN, RONG NHO KHANH HOA, RONG NHO TUOI, RONG NHO KHO, RONG NHO BOT, RONG NHO DONG GOI, PHAN PHOI RONG NHO';

        $legal_copyright = LegalImage::where('type',1)->get();
        $legal_certi = LegalImage::where('type',2)->get();

        return view('users.legal.view_legal',compact('legal_copyright','legal_certi','getCategories','meta_title','meta_keywords','meta_description'));
    }

}
