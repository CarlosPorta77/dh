@extends('layouts.app')
@section('title', 'Nuevo producto')

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
          <span>Nuevo</span>
        </li>
      </ul>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- Form -->
  <div class="container g-pt-20 g-pb-20">
    <header class="text-center mb-4">
      <h1 class="h4 g-color-black g-font-weight-400">Nuevo producto</h1>
    </header>

    <form class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30" method="post" action="{{url('/admin/products')}}">
      {{ csrf_field() }}

      <div class="row">
        <div class="col-sm-6">
          <!-- name -->
          <div class="form-group g-mb-20">
            <label class="g-mb-10" for="name">Nombre del producto</label>
            <input id="name" name="name" class="form-control form-control-md rounded-0" type="text" placeholder="Ingresá el nombre del producto">
          </div>
          <!-- End name -->
        </div>
        <div class="col-sm-6">
          <!-- price -->
          <div class="form-group g-mb-20">
            <label class="g-mb-10" for="price">Precio</label>
            <input id="price" name="price" class="form-control form-control-md rounded-0" type="text" placeholder="Ingresá el precio de venta">
          </div>
          <!-- End price -->
        </div>
      </div>

      <!-- description -->
      <div class="form-group g-mb-20">
        <label class="g-mb-10" for="description">Descripción corta</label>
        <input id="description" name="description" class="form-control form-control-md rounded-0" type="text" placeholder="Ingresá una descripción abreviada del producto">
      </div>
      <!-- End description -->

      <!-- long_description -->
      <div class="form-group g-mb-20">
        <label class="g-mb-10" for="long_description">Descripción ampliada</label>
        <textarea id="long_description" name="long_description" class="form-control form-control-md g-resize-none rounded-0" rows="5"
                  placeholder="Ingresá una descripción ampliada del producto"></textarea>
        <small class="form-text text-muted g-font-size-default g-mt-10">
          {{--<strong>Note:</strong> height of the textarea depends on the rows attribute.--}}
        </small>
      </div>
      <!-- End long_description -->

      <button class="btn btn-lg u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25" type="submit">Registrar producto</button>

    </form>
    <!-- End Form -->
  </div>
  <!-- End Products -->
@endsection