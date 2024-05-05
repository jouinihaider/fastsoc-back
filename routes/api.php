<?php

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;


// Customers
Route::controller(CustomerController::class)->group(function() {
    Route::get('/customers', 'index');
    Route::post('/customers', 'store');
    Route::put('/customers/{id}', 'update');
    Route::delete('/customers/{id}', 'destroy');
    Route::get('/customers/{id}', 'show');
    Route::post('/customers/search', 'search');
});

// Orders
Route::controller(OrderController::class)->group(function() {
    Route::get('/orders/infos', 'infos');
    Route::get('/orders', 'index');
    Route::post('/orders', 'store');
    Route::put('/orders/{order}', 'update');
    Route::delete('/orders/{order}', 'destroy');
});


/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

Route::get('/test', function (Request $request) {
    //$order = Order::find(1);
    //return $order->vendors;

   return 'Hello';
});
