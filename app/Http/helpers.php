<?php


function getSidebarCategories()
{
    return Dawnstar\Models\Category::where('status', 1)
        ->withCount('blogs')
        ->orderByDesc('blogs_count')
        ->get()
        ->take(5);
}


function getSidebarTags()
{
    return Dawnstar\Models\Tag::where('status', 1)
        ->withCount('blogs')
        ->orderByDesc('blogs_count')
        ->having('blogs_count', '>', 0)
        ->get()
        ->take(8);
}

function getSidebarLatestBlogs()
{
    return Dawnstar\Models\Blog::where('status', 1)
        ->orderByDesc('date')
        ->get()
        ->take(3);
}

function image($path)
{
    if ($path && file_exists(public_path($path))) {
        return url($path);
    }
    return asset('assets/images/default.png');
}

function getIp()
{
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        return $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    return $_SERVER['REMOTE_ADDR'];
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

function localeDate($date) {

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
