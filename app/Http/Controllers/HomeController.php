<?php

namespace App\Http\Controllers;


use Dawnstar\Models\Blog;
use Dawnstar\Models\Category;

class HomeController extends Controller
{
    public function index()
    {

        $categories = Category::where('status', 1)
            ->whereHas('blogs')
            ->orderBy('order')
            ->get()
            ->take(5);


        $lastBlog = Blog::orderByDesc('id')->where('status', 1)->first();

        $blogs = Blog::where('status', 1)
            ->orderByDesc('id')
            ->where('id', '!=', $lastBlog->id)
            ->paginate(6);

        return view('pages.home', compact('categories', 'lastBlog', 'blogs'));
    }

}
