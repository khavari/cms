<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ImageRequest;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(ImageRequest $request)
    {
        $model = app()->make($request->commentable_type);
        $object = $model->findOrFail($request->commentable_id);

        $file = $request->file("image");
        $directory = 'uploads/images/' . date('Y') . '/' . date('m') . '/';
        $file_name = time();
        $extension = strtolower($file->getClientOriginalExtension());
        $size = $file->getSize();
        $file_path = $directory . $file_name . '.' . $extension;
        Storage::makeDirectory($directory);
        $file->storeAs($directory, $file_name . '.' . $extension, 'public');

        $image = new Image();
        $image->title = $request->title;
        $image->alt = $request->alt;
        $image->image = $file_path;
        $image->size = $size;
        $object->images()->save($image);

        session()->flash('success', __('messages.created_success'));

        return back();

    }


    public function show(Image $image)
    {


    }


    public function edit(Image $image)
    {
        if (request('active') && request('active') === 'toggle') {
            if ($image->active === 1) {
                $image->update(['active' => 0]);
            } else {
                $image->update(['active' => 1]);
            }

            return back()->with('success', __('messages.toggled_success'));
        }


    }

    public function update(Request $request, Image $image)
    {

    }


    public function destroy(Image $image)
    {
        session()->flash('success', __('messages.deleted_success'));
        Storage::disk('public')->delete($image->image);
        $image->delete();

        return back();
    }
}
