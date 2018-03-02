<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\Filesystem;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;

class GlideServerController extends Controller
{
    public function index(Filesystem $filesystem, $path)
    {

        //return public_path();

        $server = ServerFactory::create([
            'response'          => new LaravelResponseFactory(app('request')),
            'source'            => public_path(),
            'cache'             => public_path('uploads'),
            'cache_path_prefix' => '.cache',
            'base_url'          => 'media',
        ]);


        return $server->getImageResponse($path, request()->all());

    }

    private function getFileExtension($path)
    {
        return substr($path, -3, 3);
    }

}
