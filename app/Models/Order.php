<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function toppings(){
        return $this->belongsToMany(
            Topping::class,
            'order_toppings'
        );
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pizzas(){
        return $this->belongsToMany(
            Pizza::class,
            'order_pizzas'
        );
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
}
