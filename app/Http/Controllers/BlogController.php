<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('blogs.index', ['blogs' => $blogs]);
    }
    public function create()
    {
        return view('blogs.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg'
        ]);
        // validate input data
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->description = $request->description;
        //do it
        if($request->hasFile('image')){
            $rand=rand('111111111','999999999');
            $image=$request->file('image');
            $ext=$image->extension();
            $imageName=$rand.'.'.$ext;
            $image->storeAs('/public/blogs',$imageName);
            $blog->image=$imageName;
        }
        if($blog->save()){
            $request->session()->flash('msg','Your Blog Is Submitted SuccessFully');
            //return response
            return redirect()->route('admin.blogs.index');
        }
        else{
            $request->session()->flash('msg','Error');
            //return reponse
            return redirect()->back()->withInput();
        }
    }
    public function edit($id)
    {
        $blog = Blog::findOrfail($id);
        // echo '<pre>';
        // print_r($blog);
        // die();
        return  view('blogs.edit')->with('blog', $blog);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'mimes:png,jpg,jpeg'
        ]);
        // validate input data
        $blog = Blog::findorFail($id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        // $blog->image=$request->image;
        //do it
        if($request->hasFile('image')){
            $rand=rand('111111111','999999999');
            $image=$request->file('image');
            $ext=$image->extension();
            $imageName=$rand.'.'.$ext;
            $image->storeAs('/public/blogs',$imageName);
            $blog->image=$imageName;
        }
        if($blog->save()){
            $request->session()->flash('msg','Your Blog Is SuccessFully Updated');
            //return response
            return redirect()->route('admin.blogs.index');
        }
        else{
            $request->session()->flash('msg','Something false');
            //return reponse
            return redirect()->back()->withInput();
        }
    }
    public function destroy($id)
    {
        $blog = Blog::findorFail($id);
        $blog->delete();
        return redirect()->route('admin.blogs');
    }
    public function show($id)
    {
        # code...
    }
}
