<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMethod;

class DeliveryMethodController extends Controller
{
    public function getDeliveryMethods(){
        return DeliveryMethod::all();
    }
}
