<?php

namespace App\Http\Controllers\Auth;

use App\AdminProfile;
use App\Distribution;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Post;
use App\ReturnPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.admins.dashboard');
    }

    public function profile()
    {
        $admin = Admin::where('id',auth()->user()->id)->with('adminProfiles')->first();
        // dd($admin);

        return view('admins.admins.profile')->with(compact('admin'));
    }

    public function editProfile(Request $request)
    {
        $data = $request->all();
        $admin = Admin::where('id',auth()->user()->id)->update(['name'=>$data['name'],'email'=>$data['email']]);
        $profileAdmin = AdminProfile::where('admin_id',auth()->user()->id)->update(['full_name'=>$data['full_name'],'phone_number'=>$data['phone'],'address'=>$data['address']]);

        Session::flash('success_message','Your profile has been updated successfully!');
        return back();
    }

    public function avatar(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $imageName = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('images/back_images/admin_avatar'), $imageName);
        
        $profileAdmin = Admin::where('id',auth()->user()->id)->update(['avatar'=>$imageName]);
        
        Session::flash('success_message','Your avatar has been updated successfully!');
        return back();
    }

    public function editPassword()
    {
        return view('admins.admins.change_password');
    }

    public function changePassword(Request $request)
    {
        if (Hash::check($request->current_password, auth()->user()->password)) {

            $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);
            
            if (Hash::check($request->password, auth()->user()->password)) {

                Session::flash('error_message','New password must not same current password!');

                return back();

            }else {
                $new_pwd = Hash::make($request->password);
                $admin = Admin::where('id',auth()->user()->id)->update(['password'=>$new_pwd]);
                Session::flash('success_message','Password has been updated successfully!');
                return back();
            }

        }else {
            Session::flash('error_message','Current password not correct!');
            return back();
        }
        
    }

    public function slider()
    {
        $slides = DB::table('slides')->get();
        // dd($slides);
        return view('admins.slides.index')->with(compact('slides'));
    }

    public function createSlider()
    {
        return view('admins.slides.create_slide');
    }

    public function storeSlider(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required'
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $image_tmp = $request->file('image');

        //move image to folder
        $large_image_path = 'images/front_images/slider/'.$imageName;
        Image::make($image_tmp)->save($large_image_path);

        $data = $request->all();
        $status = isset($data['status'])?$data['status'] : 0 ;

        $slides = DB::table('slides')->insert(['title'=>$data['title'],'description'=>$data['description'],'image'=>$imageName,'link'=>$data['link'],'status'=>$status]);
        
        Session::flash('success_message','Slide has been added successfully!');
        return redirect()->route('admin.slider');
    }

    public function editSlider(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required'
        ]);
        if (isset($request->image)) {
            
            $imageName = time().'.'.$request->image->extension();  
            $image_tmp = $request->file('image');

            //move image to folder
            $large_image_path = 'images/front_images/slider/'.$imageName;
            Image::make($image_tmp)->save($large_image_path);
        
        }else {
            $getImage = DB::table('slides')->where('id',$id)->first();
            $imageName = $getImage->image;
        }

        $data = $request->all();
        $status = isset($data['status'])?$data['status'] : 0 ;

        $slides = DB::table('slides')->where('id',$id)->update(['title'=>$data['title'],'description'=>$data['description'],'image'=>$imageName,'link'=>$data['link'],'status'=>$status]);

        Session::flash('success_message','Slide has been updated successfully!');

        return back();
    }

    public function deleteSlider($id)
    {
        $slide = DB::table('slides')->where('id',$id)->delete();
        Session::flash('success_message','Slide has been deleted sucessfully!');

        return back();
    }

    public function getallPost()
    {
        $posts = Post::all();
        return view('admins.posts.index')->with(compact('posts'));
    }

    public function createPost()
    {
        return view('admins.posts.create_post');
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'type_post' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
        ]);

        if ($request->image) {
            $imageName = time().'.'.$request->image->extension();  
            $image_tmp = $request->file('image');

            //move image to folder
            $large_image_path = 'images/front_images/post/'.$imageName;
            Image::make($image_tmp)->resize(750,350)->save($large_image_path);
        }

        if (isset($request->video)) {
            $videoName = time().'.'.$request->video->extension();  
            $request->video->move(public_path('videos/front_videos/products'), $videoName);
        }

        $data = $request->all();
        $post = new Post();
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->type = $data['type_post'];
        $post->image = isset($data['image'])?$imageName:NULL;
        $post->video = isset($data['video'])?$videoName:NULL;
        $post->status = isset($data['status'])?1:0;
        $post->save();

        Session::flash('success_message','Post has been created successfully!');

        return redirect()->route('admin.post.all');
    }

    public function readPost($id)
    {
        $post = Post::where('id',$id)->first();

        return view('admins.posts.read_post')->with(compact('post'));
    }

    public function deletePost($id)
    {
        $post = Post::where('id',$id)->delete();

        Session::flash('success_message','The Post has been deleted successfully!');

        return back();
    }

    public function editPost($id)
    {
        $post = Post::where('id',$id)->first();

        return view('admins.posts.edit_post')->with(compact('post'));
    }

    public function updatePost($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type_post' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'mimes:mp4,avi'
        ]);
        
        if ($request->image) {
            $imageName = time().'.'.$request->image->extension();  
            $image_tmp = $request->file('image');

            //move image to folder
            $large_image_path = 'images/front_images/post/'.$imageName;
            Image::make($image_tmp)->resize(750,350)->save($large_image_path);
        }else {
            $image = Post::where('id',$id)->select('image')->first();
            $imageName = $image ->image;
            // echo $imageName;die;
        }

        if (isset($request->video)) {
            $videoName = time().'.'.$request->video->extension();  
            $request->video->move(public_path('videos/front_videos/post'), $videoName);
        }else{
            $video = Post::where('id',$id)->select('video')->first();
            $videoName = $video->video;
        }

        $data = $request->all();
        $status = isset($data['status'])?1:0;
        $post = Post::where('id',$id)->update(['title'=>$data['title'],'type'=>$data['type_post'],'description'=>$data['description'],'status'=>$status,'image'=>$imageName,'video'=>$videoName]);

        Session::flash('success_message','Post has been updated successfully!');
        // $imageName = Post::where('id',$id)->select('image')->first();
        // $imageName = $image ->image;
        // echo $imageName;die;

        return redirect()->route('admin.post.all');

    }

    public function distributorIndex()
    {
        $distributions = Distribution::all();
        return view('admins.distribution.index')->with(compact('distributions'));
    }

    public function addDistributor()
    {
        return view('admins.distribution.add_distribution');
    }

    public function storeDistributor(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'area' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
        ]);

        $data = $request->all();
        $distributor = new Distribution();
        $distributor->name = $data['name'];
        $distributor->area = isset($data['area'])?$data['area']:'orther';
        $distributor->address = $data['address'];
        $distributor->phone = $data['phone'];
        $distributor->website = $data['website'];
        $distributor->status = isset($data['status'])?$data['status']:0;
        $distributor->save();

        Session::flash('success_message','Distributor has been added successfully!');
        return redirect()->route('admin.distributor');
    }

    public function updateDistributor($id,Request $request)
    {
        $request->validate([
            'name' => 'required',
            'area' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
        ]);

        $data = $request->all();
        $status = isset($data['status'])?$data['status']:0;
        $distributor = Distribution::where('id',$id)->update(['name'=>$data['name'],'area'=>$data['area'],'address'=>$data['address'],'phone'=>$data['phone'],'website'=>$data['website'],'status'=>$status]);
        Session::flash('success_message','Distributor has been updated successfull!');

        return back();
    }

    public function deleteDistributor($id)
    {
        $distributor = Distribution::where('id',$id)->delete();
        Session::flash('success_message','Distributor has been deleted successfull!');

        return back();
    }

    public function retrunPolicy()
    {
        $returnPolicies = ReturnPolicy::all();
        return view('admins.distribution.return_policy')->with(compact('returnPolicies'));
    }

    public function createPolicy()
    {
        return view('admins.distribution.create_policy');
    }

    public function storePolicy(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);
        
        $data = $request->all();
        $policy = new ReturnPolicy();
        $policy->title = $data['title'];
        $policy->description = $data['description'];
        $policy->type = $data['type'];
        $policy->status = isset($data['status'])?$data['status']:0;
        $policy->save();

        Session::flash('success_message','Policy has been added successfully!');
        return redirect()->route('admin.distribution.return');
    }

    public function readPolicy($id)
    {
        $policy = ReturnPolicy::where('id',$id)->first();
        return view('admins.distribution.read_policy')->with(compact('policy'));
    }

    public function editPolicy($id)
    {
        $policy = ReturnPolicy::where('id',$id)->first();
        return view('admins.distribution.edit_policy')->with(compact('policy'));
    }

    public function updatePolicy($id,Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);
        $data = $request->all();
        $status = isset($data['status'])?$data['status']:0;

        $policy = ReturnPolicy::where('id',$id)->update(['title'=>$data['title'],'type'=>$data['type'],'description'=>$data['description'],'status'=>$status]);
        Session::flash('success_message','Policy has been updated successfully!');

        return redirect()->route('admin.distribution.return');
    }

    public function deletePolicy($id)
    {
        $policy = ReturnPolicy::where('id',$id)->delete();
        Session::flash('success_message','Policy has been deleted successfully!');

        return redirect()->route('admin.distribution.return');
    }

}
