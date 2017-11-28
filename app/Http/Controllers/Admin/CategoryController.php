<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

use Intervention\Image\Facades\Image;

class CategoryController extends Controller {
  public function index() {
    $categories = Category::orderBy('id')->paginate(5);

    return view('admin.categories.index')->with(compact('categories')); //listado
  }

  public function create() {
    return view('admin.categories.create'); //formulario de creación
  }

  public function store(Request $request) {
    //validar
    $this->validate($request, Category::$rules, Category::$messages);

    $category = new Category();

    //if ($request->hasFile('image')) {
    //  // guardar la imagen en el server
    //  //$path     = public_path() . '/images/categories/';
    //  $path     = 'images/categories/';
    //  $fileName = uniqid() . '-' . $request->file('image')->getClientOriginalName();
    //  //$img = Image::make($request->file('image')); // Obtengo la imagen
    //  $img = Image::make($request->file('image')); // Obtengo la imagen
    //  $img->resize(1024,
    //      null,
    //      function ($constraint) { // le cambio el tamaño a width: 1024, heigh: auto
    //        $constraint->aspectRatio(); // mantengo el ratio de la imagen
    //        $constraint->upsize(); // no dejo que escale para arriba
    //      });
    //  $img->save($path . $fileName, 85);
    //  $category->image = $fileName;
    //}
    if ($request->hasFile('image')) {
      // guardar la imagen en el server
      //$path     = public_path() . '/images/categories/';
      $path     = 'images/categories/';
      $fileName = uniqid() . '-' . $request->file('image')->getClientOriginalName();
      //$img = Image::make($request->file('image')); // Obtengo la imagen
      echo 'voy a hacer el make: ' . $request->file('image')->getRealPath() . '<br>';

      $img = Image::make($request->file('image')->getRealPath()); // Obtengo la imagen
      $img->resize(1024,
          null,
          function ($constraint) { // le cambio el tamaño a width: 1024, heigh: auto
            $constraint->aspectRatio(); // mantengo el ratio de la imagen
            $constraint->upsize(); // no dejo que escale para arriba
          });
      echo '$path';
      dump($path);
      echo '$fileName';
      dd($fileName);
      $img->save(public_path($path . $fileName), 85);
      $category->image = $fileName;
    }

    $category->name        = $request->name;
    $category->description = $request->description;
    $category->save();

    $msgSuccess = 'Se insertó la categoría exitosamente';

    return back()->with(compact('msgSuccess'));
  }

  public function edit(Category $category) {
    return view('admin.categories.edit', compact('category')); //formulario de edición
  }

  public function update(Request $request, Category $category) {
    //validar
    $this->validate($request, Category::$rules, Category::$messages);

    if ($request->hasFile('image')) {
      // guardar la imagen en el server
      $path     = public_path() . '/images/categories/';
      $fileName = uniqid() . '-' . $request->file('image')->getClientOriginalName();

      $img = Image::make($request->file('image')); // Obtengo la imagen
      $img->resize(1024,
          null,
          function ($constraint) { // le cambio el tamaño a width: 1024, heigh: auto
            $constraint->aspectRatio(); // mantengo el ratio de la imagen
            $constraint->upsize(); // no dejo que escale para arriba
          });
      $img->save($path . $fileName, 85);

      // Me guardo el path a la imagen anterior
      $previousPath = $path . '/' . $category->image;

      $category->image = $fileName;
    }

    $category->name        = $request->name;
    $category->description = $request->description;
    $saved                 = $category->save();

    // Si actualicé OK, borro la imagen anterior
    if ($saved) {
      File::delete($previousPath);
    }

    $msgSuccess = 'Modificación exitosa';

    return back()->with(compact('msgSuccess'));
  }

  public function destroy(Category $category) {
    $previousPath = '/images/categories/' . $category->image;

    $deleted = $category->delete();

    if ($deleted) {
      File::delete($previousPath);
    }

    $msgSuccess = 'Eliminación exitosa';

    return back()->with(compact('msgSuccess'));
  }
}
