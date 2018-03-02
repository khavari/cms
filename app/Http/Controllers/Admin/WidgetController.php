<?php

namespace App\Http\Controllers\Admin;

use App\Widget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WidgetController extends Controller
{

    public function index()
    {
        $widgets = Widget::lang()->get();
        return view('admin.widgets.index', compact('widgets'));
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        // get array of links id
        $widgets = $request->data['widgets'];

        foreach ($widgets as $index => $widget) {
            Widget::find($widget)->update(['order' => $index + 1]);
        }

        return '';
    }


    public function show($group)
    {
        $widgets = Widget::lang()->active()->where('group', $group)->orderBy('order', 'ASC')->get();

        return view('admin.widgets.group', compact('widgets'));
    }


    public function edit(Request $request, Widget $widget)
    {
        if (request('active') && request('active') === 'toggle') {
            if ($widget->isActive()) {
                $widget->update(['active' => 0]);
                session()->flash('success', __('messages.inactivate_success'));
            } else {
                $widget->update(['active' => 1]);
                session()->flash('success', __('messages.activate_success'));
            }

            return back();
        }
    }


    public function update(Request $request, Widget $widget)
    {
        //
    }


    public function destroy(Widget $widget)
    {
        //
    }
}
