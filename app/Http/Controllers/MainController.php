<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFilterRequest;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(ProductsFilterRequest $request){
        $categories = Category::get();
        $manufacturers = Manufacturer::get();
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
        if($request->filled('filter_manufacturer')){
            $productsQuery->where('manufacturer_id', '=', $request->filter_manufacturer);
        }
        $products = $productsQuery->paginate(6)->withPath("?" . $request->getQueryString());
        return view('index', compact('products', 'categories', 'manufacturers'));
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
    public function search(Request $request){
        $query = $request->input('query');
        if(!$query){
            return redirect()->route('home');
        }
        $products = Product::where(DB::raw("CONCAT (name, ' ', code)"),
            'LIKE', "%{$query}%")
            ->orWhere('name', 'LIKE', "%{$query}%" )
            ->paginate(6);
        $categories = Category::get();
        $manufacturers = Manufacturer::get();
        return view('index', compact('products', 'categories', 'manufacturers'));
    }

}
