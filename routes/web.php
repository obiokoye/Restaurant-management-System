<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllPagesController;
use App\Http\Controllers\Food\FoodsController;
use App\Http\Controllers\users\UsersController;
use App\Http\Controllers\Admins\AdminsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('about', [AllPagesController::class, 'about'])->name('about');
Route::get('addcart', [AllPagesController::class, 'addcart'])->name('addcart');
Route::get('booking', [AllPagesController::class, 'booking'])->name('booking');
Route::get('checkout', [AllPagesController::class, 'checkout'])->name('checkout');
Route::get('menu', [AllPagesController::class, 'menu'])->name('menu');
Route::get('contact', [AllPagesController::class, 'contact'])->name('contact');
Route::get('services', [AllPagesController::class, 'services'])->name('services');
Route::get('team', [AllPagesController::class, 'team'])->name('team');
Route::get('testimony', [AllPagesController::class, 'testimony'])->name('testimony');

Route::get('food/food-details/{id}', [FoodsController::class, 'fooddetails'])->name('fooddetails');

Route::post('food/food-details/{id}', [FoodsController::class, 'cart'])->name('foodcart');
Route::get('food/displaycarts', [FoodsController::class, 'displaycartitems'])->name('displaycarts');
Route::get('food/deletecarts/{id}', [FoodsController::class, 'deletecartitems'])->name('deletecarts');

Route::post('food/preparecheckout', [FoodsController::class, 'preparecheckout'])->name('preparecheckout');

Route::get('food/checkout', [FoodsController::class, 'checkout'])->name('checkout');
Route::post('food/checkout', [FoodsController::class, 'storecheckout'])->name('storecheckout');

//PAYPAL
Route::get('food/pay', [FoodsController::class, 'paypal'])->name('foods.pay');
Route::get('food/success', [FoodsController::class, 'success'])->name('foods.success');


//bookings
Route::post('food/booking', [FoodsController::class, 'booking'])->name('food.book'); 


//Menu
Route::get('food/menu', [FoodsController::class, 'menu'])->name('foods.menu');


//Users bookings
Route::get('users/all-bookings', [UsersController::class, 'getBookings'])->name('users.bookings');
Route::get('users/orders', [UsersController::class, 'getorders'])->name('users.orders');


//reviews
Route::get('users/write-review', [UsersController::class, 'viewReview'])->name('users.createreviews');
Route::post('users/write-review', [UsersController::class, 'submitReview'])->name('users.storereviews');



//ADMIN PAGE
Route::get('admin/login', [AdminsController::class, 'adminlogin'])->name('adminlogin')->middleware('checkauth');
Route::post('admin/login', [AdminsController::class, 'checklogin'])->name('checklogin');
// Route::post('admin/logout', [AdminsController::class, 'logout'])->name('logout');


//this auth:admins will guard against any unauthorized access to the home page of the admin
Route::group(["prefix" => "admin", "middleware" => "auth:admins"], function(){
    Route::get('home', [AdminsController::class, 'home'])->name('home.admin');
    Route::get('admins', [AdminsController::class, 'admins'])->name('admins');
    Route::get('create', [AdminsController::class, 'createAdmins'])->name('createAdmins');
    Route::post('store', [AdminsController::class, 'storeAdmins'])->name('storeAdmins');

    Route::get('orders-admins', [AdminsController::class, 'ordersadmins'])->name('orders-admins');
    Route::get('delete-orders/{id}', [AdminsController::class, 'deleteorders'])->name('deleteorders');


    
    //this is used to change the orders status
    Route::get('orders-status/{id}', [AdminsController::class, 'ordersstatus'])->name('orders-status');
    Route::post('orders-status/{id}', [AdminsController::class, 'updateordersstatus'])->name('updateordersstatus');

    Route::get('bookings-admins', [AdminsController::class, 'bookingsadmins'])->name('bookings-admins');
    Route::get('bookingstatus/{id}', [AdminsController::class, 'bookingstatus'])->name('bookingstatus');
    Route::post('updatebookingstatus/{id}', [AdminsController::class, 'updatebooking'])->name('updatebookingstatus');
    Route::get('delete-bookings/{id}', [AdminsController::class, 'deletebookings'])->name('deletebookings');

    Route::get('foods-admins', [AdminsController::class, 'foodsadmins'])->name('foods-admins');
    Route::get('createfood', [AdminsController::class, 'createfood'])->name('createfood');
    Route::post('storefood', [AdminsController::class, 'storefood'])->name('storefood');
    Route::get('delete-food/{id}', [AdminsController::class, 'deletefood'])->name('deletefood');


});