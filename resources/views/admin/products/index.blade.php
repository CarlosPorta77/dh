@extends('layouts.app')
@section('title', 'Listado de productos')

@section('content')
  <!-- Breadcrumbs -->
  <section class="g-brd-bottom g-brd-gray-light-v4 g-py-20">
    <div class="container">
      <ul class="u-list-inline">
        <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-text" href="#!">Home</a>
          <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
        </li>
        <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-text" href="#">Admin</a>
          <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
        </li>
        <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-text" href="#">Productos</a>
          <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
        </li>
        <li class="list-inline-item g-color-primary">
          <span>Listado</span>
        </li>
      </ul>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- Products -->
  <div class="container g-pt-20 g-pb-20">
    <header class="text-center mb-4">
      <h1 class="h3 g-color-black g-font-weight-400">Listado de productos</h1>
    </header>


    <!-- Striped Rows -->
    <div class="card g-brd-teal rounded-0 g-mb-30">
      <h3 class="card-header g-bg-teal g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-0">
        <i class="fa fa-edit g-mr-5"></i>
        Listado de productos
      </h3>

      <div class="table-responsive">
        <table class="table table-striped u-table--v1 mb-0">
          <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th class="d-none d-md-table-cell">Descripción</th>
            <th class="d-none d-lg-table-cell">Categoría</th>
            <th class="text-right">Precio</th>
            <th class="text-right">Opciones</th>
          </tr>
          </thead>

          <tbody>
          @foreach($products as $product)
            <tr>
              <th scope="row">{{ $product->id }}</th>
              <td>{{ $product->name }}</td>
              <td class="d-none d-md-table-cell">{{(strlen($product->description) > 40 ? substr($product->description, 0, 40) . '...' :  $product->description)}}</td>
              <td class="d-none d-lg-table-cell">{{ ($product->category ? $product->category->name : 'General')}}</td>
              <td class="text-right">{{ $product->price }}</td>
              <td class="text-right">
                <a href="#" class="btn btn-md u-btn-none g-color-blue g-py-0 g-mx-0 g-px-5" data-toggle="tooltip" data-placement="top" title="Ver producto">
                  <i class="fa fa-eye"></i>
                </a>
                <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}" class="btn btn-md u-btn-none g-color-green g-py-0 g-mx-0 g-px-5" data-toggle="tooltip"
                   data-placement="top" title="Editar producto">
                  <i class="fa fa-pencil"></i>
                </a>
                <form action="{{ route('admin.products.destroy', ['id' => $product->id]) }}" method="post" class="d-inline">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-md u-btn-none g-color-red g-py-0 g-mx-0 g-px-5 bg-transparent" data-toggle="tooltip"
                          data-placement="top" title="Eliminar producto" >
                    <i class="fa fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!-- End Striped Rows -->
    <div class="d-flex justify-content-between">
      <div class="g-ml-10">
        {!! $products->links('vendor.pagination.bootstrap-4'); !!}
      </div>
      <a href="{{ route('admin.products.create') }}" class="btn btn-md u-btn-teal g-mr-10 g-mb-15">Nuevo producto</a>
    </div>

  </div>
  <!-- End Products -->
@endsection