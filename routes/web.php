<?php

use Illuminate\Support\Facades\Route;

use App\Models\DeliveryMethod;
use App\Models\PaymentMethod;
use App\Models\Products;
use App\Models\Orders;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/checkout', function () {
    $deliveryMethods = DeliveryMethod::all();
    $paymentMethods = PaymentMethod::all();
    $product = Products::where('id',1)->first();
    return view('checkout', compact('deliveryMethods', 'paymentMethods', 'product'));
});


Route::get('/get/delivery_methods', 'DeliveryMethodController@getDeliveryMethods');
Route::get('/get/payment_methods', 'PaymentMethodController@getPaymentMethods');
Route::get('/coupon/active/{code}', 'CodesController@isValidCode');

Route::post('/create/order', 'OrderController@createOrder');