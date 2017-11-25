@extends('layouts.app')
@section('title', 'Inicio')

@section('styles')
  <style>
  </style>
@endsection

@section('content')
  <!-- Breadcrumbs -->
  <section class="g-brd-bottom g-brd-gray-light-v4 g-py-20">
    <div class="container">
      <ul class="u-list-inline">
        <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-text" href="{{route('welcome')}}">Home</a>
          <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
        </li>
        <li class="list-inline-item g-color-primary">
          <span>Inicio</span>
        </li>
      </ul>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- Revolution Slider -->
      @include('includes.welcome.revolution-slider')
  <!-- End Revolution Slider -->

  <!-- Features -->
  {{--    @include('includes.welcome.features')--}}
  <!-- End Features -->

  <!-- Categories -->
  {{--    @include('includes.welcome.categories')--}}
  <!-- End Categories -->

  <!-- Products -->
  <div class="container g-pb-100">
    <div class="text-center mx-auto g-max-width-600 g-mb-50 g-mt-20">
      <h2 class="g-color-black mb-4">Nuestros productos</h2>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, at eius enim eos
        facere illum itaque nam perferendis placeat quo quod repudiandae,
        saepe similique vel voluptate. Blanditiis magni quia soluta?.</p>
    </div>

    <div id="carouselCus1" class="js-carousel g-pb-50 g-mx-minus-10"
         data-infinite="true"
         data-slides-show="4"
         data-lazy-load="ondemand"
         data-arrows-classes="u-arrow-v1 g-pos-abs g-bottom-0 g-width-45 g-height-45 g-color-gray-dark-v5 g-bg-secondary g-color-white--hover g-bg-primary--hover rounded"
         data-arrow-left-classes="fa fa-angle-left g-left-10"
         data-arrow-right-classes="fa fa-angle-right g-right-10"
         data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center">

      @foreach($products as $product)
        <div class="js-slide">
          <div class="g-px-10">
            <!-- Product -->
            <figure class="g-pos-rel g-mb-20">
              <img
                  class="img-fluid"
                  data-lazy="{{ $product->featured_image_url }}"
                  alt="Image Description"
              >
            </figure>

            <div class="media">
              <!-- Product Info -->
              <div class="d-flex flex-column">
                <h4 class="h6 g-color-black mb-1">
                  <a class="u-link-v5 g-color-black g-color-primary--hover"
                     href="{{ route('user.products.show', ['id'=> $product->id]) }}">
                    {{ $product->name }}
                  </a>
                </h4>
                <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13"
                   href="#!">{{$product->category->name}}</a>
                <span class="d-block g-color-black g-font-size-17">${{$product->price}}</span>
              </div>
              <!-- End Product Info -->

              <!-- Products Icons -->
              <ul class="list-inline media-body text-right">
                @if (!auth()->guest())
                  <li class="list-inline-item align-middle mx-0">
                    <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover rounded-circle"
                       href="#!"
                       data-toggle="tooltip"
                       data-placement="top"
                       title="Agregar al carrito">
                      <i class="fa fa-shopping-cart"></i>
                    </a>
                  </li>
                  <br>
                @endif
                <li class="list-inline-item align-middle mx-0">
                  <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover rounded-circle"
                     href="{{ route('user.products.show', ['id'=> $product->id]) }}"
                     data-toggle="tooltip"
                     data-placement="top"
                     title="Ver detalles">
                    <i class="fa fa-info"></i>
                  </a>
                </li>
                @if (!auth()->guest())
                  <br>
                  <li class="list-inline-item align-middle mx-0">
                    <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover rounded-circle"
                       href="#!"
                       data-toggle="tooltip"
                       data-placement="top"
                       title="Agregar a favoritos">
                      <i class="fa fa-heart"></i>
                    </a>
                  </li>
                @endif
              </ul>
              <!-- End Products Icons -->
            </div>
            <!-- End Product -->
          </div>
        </div>
      @endforeach
    </div>
    <div class="g-mt-10">
      {!! $products->links('vendor.pagination.bootstrap-4'); !!}
    </div>
    <!-- End Products -->
  </div>

  <!-- Promo Block -->
  {{--    @include('includes.welcome.promo')--}}
  <!-- End Promo Block -->

  <!-- New Arrivals -->
  {{--    @include('includes.welcome.arrivals')--}}
  <!-- End New Arrivals -->
@endsection
