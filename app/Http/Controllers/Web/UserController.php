<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\UserRequest;
use App\Http\Utilities\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function showProfileForm()
    {
        Seo::home();
        return view('web.pages.profile');
    }

    public function updateProfile(UserRequest $request)
    {
       // return $request->all();
        $user = auth()->user();
        $user->phone = $request->phone;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;

        $user->save();

        return back();
    }


}
