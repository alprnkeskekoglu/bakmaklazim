<?php

namespace Dawnstar\Http\Controllers;

use App\Http\Controllers\Controller;
use Dawnstar\Models\Blog;
use Dawnstar\Models\Category;
use Dawnstar\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::orderBy('date')->get();
        return view('Dawnstar::pages.blog.home', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::orderBy('order')->get();
        return view('Dawnstar::pages.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token', 'tags', 'cover', 'image');


        uploadFile('cover', $data);
        uploadFile('image', $data);

        $data['admin_id'] = auth()->id();
        $data['date'] = date('Y-m-d');
        $blog = Blog::firstOrCreate(
            $data
        );

        $tagIds = $this->createTags();

        $blog->tags()->sync($tagIds);

        Cache::flush();


        if ($blog->wasRecentlyCreated) {
            return redirect()->route('panel.blog.index');
        }
        return redirect()->back()->withErrors(['message', 'There is a record in this name and slug'])->withInput();
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        $categories = Category::orderBy('order')->get();

        $tagsId = $blog->tags->pluck('id')->toArray();

        return view('Dawnstar::pages.blog.edit', compact('blog', 'categories', 'tagsId'));
    }

    public function update($id)
    {
        $request = request();
        $blog = Blog::find($id);
        $data = $request->except('_token', 'tags', 'cover', 'image');


        uploadFile('cover', $data);
        uploadFile('image', $data);

        $blog->update($data);

        $tagIds = $this->createTags();

        $blog->tags()->sync($tagIds);

        Cache::flush();

        if ($blog->wasChanged()) {
            return redirect()->back()->with('message', 'The update was done successfully.');
        }
        return redirect()->back()->withErrors(['message', 'Update failed.'])->withInput();
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        if ($blog) {
            $blog->delete();
            if ($blog->trashed()) {
                return redirect()->route('panel.blog.index')->with('message', 'Delete Successful');
            }
        }
        return redirect()->back()->withErrors(['message', 'Delete Failed!'])->withInput();
    }

    public function getTags(Request $request)
    {
        $category = Category::find($request->category_id);
        if ($category) {
            return $category->tags()->where('status', 1)->get()->toArray();
        }
        return [];
    }

    private function createTags() {

        $tags = request()->get('tags');
        $tagIds = [];

        foreach ($tags as $tag) {
            if(is_numeric($tag)) {
                $tagIds[] = $tag * 1;
                continue;
            }

            $tempTag = [
                'name' => $tag,
                'slug' => slugify($tag),
                'category_id' => request()->get('category_id'),
                'status' => 1,
            ];

            $hold = Tag::firstOrCreate(
                $tempTag
            );
            $tagIds[] = $hold->id;
        }

        return $tagIds;
    }
}
