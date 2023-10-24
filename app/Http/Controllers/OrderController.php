<?php

namespace App\Http\Controllers;

use App\Models\
{
    Order,
    OrderPizza,
    OrderTopping,
    User
};
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function allOrders()
    {
        $viewName = ''; # some view
        return view($viewName, [
            'orders' => Order::all()
        ]);
    }

    public function orderDetails(int $order_id)
    {
        $order = Order::find($order_id);
        $uid = $order->user_id;
        $user = User::find($uid);
        $pizzas = $order->pizzas;
        $toppings = $order->toppings;

        return view('order-details', [
            'order' => $order,
            'user' => $user,
            'pizzas' => $pizzas,
            'toppings' => $toppings
        ]);
    }
    public function addPizza(int $pizza_id)
    {
        $order_id = 1; # retrieve from session

        $p = new OrderPizza();
        $p->order_id = $order_id;
        $p->pizza_id = $pizza_id;
        $p->save();

        # some redirect
    }

    public function addTopping(int $topping_id)
    {
        $order_id = 1; # retrieve from session

        $p = new OrderTopping();
        $p->order_id = $order_id;
        $p->topping_id = $topping_id;
        $p->save();

        # some redirect
    }

    public function removePizza(int $pizza_id)
    {
        $order_id = 1; # retrieve from session

        $pizza = OrderPizza::where('order_id', 1)->where('pizza_id', $pizza_id)->first();
        $pizza->delete();

        # some redirect
    }

    public function removeTopping(int $topping_id)
    {
        $order_id = 1; # retrieve from session

        $pizza = OrderTopping::where('order_id', 1)->where('topping_id', $topping_id)->first();
        $pizza->delete();

        # some redirect
    }

    public function updateCostOfOrder(int $order_id)
    {
        $order = Order::find($order_id);
        $prices = $order->pizzas->pluck('price');
        $total_price = 0;

        for($i = 0; $i < count($prices); ++$i)
        {
            $total_price += $prices[$i];
        }

        $order->total_cost = $total_price;
        $order->save();
    }
}
