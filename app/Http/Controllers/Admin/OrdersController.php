<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        $orders = Order::where('status', '1')->paginate(5);
        return view('admin.orders.index', compact('orders'));
    }

    public function completedOrders(){
        $orders = Order::where('status', '2')->paginate(5);
        return view('admin.orders.index', compact('orders'));
    }

    public function showOrder($orderId){
        $order = Order::findOrFail($orderId);
        return view('admin.orders.show', compact('order'));
    }

    public function completeOrder($orderId){
        $order = Order::findOrFail($orderId);
        $order->complete();
        return redirect()->route('adminOrders');
    }

    public function deleteOrder($orderId){
        $order = Order::findOrFail($orderId);
        foreach ($order->products as $product){
            $order->products()->detach($product->id);
        }
        $order->delete();
        return redirect()->route('adminOrders');
    }
}
