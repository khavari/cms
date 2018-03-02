<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    public function seo(){

        $document = Setting::where('key', 'admin-seo')->where('lang', app()->getLocale())->first();
        return view('admin.documents.seo',compact('document'));
    }


    public function help(){
        $document = Setting::where('key', 'admin-help')->where('lang', app()->getLocale())->first();
        return view('admin.documents.help',compact('document'));
    }



}
