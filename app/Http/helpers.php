<?php

function getSidebarCategories()
{
    return Dawnstar\Models\Category::where('status', 1)
        ->withCount(['blogs' => function($q) {
            $q->where('status', 1);
        }])
        ->orderBy('order')
        ->having('blogs_count', '>', 0)
        ->get()
        ->take(5);
}


function getSidebarTags()
{
    return Dawnstar\Models\Tag::where('status', 1)
        ->whereHas('category')
        ->withCount(['blogs' => function($q) {
            $q->where('status', 1);
        }])
        ->orderByDesc('blogs_count')
        ->having('blogs_count', '>', 0)
        ->groupBy('name')
        ->get()
        ->take(10);
}

function getSidebarBlogs()
{
    return Dawnstar\Models\Blog::where('status', 1)
        ->orderByDesc('view_count')
        ->whereHas('category')
        ->get()
        ->take(5);
}


function getProfileImage($name)
{
    $words = explode(" ", $name);
    $temp = "";

    foreach ($words as $w) {
        $temp .= isset($w[0]) ? strtoupper($w[0]) : "";

        if (\Str::length($temp) == 2) {
            break;
        }
    }
    return $temp;
}

function getRandomInspire()
{
    $file = storage_path('app/inspire.json');

    if (file_exists($file)) {
        $temp = json_decode(file_get_contents(storage_path('app/inspire.json')), 1);
        $random = rand(0, 10);

        return $temp[$random] ?? ['author' => "", 'text' => ""];
    }

    return ['author' => "", 'text' => ""];
}

function localeDate($date)
{

    $months = array(
        'January' => 'Ocak',
        'February' => 'Şubat',
        'March' => 'Mart',
        'April' => 'Nisan',
        'May' => 'Mayıs',
        'June' => 'Haziran',
        'July' => 'Temmuz',
        'August' => 'Ağustos',
        'September' => 'Eylül',
        'October' => 'Ekim',
        'November' => 'Kasım',
        'December' => 'Aralık',
    );
    $tempDate = \Carbon\Carbon::parse($date)->formatLocalized('%d %B %Y');

    foreach ($months as $en => $tr) {
        $tempDate = str_replace($en, $tr, $tempDate);
    }
    return $tempDate;
}


function str_ucwords($str)
{
    return ltrim(mb_convert_case(str_replace(array(' I', ' ı', ' İ', ' i'), array(' I', ' I', ' İ', ' İ'), ' ' . strto('lower', $str)), MB_CASE_TITLE, "UTF-8"));
}

function str_ucfirst($str)
{
    $tmp = preg_split(
        "//u", strto('lower', $str), 2,
        PREG_SPLIT_NO_EMPTY
    );
    return mb_convert_case(str_replace(array('ı', 'ğ', 'ü', 'ş', 'i', 'ö', 'ç'), array('I', 'Ğ', 'Ü', 'Ş', 'İ', 'Ö', 'Ç'), $tmp[0]), MB_CASE_TITLE, "UTF-8") . $tmp[1];
}

function strto($to, $str)
{
    $return = "";
    if ($to == 'lower') {
        return mb_strtolower(str_replace(array('I', 'Ğ', 'Ü', 'Ş', 'İ', 'Ö', 'Ç'), array('ı', 'ğ', 'ü', 'ş', 'i', 'ö', 'ç'), $str));
    } elseif ($to == 'upper') {
        return mb_strtoupper(str_replace(array('ı', 'ğ', 'ü', 'ş', 'i', 'ö', 'ç'), array('I', 'Ğ', 'Ü', 'Ş', 'İ', 'Ö', 'Ç'), $str));
    }
    return $return;
}

function isMobile() {
    if(isset($_SERVER["HTTP_USER_AGENT"])) {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
    return null;
}
