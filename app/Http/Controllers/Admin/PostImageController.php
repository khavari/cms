<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\PostImage;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;

class PostImageController extends Controller
{
    protected $post_types;

    public function __construct()
    {
        $this->post_types = config('app.posts_type');
    }

    public function index(Post $post)
    {
        $lang = app()->getLocale();
        $locales = config('app.locales');
        $locale = $locales[$lang];
        $type = $this->post_types[$post->type];
        return view('admin.posts.images_index', compact('post', 'locale', 'type'));
    }


    public function create()
    {
        //
    }


    public function store(Post $post, Request $request)
    {
        $type = $this->post_types[$post->type];
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,jpg,png|max:1024',
            'title' => 'required|min:3|max:191',
            'summary' => 'nullable|max:65000',
            'order' => 'required|integer|min:0|max:1000000',
        ]);
        //--------------------------
        if ($request->hasFile('image')) {
            $img = $request->file("image");
            $get_real_path = $img->getRealPath();
            $filename = time();
            $size = $img->getClientSize();
            $extension = strtolower($img->getClientOriginalExtension());
            $path = 'uploads/posts/' . $type['name'] . '/' . date('Y') . '/' . date('m') . '/';
            $path_th = 'uploads/posts/' . $type['name'] . '/' . date('Y') . '/' . date('m') . '/th/';
            $path_lg = 'uploads/posts/' . $type['name'] . '/' . date('Y') . '/' . date('m') . '/lg/';
            // make Directories
            Storage::makeDirectory($path);
            Storage::makeDirectory($path_th);
            Storage::makeDirectory($path_lg);
            // image original
            $image = Image::make($get_real_path);
            $image->save($path . $filename . '.' . $extension);

            // image width height
            $image = Image::make($get_real_path);
            $image->fit($type['width'], $type['height'])->save($path_th . $filename . '.' . $extension);

            // image watermark lg
            $image = Image::make($get_real_path);
            $image->insert('admin/img/watermark.png', 'bottom-right')->save($path_lg . $filename . '.' . $extension);
            //----------------------------------------
            $post->images()->create(array_merge($request->all(), [
                'path' => $path,
                'image' => $filename,
                'extension' => $extension,
                'size' => $size
            ]));
            return back()->with('success', 'تغییرات با موفقیت ذخیره شد.');

        } else {
            return back()->with('warning', 'خطا');
        }
    }


    public function show($id)
    {

    }


    public function edit(Post $post, PostImage $image)
    {
        $lang = app()->getLocale();
        $locales = config('app.locales');
        $locale = $locales[$lang];
        $type = $this->post_types[$post->type];
        return view('admin.posts.images_edit', compact('image', 'locale', 'type'));
    }


    public function update(Request $request, Post $post, PostImage $image)
    {
        $type = $this->post_types[$post->type];
        $this->validate($request, [
            'image' => 'nullable|mimes:jpeg,jpg,png|max:1024',
            'title' => 'required|min:3|max:191',
            'summary' => 'nullable|max:65000',
            'order' => 'required|integer|min:0|max:1000000',
        ]);
        //--------------------------
        if ($request->hasFile("image")) {
            $img = $request->file("image");
            $get_real_path = $img->getRealPath();
            $size = $img->getClientSize();
            $extension = strtolower($img->getClientOriginalExtension());
            if($extension != $image->extension){
                $path     = $image->path.$image->image.'.'.$image->extension;
                $path_th = $image->path.'th/'.$image->image.'.'.$image->extension;
                $path_lg = $image->path.'lg/'.$image->image.'.'.$image->extension;
                Storage::delete([$path, $path_th, $path_lg]);
            }
            $path     = $image->path;
            $path_th  = $image->path.'th/';
            $path_lg  = $image->path.'lg/';
            $filename = $image->image;

            // image original
            $imag = Image::make($get_real_path);
            $imag->save($path . $filename . '.' . $extension);

            // image width height
            $imag = Image::make($get_real_path);
            $imag->fit($type['width'], $type['height'])->save($path_th . $filename . '.' . $extension);

            // image watermark lg
            $imag = Image::make($get_real_path);
            $imag->insert('admin/img/watermark.png', 'bottom-right')->save($path_lg . $filename . '.' . $extension);
            //----------------------------------------
        }
        else {
            $path = $image->path;
            $filename = $image->image;
            $extension = $image->extension;
            $size = $image->size;
        }


        $image->update(array_merge($request->all(), [
            'path' => $path,
            'image' => $filename,
            'extension' => $extension,
            'size' => $size
        ]));
        return back()->with('success', 'تغییرات با موفقیت بروز رسانی شد.');
    }


    public function destroy(Post $post, PostImage $image)
    {
        if ($image->status == 0) {
            if ($image->image != 'image') {
                $path = $image->path . $image->image . '.' . $image->extension;
                $path_th = $image->path . 'th/' . $image->image . '.' . $image->extension;
                $path_lg = $image->path . 'lg/' . $image->image . '.' . $image->extension;
                Storage::delete([$path, $path_th, $path_lg]);
            }
            $image->delete();
            return back()->with('success', 'تصویر مورد نظر با موفقیت حذف شد');
        }
        else {
            return back()->with('error', 'برای حذف ، ابتدا تصویر مورد نظر را غیر فعال کنید.');
        }
    }

    public function status(Post $post, PostImage $image)
    {
        if ($image->status) {
            $image->status = 0;
            $image->save();
        } else {
            $image->status = 1;
            $image->save();
        }
        return back()->with('success', 'تغییر وضعیت با موفقیت انجام شد');
    }

}
