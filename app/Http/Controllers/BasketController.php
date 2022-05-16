<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket(){
        $orderId = session('orderId');
        if(is_null($orderId)){
            $order = Order::create();
            session(['orderId' => $order->id]);
        }else{
            $order = Order::find($orderId);
        }
        return view('basket', compact('order'));
    }

    public function basketAdd($productId){
        $orderId = session('orderId');
        if(is_null($orderId)){
           $order = Order::create();
           session(['orderId' => $order->id]);
        }else{
            $order = Order::find($orderId);
        }
        if($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        }else{
            $order->products()->attach($productId);
        }
        $product = Product::find($productId);
        return redirect()->route('basket')->with('success', __('main.product_added', ['name' => $product->name]));
    }

    public function basketRemove($productId){
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);
        if($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if($pivotRow->count < 2){
                $order->products()->detach($productId);
            }else{
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
        $product = Product::find($productId);
        return redirect()->route('basket')->with('warning', __('main.product_removed', ['name' => $product->name]));
    }

    public function basketPlace(){
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('home');
        }
        $order = Order::find($orderId);
        if(!count($order->products)){
            return redirect()->route('basket')->with('warning', __('main.empty_cart'));
        }
        return view('order', compact('order'));
    }

    public function basketConfirm(Request $request){
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('home');
        }
        $this->validate($request, [
            'name' => 'required|max:30|alpha_spaces',
            'phone' => 'required|numeric|digits_between:8,11',
            'email' => 'required|email',
        ]);
        $order = Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone, $request->email);
        if($success){
            session()->flash('success', __('main.order_taken', ['number' => $orderId]));
            $order = Order::create();
            session(['orderId' => $order->id]);
        }else{
            session()->flash('warning', 'Server-side mistake');
        }

        return redirect()->route('home');
    }
}
