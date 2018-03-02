<?php

namespace App\Listeners;

use App\Http\Utilities\TelegramNotify;
use App\Events\ContactUs;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs_TelegramNotify
{

    public function __construct()
    {

    }


    public function handle(ContactUs $event)
    {

        $keyboard =array([
            //['text'=>'تایید آگهی','url'=>'http://www.payamrasa.com/'.$ad->id.'?activate='.time()],
        ]);

        $contact = $event->contact;
        $telegram = new TelegramNotify();
        $displace = [
            'subject'=>$contact->subject,
            'name'=>$contact->name,
            'phone'=>$contact->phone,
            'email'=>$contact->email,
            'message'=>$contact->message,
            'ip'=>$contact->ip,
        ];
        $telegram->send("یک پیام جدید در سیستم ثبت شد|عنوان: subject|نام: name|شماره تماس: phone|ایمیل: email|پیام: message|آی پی: ip",$displace,$keyboard);
        

    }
}
