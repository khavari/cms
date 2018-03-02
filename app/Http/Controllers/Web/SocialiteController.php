<?php

namespace App\Http\Controllers\Web;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function index($driver)
    {
        if (! in_array($driver, ['github', 'google', 'linkedin', 'twitter', 'facebook'])) {
            return abort(404);
        }
        // ? code=d977792eec0d8fe395fd  & state=JYqruZKVMPusB5906l3R25dDX6ByS4FCZwmyeEb7

        if (request('code')) {
            $model = Socialite::driver($driver)->user();
            $email = $model->getEmail();

            if($model->getAvatar()){
                $url = $model->getAvatar();
                $directory = 'uploads/users/' . date('Y') . '/' . date('m') . '/';
                $image = file_get_contents($url);
                $avatar = time().'.jpg';
                Storage::disk('public')->put($directory.$avatar, $image);
                $avatar = $directory.$avatar;
            }else{
                $avatar = null;
            }
            if($model->getName()){
                $name = $model->getName();
            }else{
                $name = 'no name';
            }


            if (User::where('email', $email)->count() === 1) {
                $user = User::where('email', $email)->first();
                auth()->loginUsingId($user->id);
                return redirect('/');
            } else {
                $user = User::create([
                    'name'     => $name,
                    'username' => strtolower($model->getEmail()),
                    'email'    => strtolower($model->getEmail()),
                    'password' => bcrypt('123123'),
                    'passcode' => '123123',
                    'image'    => $avatar,
                    'role_id'  => 1,
                    'gender'   => 'male',
                    'active'   => 1,
                ]);
            }

            auth()->loginUsingId($user->id);
            return redirect(app()->getLocale());
        } else {
            return Socialite::driver($driver)->redirect();
        }
    }
}
