<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->get();
        $listCategories = Category::where('parent_id',NULL)->get();
        // dd($categories);
        return view('admins.categories.index')->with(compact('categories','listCategories'));
    }

    public function create()
    {   
        $categories = Category::where('parent_id',NULL)->get();
        // dd($categories);
        return view('admins.categories.create_category')->with(compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $category = new Category;
        $category->name = $data['category_name'];
        $category->parent_id = isset($data['parent_id']) ? $data['parent_id'] : NULL ;
        $category->description = $data['description'];
        $category->link = Str::of($data['category_name'])->slug('-');
        $category->status = isset($data['status']) ? $data['status'] : 0 ; 
        $category->feature = isset($data['feature']) ? $data['feature'] : 0 ;
        $category->save();

        return back();

    }

    public function destroy($id)
    {   
        $cateName = Category::where('id',$id)->value('name');
        if (Category::where('id',$id)->delete()) {
            Session::flash('success_message','Category '.$cateName. ' has been deleted successfully!');
            return back();
        }
    }

    public function edit(Request $request,$id)
    {
        $data = $request->all();
        $status = isset($data['status']) ? $data['status']:0;
        $feature = isset($data['feature']) ? $data['feature']:0;
        // dd($status);
        $category = Category::where('id',$id)->update(['name'=>$data['category_name'],'parent_id'=>$data['parent_id'],'description'=>$data['description'],'status'=>$status,'feature'=>$feature]);

        Session::flash('success_message','Category has been updated successfully!');

        return back();
    }
}
