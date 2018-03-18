<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

        // UserRegister
        'App\Events\UserRegister' => [
            'App\Listeners\UserRegister_Notify',
        ],

        // UserLogin
        'App\Events\UserLogin' => [
            'App\Listeners\UserLogin_Notify',
        ],

        // contact us form
        'App\Events\ContactUs' => [
            'App\Listeners\ContactUs_Notify',
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
