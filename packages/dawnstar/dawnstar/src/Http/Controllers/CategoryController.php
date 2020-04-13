<?php

namespace Dawnstar\Http\Controllers;

use App\Http\Controllers\Controller;
use Dawnstar\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return redirect()->route('panel.category.create');
    }

    public function create()
    {
        $categories = Category::orderBy('order')->get();
        return view('Dawnstar::pages.category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');


        $category = Category::firstOrCreate(
            $data
        );

        if ($category->wasRecentlyCreated) {
            return redirect()->route('panel.category.create');
        }
        return redirect()->back()->withErrors(['message', 'There is a record in this name and slug'])->withInput();
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('Dawnstar::pages.category.edit', compact('category'));
    }

    public function update($id)
    {
        $category = Category::find($id);
        $data = request()->all();
        unset($data['_token']);

        $category->update($data);

        if ($category->wasChanged()) {
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
                return redirect()->route('panel.category.create')->with('message', 'Delete Successful');
            }
        }
        return redirect()->back()->withErrors(['message', 'Delete Failed!'])->withInput();
    }

    public function orderSave(Request $request) {
        $count = 0;
        $orderList = json_decode($request->get('orderList'),1);

        foreach ($orderList as $order) {
            $category = Category::find($order['id']);

            if($category) {
                $category->update(['order' => ++$count]);
            }
        }

        return response()->json(['status' => true], 200);
    }
}
