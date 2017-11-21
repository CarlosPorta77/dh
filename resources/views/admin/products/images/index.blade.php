@extends('layouts.app')
@section('title', 'Imágenes de productos')

@section('content')
  <!-- Breadcrumbs -->
  <section class="g-brd-bottom g-brd-gray-light-v4 g-py-20">
    <div class="container">
      <ul class="u-list-inline">
        <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-text" href="{{ route('home') }}">Home</a>
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
          <span>Imágenes</span>
        </li>
      </ul>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- Products -->
  <div class="container g-pt-20 g-pb-20">
    <header class="text-center mb-4">
      <h1 class="h3 g-color-black g-font-weight-400">Imágenes del producto: "{{ $product->name }}"</h1>
    </header>

    <!-- Products -->
    <div class="row g-pt-30 g-mb-50">
      @foreach($images as $image)
        <div class="col-12 col-sm-6 col-md-4 g-mb-30">
          <!-- Product -->
          <figure class="g-pos-rel g-mb-15">
            <img class="img-fluid" src="{{ $image->url }}" alt="" width="480" height="700">
          </figure>

          <div class="media">

            <!-- Products Icons -->
            <ul class="list-inline media-body text-right">
              <li class="list-inline-item align-middle mx-0">
                <form action="{{ route('admin.products.images.destroy', ['id' => $image->id]) }}" method="post" class="d-inline">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button
                      type="submit"
                      class="btn btn-xs u-btn-red g-font-size-12 text-uppercase g-py-6 g-px-25 g-mb-10"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Eliminar imagen">
                    Eliminar imagen
                  </button>
                </form>
              </li>
              <li class="list-inline-item align-middle mx-0">
                <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#!"
                   data-toggle="tooltip"
                   data-placement="top"
                   title="Add to Wishlist">
                  <i class="icon-medical-022 u-line-icon-pro"></i>
                </a>
              </li>
            </ul>
            <!-- End Products Icons -->
          </div>
          <!-- End Product -->
        </div>
      @endforeach
    </div>
    <!-- End Products -->

    <hr class="g-mb-30">
    <form action="" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

      <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
      <div class="form-group">
        <label for="exampleFormControlFile1">Seleccionar imagen a subir</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photo" required>
      </div>

      <button type="submit"
              class="btn btn-md u-btn-teal g-font-size-12 text-uppercase g-mr-10 g-py-12 g-px-25 g-mb-10">Subir nueva imágen
      </button>
      <a href="{{ route('admin.products.index') }}"
         class="btn btn-md u-btn-bluegray g-font-size-12 text-uppercase g-py-12 g-px-25 g-mb-10">Volver al listado de productos</a>
    </form>
    <div class="g-mb-20"></div>
  </div>
  <!-- End Products -->


@endsection

