<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Dawnstar\Models\Blog;
use Dawnstar\Models\Category;
use Dawnstar\Models\Tag;

class SitemapXmlController extends Controller
{
    public function index()
    {
        $urls[] = [
            'url' => route('index'),
            'lastmod' => date('Y-m-d'),
            'priority' => "1.00"
        ];
        $urls[] = [
            'url' => route('blog.index'),
            'lastmod' => date('Y-m-d'),
            'priority' => "0.80"
        ];
        $urls[] = [
            'url' => route('category.index'),
            'lastmod' => date('Y-m-d'),
            'priority' => "0.80"
        ];

        $categories = Category::where('status', 1)
            ->get();

        foreach ($categories as $category) {
            $urls[] = [
                'url' => $category->url,
                'lastmod' => Carbon::parse($category->updated_at)->format('Y-m-d'),
                'priority' => "0.80"
            ];
        }

        $blogs = Blog::where('status', 1)
            ->whereHas('category')
            ->get();


        foreach ($blogs as $blog) {
            $urls[] = [
                'url' => $blog->url,
                'lastmod' => Carbon::parse($blog->updated_at)->format('Y-m-d'),
                'priority' => "0.80"
            ];
        }


        $tags = Tag::where('status', 1)
            ->whereHas('category')
            ->get();


        foreach ($tags as $tag) {
            $urls[] = [
                'url' => $tag->url,
                'lastmod' => Carbon::parse($tag->updated_at)->format('Y-m-d'),
                'priority' => "0.80"
            ];
        }

        return view('pages.sitemap', compact('urls'));
    }
}
