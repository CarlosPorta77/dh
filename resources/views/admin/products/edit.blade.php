@extends('layouts.app')
@section('title', 'Modificar producto')

@section('content')
  <!-- Breadcrumbs -->
  <section class="g-brd-bottom g-brd-gray-light-v4 g-py-10">
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
          <a class="u-link-v5 g-color-text" href="{{ route('admin.products.index') }}">Productos</a>
          <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
        </li>
        <li class="list-inline-item g-color-primary">
          <span>Modificar</span>
        </li>
      </ul>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- Flash notifications -->
  @include('includes.flash')
  <!-- End Flash notifications -->

  <!-- Form -->
  <div class="container g-pt-20 g-pb-20">
    <header class="text-center mb-4">
      <h1 class="h3 g-color-black g-font-weight-400">Modificar producto</h1>
    </header>

    <form class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30" method="post" action="{{ route('admin.products.update', ['id' => $product->id]) }}">
      {{ csrf_field() }}

      <div class="row">
        <div class="col-sm-6">
          <!-- name -->
          <div class="form-group g-mb-20">
            <label class="g-mb-10" for="name">Nombre del producto</label>
            <input
                id="name"
                name="name"
                class="form-control form-control-md rounded-0 {{ $errors->has('name') ? ' is-invalid ' : ' g-brd-gray-light-v3 ' }}"
                type="text"
                value="{{ old('name', $product->name) }}"
                placeholder="Ingresá el nombre del producto"
            >
            @if ($errors->has('name'))
              <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('name') }}</small>
            @endif
          </div>
        </div>
        <div class="col-sm-6">
          <!-- price -->
          <div class="form-group g-mb-20">
            <label class="g-mb-10" for="price">Precio</label>
            <input
                id="price"
                name="price"
                class="form-control form-control-md rounded-0 {{ $errors->has('price') ? ' is-invalid ' : ' g-brd-gray-light-v3 ' }}"
                type="number"
                step="0.01"
                placeholder="Ingresá el precio de venta"
                value="{{ old('price', $product->price) }}"
            >
            @if ($errors->has('price'))
              <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('price') }}</small>
            @endif

          </div>
          <!-- End price -->
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <!-- description -->
          <div class="form-group g-mb-20">
            <label class="g-mb-10" for="description">Descripción corta</label>
            <input
                id="description"
                name="description"
                class="form-control form-control-md rounded-0 {{ $errors->has('description') ? ' is-invalid ' : ' g-brd-gray-light-v3 ' }}"
                value="{{ old('description', $product->description) }}"
                type="text"
                placeholder="Ingresá una descripción abreviada del producto"
            >
            @if ($errors->has('description'))
              <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('description') }}</small>
            @endif
          </div>
          <!-- End description -->

        </div>
        <div class="col-sm-6">
          <!-- Category -->
          <div class="form-group g-mb-20">
            <label class="g-mb-10" for="category_id">Categoría</label>

            <select
                class="form-control form-control-lg rounded-0 "
                name="category_id"
                id="category_id"
            >
              @foreach($categories as $category)
                <option {{old('category_id', $product->category_id) == $category->id ? 'selected': ''}} value="{{ $category->id }}">{{$category->name}}</option>
              @endforeach
            </select>
            @if ($errors->has('category_id'))
              <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('category_id') }}</small>
            @endif
          </div>
          <!-- End Category -->
        </div>
      </div>

      <!-- long_description -->
      <div class="form-group g-mb-20">
        <label class="g-mb-10" for="long_description">Descripción ampliada</label>
        <textarea id="long_description" name="long_description" class="form-control form-control-md g-resize-none rounded-0" rows="5"
                  placeholder="Ingresá una descripción ampliada del producto">{{ old('long_description', $product->long_description) }}</textarea>
        <small class="form-text text-muted g-font-size-default g-mt-10">
          {{--<strong>Note:</strong> height of the textarea depends on the rows attribute.--}}
        </small>
      </div>
      <!-- End long_description -->

      <button class="btn btn-md u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25 g-mr-10" type="submit">Guardar</button>

      <a href="{{ route('admin.products.index') }}" class="btn btn-md u-btn-bluegray g-font-size-12 text-uppercase g-py-12 g-px-25" type="submit">Cancelar</a>
    </form>
    <!-- End Form -->
  </div>
  <!-- End Products -->
@endsection