<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{


    public function index()
    {
        $settings = Setting::lang()->get();

        return view('admin.settings.index', compact('settings'));
    }


    public function edit($group)
    {
        if (is_numeric($group)) {
            $setting = Setting::findOrFail($group);

            return view('admin.settings.edit', compact('setting'));
        } else {
            $options = Setting::lang()->where('group', $group)->get();
            $settings = [];
            $keys = [];
            foreach ($options as $option) {
                array_push($keys, $option['key']);
                array_push($settings, $option['value']);
            }
            $setting = array_combine($keys, $settings);
            $fonts = collect(config('fonts'))->where('dir',locale('dir'))->pluck('name')->toArray();
            return view('admin.settings.' . $group, compact('setting','fonts'));
        }
    }

    public function update(Request $request, $group)
    {
        $this->validate($request, [
            'value' => ['nullable', 'min:0', 'max:32000'],
        ]);

        // update a setting row by id
        if (is_numeric($group)) {
            Setting::findOrFail($group)->update($request->all());
            session()->flash('success', __('messages.updated_success'));

            return back();
        } // update a group of settings
        else {
            $inputs = $request->all();
            $settings = $inputs['settings'];
            foreach ($settings as $key => $value) {
                Setting::lang()->where('key', $key)->where('group', $group)->first()->update(['value' => $value]);
            }

            if (in_array($group,['layout','fonts'])) {
                $this->generate_skin_file($group);
            }



            session()->flash('success', __('messages.updated_success'));

            return back();
        }
    }


    public function generate_skin_file($group)
    {
        $locale = app()->getLocale();
        $skin = view('admin.settings.skin')->render();
        $admin = view('admin.settings.admin_skin')->render();

        File::delete('assets/web/css/skin.' . $locale . '.css');
        File::put('assets/web/css/skin.' . $locale . '.css', $skin);

        File::delete('assets/admin/css/skin.' . $locale . '.css');
        File::put('assets/admin/css/skin.' . $locale . '.css', $admin);

        Setting::lang()->where('key', 'color.fresh')->first()->update(['value' => time()]);
    }



}
