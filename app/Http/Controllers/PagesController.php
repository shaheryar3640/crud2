<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('front.index')->with('blogs', $blogs);
    }
    public function detail($id)
    {
        $blog = Blog::findorFail($id);
        return view('front.detailBlog')->with('blog', $blog);
    }
}
