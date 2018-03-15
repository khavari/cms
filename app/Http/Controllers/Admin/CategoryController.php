<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Vocabulary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    private $per_page = 20;

    public function index()
    {

        if (Request('search')) {
            $search = Request('search');
            $categories = Category::lang()->where('id', 'like', '%' . $search . '%')
                ->orWhere('slug', 'like', '%' . $search . '%')
                ->orWhere('title', 'like', '%' . $search . '%')
                ->orWhere('summary', 'like', '%' . $search . '%')
                ->paginate($this->per_page);
        } elseif (Request('vocabulary_id')) {
            $vocabulary_id = Request('vocabulary_id');
            $categories = Category::lang()->Where('vocabulary_id', $vocabulary_id)->latest()->paginate($this->per_page);
        } else {
            $categories = Category::lang()->latest()->paginate($this->per_page);
        }

        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        $vocabularies = Vocabulary::all();

        return view('admin.categories.create', compact('vocabularies'));
    }


    public function store(CategoryRequest $request)
    {

        if ($request->parent_id == 0) {
            $request->merge(['parent_id' => null]);
        }

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

        Category::create($request->except(['file', '_token', '_method']));
        session()->flash('success', __('messages.created_success'));

        return redirect(route('admin.categories.index'));
    }


    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }


    public function edit(Category $category)
    {
        // toggle user 0 or 1
        if (request('active') && request('active') === 'toggle') {
            if ($category->active === 1) {
                $category->update(['active' => 0]);
            } else {
                $category->update(['active' => 1]);
            }

            return back()->with('success', __('messages.toggled_success'));
        }


        $vocabularies = Vocabulary::all();

        return view('admin.categories.edit', compact('vocabularies', 'category'));
    }


    public function update(CategoryRequest $request, Category $category)
    {
        if ($request->parent_id == 0) {
            $request->merge(['parent_id' => null]);
        }

        if ($request->hasFile('file')) {
            $file = $request->file("file");
            Storage::disk('public')->delete($category->image);
            $directory = 'uploads/categories/' . date('Y') . '/' . date('m') . '/';
            $file_name = time();
            $extension = strtolower($file->getClientOriginalExtension());
            $size = $file->getSize();
            $file_path = $directory . $file_name . '.' . $extension;
            Storage::makeDirectory($directory);
            $file->storeAs($directory, $file_name . '.' . $extension, 'public');
            $request->merge(['image' => $file_path]);
        }

        $category->update($request->except(['file', '_token', '_method']));
        session()->flash('success', __('messages.updated_success'));

        return redirect(route('admin.categories.index'));
    }


    public function destroy(Category $category)
    {
        if ($category->contents()->count() === 0) {
            session()->flash('success', __('messages.deleted_success'));
            Storage::disk('public')->delete($category->image);
            $category->delete();

        } else {
            session()->flash('error', __('messages.notAlloweDeleteActive'));
        }

        return back();
    }
}
