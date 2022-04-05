<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('index', compact('products'));
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
