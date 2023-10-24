<?php

use App\Http\Controllers\
{
    AdminController,
    AuthController,
    MainController,
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

//Utils::addRoute('Main_page', 'Main_pageCtrl');
Route::get('/', [MainController::class, 'welcome']);

//Utils::addRoute('login', 'LoginCtrl');
Route::get('/login' , [AuthController::class, 'login']);

//Utils::addRoute('logout', 'LoginCtrl');
Route::get('/logout', [AuthController::class, 'logout']);

//Utils::addRoute('registry', 'RegistrationCtrl');
Route::get('/register', [AuthController::class, 'register']);

//Utils::addRoute('NewRegistration', 'RegistrationCtrl');
Route::get('/newuser', [AuthController::class, 'newRegistration']);

//Utils::addRoute('showLogin', 'LoginCtrl');
Route::get('/showlogin', [AuthController::class, 'showLogin']);

//Utils::addRoute('adminRoleList', 'AdminCtrl', ["Admin"]);
Route::get('/admin/rolelist', [AdminController::class, 'roleList']);

//Utils::addRoute('adminDelete', 'AdminCtrl', ["Admin"]);
Route::get('/admin/delete', [AdminController::class, 'delete']);

//Utils::addRoute('adminAdd', 'AdminCtrl', ["Admin"]);
Route::get('/admin/new', [AdminController::class, 'new']);

//Utils::addRoute('adminChangeToAdmin', 'AdminCtrl', ["Admin"]);
Route::get('/admin/makeAdmin', [AdminController::class, 'makeAdmin']);

//Utils::addRoute('adminChangeToMod', 'AdminCtrl', ["Admin"]);
Route::get('/admin/makeEmployee', [AdminController::class, 'makeEmployee']);

//Utils::addRoute('adminChangeToUser', 'AdminCtrl', ["Admin"]);
Route::get('/admin/makeClient', [AdminController::class, 'makeClient']);

//Utils::addRoute('addPizza', 'OrderCtrl', ["User"]);

//Utils::addRoute('addAddition', 'OrderCtrl', ["User"]);

//Utils::addRoute('showOrders', 'OrderCtrl', ["User"]);
Route::get('/orders', [OrderController::class, 'allOrders']);

Route::get('/orders/{id}', [OrderController::class, 'orderDetails']);

//Utils::addRoute('deletePizza', 'OrderCtrl', ["User"]);

//Utils::addRoute('deleteAddition', 'OrderCtrl', ["User"]);

//Utils::addRoute('orderList', 'ModCtrl', ["Mod"]);

//Utils::addRoute('deleteOrderMod', 'ModCtrl', ["Mod"]);

//Utils::addRoute('buyPizza', 'OrderCtrl', ["User"]);
