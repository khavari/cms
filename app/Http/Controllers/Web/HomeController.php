<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Content;
use App\Http\Utilities\Seo;
use App\Vocabulary;
use App\Widget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $widgets = cache()->rememberForever('widgets:' . app()->getLocale(), function () {
            return Widget::lang()->group('home')->active()->orderBy('order', 'ASC')->get();
        });
        Seo::home();
        return view('web.home', compact('widgets'));
    }

}
