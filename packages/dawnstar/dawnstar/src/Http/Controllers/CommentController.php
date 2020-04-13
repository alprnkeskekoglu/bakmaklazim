<?php

namespace Dawnstar\Http\Controllers;

use App\Http\Controllers\Controller;
use Dawnstar\Models\Category;
use Dawnstar\Models\Comment;
use Dawnstar\Models\Tag;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::all();
        return view('Dawnstar::pages.comment.home', compact('comments'));
    }


    public function updateStatus($id)
    {
        $comment = Comment::find($id);

        if($comment) {
            $comment->update(['status' => request('status')]);
        }

        return redirect()->route('panel.comment.index');
    }


    public function delete($id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            $comment->delete();
            if ($comment->trashed()) {
                return redirect()->route('panel.comment.create')->with('message', 'Delete Successful');
            }
        }
        return redirect()->back()->withErrors(['message', 'Delete Failed!'])->withInput();
    }
}
