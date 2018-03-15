<?php

namespace App\Listeners;

use App\Events\UserLogin;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserLogin_Notify
{
    
    public function __construct()
    {
    }


    public function handle(UserLogin $event)
    {
        $user = $event->user;
        $user->logins()->create(['ip' => request()->ip()]);
    }
}
