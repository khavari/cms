<?php

namespace App\Http\Controllers\Admin;

use App\Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavigationController extends Controller
{

    public function index()
    {
        //app()->setLocale('en');
        $lang = app()->getLocale();
        $locales = config('app.locales');
        $locale = $locales[$lang];
        //----------
        if(Request('parent_id')){
            $parent_id =  Request('parent_id');
            $parent = Navigation::find($parent_id);
            $navigations = Navigation::where('lang',$lang)->where('parent_id' , $parent_id)->orderBy('order', 'ASC')->get();

        }
        else{
            $navigations = Navigation::where('lang',$lang)->whereNull('parent_id')->orderBy('order', 'ASC')->get();
        }
        $menus = Navigation::where('lang',$lang)->whereNull('parent_id')->orderBy('order', 'ASC')->get();


        return view('admin.navigations.index',compact('navigations','parent','menus','locale'));
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required|min:2|max:64',
            'link'        => 'required|min:2|max:191',
            'description' => 'nullable|min:2|max:191',
            'order'       => 'required|integer|min:0|max:1000000',
        ]);
        Navigation::create([
            'parent_id' => $request->parent_id,
            'title' => $request->title,
            'link' => $request->link,
            'description' => $request->description,
            'icon' => $request->icon,
            'order' => $request->order,
            'clickable' => 1,
            'status' => 1,
        ]);
        return back()->with('msg', 'استان جدید با موفقیت ثبت شد.');
    }


    public function show($id)
    {

    }


    public function edit(Navigation $navigation)
    {
        $lang = app()->getLocale();
        $locales = config('app.locales');
        $locale = $locales[$lang];
        //----------
        $parents = Navigation::where('lang',$lang)->where('id','!=',$navigation->id)->orderBy('order', 'ASC')->get();
        $menus = Navigation::where('lang',$lang)->whereNull('parent_id')->orderBy('order', 'ASC')->get();
        return view('admin.navigations.edit',compact('navigation','menus','parents','locale'));
    }


    public function update(Request $request, Navigation $navigation)
    {
        $this->validate($request, [
            'title'       => 'required|min:2|max:64',
            'link'        => 'required|min:2|max:191',
            'description' => 'nullable|min:2|max:191',
            'order'       => 'required|integer|min:0|max:1000000',
        ]);
        if($request->parent_id == 0){
            $parent_id = NULL;
        }else{
            $parent_id = $request->parent_id;
        }
        $navigation->update([
            'parent_id' => $parent_id,
            'title' => $request->title,
            'link' => $request->link,
            'description' => $request->description,
            'icon' => $request->icon,
            'order' => $request->order,

        ]);
        return back()->with('msg', 'استان جدید با موفقیت ثبت شد.');
    }


    public function destroy(Navigation $navigation)
    {
        if ($navigation->children->count() > 0) {
            return back()->with('warning', __('messages.user_delete_post_warning'));
        }elseif ($navigation->status !=0){
            return back()->with('warning', __('messages.user_delete_status_warning'));
        }else {
            $navigation->delete();
            return back()->with('success', __('messages.user_delete_success'));
        }
    }

    public function status(Navigation $navigation)
{
    if($navigation->status){
        $navigation->status = 0;
        $navigation->save();
        return back()->with('info', __('messages.user_status_false'));
    }else{
        $navigation->status = 1;
        $navigation->save();
        return back()->with('success', __('messages.user_update_success'));
    }
}

    public function clickable(Navigation $navigation)
    {
        if($navigation->clickable){
            $navigation->clickable = 0;
            $navigation->save();
            return back()->with('info', __('messages.user_status_false'));
        }else{
            $navigation->clickable = 1;
            $navigation->save();
            return back()->with('success', __('messages.user_update_success'));
        }
    }




}
