<?php

namespace Dawnstar\Http\Controllers;

use App\Http\Controllers\Controller;
use Dawnstar\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function index()
    {
        $admins = Admin::all();
        return view('Dawnstar::pages.admin.home', compact('admins'));
    }

    public function create()
    {
        return view('Dawnstar::pages.admin.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token', 'image');

        $file = request()->file('image');

        if ($file != null) {
            $fileName = uniqid() . "-" . $file->getClientOriginalName();
            $file->storeAs('', $fileName);
            $data['image'] = Storage::disk('public')->url($fileName);
        }


        $admin = Admin::firstOrCreate(
            $data
        );

        if ($admin->wasRecentlyCreated) {
            return redirect()->route('panel.admin.index');
        }
        return redirect()->back()->withErrors(['message', 'There is a record in this name and email'])->withInput();
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $admin = Admin::find($id);

        return view('Dawnstar::pages.admin.edit', compact('admin'));
    }

    public function update($id)
    {
        $admin = Admin::find($id);
        $data = request()->except('_token', 'image');

        $file = request()->file('image');

        if ($file != null) {
            $fileName = uniqid() . "-" . $file->getClientOriginalName();
            $file->storeAs('', $fileName);
            $data['image'] = Storage::disk('public')->url($fileName);
        }

        $data['password'] = $data['password'] ? Hash::make($data['password']) : $admin->password;

        $admin->update($data);

        if ($admin->wasChanged()) {
            return redirect()->back()->with('message', 'The update was done successfully.');
        }
        return redirect()->back()->withErrors(['message', 'Update failed.'])->withInput();
    }

    public function delete($id)
    {
        $admin = Admin::find($id);
        if ($admin) {
            $admin->delete();
            if ($admin->trashed()) {
                return redirect()->route('panel.admin.create')->with('message', 'Delete Successful');
            }
        }
        return redirect()->back()->withErrors(['message', 'Delete Failed!'])->withInput();
    }
}
