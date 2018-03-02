<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{
    public function index($lang)
    {
        $locales = locale('keys');
        if (in_array($lang, $locales)) {
            $referer = request()->headers->get('referer');
            $referer = str_replace(request()->getSchemeAndHttpHost() ,'',$referer);
            $segment = explode('/', $referer);
            return redirect($lang.'/'.$segment[2].'/'.$segment[3]);
            session()->flash('success', 'Change Language Successfully');
        }

        // when lang not be in approved languages
        else {
            abort(404);
        }

    }
}
