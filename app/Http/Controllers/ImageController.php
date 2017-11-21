<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller {
  public function index($id) {

    $product = Product::find($id);
    $images  = $product->images;

    return view('admin.products.images.index')->with(compact('product', 'images'));
  }

  public function store(Request $request, $id) {

    // guardar la imagen en el server
    $file     = $request->file('photo');
    $path     = public_path() . '/images/products';
    $fileName = uniqid() . $file->getClientOriginalName();
    $moved    = $file->move($path, $fileName);

    // crear registro en la tabla de product_images
    if ($moved) {
      $productImage             = new ProductImage();
      $productImage->image      = $fileName;
      $productImage->product_id = $id;
      $productImage->save();
    }

    return back();
  }

  public function destroy($id) {
    //eliminar el archivo con la imagen
    $deleted = true;
    $productImage = ProductImage::find($id);

    if (substr($productImage->image, 0, 4) !== 'http') {
      $fullPath = public_path() . '/images/products/' . $productImage->image;
      //dd($fullPath);
      $deleted  = File::delete($fullPath);
    }
    if ($deleted) {
      $productImage->delete();
    }

    return back();
    //eliminar el registro de la mag de la DB

  }
}