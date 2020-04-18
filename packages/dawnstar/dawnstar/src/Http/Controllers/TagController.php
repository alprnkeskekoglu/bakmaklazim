<?php

namespace Dawnstar\Http\Controllers;

use App\Http\Controllers\Controller;
use Dawnstar\Models\Category;
use Dawnstar\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::orderBy('order')->get();
        return view('Dawnstar::pages.tag.home', compact('tags'));
    }

    public function create()
    {
        $categories = Category::orderBy('order')->get();
        return view('Dawnstar::pages.tag.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');


        $tag = Tag::firstOrCreate(
            $data
        );

        if ($tag->wasRecentlyCreated) {
            return redirect()->route('panel.tag.index');
        }
        return redirect()->back()->withErrors(['message', 'There is a record in this name and slug'])->withInput();
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        $categories = Category::orderBy('order')->get();

        return view('Dawnstar::pages.tag.edit', compact('tag', 'categories'));
    }

    public function update($id)
    {
        $tag = Tag::find($id);
        $data = request()->except('_token');

        $tag->update($data);

        if ($tag->wasChanged()) {
            return redirect()->back()->with('message', 'The update was done successfully.');
        }
        return redirect()->back()->withErrors(['message', 'Update failed.'])->withInput();
    }

    public function delete($id)
    {
        $tag = Tag::find($id);
        if ($tag) {
            $tag->delete();
            if ($tag->trashed()) {
                return redirect()->route('panel.tag.create')->with('message', 'Delete Successful');
            }
        }
        return redirect()->back()->withErrors(['message', 'Delete Failed!'])->withInput();
    }
}
