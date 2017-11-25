<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CartController extends Controller
{
  public function checkout1() {
    return view('user.cart.checkout1');
  }

  public function checkout2() {
    return view('user.cart.checkout2');
  }

  public function checkout3(Request $request) {
    $rules    = [
        'shipping_address'        => 'required|min:3',
    ];
    $messages = [
        'shipping_address.required'        => 'La dirección de envío es requerida',
        'shipping_address.min'             => 'Debe tener al menos 3 caracteres',
    ];

    $this->validate($request, $rules, $messages);

    $cart = auth()->user()->cart;
    $cart->shipping_address = $request->input('shipping_address');
    $cart->notes = $request->input('notes');
    $cart->save();

    $msgSuccess = 'Se registró la dirección de envío correctamente';
    return view('user.cart.checkout3')->with(compact('msgSuccess'));
  }

  public function checkout4() {
    $cart = auth()->user()->cart;

    $cart->status = 'Pending';
    $cart->order_date = Carbon::now();
    $cart->save();

    return view('user.cart.checkout4');
  }

}
