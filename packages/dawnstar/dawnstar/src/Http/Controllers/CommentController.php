<?php

namespace Dawnstar\Http\Controllers;

use App\Http\Controllers\Controller;
use Dawnstar\Models\Blog;
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

        if ($comment) {
            $comment->update(['status' => request('status')]);
        }

        return redirect()->route('panel.comment.index');
    }

    public function updateRead()
    {
        $comment = Comment::find(request()->get('id'));

        if ($comment) {
            $comment->update(['read_status' => 1]);
        }

        return response()->json(['status' => true], 200);
    }


    public function delete($id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            $comment->delete();
            if ($comment->trashed()) {
                return redirect()->route('panel.comment.home')->with('message', 'Delete Successful');
            }
        }
        return redirect()->back()->withErrors(['message', 'Delete Failed!'])->withInput();
    }

    private function updateBlogUseful($blogId)
    {

        $blog = Blog::find($blogId);

        if ($blog) {
            $comments = $blog->comments()->where('status', 1);
            $commentsCount = $comments->count();
            $usefulCommentCount = $comments->where('useful', 1)->count();

            $usefulRate = 5 * $usefulCommentCount / $commentsCount;

            $blog->update(['useful_rate' => $usefulRate]);
        }
    }
}
