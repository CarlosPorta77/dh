<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;
use Intervention\Image\Facades\Image;

class ImageController extends Controller {

  public function index($id) {

    $product = Product::find($id);
    $images  = $product->images()->orderBy('featured', 'desc')->get();

    return view('admin.products.images.index')->with(compact('product', 'images'));
  }

  public function store(Request $request, $id) {

    $rules    = [
        'photo' => 'image',
    ];
    $messages = [
        'photo.image'        => 'El archivo debe ser una imagen. (.jpg, .jpeg, .png o .gif)',
    ];

    $this->validate($request, $rules, $messages);

    // guardar la imagen en el server
    $path     = public_path() . '/images/products/';
    $fileName = uniqid() . $request->file('photo')->getClientOriginalName();
    //$moved    = $file->move($path, $fileName);

    $img= Image::make($request->file('photo')); // Obtengo la imagen
    $img->resize(1024, null, function ($constraint) { // le cambio el tamaño a width: 1024, heigh: auto
      $constraint->aspectRatio(); // mantengo el ratio de la imagen
      $constraint->upsize(); // no dejo que escale para arriba
    });
    $img->save($path . $fileName, 85);

    // crear registro en la tabla de product_images
    if ($img) {
      $productImage             = new ProductImage();
      $productImage->image      = $fileName;
      $productImage->product_id = $id;
      $productImage->save();
    }
    $msgSuccess = 'Imagen agregada';
    return back()->with(compact('msgSuccess'));
  }

  public function destroy($id) {
    //eliminar el archivo con la imagen
    $deleted      = true;
    $productImage = ProductImage::find($id);

    if (substr($productImage->image, 0, 4) !== 'http') {
      $fullPath = public_path() . '/images/products/' . $productImage->image;
      //dd($fullPath);
      $deleted = File::delete($fullPath);
    }
    if (!$deleted) {
      $msgAlert = 'Error al eliminar la imagen';
      return back()->with(compact('msgAlert'));

    }
    $productImage->delete();

    $msgSuccess = 'Imagen eliminada';
    return back()->with(compact('msgSuccess'));
  }

  public function select($product_id, $image_id) {
    ProductImage::where('product_id', $product_id)->update([
        'featured' => false,
    ]);

    $productImage           = ProductImage::find($image_id);
    $productImage->featured = true;
    $productImage->save();

    $msgSuccess = 'Imagen destacada exitosamente';
    return back()->with(compact('msgSuccess'));
  }
}
