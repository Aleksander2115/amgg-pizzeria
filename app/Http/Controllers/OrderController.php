<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function allOrders(){

        $viewName = '';
        return view($viewName, [
            'orders' => Order::all()
        ]);
    }

    public function orderDetails(int $id){
        $order = Order::find($id);
        $cid = $order->user_id;
        $user = User::find($cid);
        $pizzas = $order->pizzas;

        return view('order-details' , [
            'order' => $order,
            'user' => $user,
            'pizzas' => $pizzas
        ]);
    }
}
