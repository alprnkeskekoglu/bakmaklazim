<?php

namespace App\Http\Controllers;

use Dawnstar\Models\Blog;
use Dawnstar\Models\Comment;
use Dawnstar\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\Validator;

class SearchController extends Controller
{
    public function index()
    {
        $query = request()->get('q');
        
        $query = strip_tags($query);

        if(is_null($query)) {
            abort(404);
        }

        $pages = Search::with('model')
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                    ->orWhere('detail', 'like', '%' . $query . '%');
            })->orderByRaw("case
                when `name` like ? then 1
                when `name` like ? then 4
                when `name` like ? then 2
                when `name` like ? then 5
                when `name` like ? then 11
                when `name` like ? then 13
                when `name` like ? then 3
                when `name` like ? then 12

                when `detail` like ? then 6
                when `detail` like ? then 9
                when `detail` like ? then 7
                when `detail` like ? then 10
                when `detail` like ? then 14
                when `detail` like ? then 16
                when `detail` like ? then 8
                when `detail` like ? then 15

                else 1000 end", [
                $query . ' %',              //1
                $query . '%',               //4
                '% ' . $query . ' %',       //2
                '% ' . $query . '%',        //5
                '%' . $query . ' %',        //11
                '%' . $query . '%',         //13
                '% ' . $query . '',         //3
                '%' . $query . '',          //12

                $query . ' %',              //6
                $query . '%',               //9
                '% ' . $query . ' %',       //7
                '% ' . $query . '%',        //10
                '%' . $query . ' %',        //14
                '%' . $query . '%',         //16
                '% ' . $query . '',         //8
                '%' . $query . '',          //15

            ])->paginate(10, ["*"], 'p');

        return view('pages.search', compact('pages'));
    }
}
