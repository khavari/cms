<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{

    protected $post_types;

    public function __construct()
    {
        $this->post_types = config('app.posts_type');
    }

    public function index($type)
    {
        if (!array_key_exists($type, $this->post_types)) {
            return back();
        } else {
            $type = $this->post_types[$type];
            $lang = app()->getLocale();
            $locales = config('app.locales');
            $locale = $locales[$lang];
            //----------
            $groups = Group::where('lang', $lang)
                ->where('type', $type['name'])
                ->orderby('order', 'asc')
                ->orderby('id', 'desc')->get();

            return view('admin.groups.groups', compact('groups', 'type', 'locale'));
        }

    }


    public function create()
    {

    }


    public function store($type, Request $request)
    {
        if (!array_key_exists($type, $this->post_types)) {
            return back();
        }
        $type = $this->post_types[$type];
        $lang = app()->getLocale();
        $locales = config('app.locales');
        $locale = $locales[$lang];
        //----------
        $this->validate($request, [
            'image' => 'nullable|url|max:191',
            'title' => 'required|max:191',
            'slug' => 'required|max:64',
            'order' => 'required|integer|min:0|max:1000000',
        ]);
        //----------
        $group = Group::create(array_merge($request->all(), [
            'type' => $type['name'],
        ]));
        return back()->with('success', 'گروه جدید با موفقیت ساخته شد.');
    }


    public function show($id)
    {

    }


    public function edit($type, Group $group)
    {
        if (!array_key_exists($type, $this->post_types)) {
            return back();
        }
        else{
            $type = $this->post_types[$type];
            $lang = app()->getLocale();
            $locales = config('app.locales');
            $locale = $locales[$lang];
            //----------
            return view('admin.groups.group', compact('group', 'type', 'locale'));
        }

    }


    public function update(Request $request , $type , Group $group)
    {
        if (!array_key_exists($type, $this->post_types)) {
            return back();
        }
        $type = $this->post_types[$type];
        $lang = app()->getLocale();
        $locales = config('app.locales');
        $locale = $locales[$lang];
        //----------
        $this->validate($request, [
            'image' => 'nullable|url|max:191',
            'title' => 'required|max:191',
            'slug' => 'required|max:64',
            'order' => 'required|integer|min:0|max:1000000',
        ]);
        //----------

        $group->update($request->all());
        return back()->with('success', 'گروه مورد نظر با موفقیت بروز رسانی شد.');
    }


    public function destroy($type, group $group)
    {
        $lang = app()->getLocale();
        if (!array_key_exists($type, $this->post_types) || $group->lang != $lang) {
            return back();
        } else {
            if ($group->posts()->count()) {
                return back()->with('error', 'مورد انتخابی دارای زیر مجموعه می باشد.');
            } else {
                $group->delete();
                return back()->with('success', 'مورد انتخابی با موفقبت حذف شد.');
            }
        }
    }

    public function status($type, group $group)
    {
        if (!array_key_exists($type, $this->post_types)) {
            return back();
        }
        else {
            if ($group->status) {
                $group->status = 0;
                $group->save();
                return back()->with('success', 'تغییر وضعیت انجام شد.');
            } else {
                $group->status = 1;
                $group->save();
                return back()->with('success', 'تغییر وضعیت انجام شد.');
            }
        }
    }

}
