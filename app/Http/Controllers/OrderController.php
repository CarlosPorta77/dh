<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cart;

class OrderController extends Controller
{
    public function index() {

      $orders = Cart::where('user_id', auth()->user()->id)->where('status', '<>', 'Active')->orderBy('id')->paginate(1);
      return view('user.order.index')->with(compact('orders'));
    }
}
