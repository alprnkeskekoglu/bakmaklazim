<?php

namespace App\Http\Controllers;


use Dawnstar\Models\Blog;
use Dawnstar\Models\Category;

class HomeController extends Controller
{
    public function index()
    {

        $categories = Category::where('status', 1)
            ->withCount('blogs')
            ->orderByDesc('blogs_count')
            ->having('blogs_count', '>', 0)
            ->get()
            ->take(3);


        $lastBlog = Blog::orderByDesc('id')->where('status', 1)
            ->whereHas('category')
            ->withCount(['comments' => function($q) {
                $q->where('status', 1);
            }])
            ->first();

        $blogs = Blog::where('status', 1)
            ->whereHas('category')
            ->orderByDesc('id');

        if ($lastBlog) {
            $blogs = $blogs->where('id', '!=', $lastBlog->id);
        }

        $blogs = $blogs->paginate(6);

        return view('pages.home', compact('categories', 'lastBlog', 'blogs'));
    }

}
