<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFilterRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(ProductsFilterRequest $request){
        $categories = Category::get();
        $productsQuery = Product::query();
        if($request->filled('price_from')){
            $productsQuery->where('price', '>=', $request->price_from);
        }
        if($request->filled('price_to')){
            $productsQuery->where('price', '<=', $request->price_to);
        }
        if($request->filled('filter_category')){
            $productsQuery->where('category_id', '=', $request->filter_category);
        }

        $products = $productsQuery->paginate(6)->withPath("?" . $request->getQueryString());

        return view('index', compact('products', 'categories'));
    }
    public function categories(){
        $categories = Category::get();
        return view('categories',compact('categories'));
    }
    public function category($category){
        $categoryObject = Category::where('code', $category)->first();
        return view('category', compact('categoryObject'));
    }
    public function product($category, $name = null){
        $product = Product::where('code', $name)->first();
        return view('product', compact('product'));
    }
}
