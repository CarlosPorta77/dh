<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class SearchController extends Controller {
  public function show (Request $request) {
    if ($request->category_id != null) {
      $category_id = $request->input('category_id');
      $foundProducts = Category::find($category_id)->products()->orderBy('name')->paginate(5);
      return view('user.search.show')->with(compact('foundProducts'))->with(compact('category_id'));
    } else {
      $query_string=$request->input('query_string');
      $foundProducts = Product::where('name', 'LIKE', '%' . $query_string . '%')->orWhere('description', 'LIKE', '%' . $query_string . '%')->orderBy('category_id')->orderBy('name')->paginate(5);
      return view('user.search.show')->with(compact('foundProducts', 'query_string'));
    }
  }
  //
}
