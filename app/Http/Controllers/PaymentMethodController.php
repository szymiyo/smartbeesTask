<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function getPaymentMethods(){
        return PaymentMethod::all();
    }
}
