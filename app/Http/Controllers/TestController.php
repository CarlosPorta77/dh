<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class TestController extends Controller
{
  public function welcome() {
    $categories = Category::orderBy('orden')->get();
    return view('welcome')->with(compact('categories'));
  }

  public function soon() {
    return view('soon');
  }
}
