<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(){
        // $totalProduct = Product::count();
        // $totalOrder = Order::count()->get();
        // $totalCategorie = Category::count()->get();
        // $totalSlider = Slider::count()->get();
        return view('admin.dashboard');
    }
    public function commandes(){
        $orders = Order::get();
        $orders->transform(function($order,$key){
            $order->panier = unserialize($order->panier);
            return $order;
        });
        return view('admin.commandes')->with('orders',$orders);
    }

}
