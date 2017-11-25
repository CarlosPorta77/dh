@extends('layouts.app')
@section('title', 'Checkout3')

@section('content')
  <!-- Breadcrumbs -->
  <section class="g-brd-bottom g-brd-gray-light-v4 g-py-20">
    <div class="container">
      <ul class="u-list-inline">
        <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-text" href="{{ route('welcome') }}">Home</a>
          <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
        </li>
        <li class="list-inline-item g-color-primary">
          <span>Checkout3</span>
        </li>
      </ul>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- Flash notifications -->
  @include('includes.flash')
  <!-- End Flash notifications -->

  <div class=" container g-mb-20">
    <!-- Step Titles -->
    <ul class="row justify-content-center list-inline text-center g-font-size-17 mb-0">
      <li class="col-3 list-inline-item g-mb-20 g-mb-0--sm">
        <span
            class="d-block u-icon-v2 u-icon-size--sm g-rounded-50x g-brd-primary g-color-white g-bg-primary mx-auto mb-3">
          <i class="fa fa-check"></i>
        </span>
        <h4 class="g-font-size-16 text-uppercase mb-0">Revisión</h4>
      </li>

      <li class="col-3 list-inline-item g-mb-20 g-mb-0--sm">
        <span
            class="d-block u-icon-v2 u-icon-size--sm g-rounded-50x g-brd-primary g-color-white g-bg-primary mx-auto mb-3">
          <i class="fa fa-check"></i>
        </span>
        <h4 class="g-font-size-16 text-uppercase mb-0">Envío</h4>
      </li>

      <li class="col-3 list-inline-item">
        <span
            class="d-block u-icon-v2 u-icon-size--sm g-rounded-50x g-brd-primary g-color-white g-bg-primary mx-auto mb-3">
          <i class="g-font-style-normal g-font-weight-700 g-hide-check">3</i>
          <i class="fa fa-check g-show-check"></i>
        </span>
        <h4 class="g-font-size-16 text-uppercase mb-0">Pago</h4>
      </li>
    </ul>
    <!-- End Step Titles -->
  </div>

  <!-- Checkout Form, Pago-->
  <div class="container g-pt-20 g-pb-20">
    <!-- Payment & Review -->
    <div class="row">
      <div class="col-md-8 g-mb-30">
        <div class="form-group u-has-disabled-v1">
          <label for="notes"
                 class="d-block g-color-gray-dark-v2 g-font-size-13">Notas y/o observaciones</label>
          <input
              id="notes"
              class="form-control g-placeholder-gray-light-v1 rounded-0 g-py-15 disabled"
              name="notes"
              type="text"
              value="{{ auth()->user()->cart->notes }}"
          >
        </div>

        <!-- Payment Methods -->
        <ul class="list-unstyled g-mt-30">
          <li class="my-3">
            <label class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
              <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radInline1_1" type="radio" checked readonly>
              <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                            <i class="fa" data-check-icon="&#xf00c"></i>
                </span>
              Pago con MercadoPago
              <img class="g-width-100 ml-2" src="{{ asset('images/mercado-pago.jpg') }}" alt="Mercado Pago">
            </label>
          </li>
        </ul>
        <!-- End Payment Methods -->

      </div>

      <div class="col-md-4 g-mb-30">
        <!-- Order Summary -->
      @include('user.cart.summary')
      <!-- End Order Summary -->
        <form action="{{ route('user.cart.checkout4') }}" method="post">
          {{ csrf_field() }}

          <button type="submit" class="btn btn-block u-btn-primary g-font-size-13 text-uppercase g-py-15 mb-4">Comprar</button>
        </form>

      </div>
    </div>

    <!-- End Payment & Review -->


  </div>
  <!-- End Checkout Form -->
@endsection


