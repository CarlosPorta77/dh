<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;
use App\CartDetails;

class Cart extends Model
{
    //
  public function user() {
    return $this->belongsTo(User::class);
  }

  public function details() {
    return $this->hasMany(CartDetail::class);
  }

  public function getTotalAttribute() {
    $total = DB::table('cart_details')
        ->where('cart_id', auth()->user()->cart->id)
        ->selectRaw('price * quantity as subtotal')
        ->get()
        ->sum('subtotal');
    return $total;
  }
}
