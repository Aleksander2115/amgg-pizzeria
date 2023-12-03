<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\{Order, OrderPizza, OrderTopping, Pizza, Size, User};
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public static function newOrder()
    {
        $order = Order::where('user_id', Auth::user()->id)->get()->last();

        if($order == null || $order->status_id != 1) {
            $order = Order::factory()->create([
                'user_id' => Auth::user()->id,
                'status_id' => 1,
                'delivery_cost' => 5,
                'total_cost' => 0
            ]);
        }
        session(['order_id' => $order->id]);
        return $order->id;
    }

    public function allOrders()
    {
        $viewName = ''; # some view
        return view($viewName, [
            'orders' => Order::all()
        ]);
    }

    public function orderDetails()
    {
        $order_id = session('order_id');

        $order = Order::find($order_id);
        $uid = $order->user_id;
        $user = User::find($uid);
        $pizzas = OrderPizza::where('order_id', $order_id)->get();
        $toppings = OrderTopping::where('order_id', $order_id)->get();

        return view('cart', [
            'order' => $order,
            'user' => $user,
            'items' => $pizzas,
            'toppings' => $toppings,
            'var' => OrderPizza::where('order_id', $order_id)->get()
        ]);
    }
    public function addPizza(int $pizza_id, int $size_id)
    {
        $order_id = session('order_id');

        $p = new OrderPizza();
        $p->order_id = $order_id;
        $p->pizza_id = $pizza_id;
        $p->size_id = $size_id;
        $p->price = Pizza::find($pizza_id)->price * Size::find($size_id)->multiplier;
        $p->save();

        self::updateCostOfOrder($order_id);
        return redirect('/#menu')->with('message', 'Dodano pizze do koszyka');
    }

    public function addTopping(int $topping_id)
    {
        $order_id = session('order_id');

        $p = new OrderTopping();
        $p->order_id = $order_id;
        $p->topping_id = $topping_id;
        $p->save();

        self::updateCostOfOrder($order_id);
        return redirect('/#menu')->with('message', 'Dodano dodatek do koszyka');;
    }

    public function removePizza(int $pizza_id)
    {
        $order_id = session('order_id');

        $pizza = OrderPizza::where('order_id', $order_id)->find($pizza_id);
        $pizza->delete();

        self::updateCostOfOrder($order_id);
        return redirect('/cart')->with('message', 'Usunięto pizze z koszyka');;
    }

    public function removeTopping(int $topping_id)
    {
        $order_id = session('order_id');

        $topping = OrderTopping::where('order_id', $order_id)->find($topping_id);
        $topping->delete();

        self::updateCostOfOrder($order_id);
        return redirect('/cart')->with('message', 'Usunięto dodatek z pizzy');;
    }

    public function clearOrder(){

        $order_id = session('order_id');

        $pizzas = OrderPizza::where('order_id', $order_id)->get();
        while($pizzas !== []){
            $p = $pizzas->first();
            $p->delete();
            $pizzas = OrderPizza::where('order_id', $order_id)->get();
        }
        $toppings = OrderTopping::where('order_id', $order_id)->get();
        while($toppings !== []){
            $t = $toppings->first();
            $t->delete();
            $toppings = OrderTopping::where('order_id', $order_id)->get();
        }

        self::updateCostOfOrder($order_id);
        return redirect('/cart');
    }

    public function finalizeOrder()
    {
        $order_id = session('order_id');

        $order = Order::find($order_id);
        $order->status_id = 2;
        $order->save();

        self::newOrder();
        return redirect('/')->with('message', 'Zamówinie zostało złożone');
    }

    public static function updateCostOfOrder(int $order_id)
    {
        $items = OrderPizza::where('order_id',$order_id)->get();
        $prices = $items->pluck('price');
        $topps = OrderTopping::where('order_id',$order_id)->get()->pluck('price');

        $total_price = 0;

        for($i = 0; $i < count($prices); ++$i)
        {
            $total_price += $prices[$i];
        }
        for($i = 0; $i < count($topps); ++$i)
        {
            $total_price += 5;
        }

        $order = Order::find($order_id);
        $order->total_cost = $total_price;
        $order->save();
    }
}
