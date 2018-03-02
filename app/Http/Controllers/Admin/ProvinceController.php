<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Province;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProvinceController extends Controller
{

    public function index()
    {
        if(Request('province_id')){
            $province_id =  Request('province_id');
            $provinces = Province::where('province_id' , $province_id)->orderBy('order', 'ASC')->get();
        }
        else{
            $provinces = Province::where('province_id' , NULL)->orderBy('order', 'ASC')->get();
        }

        foreach ($provinces as $province){
            $province->count = $province->provinces()->count();
        }
        return view('admin.provinces.provinces', compact('provinces'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      => 'required|min:2|max:64',
            'page_title' => 'nullable|min:2|max:64',
            'slug'       => 'required|min:2|max:64|unique:provinces',
            'order'      => 'required|integer|min:0|max:999',
        ]);
        Province::create([
            'province_id' => $request->province_id,
            'title' => $request->title,
            'page_title' => $request->page_title,
            'slug' => $request->slug,
            'path' => '	uploads/provinces/',
            'image' => 'image',
            'extension' => 'jpg',
            'order'   => $request->order,
        ]);
        return back()->with('success', 'مورد جدید با موفقیت ثبت شد');
    }

    public function show($id)
    {

    }

    public function edit(Province $province)
    {
        return view('admin.provinces.province', compact('province'));
    }

    public function update(Province $province , Request $request)
    {
        $this->validate($request, [
            'title'      => 'required|min:2|max:64',
            'page_title' => 'nullable|min:2|max:64',
            'slug'       => 'required|min:2|max:64',
            'order'      => 'required|integer|min:0|max:999',
            'image'      => 'mimes:jpeg,jpg,png|max:512'
        ]);

        if($request->hasFile('image'))
        {
            $img = $request->file("image");
            $get_real_path = $img->getRealPath();
            if ($province->image == 'image') {
                $filename = time();
                $extension = strtolower($img->getClientOriginalExtension());
                $path     = 'uploads/provinces/' . date('Y') . '/' . date('m') . '/';
                Storage::makeDirectory($path);
            }
            else{
                $path     = $province->path;
                $filename = $province->image;
                $extension = strtolower($img->getClientOriginalExtension());
            }
            $image = Image::make($get_real_path);
            $image->fit(400, 400)->save($path . $filename . '.' . $extension);
        }
        else{
            $path = $province->path;
            $filename = $province->image;
            $extension = $province->extension;
        }

        $province->update([
            'title' => $request->title,
            'page_title' => $request->page_title,
            'slug' => $request->slug,
            'keywords' => $request->keywords,
            'description' => $request->description,
            'content' => $request->content,
            'path' => $path,
            'image' => $filename,
            'extension' => $extension,
            'order' => $request->order,
        ]);
        return back()->with('success', 'تغییرات با موفقیت بروزرسانی شد.');
    }

    public function destroy(Province $province)
    {
        if ($province && $province->status == 0) {
            $fa_title = $province->fa_title;
            if($province->provinces()->count()){
                return back()->with('error', 'مورد انتخابی دارای زیر مجموعه می باشد.');
            }
            else{
                if ($province->image != 'image') {
                    $path = $province->path.$province->image.'.'.$province->extension;
                    Storage::delete([$path]);
                }
                $province->delete();
                return back()->with('success', 'مورد ' . $fa_title . ' با موفقیت حذف شد.');
            }
        }
        else {
            return back()->with('error', 'مورد انتخابی تایید شده و قابل حذف نمی باشد.');
        }
    }

    public function status(Province $province)
    {
        if($province->status){
            $province->status = 0;
            $province->save();
            return back()->with('warning', 'تغییر وضعیت انجام شد.');
        }else{
            $province->status = 1;
            $province->save();
            return back()->with('success', 'تغییر وضعیت با موفقیت انجام شد.');
        }
    }

    // get sub provinces in ajax
    public function sub_provinces()
    {
        $str = '<option value="" selected disabled>انتخاب شهرستان</option>';
        if(Request('province_id')){
            $province_id =  Request('province_id');
            $provinces = Province::where('province_id' , $province_id)->orderBy('order', 'ASC')->get(['id', 'province_id', 'title']);
        }
        else{
            $provinces = Province::where('province_id' , NULL)->orderBy('order', 'ASC')->get(['id', 'province_id', 'title']);
        }
        foreach ($provinces as $province){
            $str .='<option value="'.$province->id.'" >'.$province->title.'</option>';
        }
        return $str;
    }
}
