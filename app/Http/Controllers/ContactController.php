<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Session;
use Mail;

class ContactController extends Controller
{
    public function contact()
    {
        $getCategories = Category::where('status',1)->with('products')->get();
        return view('users.contact.contact')->with(compact('getCategories'));
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
