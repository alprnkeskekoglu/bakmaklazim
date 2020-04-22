<?php

namespace Dawnstar\Http\Controllers;

use App\Http\Controllers\Controller;
use Dawnstar\Models\Blog;
use Dawnstar\Models\Category;
use Dawnstar\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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


        $file = request()->file('cover');

        if ($file != null) {
            $fileName = uniqid() . "-" . $file->getClientOriginalName();
            $file->storeAs('', $fileName);
            $data['cover'] = Storage::disk('public')->url($fileName);
        }

        $file = request()->file('image');

        if ($file != null) {
            $fileName = uniqid() . "-" . $file->getClientOriginalName();
            $file->storeAs('', $fileName);
            $data['image'] = Storage::disk('public')->url($fileName);
        }

        $data['admin_id'] = auth()->id();
        $data['date'] = date('Y-m-d');
        $blog = Blog::firstOrCreate(
            $data
        );

        $blog->tags()->sync($request->get('tags'));


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
        $blog = Blog::find($id);
        $data = request()->except('_token', 'tags', 'cover', 'image');


        $file = request()->file('cover');

        if ($file != null) {
            $fileName = uniqid() . "-" . $file->getClientOriginalName();
            $file->storeAs('', $fileName);
            $data['cover'] = Storage::disk('public')->url($fileName);
        }

        $file = request()->file('image');

        if ($file != null) {
            $fileName = uniqid() . "-" . $file->getClientOriginalName();
            $file->storeAs('', $fileName);
            $data['image'] = Storage::disk('public')->url($fileName);
        }

        $data['admin_id'] = auth()->id();
        $blog->update($data);

        $blog->tags()->sync(request()->get('tags'));

        if ($blog->wasChanged()) {
            return redirect()->back()->with('message', 'The update was done successfully.');
        }
        return redirect()->back()->withErrors(['message', 'Update failed.'])->withInput();
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            if ($category->trashed()) {
                return redirect()->route('panel.blog.home')->with('message', 'Delete Successful');
            }
        }
        return redirect()->back()->withErrors(['message', 'Delete Failed!'])->withInput();
    }

    public function getTags(Request $request)
    {
        $category = Category::find($request->category_id);
        if ($category) {
            return $category->tags->toArray();
        }
    }
}
