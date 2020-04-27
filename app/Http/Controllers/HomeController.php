<?php

namespace App\Http\Controllers;


use Dawnstar\Models\Blog;
use Dawnstar\Models\Category;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $data = Cache::remember("HOMEPAGE" . getBrowser(), 60 * 60 * 24 * 7, function () {
            $hold['categories'] = Category::where('status', 1)
                ->withCount('blogs')
                ->orderByDesc('blogs_count')
                ->get()
                ->take(3);

            $hold['lastBlog'] = $lastBlog = Blog::orderByDesc('id')->where('status', 1)
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

            $hold['blogs'] = $blogs->get()->take(6);

            return $hold;
        });


        $categories = $data['categories'];
        $lastBlog = $data['lastBlog'];
        $blogs = $data['blogs'];

        return view('pages.home', compact('categories', 'lastBlog', 'blogs'));
    }

}
