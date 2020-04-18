<?php

namespace Dawnstar\Http\Controllers;

use App\Http\Controllers\Controller;
use Dawnstar\Models\Blog;
use Dawnstar\Models\Category;
use Dawnstar\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CkEditorController extends Controller
{

    public function upload(Request $request) {

        $file = $request->file('upload');

        if ($file != null) {
            $fileName = uniqid() . "-" . $file->getClientOriginalName();
            $file->storeAs('ckeditor', $fileName);
            $data['cover'] = Storage::disk('public')->url('/ckeditor/' . $fileName);


            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = Storage::disk('public')->url('/ckeditor/' . $fileName);;
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
