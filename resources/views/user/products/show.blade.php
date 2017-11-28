@extends('layouts.app')
@section('title', 'Detalle producto')

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
          <a class="u-link-v5 g-color-text" href="#">Productos</a>
          <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
        </li>
        <li class="list-inline-item g-color-primary">
          <span>Detalle</span>
        </li>
      </ul>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- Flash notifications -->
  @include('includes.flash')
  <!-- End Flash notifications -->

  <div class="container g-py-50">
    <div class="row">
      <div class="col-lg-7">
        <!-- Carousel -->
        <div id="carousel1" class="js-carousel g-pt-10 g-mb-10" data-infinite="true" data-fade="true"
             data-arrows-classes="u-arrow-v1 g-brd-around g-brd-white g-absolute-centered--y g-width-45 g-height-45 g-font-size-14 g-color-white g-color-primary--hover rounded-circle"
             data-arrow-left-classes="fa fa-angle-left g-left-40"
             data-arrow-right-classes="fa fa-angle-right g-right-40"
             data-nav-for="#carousel2">

          <!-- Ordeno por 'featured', 'desc' para que aparezca primero la imagen favorita -->
          @foreach($product->images()->orderBy('featured', 'desc')->get() as $image)
            <div class="js-slide g-bg-cover g-bg-black-opacity-0_1--after">
              <img class="img-fluid w-100" src="{{ $image->url }}" alt="Image Description">
            </div>
          @endforeach
        </div>

        <div id="carousel2" class="js-carousel text-center u-carousel-v3 g-mx-minus-5 g-mb-10" data-infinite="true"
             data-center-mode="true" data-slides-show="3" data-is-thumbs="true" data-nav-for="#carousel1">

          @foreach($product->images as $image)
            <div class="js-slide g-cursor-pointer g-px-5">
              <img class="img-fluid" src="{{ $image->url }}" alt="">
            </div>
          @endforeach
        </div>
        <!-- End Carousel -->
      </div>

      <div class="col-lg-5">
        <div class="g-px-40--lg g-py-70">
          <!-- Product Info -->
          <div class="g-mb-30">
            <h1 class="g-font-weight-300 mb-4">{{ $product->name }}</h1>
            <h3 class="g-font-weight-300 mb-4">{{ $product->category->name }}</h3>
            <p>{{ $product->description }}</p>
          </div>
          <!-- End Product Info -->

          <!-- Price -->
          <div class="g-mb-30">
            <h2 class="g-color-gray-dark-v5 g-font-weight-400 g-font-size-12 text-uppercase mb-2">Precio</h2>
            <span class="g-color-black g-font-weight-500 g-font-size-30 mr-2">$ {{ number_format($product->price, 2) }}</span>
          </div>
          <!-- End Price -->

          <!-- Accordion -->
          <div id="accordion-01" role="tablist" aria-multiselectable="true">
            <div id="accordion-01-heading-01" class="g-brd-y g-brd-gray-light-v3 py-3" role="tab">
              <h5 class="g-font-weight-400 g-font-size-default mb-0">
                <a class="d-block g-color-gray-dark-v5 g-text-underline--none--hover" href="#accordion-01-body-01"
                   data-toggle="collapse" data-parent="#accordion-01" aria-expanded="false"
                   aria-controls="accordion-01-body-01">Detalles
                  <span class="float-right g-pos-rel g-top-3 mr-1 fa fa-angle-down"></span>
                </a>
              </h5>
            </div>
            <div id="accordion-01-body-01" class="collapse" role="tabpanel" aria-labelledby="accordion-01-heading-01">
              <div class="g-py-10">
                <textarea id="message" class="form-control form-control-md rounded-0 disabled text-muted" name="message"
                          rows="8">{{ $product->long_description }}</textarea>
              </div>
            </div>
          </div>
          <!-- End Accordion -->

          <!-- Form -->
          <form action="{{route('user.cart.store')}}" method="post">
          {{ csrf_field() }}

          <!-- Field product_id hidden -->
            <input class="" name="product_id" type="hidden" value="{{ $product->id }}">
            <!-- End Field product_id hidden -->

            <!-- Quantity -->
            @if (!auth()->guest())
            <div class="d-flex justify-content-between align-items-center g-brd-bottom g-brd-gray-light-v3 py-3 g-mb-30 g-brd-primary--focus"
                 role="tab">
              <h5 class="g-color-gray-dark-v5 g-font-weight-400 g-font-size-default mb-0">Cantidad</h5>
              <div class="js-quantity input-group u-quantity-v1 g-width-170 g-brd-primary--focus">
                <div class="js-minus input-group-addon d-flex align-items-center g-width-55 g-color-gray g-bg-grey-light-v3 rounded-0">
                  <i class="fa fa-angle-down"></i>
                </div>
                <input class="js-result form-control text-center rounded-0 g-pa-15 g-font-size-13" name="quantity" type="text" value="1" readonly="">
                <div class="js-plus input-group-addon d-flex align-items-center g-width-55 g-color-gray g-bg-grey-light-v3 rounded-0">
                  <i class="fa fa-angle-up"></i>
                </div>
              </div>
            </div>
            @endif
            <!-- End Quantity -->

            <!-- Buttons -->
            <div class="row g-mx-minus-5 g-mb-20">
              @if (!auth()->guest())
              <div class="col g-px-5 g-mb-10">
                <button class="btn btn-block u-btn-teal g-font-size-12 text-uppercase g-py-15 g-px-25" type="submit">
                  Agregar al carrito
                  <i class="ml-2 fa fa-shopping-cart g-font-size-14"></i>
                </button>
              </div>
              @endif
              <div class="col g-px-5 g-mb-10">
                <a href="{{ URL::previous() }}" class="btn btn-block u-btn-outline-black g-brd-gray-dark-v5 g-brd-black--hover g-color-gray-dark-v4 g-color-white--hover g-font-size-12 text-uppercase g-py-15 g-px-25" type="button">
                  Volver <i class="ml-2 fa fa-backward g-font-size-14"></i>
                </a>
              </div>

            </div>
            <!-- End Buttons -->
          </form>
          <!-- End Form -->


        </div>
      </div>
    </div>
  </div>

  <!-- End Product Description -->
@endsection
