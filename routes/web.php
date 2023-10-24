<?php

use App\Http\Controllers\
{
    AdminController,
    AuthController,
    OrderController
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//App::getRouter()->setDefaultRoute('Main_page'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Route::get('/', fn() => view('home'));

Route::controller(AuthController::class)->group(function()
{
    Route::get('/login' , 'login');

    Route::get('/logout', 'logout');

    Route::get('/register', 'register');

    Route::get('/newuser', 'newRegistration');

    Route::get('/showlogin', 'showLogin');
});

Route::controller(AdminController::class)->group(function ()
{
    Route::get('/admin/rolelist', 'roleList');



    Route::get('/admin/delete', 'delete');

    Route::get('/admin/new', 'new');

    Route::get('/admin/makeAdmin', 'makeAdmin');

    Route::get('/admin/makeEmployee', 'makeEmployee');

    Route::get('/admin/makeClient', 'makeClient');
})
    ->middleware(['auth']);

Route::controller(OrderController::class)->group(function ()
{
    Route::get('/orders', 'allOrders');

    Route::get('/orders/{id}', 'orderDetails');

    Route::get('/menu/pizzas/{id}/add', 'addPizza');

    Route::get('/cart/pizza/remove/{id}', 'removePizza');

    Route::get('/menu/toppings/{id}/add', 'addTopping');

    Route::get('/cart/topping/remove/{id}', 'removeTopping');
});

//Utils::addRoute('orderList', 'ModCtrl', ["Mod"]);

//Utils::addRoute('deleteOrderMod', 'ModCtrl', ["Mod"]);

//Utils::addRoute('buyPizza', 'OrderCtrl', ["User"]);
