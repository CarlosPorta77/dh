@extends('layouts.app')
@section('title', 'Busqueda de productos')

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
          <span>Busqueda</span>
        </li>
      </ul>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- Flash notifications -->
  @include('includes.flash')
  <!-- End Flash notifications -->

  <div class="container g-py-50">
    <header class="text-center mb-4">
      @if (isset($category_id))
        <h1 class="h3 g-color-black g-font-weight-400">{{ $foundProducts->first()->category_name }}</h1>
      @else
        <h1 class="h3 g-color-black g-font-weight-400">{{ 'Búsqueda: ' . $query_string }}</h1>
      @endif
    </header>


    <!-- Products -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <!-- Products -->
          @foreach($foundProducts as $product)
            <div class="g-brd-bottom g-brd-gray-light-v4">
              <div class="row g-pt-30">
                <div class="col-6 col-sm-5 col-lg-4 g-mb-30">
                  <figure class="g-pos-rel">
                    <img class="img-fluid" src="{{ $product->featured_image_url }}" alt="{{ $product->name }}">
                  </figure>
                </div>

                <div class="col-6 col-sm-7 col-lg-8 g-mb-15">
                  <!-- Product Info -->
                  <div class="g-mb-30">
                    <h4 class="h5 g-color-black mb-0 mt-1">
                      <a class="u-link-v5 g-color-black g-color-primary--hover" href="#">
                        {{ $product->name }}
                      </a>
                    </h4>
                    <a class="d-inline-block g-color-gray-dark-v5 g-font-size-14 mb-2" href="#!">{{ $product->category_name }}</a>
                    <span class="d-block g-color-black g-font-size-20 mb-4">${{ number_format($product->price, 2) }}</span>
                    <p>{{ $product->description }}</p>
                    <p>{{ $product->long_description }}</p>
                  </div>
                  <!-- End Product Info -->

                  <form action="{{route('user.cart.store')}}" method="post">
                  {{ csrf_field() }}

                  <!-- Field product_id hidden -->
                    <input class="" name="product_id" type="hidden" value="{{ $product->id }}">
                    <!-- End Field product_id hidden -->

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
                        <a href="{{ route('welcome') }}"
                           class="btn btn-block u-btn-outline-black g-brd-gray-dark-v5 g-brd-black--hover g-color-gray-dark-v4 g-color-white--hover g-font-size-12 text-uppercase g-py-15 g-px-25"
                           type="button">
                          Inicio <i class="ml-2 fa fa-backward g-font-size-14"></i>
                        </a>
                      </div>

                    </div>
                    <!-- End Buttons -->
                  </form>

                </div>
              </div>
            </div>
        @endforeach
        <!-- End Products -->
          <div class="d-flex justify-content-between g-mt-20">
            <div class="g-ml-10">
              @if (isset($query_string) && $query_string != null)
                {!! $foundProducts->appends(compact('query_string'))->links('vendor.pagination.bootstrap-4'); !!}
              @else
                {!! $foundProducts->appends(compact('category_id'))->links('vendor.pagination.bootstrap-4'); !!}
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Products -->
  </div>

  <!-- End Product Description -->
@endsection
