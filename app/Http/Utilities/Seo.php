<?php

namespace App\Http\Utilities;


class Seo
{

    protected $menus;

    public function __construct()
    {

    }

    public static function share($object)
    {
        $title       = (isset($object->title)) ? $object->title : '';
        $keywords    = (isset($object->keywords)) ? $object->keywords : '';
        $description = (isset($object->description)) ? $object->description : '';
        $image       = (isset($object->image)) ? asset($object->image) : '';

        view()->share('seo', [
            'title'       => $title,
            'keywords'    => $keywords,
            'description' => $description,
            'image'       => $image,
        ]);
    }

    public static function home()
    {
        $title       = setting('title');
        $keywords    = setting('keywords');
        $description = setting('description');
        $image       = (strlen(setting('image'))) ? asset(setting('image')) : '';

        view()->share('seo', [
            'title'       => $title,
            'keywords'    => $keywords,
            'description' => $description,
            'image'       => $image,
        ]);
    }


}
