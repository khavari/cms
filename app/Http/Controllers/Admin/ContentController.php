<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Content;
use App\Http\Requests\ContentRequest;
use App\Image;
use App\Vocabulary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    private $per_page = 20;

    public function index()
    {
        if (Request('search')) {
            $search = Request('search');
            $contents = Content::lang()->where('id', 'like', '%' . $search . '%')
                ->orWhere('slug', 'like', '%' . $search . '%')
                ->orWhere('title', 'like', '%' . $search . '%')
                ->orWhere('summary', 'like', '%' . $search . '%')
                ->paginate($this->per_page);
        } elseif (Request('vocabulary_id')) {
            $vocabulary_id = Request('vocabulary_id');
            $contents = Content::lang()->Where('vocabulary_id', $vocabulary_id)->latest()->paginate($this->per_page);
        } else {
            $contents = Content::lang()->latest()->paginate($this->per_page);
        }

        $vocabularies = Vocabulary::all()->reject(function ($vocabulary) {
            return $vocabulary->categories->count() == 0;
        });


        return view('admin.contents.index', compact('contents', 'vocabularies'));
    }


    public function create(Request $request)
    {
        if (! Request('vocabulary_id')) {
            return back();
        }
        $vocabulary_id = $request->vocabulary_id;
        $vocabulary = Vocabulary::find($vocabulary_id);
        $categories = $vocabulary->categories()->lang()->get();

        return view('admin.contents.create', compact('vocabulary_id', 'categories'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file("file");
            $directory = 'uploads/categories/' . date('Y') . '/' . date('m') . '/';
            $file_name = time();
            $extension = strtolower($file->getClientOriginalExtension());
            $size = $file->getSize();
            $file_path = $directory . $file_name . '.' . $extension;
            Storage::makeDirectory($directory);
            $file->storeAs($directory, $file_name . '.' . $extension, 'public');
            $request->merge(['image' => $file_path]);
        }

        $request->merge(['user_id' => auth()->user()->id]);
        Content::create($request->except(['file', '_token', '_method']));
        session()->flash('success', __('messages.created_success'));

        return redirect(route('admin.contents.index'));
    }


    public function show(Content $content)
    {
        return view('admin.contents.show', compact('content'));
    }


    public function edit(Content $content)
    {
        if (request('active') && request('active') === 'toggle') {
            $this->toggle_active($content);
            return back();
        }

        if (request('featured') && request('featured') === 'toggle') {
            $this->toggle_featured($content);
            return back();
        }

        $vocabulary_id = $content->vocabulary_id;
        $vocabulary = Vocabulary::find($vocabulary_id);
        $categories = $vocabulary->categories()->lang()->get();

        return view('admin.contents.edit', compact('vocabulary_id', 'categories', 'content'));

    }


    public function update(ContentRequest $request, Content $content)
    {

        if ($request->hasFile('file')) {
            $file = $request->file("file");
            Storage::disk('public')->delete($content->image);
            $directory = 'uploads/contents/' . date('Y') . '/' . date('m') . '/';
            $file_name = time();
            $extension = strtolower($file->getClientOriginalExtension());
            $size = $file->getSize();
            $file_path = $directory . $file_name . '.' . $extension;
            Storage::makeDirectory($directory);
            $file->storeAs($directory, $file_name . '.' . $extension, 'public');
            $request->merge(['image' => $file_path]);
        }

        $content->update($request->except(['file', '_token', '_method']));
        session()->flash('success', __('messages.updated_success'));

        return back();
    }


    public function destroy(Content $content)
    {
        session()->flash('success', __('messages.deleted_success'));
        Storage::disk('public')->delete($content->image);
        $content->delete();
        return back();
    }

    public function toggle_active($content)
    {
        if ($content->active === 1) {
            $content->update(['active' => 0]);
        } else {
            $content->update(['active' => 1]);
        }
        session()->flash('success', __('messages.toggled_success'));
    }

    public function toggle_featured($content)
    {
        if ($content->featured === 1) {
            $content->update(['featured' => 0]);
        } else {
            $content->update(['featured' => 1]);
        }
        session()->flash('success', __('messages.toggled_success'));
    }
}
