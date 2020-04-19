<?php

namespace App\Http\Controllers;


use Dawnstar\Models\Blog;
use Dawnstar\Models\Category;

class HomeController extends Controller
{
    public function index()
    {

        $categories = Category::where('status', 1)
            ->orderBy('order')
            ->get()
            ->take(5);


        $lastBlog = Blog::orderByDesc('id')->where('status', 1)
            ->withCount(['comments' => function($q) {
                $q->where('status', 1);
            }])
            ->first();

        $blogs = Blog::where('status', 1)
            ->orderByDesc('id');

        if ($lastBlog) {
            $blogs = $blogs->where('id', '!=', $lastBlog->id);
        }

        $blogs = $blogs->paginate(6);

        return view('pages.home', compact('categories', 'lastBlog', 'blogs'));
    }

}
