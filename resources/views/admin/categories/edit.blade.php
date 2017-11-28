@extends('layouts.app')
@section('title', 'Modificar producto')

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
          <a class="u-link-v5 g-color-text" href="{{route('admin.categories.index')}}">Categorías</a>
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

    <form class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30" method="post" action="{{ route('admin.categories.update', ['id' => $category->id]) }}"
          enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="row">
        <div class="col-sm-6">
          <!-- name -->
          <div class="form-group g-mb-20">
            <label class="g-mb-10" for="name">Nombre de la categoría</label>
            <input
                id="name"
                name="name"
                class="form-control form-control-md rounded-0 {{ $errors->has('name') ? ' is-invalid ' : ' g-brd-gray-light-v3 ' }}"
                type="text"
                value="{{ old('name', $category->name) }}"
                placeholder="Ingresá el nombre de la categoría"
            >
            @if ($errors->has('name'))
              <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('name') }}</small>
            @endif
          </div>
          <!-- End name -->
        </div>

        <div class="col-sm-6">
          <!-- image -->
          <div class="form-group g-mb-20">
            <label class="g-mb-10" for="image">Imagen de la categoría</label>
            <input
                id="image"
                name="image"
                class="form-control-file form-control-md rounded-0 {{ $errors->has('image') ? ' is-invalid ' : ' g-brd-gray-light-v3 ' }}"
                type="file"
                {{--value="{{ old('image') }}"--}}
            >
            @if ($category->image)
              <p class="help-block">Subir imagen sólo si deseas reemplazar la <a href="{{ $category->image_url }}" target="_blank">imagen actual</a></p>
            @endif
            @if ($errors->has('image'))
              <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('image') }}</small>
            @endif
          </div>
          <!-- End image -->
        </div>
      </div>

      <!-- description -->
      <div class="form-group g-mb-20">
        <label class="g-mb-10" for="description">Descripción</label>
        <input
            id="description"
            name="description"
            class="form-control form-control-md rounded-0 {{ $errors->has('description') ? ' is-invalid ' : ' g-brd-gray-light-v3 ' }}"
            value="{{ old('description', $category->description) }}"
            type="text"
            placeholder="Ingresá una descripción"
        >
        @if ($errors->has('description'))
          <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('description') }}</small>
        @endif
      </div>
      <!-- End description -->

      <button class="btn btn-md u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25 g-mr-10" type="submit">Guardar</button>

      <a href="{{ route('admin.categories.index') }}" class="btn btn-md u-btn-bluegray g-font-size-12 text-uppercase g-py-12 g-px-25" type="submit">Cancelar</a>
    </form>
    <!-- End Form -->
  </div>
  <!-- End Products -->
@endsection