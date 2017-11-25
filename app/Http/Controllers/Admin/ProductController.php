<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller {
  public function index() {
    $products = Product::paginate(10);

    return view('admin.products.index')->with(compact('products')); //listado
  }

  public function create() {
    return view('admin.products.create'); //formulario de creación
  }

  public function store(Request $request) {
    //validar
    $rules    = [
        'name'        => 'required|min:3',
        'description' => 'required|min:3|max:200',
        'price'       => 'required|numeric|min:0',
    ];
    $messages = [
        'name.required'        => 'El nombre es requerido',
        'name.min'             => 'El nombre debe tener al menos 3 caracteres',
        'description.required' => 'La descripción corta es requerida',
        'description.min'      => 'La descripción corta debe tener al menos 3 caracteres',
        'description.max'      => 'La descripción corta puede tener máximo 200 caracteres',
        'price.numeric'        => 'Ingrese un precio válido',
        'price.required'       => 'El precio es requerido',
        'price.min'            => 'El precio debe ser mayor que cero',
    ];

    $this->validate($request, $rules, $messages);

    $product                   = new Product();
    $product->name             = $request->input('name');
    $product->description      = $request->input('description');
    $product->price            = $request->input('price');
    $product->long_description = $request->input('long_description');
    $product->save();

    $msgSuccess = 'Se insertó el producto exitosamente';
    return back()->with(compact('msgSuccess'));
  }

  public function edit($id) {
    $product = Product::find($id);

    return view('admin.products.edit', compact('product')); //formulario de creación
  }

  public function update(Request $request, $id) {
    //validar
    $rules    = [
        'name'        => 'required|min:3',
        'description' => 'required|min:3|max:200',
        'price'       => 'required|numeric|min:0',
    ];
    $messages = [
        'name.required'        => 'El nombre es requerido',
        'name.min'             => 'El nombre debe tener al menos 3 caracteres',
        'description.required' => 'La descripción corta es requerida',
        'description.min'      => 'La descripción corta debe tener al menos 3 caracteres',
        'description.max'      => 'La descripción corta puede tener máximo 200 caracteres',
        'price.numeric'        => 'Ingrese un precio válido',
        'price.required'       => 'El precio es requerido',
        'price.min'            => 'El precio debe ser mayor que cero',
    ];

    $this->validate($request, $rules, $messages);

    // registrar el nuevo producto en la base de datos
    $product                   = Product::find($id);
    $product->name             = $request->input('name');
    $product->description      = $request->input('description');
    $product->price            = $request->input('price');
    $product->long_description = $request->input('long_description');
    $product->save();

    $msgSuccess = 'Modificación exitosa';
    return back()->with(compact('msgSuccess'));
  }

  public function destroy(Request $request) {
    $product = Product::find($request->id);
    $product->delete();

    $msgSuccess = 'Eliminación exitosa';
    return back()->with(compact('msgSuccess'));
  }
}
