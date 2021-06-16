<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductImage;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function index()
    {

      return view('files');
    }

    public function store(Request $request)
    {
        $request->validate([
          'files' => 'required',
        ]);

        if ($request->hasfile('files')) {
          $files = $request->file('files');

          foreach($files as $file) {

            if ($file->extension()=='png' || $file->extension()=='jpg') {
              $name = time().'.'.$file->extension();
              $path = 'uploads/'.$name;

              Image::make($file)->resize(720,720)->save($path);

              ProductImage::create([
                  'product_id' => $request->product_id,
                  'name' => $name,
                  'path' => '/uploads/'
                ]);

              return back()->with('success', 'Files uploaded successfully');
            }else{

              return back()->with('error', 'Only support file PNG or JPG');

            }
            
            }
         }
        
    }
}
