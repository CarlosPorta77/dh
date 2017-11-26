<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller {
  public function index() {
    $categories = Category::orderBy('id')->paginate(10);

    return view('admin.categories.index')->with(compact('categories')); //listado
  }

  public function create() {
    return view('admin.categories.create'); //formulario de creación
  }

  public function store(Request $request) {
    //validar
    $this->validate($request, Category::$rules, Category::$messages);

    Category::create($request->all());

    $msgSuccess = 'Se insertó la categoría exitosamente';

    return back()->with(compact('msgSuccess'));
  }

  public function edit(Category $category) {
    return view('admin.categories.edit', compact('category')); //formulario de edición
  }

  public function update(Request $request, Category $category) {
    //validar

    $this->validate($request, Category::$rules, Category::$messages);

    // registrar el nuevo producto en la base de datos
    $category->update($request->all());

    $msgSuccess = 'Modificación exitosa';
    return back()->with(compact('msgSuccess'));
  }

  public function destroy(Category $category) {
    $category->delete();

    $msgSuccess = 'Eliminación exitosa';

    return back()->with(compact('msgSuccess'));
  }
}
