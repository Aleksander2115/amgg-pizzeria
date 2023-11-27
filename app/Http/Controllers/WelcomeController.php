<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderPizza;
use App\Models\Pizza;
use App\Models\Size;
use App\Models\Topping;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function index(){

        $products= Pizza::all();
        $sizes = Size::all();
        $toppings= Topping::all();
        $pizzaCollection = collect();

        //cartCount
        $order_id = session('order_id');
        $order = Order::find($order_id);
        $cartCount = OrderPizza::where('order_id', $order_id)->count();

        //dd($pizzaCollection);

        return view('index', [
            'pizzaCollection'=>$pizzaCollection,
            'products'=>$products ,
            'sizes'=>$sizes,
            'toppings'=>$toppings,
            'cartCount'=>$cartCount,
        ]);
    }
}
