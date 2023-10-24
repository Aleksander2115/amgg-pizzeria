<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Topping;
use Illuminate\Http\Request;

class welcome extends Controller
{

    public function index(){

        $products= Pizza::all();
        $toppings= Topping::all();
        return view('index', ['products'=>$products , 'toppings'=>$toppings]);

    }

}
