<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    protected $post_types ;

    public function __construct()
    {
        $this->post_types = config('app.posts_type');
    }

    public function index(Request $request)
    {
        $type = $request->segment(3);
        $lang = app()->getLocale();
        if(!array_key_exists($type,$this->post_types)){
            return back();
        }
        else{
            $type = $this->post_types[$type];

            if (Request('search')) {
                $search = Request('search');
                if (is_numeric($search) && $search > 1) {
                    $posts = Post::where('lang',$lang)
                        ->where('id', $search)
                        ->where('type' , $type['name'])
                        ->paginate(10);
                }
                else {
                    $posts = Post::where('lang',$lang)
                        ->where('type' , $type['name'])
                        ->where('title', 'like', '%' . $search . '%')
                        ->orWhere('slug', 'like', '%' . $search . '%')
                        ->orWhere('summary', 'like', '%' . $search . '%')
                        ->orWhere('keywords', 'like', '%' . $search . '%')
                        ->orWhere('content', 'like', '%' . $search . '%')
                        ->orderby('order','asc')
                        ->orderby('id','desc')
                        ->paginate(10);
                }
            }
            elseif (Request('group_id')){
                $group_id = Request('group_id');
                $posts = Post::where('lang',$lang)
                    ->where('group_id', $group_id)
                    ->where('type' , $type['name'])
                    ->orderby('order','asc')
                    ->orderby('id','desc')
                    ->paginate(10);
            }
            else{
                $posts = Post::where('lang',$lang)->where('type' , $type['name'])->orderby('order','asc')->orderby('id','desc')->paginate(10);
            }

            foreach ($posts as $post) {
                if (empty($post->keywords)) {
                    $post->keywords = 0;
                } else {
                    $keywords = explode(',', $post->keywords);
                    $post->keywords = count($keywords);
                }
            }
            $groups = Group::where('lang',$lang)->where('type' , $type['name'])->orderby('id','desc')->get();
            return view('admin.posts.'.$type['name'].'.posts',compact('groups','posts','type'));
        }
    }

    public function create($type)
    {
        if(!array_key_exists($type,$this->post_types)){
            return back();
        }else{
            $type = $this->post_types[$type];
            $lang = config('app.locale');
            $locales = config('app.locales');
            $locale = $locales[$lang];
            $groups = Group::where('lang',$lang)->where('type' , $type['name'])->orderby('id','desc')->get();
            return view('admin.posts.'.$type['name'].'.create',compact('type','groups','locale'));
        }
    }

    public function store($type , Request $request)
    {
        $type = $this->post_types[$type];
        $this->validate($request, [
            'image' => 'nullable|mimes:jpeg,jpg,png|max:1024',
            'title' => 'required|max:191',
            'slug' => 'required|max:64',
            'summary' => 'nullable|max:32000',
            'content' => 'nullable|max:32000',
            'description' => 'nullable|max:1024',
            'keywords' => 'nullable|max:1024',
            'order' => 'required|integer|min:0|max:1000000',
            'group_id' => 'required|integer|min:0|max:2000000000',
        ]);

        if ($request->hasFile('image')) {
            $img = $request->file("image");
            $get_real_path = $img->getRealPath();
            $filename = time();
            $extension = strtolower($img->getClientOriginalExtension());
            $path    = 'uploads/posts/'.$type['name'].'/' . date('Y') . '/' . date('m') . '/';
            $path_th = 'uploads/posts/'.$type['name'].'/' . date('Y') . '/' . date('m') . '/th/';
            $path_lg = 'uploads/posts/'.$type['name'].'/' . date('Y') . '/' . date('m') . '/lg/';
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
        }
        else {
            $path = NULL;
            $filename = NULL;
            $extension = NULL;
        }

        foreach (['status', 'highlight', 'latest'] as $checkbox) {
            if($request->has($checkbox)){
                $request->merge([$checkbox => 1]);
            }else{
                $request->merge([$checkbox => 0]);
            }
        }
        auth()->user()->posts()->create(array_merge($request->all() , [
            'type' => $type['name'],
            'path' => $path,
            'image' => $filename,
            'extension' => $extension
        ]));
        return redirect()->route('posts.index',['type'=>$type['name']])->with('success', 'مطلب جدید با موفقیت ذخیره شد.');

    }

    public function show($type , Post $post)
    {
        return $post;
    }

    public function edit($type , Post $post)
    {
        if(!array_key_exists($type,$this->post_types)){
            return back();
        }else {
            $type = $this->post_types[$type];
            $lang = config('app.locale');
            $locales = config('app.locales');
            $locale = $locales[$lang];
            $groups = Group::where('lang',$lang)->where('type' , $type['name'])->orderby('id','desc')->get();
            return view('admin.posts.'.$type['name'].'.edit',compact('post','type','groups','locale'));
        }
    }

    public function update(Request $request, $type , Post $post)
    {

        $type = $this->post_types[$type];
        $this->validate($request, [
            'image' => 'nullable|mimes:jpeg,jpg,png|max:1024',
            'title' => 'required|max:191',
            'slug' => 'required|max:64',
            'summary' => 'nullable|max:32000',
            'content' => 'nullable|max:32000',
            'description' => 'nullable|max:1024',
            'keywords' => 'nullable|max:1024',
            'order' => 'required|integer|min:0|max:1000000',
            'group_id' => 'required|integer|min:0|max:2000000000',
        ]);

        if ($request->hasFile('image')) {
            $img = $request->file("image");
            $get_real_path = $img->getRealPath();
            $extension = strtolower($img->getClientOriginalExtension());
            if (is_null($post->image)) {
                $filename = time();
                $path    = 'uploads/posts/'.$type['name'].'/' . date('Y') . '/' . date('m') . '/';
                $path_th = 'uploads/posts/'.$type['name'].'/' . date('Y') . '/' . date('m') . '/th/';
                $path_lg = 'uploads/posts/'.$type['name'].'/' . date('Y') . '/' . date('m') . '/lg/';
                // make Directories
                Storage::makeDirectory($path);
                Storage::makeDirectory($path_th);
                Storage::makeDirectory($path_lg);
            }
            else{
                $path     = $post->path;
                $path_th  = $post->path.'th/';
                $path_lg  = $post->path.'lg/';
                $filename = $post->image;
                if($extension != $post->extension){
                    $path     = $post->path.$post->image.'.'.$post->extension;
                    $path_th = $post->path.'th/'.$post->image.'.'.$post->extension;
                    $path_lg = $post->path.'lg/'.$post->image.'.'.$post->extension;
                    Storage::delete([$path, $path_th, $path_lg]);
                }
            }

            // image original
            $image = Image::make($get_real_path);
            $image->save($path . $filename . '.' . $extension);

            // image width height
            $image = Image::make($get_real_path);
            $image->fit($type['width'], $type['height'])->save($path_th . $filename . '.' . $extension);

            // image watermark lg
            $image = Image::make($get_real_path);
            $image->insert('admin/img/watermark.png', 'bottom-right')->save($path_lg . $filename . '.' . $extension);

        }
        else {
            $path = $post->path;
            $filename = $post->image;
            $extension = $post->extension;
        }

        foreach (['status', 'highlight', 'latest'] as $checkbox) {
            if($request->has($checkbox)){
                $request->merge([$checkbox => 1]);
            }else{
                $request->merge([$checkbox => 0]);
            }
        }

        $post->update(array_merge($request->all() , [
            'path' => $path,
            'image' => $filename,
            'extension' => $extension
        ]));


        return back()->with('success', 'تغییرات با موفقیت بروز رسانی شد.');

    }

    public function destroy($type , Post $post)
    {
        if($post->status == 0){
            // 1 $post->images->count() == 0
            if(1){
                if ($post->image != 'image') {
                    $path     = $post->path.$post->image.'.'.$post->extension;
                    $path_th = $post->path.'th/'.$post->image.'.'.$post->extension;
                    $path_lg = $post->path.'lg/'.$post->image.'.'.$post->extension;
                    Storage::delete([$path, $path_th, $path_lg]);
                }
                $post->delete();
                return back()->with('success', 'مقاله مورد نظر با موفقیت حذف شد');
            }
            else{
                return back()->with('error', 'ابتدا تصاویر موجود در گالری تصاویر را حذف نمایید سپس برای حذف مقاله اقدام نمایید.');
            }
        }else{
            return back()->with('error', 'برای حذف ، ابتدا مطلب مورد نظر را غیر فعال کنید.');
        }
    }

    public function status($type , Post $post)
    {
        if(!array_key_exists($type,$this->post_types)){
            return back();
        }else{
            if ($post->status == 0) {
                $post->status = '1';
                $post->save();
                return back()->with('success', 'مطلب مورد نظر با موفقیت فعال شد.');
            }
            elseif ($post->status == 1) {
                $post->status = '0';
                $post->save();
                return back()->with('warning', 'مطلب مورد نظر با موفقیت غیر فعال شد.');
            }
            else{
                return back()->with('error', 'عملیات تعریف نشده ، لطفا به پشتیبانی اطلاع دهید.');
            }
        }
    }

}
