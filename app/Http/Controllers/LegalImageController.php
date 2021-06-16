<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LegalImage;
use Intervention\Image\Facades\Image;


class LegalImageController extends Controller
{
    public function index()
    {
        $legal_images = LegalImage::all();
        return view('admins.legal.legal_image',compact('legal_images'));
    }

    public function store(Request $request)
    {
        $request->validate([
          'files' => 'required',
          'type' => 'required',
        ]);

        if ($request->hasfile('files')) {
          $files = $request->file('files');

          foreach($files as $file) {

            if ($file->extension()=='png' || $file->extension()=='jpg') {
              $name = time().$file->getClientOriginalName();
              $type = $request->type;
              Image::make($file)->resize(1000,1400)->save('images/front_images/legal/'.$name);

              LegalImage::create([
                  'name' => $name,
                  'type' => $type,
                ]);

            }else{

              return back()->with('error', 'Only support file PNG or JPG');

            }
            
            }

            return back()->with('success', 'Files uploaded successfully');
         }
        
    }

    public function delete($id)
    {
        $image = LegalImage::where('id',$id)->first();

        if (file_exists('images/front_images/legal/'.$image->name)) {
            unlink('images/front_images/legal/'.$image->name);
        }
        $image = LegalImage::where('id',$id)->delete();

        return back()->with('success','Product Image has been deleted successfully!');
    }
}
