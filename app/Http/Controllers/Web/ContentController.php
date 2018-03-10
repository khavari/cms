<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Content;
use App\Http\Utilities\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{

    public function vocabulary($slug)
    {
        $vocabulary = Content::lang()->active()->where('slug', $slug)->firstOrFail();
        Seo::share($vocabulary);
        return view('web.contents.content', compact('content'));
    }

    public function category($slug)
    {
        $category = Category::lang()->active()->where('slug', $slug)->firstOrFail();
        Seo::share($category);
        return view('web.contents.category', compact('category'));
    }

    public function content($slug)
    {
        $content = Content::lang()->active()->published()->where('slug', $slug)->firstOrFail();
        Seo::share($content);
        return view('web.contents.content', compact('content'));
    }


    public function search()
    {
        if (Request('q')) {
            $search = Request('q');
            $contents = Content::lang()->where('keywords', 'like', '%' . $search . '%')
                ->orWhere('slug', 'like', '%' . $search . '%')
                ->orWhere('title', 'like', '%' . $search . '%')
                ->orWhere('summary', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
                ->paginate(15);
        }
        else {
           return back();
        }
        return view('web.contents.search', compact('contents'));
    }

}
