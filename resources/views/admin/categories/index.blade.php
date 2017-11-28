@extends('layouts.app')
@section('title', 'Listado de categorias')

@section('content')
  <!-- Breadcrumbs -->
  <section class="g-brd-bottom g-brd-gray-light-v4 g-py-20">
    <div class="container">
      <ul class="u-list-inline">
        <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-text" href="{{ route('welcome') }}">Home</a>
          <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
        </li>
        <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-text" href="#">Admin</a>
          <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
        </li>
        <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-text" href="{{ route ('admin.categories.index') }}#">Categorias</a>
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

  <!-- Categories -->
  <div class="container g-pt-20 g-pb-20">
    <header class="text-center mb-4">
      <h1 class="h3 g-color-black g-font-weight-400">Listado de categorias</h1>
    </header>

    <div class="card g-brd-teal rounded-0 g-mb-30">
      <h3 class="card-header g-bg-teal g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-0">
        <i class="fa fa-edit g-mr-5"></i>
        Listado de categorias
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
              <div class="col-md-4">
                <span class="font-weight-bold">Imagen</span>
              </div>
            </div>
          </div>
          <div class="col-3 col-md-2 d-none d-md-flex">
            <span class="d-md-none font-weight-bold">Opc</span>
            <span class="font-weight-bold d-none d-md-flex">Opciones</span>
          </div>
        </div>
        <hr class="g-brd-gray-light-v4 g-my-3">

        @foreach($categories as $category)
          <div class="row">
            <div class="col-9 col-md-10">
              <div class="row">
                <div class="col-md-1 col-xs-12">
                  <span class="d-md-none font-weight-bold">#: </span>
                  {{ $category->id }}
                </div>
                <div class="col-md-3 col-xs-12">
                  <span class="d-md-none font-weight-bold">Nombre: </span>
                  {{ $category->name }}
                </div>
                <div class="col-md-4 col-xs-12">
                  <span class="d-md-none font-weight-bold">Desc: </span>
                  {{(strlen($category->description) > 40) ? substr($category->description, 0, 37) . '...' :  $category->description }}
                </div>
                <div class="col-md-4 col-xs-12">
                  <span class="d-md-none font-weight-bold"></span>
                  <img src="{{ $category->image_url }}" alt="" width="100">
                </div>
              </div>
            </div>

            <!-- Opciones -->
            <div class="col-3 col-md-2">
              <span class="d-block d-md-none font-weight-bold">Opciones </span>
              <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}" class="btn btn-md u-btn-none g-color-green g-py-0 g-mx-0 g-px-5" data-toggle="tooltip"
                 data-placement="top" title="Editar">
                <i class="fa fa-pencil"></i>
              </a>
              {{--<a href="{{ route('admin.categories.images.index', ['id' => $category->id]) }}" class="btn btn-md u-btn-none g-color-orange g-py-0 g-mx-0 g-px-5" data-toggle="tooltip" data-placement="top" title="Ver imágenes">--}}
                {{--<i class="fa fa-image"></i>--}}
              {{--</a>--}}

              <form action="{{ route('admin.categories.destroy', ['id' => $category->id]) }}" method="post" class="d-inline">
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
        {!! $categories->links('vendor.pagination.bootstrap-4'); !!}
      </div>
      <a href="{{ route('admin.categories.create') }}" class="btn btn-md u-btn-teal g-mr-10 g-mb-15">Nueva</a>
    </div>
  </div>
  <!-- End Categories -->

@endsection

