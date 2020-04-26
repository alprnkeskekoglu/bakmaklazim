<?php


function getSidebarCategories()
{
    return Dawnstar\Models\Category::where('status', 1)
        ->withCount('blogs')
        ->orderByDesc('blogs_count')
        ->having('blogs_count', '>', 0)
        ->get()
        ->take(5);
}


function getSidebarTags()
{
    return Dawnstar\Models\Tag::where('status', 1)
        ->whereHas('category')
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
        ->whereHas('category')
        ->get()
        ->take(3);
}

function image($path, $width = null, $height = null)
{
    $browser = getBrowser();
    $temp = pathinfo($path);
    $extension = $browser == 'Safari' ? $temp['extension'] : 'webp';
    $newPath = $temp['dirname'] . '/' . $temp['filename'] . '.' . $extension;
    if($width || $height) {
        $newFileName = $temp['filename'];
        if($width) {
            $newFileName = $newFileName . '_w' . $width;
        }
        if($height) {
            $newFileName = $newFileName . '_h' . $height;
        }
        $newPath = $temp['dirname'] . '/' . $newFileName . '.' . $extension;
    }


    if(is_null($path) || !file_exists(public_path($path))) {
        return asset('assets/images/default.png');
    }

    if(file_exists($newPath)) {
        return url($newPath);
    }

    if(file_exists(public_path($path))) {

        $manager = new \Intervention\Image\ImageManager();
        $image = $manager->make(public_path($path));

        if($browser != "Safari") {
            $image = $image->encode('webp', 75);
        }

        if($width || $height) {

            if($width && $height) {
                $image = $image->resize($width, $height);
            } else {
                if($width) {
                    $image = $image->resize($width, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                if($height) {
                    $image = $image->resize(null, $height, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }

            $image->save(public_path($newPath));

            return url($newPath);
        }
        $image->save(public_path($newPath));
        return url($newPath);
    }

    return asset('assets/images/default.png');
}

function getBrowser() {
    $arr_browsers = ["Opera", "Edge", "Chrome", "Safari", "Firefox", "MSIE", "Trident"];

    $agent = $_SERVER['HTTP_USER_AGENT'];

    $user_browser = '';
    foreach ($arr_browsers as $browser) {
        if (strpos($agent, $browser) !== false) {
            $user_browser = $browser;
            break;
        }
    }

    return $user_browser;
}

function getIp()
{
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        return $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    return $_SERVER['REMOTE_ADDR'];
}

function getUserAgent()
{
    return request()->header("User-Agent");
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
