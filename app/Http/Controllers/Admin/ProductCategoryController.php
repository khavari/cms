<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductCategoryRequest;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductCategoryController extends Controller
{
    private $per_page = 20;

    public function index()
    {
        if (Request('search')) {
            $search = Request('search');
            $categories = ProductCategory::lang()->where('id', 'like', '%' . $search . '%')
                ->orWhere('slug', 'like', '%' . $search . '%')
                ->orWhere('title', 'like', '%' . $search . '%')
                ->orWhere('summary', 'like', '%' . $search . '%')
                ->paginate($this->per_page);
        } elseif (Request('category_id')) {
            $category_id = Request('category_id');
            $categories = Category::lang()->Where('category_id', $category_id)->latest()->paginate($this->per_page);
        } else {
            $categories = ProductCategory::lang()->latest()->paginate($this->per_page);
        }

        return view('admin.product_categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.product_categories.create');
    }


    public function store(ProductCategoryRequest $request)
    {

        if ($request->options) {
            $request->merge(['options' => json_encode($request->options)]);
        }

        if ($request->parent_id == 0) {
            $request->merge(['parent_id' => null]);
        }

        if ($request->hasFile('file')) {
            $file = $request->file("file");
            $directory = 'uploads/products/' . date('Y') . '/' . date('m') . '/';
            $file_name = time();
            $extension = strtolower($file->getClientOriginalExtension());
            $size = $file->getSize();
            $file_path = $directory . $file_name . '.' . $extension;
            Storage::makeDirectory($directory);
            $file->storeAs($directory, $file_name . '.' . $extension, 'public');
            $request->merge(['image' => $file_path]);
        }

        ProductCategory::create($request->except(['file', '_token', '_method']));
        session()->flash('success', __('messages.created_success'));

        return redirect(route('admin.product_categories.index'));
    }


    public function show(ProductCategory $productCategory)
    {
        $category = $productCategory;
        return view('admin.product_categories.show', compact('category'));
    }


    public function edit(ProductCategory $productCategory)
    {
        $category = $productCategory;
        if (request('active') && request('active') === 'toggle') {
            $this->toggle_active($category);
            return back();
        }

        if (request('featured') && request('featured') === 'toggle') {
            $this->toggle_featured($category);
            return back();
        }


        $category->options = (array) json_decode($category->options);
        return view('admin.product_categories.edit', compact('category'));

    }


    public function update(ProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $category = $productCategory;
        if ($request->options) {
            $request->merge(['options' => json_encode($request->options)]);
        }

        if ($request->parent_id == 0) {
            $request->merge(['parent_id' => null]);
        }

        if ($request->hasFile('file')) {
            $file = $request->file("file");
            Storage::disk('public')->delete($category->image);
            $directory = 'uploads/products/' . date('Y') . '/' . date('m') . '/';
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

        return redirect(route('admin.product_categories.index'));

    }


    public function destroy(ProductCategory $productCategory)
    {
        $category = $productCategory;
        if ($category->products()->count() === 0) {
            session()->flash('success', __('messages.deleted_success'));
            Storage::disk('public')->delete($category->image);
            $category->delete();

        } else {
            session()->flash('error', __('messages.notAlloweDeleteActive'));
        }

        return back();
    }

    public function toggle_active($category)
    {
        if ($category->active === 1) {
            $category->update(['active' => 0]);
        } else {
            $category->update(['active' => 1]);
        }
        session()->flash('success', __('messages.toggled_success'));
    }

    public function toggle_featured($category)
    {
        if ($category->featured === 1) {
            $category->update(['featured' => 0]);
        } else {
            $category->update(['featured' => 1]);
        }
        session()->flash('success', __('messages.toggled_success'));
    }
}
