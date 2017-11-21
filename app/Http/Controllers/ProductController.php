<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller {
  public function show($id) {
    $product = Product::find($id);

    return "Mostrar datos de producto con id: $id";

  }
}
