<?php

namespace App\Http\Controllers\Web;

use App\Http\Utilities\Seo;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function product($slug)
    {
        $product = Product::lang()->active()->where('slug', $slug)->firstOrFail();
        Seo::share($product);
        return view('web.products.product', compact('product'));
    }

    public function products($slug)
    {
        $category = ProductCategory::lang()->active()->where('slug', $slug)->firstOrFail();
        Seo::share($category);
        $products = $category->products()->active()->paginate(8);
        return view('web.products.products', compact('category','products'));
    }
    
}
