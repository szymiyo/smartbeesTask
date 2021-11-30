<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class OrderController extends Controller
{
    public function createOrder(Request $request){

        if($request->create_account && isset($request->address['password'])){
            $user = User::create([
                'name'=>$request->address['name']. ' ' .$request->address['surname'],
                'email'=>$request->address['email'],
                'password'=>Hash::make($request->address['password'])
            ]);
        }
        $address = new Address();
        $address->country=$request->address['country'];
        $address->address=$request->address['address'];
        $address->code=$request->address['code'];
        $address->city=$request->address['city'];
        $address->phone=$request->address['phone'];
        $address->save();
        $order = new Orders();
        $order->email=$request->address['email']?$request->address['email']:null;
        $order->amount=$request->final_price;
        $order->address_id=$address['id'];
        $order->payment_method_id=$request->payment_method['id'];
        $order->delivery_method_id=$request->delivery_method['id'];
        $order->items=json_encode($request->item);
        $order->comment=$request->comment;
        $order->newsletter=$request->newsletter?1:0;
        $order->user_id=isset($user) ?$user->id:NULL;
        $order->save();
        return $order->id;

    }
}
