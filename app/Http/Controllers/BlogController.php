<?php

namespace App\Http\Controllers;

use Dawnstar\Models\Blog;
use Dawnstar\Models\Category;
use Dawnstar\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\Validator;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        $blogs = Cache::remember($request->get('page') . "BLOG_HOMEPAGE", 60 * 60 * 24, function () {
            return Blog::where('status', 1)
                ->whereHas('category')
                ->orderByDesc('created_at')
                ->withCount(['comments' => function ($q) {
                    $q->where('status', 1);
                }])
                ->paginate(10);
        });

        $breadcrumb = [
            "Blog Yazıları" => "javascript:void(0);"
        ];

        return view('pages.blog.home', compact('blogs', 'breadcrumb'));
    }

    public function detail($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->first();

        if (is_null($blog)) {
            abort(404);
        }

        $this->increaseView($blog);


        $data = Cache::remember("BLOG_DETAIL", 60 * 60 * 24, function () use($blog) {
            $hold['comments'] = Comment::where('blog_id', $blog->id)
                ->where('status', 1)
                ->get();

            $hold['others'] = Blog::where('status', 1)
                ->where('category_id', $blog->category_id)
                ->where('id', '!=', $blog->id)
                ->orderByDesc('view_count')
                ->withCount(['comments' => function ($q) {
                    $q->where('status', 1);
                }])->get()->take(3);

            return $hold;
        });


        $comments = $data['comments'];
        $others = $data['others'];

        $breadcrumb = [
            "Blog Yazıları" => route('blog.index'),
            $blog->name => "javascript:void(0);",
        ];


        return view('pages.blog.detail', compact('blog', 'comments', 'breadcrumb', 'others'));
    }

    public function commentSave(Request $request)
    {
        $data = $request->except('_token');

        $validator = $this->validateComment($data);
        if ($validator[0] === true) {
            return response()->json($validator[1], 422);
        }

        $data['user_ip'] = getIp();
        $data['user_agent'] = getUserAgent();

        Comment::firstOrCreate($data);

        return response()->json(['status' => true], 200);
    }

    private function validateComment($data)
    {

        $rules = [
            'blog_id' => "required",
            'useful' => "required",
            'user_name' => "required|min:5|max:100",
            'user_email' => "required|email",
            'detail' => "required|min:10|max:600",
        ];
        $messages = [
            'blog_id.required' => "Hackerlık deneme istersen!!",
            'useful.required' => "Değerlendirme yapsan güzel olurdu.",
            'user_name.required' => "Adınızı söylemeden sizi tanıyamam...",
            'user_name.min' => "Bu kadar az karakterde ad-soyad duymadım hiç...",
            'user_name.max' => "Bu kadar fazla karakterde ad-soyad duymadım hiç...",
            'user_email.required' => "Bu formların olmazsa olmazı e-posta adresini unuttun!",
            'user_email.email' => "Geçerli bir e-posta adresi girdiğine emin misin?",
            'detail.required' => "Mesaj göndermicektin. Neden doldurdun formu?",
            'detail.min' => "10 karakterden az mı değerlendirdin bizi...",
            'detail.max' => "600 karakter bize biraz fazla geldi :(",
        ];

        $validator = \Illuminate\Support\Facades\Validator::make($data, $rules, $messages);

        return [$validator->fails(), $validator->messages()->toArray()];
    }

    private function increaseView($blog)
    {
        $minutes = 60 * 24 * 7;
        $cookie = Cookie::get('blogs') ?: json_encode([]);

        $cookie = json_decode($cookie, 1);

        if (!in_array($blog->id, $cookie)) {
            $cookie[] = $blog->id;
            $blog->increment('view_count');
        }

        Cookie::queue(Cookie::make('blogs', json_encode($cookie), $minutes));
    }
}
