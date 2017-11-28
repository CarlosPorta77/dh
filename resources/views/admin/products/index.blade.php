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

  <!-- Flash notifications -->
  @include('includes.flash')
  <!-- End Flash notifications -->

  <!-- Products -->
  <div class="container g-pt-20 g-pb-20">
    <header class="text-center mb-4">
      <h1 class="h3 g-color-black g-font-weight-400">Listado de productos</h1>
    </header>

    <div class="card g-brd-teal rounded-0 g-mb-30">
      <h3 class="card-header g-bg-teal g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-0">
        <i class="fa fa-edit g-mr-5"></i>
        Listado de productos
      </h3>

      <div class="container mb-0">
        <div class="row">
          <div class="col-9 col-md-10">
            <div class="row d-none d-md-flex">
              <div class="col-md-1 col-xs-12">
                <span class="d-md-none font-weight-bold">#: </span>
                <span class="font-weight-bold">#</span>
              </div>
              <div class="col-md-3">
                <span class="font-weight-bold">Nombre</span>
              </div>
              <div class="col-md-4">
                <span class="font-weight-bold">Descripción</span>
              </div>
              <div class="col-md-2">
                <span class="font-weight-bold">Categoría</span>
              </div>
              <div class="col-md-2">
                <span class="font-weight-bold">Precio</span>
              </div>
            </div>
          </div>
          <div class="col-3 col-md-2 d-none d-md-flex">
            <span class="d-md-none font-weight-bold">Opc</span>
            <span class="font-weight-bold d-none d-md-flex">Opciones</span>
          </div>
        </div>
        <hr class="g-brd-gray-light-v4 g-my-3">

        @foreach($products as $product)
          <div class="row">
            <div class="col-9 col-md-10">
              <div class="row">
                <div class="col-md-1 col-xs-12">
                  <span class="d-md-none font-weight-bold">#: </span>
                  {{ $product->id }}
                </div>
                <div class="col-md-3 col-xs-12">
                  <span class="d-md-none font-weight-bold">Nombre: </span>
                  {{ $product->name }}
                </div>
                <div class="col-md-4 col-xs-12">
                  <span class="d-md-none font-weight-bold">Desc: </span>
                  {{(strlen($product->description) > 40) ? substr($product->description, 0, 37) . '...' :  $product->description }}
                </div>
                <div class="col-md-2 col-xs-12">
                  <span class="d-md-none font-weight-bold">Cat: </span>
                  {{ $product->category_name}}
                </div>
                <div class="col-md-2 col-xs-12 text-md-right">
                  <span class="d-md-none font-weight-bold">Precio: </span>
                  ${{ number_format($product->price, 2) }}
                </div>
              </div>
            </div>

            <!-- Opciones -->
            <div class="col-3 col-md-2">
              <span class="d-block d-md-none font-weight-bold">Opciones </span>
              <a href="{{ route('user.products.show', ['id' => $product->id]) }}"
                 class="btn btn-md u-btn-none g-color-blue g-py-0 g-mx-0 g-px-5"
                 data-toggle="tooltip"
                 data-placement="top"
                 title="Ver producto"
                 target="_blank">
                <i class="fa fa-eye"></i>
              </a>
              <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}" class="btn btn-md u-btn-none g-color-green g-py-0 g-mx-0 g-px-5" data-toggle="tooltip"
                 data-placement="top" title="Editar">
                <i class="fa fa-pencil"></i>
              </a>
              <a href="{{ route('admin.products.images.index', ['id' => $product->id]) }}" class="btn btn-md u-btn-none g-color-orange g-py-0 g-mx-0 g-px-5" data-toggle="tooltip"
                 data-placement="top" title="Ver imágenes">
                <i class="fa fa-image"></i>
              </a>

              <form action="{{ route('admin.products.destroy', ['id' => $product->id]) }}" method="post" class="d-inline">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-md u-btn-none g-color-red g-py-0 g-mx-0 g-px-5 bg-transparent" data-toggle="tooltip"
                        data-placement="top" title="Eliminar">
                  <i class="fa fa-trash"></i>
                </button>
              </form>
            </div>
            <!-- End Opciones -->
          </div>

          <hr class="g-brd-gray-light-v4 g-my-3">
        @endforeach
      </div>
    </div>
    <div class="d-flex justify-content-between">
      <div class="g-ml-10">
        {!! $products->links('vendor.pagination.bootstrap-4'); !!}
      </div>
      <a href="{{ route('admin.products.create') }}" class="btn btn-md u-btn-teal g-mr-10 g-mb-15">Nuevo</a>
    </div>
  </div>
  <!-- End Products -->

@endsection

