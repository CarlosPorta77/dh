<?php

namespace App\Http\Controllers;

use App\CartDetail;
use Illuminate\Http\Request;
use App\Product;

class CartDetailController extends Controller {
  public function store(Request $request) {


    $product = Product::find($request->product_id);

    $cartDetail              = new CartDetail();
    $cartDetail->cart_id     = auth()->user()->cart->id;
    $cartDetail->description = '';
    $cartDetail->product_id  = $product->id;
    $cartDetail->quantity    = $request->quantity;
    $cartDetail->price       = $product->price;
    $cartDetail->discount    = 0.0;
    $cartDetail->notes       = '';
    $cartDetail->save();

    $msgSuccess='Producto agregado al carrito';
    return back()->with(compact('msgSuccess'));
  }

  public function destroy(Request $request) {
    $cartDetail = CartDetail::find($request->cart_detail_id);

    if ($cartDetail->cart_id == auth()->user()->cart->id) {
      $cartDetail->delete();
    }
    $msgSuccess='Eliminación exitosa';
    return back()->with(compact('msgSuccess'));
  }
}