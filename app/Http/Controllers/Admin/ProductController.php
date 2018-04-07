<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $per_page = 20;

    public function index()
    {
        if (Request('search')) {
            $search = Request('search');
            $products = Product::lang()->where('id', 'like', '%' . $search . '%')
                ->orWhere('slug', 'like', '%' . $search . '%')
                ->orWhere('title', 'like', '%' . $search . '%')
                ->orWhere('summary', 'like', '%' . $search . '%')
                ->paginate($this->per_page);
        } elseif (Request('category_id')) {
            $category_id = Request('category_id');
            $products = Product::lang()->Where('category_id', $category_id)->latest()->paginate($this->per_page);
        } else {
            $products = Product::lang()->latest()->paginate($this->per_page);
        }


        return view('admin.products.index', compact('products'));
    }


    public function create()
    {

        $categories = ProductCategory::lang()->get();

        return view('admin.products.create', compact('categories'));
    }


    public function store(Request $request)
    {
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

        $request->merge(['user_id' => auth()->user()->id]);
        Product::create($request->except(['file', '_token', '_method']));
        session()->flash('success', __('messages.created_success'));

        return redirect(route('admin.products.index'));
    }


    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }


    public function edit(Product $product)
    {
        if (request('active') && request('active') === 'toggle') {
            $this->toggle_active($product);
            return back();
        }

        if (request('featured') && request('featured') === 'toggle') {
            $this->toggle_featured($product);
            return back();
        }

        $categories = ProductCategory::all();
        return view('admin.products.edit', compact('categories', 'product'));

    }


    public function update(Request $request, Product $product)
    {
        if ($request->hasFile('file')) {
            $file = $request->file("file");
            Storage::disk('public')->delete($product->image);
            $directory = 'uploads/products/' . date('Y') . '/' . date('m') . '/';
            $file_name = time();
            $extension = strtolower($file->getClientOriginalExtension());
            $size = $file->getSize();
            $file_path = $directory . $file_name . '.' . $extension;
            Storage::makeDirectory($directory);
            $file->storeAs($directory, $file_name . '.' . $extension, 'public');
            $request->merge(['image' => $file_path]);
        }

        $product->update($request->except(['file', '_token', '_method']));
        session()->flash('success', __('messages.updated_success'));

        return back();
    }


    public function destroy(Product $product)
    {
        session()->flash('success', __('messages.deleted_success'));
        Storage::disk('public')->delete($product->image);
        $product->delete();
        return back();
    }

    public function toggle_active($product)
    {
        if ($product->active === 1) {
            $product->update(['active' => 0]);
        } else {
            $product->update(['active' => 1]);
        }
        session()->flash('success', __('messages.toggled_success'));
    }

    public function toggle_featured($product)
    {
        if ($product->featured === 1) {
            $product->update(['featured' => 0]);
        } else {
            $product->update(['featured' => 1]);
        }
        session()->flash('success', __('messages.toggled_success'));
    }

}
