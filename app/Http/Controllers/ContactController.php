<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\Session;
use Mail;

class ContactController extends Controller
{
    public function contact()
    {
        $getCategories = Category::where('status',1)->with('products')->get();

        $meta_title = 'GCAPVN | Liên hệ | CÔNG TY TNHH GCAPVN';
        $getAbout = Post::where('type','about')->where('status',1)->orderByDesc('created_at','desc')->first();
        $meta_description = $getAbout->description;
        $meta_keywords = 'GCAPVN, RONG NHO VN, RONG NHO KHANH HOA, RONG NHO TUOI, RONG NHO KHO, RONG NHO BOT, RONG NHO DONG GOI, CONTACT, LIEN HE';

        return view('users.contact.contact')->with(compact('getCategories','meta_title','meta_description','meta_keywords'));
    }

    public function contactPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $data = $request->all();
        $dataMail = ['name'=>$data['name'],'email'=>$data['email'],'content'=>$data['content'],'phone'=>$data['phone']];
        Mail::send('users.mail.mail_contact', $dataMail, function($msg) {
         $msg->to('gcapvn79@gmail.com', 'gcapvn.com')->subject ('[GCAPVN - Website]- Customer Contact');
         $msg->from('standbyme0128@gmail.com','GCAPVN - Website');
      });

      Session::flash('success_message','Mail của bạn đã được gửi, chúng tôi sẽ liên lạc sớm cho bạn. Vui lòng kiểm tra mail (có thể ở mục thư rác) hoặc số điện thoại để nhận được liên lạc. Chân thành cảm ơn!');
      return back();
      
    }
}
