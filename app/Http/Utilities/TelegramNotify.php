<?php

namespace App\Http\Utilities;

use App\Option;

class TelegramNotify
{
    public $token;
    public $chat_id;
    public $status;

    public function __construct()
    {
        $this->token = '417047850:AAFoFlVsgPOrQWxaaZv0YC9ekEoeHWxHmhQ';
        $this->chat_id = '188201989';
        $this->status = 1;
    }


    public function send($text, $displace, $keyboard)
    {
        $replyMarkup = array(
            'inline_keyboard' => $keyboard,
        );
        $encodedMarkup = json_encode($replyMarkup);

        if ($this->status) {
            foreach ($displace as $key => $value) {
                $text = str_replace($key, $value, $text);
            }
            $msg = str_replace("|", " \n ", $text);
            $msg = jdate()->format('%A %d %B %Y  H:i') . " \n\n " . $msg;
            foreach (explode(',', $this->chat_id) as $chat_id) {
                $website = "https://api.telegram.org/bot" . $this->token;
                $params = [
                    'chat_id'      => $chat_id,
                    'text'         => $msg,
                    'reply_markup' => $encodedMarkup,
                ];
                $ch = curl_init($website . '/sendMessage');
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                curl_close($ch);
            }// Enf foreach
        }
    }


    public function sendMessage($chat_id, $text, $displace)
    {
        if ($this->status) {
            foreach ($displace as $key => $value) {
                $text = str_replace($key, $value, $text);
            }
            $msg = str_replace("|", " \n ", $text);
            $msg = jdate()->format('%A %d %B %Y  H:i') . " \n\n " . $msg;
            $website = "https://api.telegram.org/bot" . $this->token;
            $params = [
                'chat_id' => $chat_id,
                'text'    => $msg,
            ];
            $ch = curl_init($website . '/sendMessage');
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($ch);
            curl_close($ch);
        }
    }


}
// 09124921848 -> 188201989
// 09373387624 -> 96797971

// UserLogin UserRegister AdCreate AdConfirm
// https://api.telegram.org/bot399129602:AAHxUWuLmNaQ2jY4Ch_PEf2-CXhtWTXZb-o/getupdates
/*
   مدیریت وب سایت پیام رسا
 این بات مختص مدیریت سایت پیام رسا میباشد از معرفی آن به دیگران اکیدا خودداری نمایید. پشتیبانی :09111111
 */

/*
  $telegram = new Telegram_notice();
  $displace = ['full_name'=>$user->name,'username'=>$user->username,'mobile'=>$user->mobile,];
  $telegram->send("ثبت نام کاربر جدید با موفقیت انجام شد.|نام : full_name|نام کاربری : username|شماره تماس : mobile",$displace);
 */
