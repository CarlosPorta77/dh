@extends('layouts.app')
@section('title', 'Checkout')

@section('content')
  <!-- Breadcrumbs -->
  <section class="g-brd-bottom g-brd-gray-light-v4 g-py-10">
    <div class="container">
      <ul class="u-list-inline">
        <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-text" href="{{ route('home') }}">Home</a>
          <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
        </li>
        <li class="list-inline-item g-color-primary">
          <span>Checkout1</span>
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
          <i class="g-font-style-normal g-font-weight-700">1</i>
        </span>
        <h4 class="g-font-size-16 text-uppercase mb-0">Revisión</h4>
      </li>

      <li class="col-3 list-inline-item g-mb-20 g-mb-0--sm">
        <span
            class="d-block u-icon-v2 u-icon-size--sm g-rounded-50x g-brd-gray-light-v2 g-color-gray-dark-v5 mx-auto mb-3">
          <i class="g-font-style-normal g-font-weight-700">2</i>
        </span>
        <h4 class="g-font-size-16 text-uppercase mb-0">Envío</h4>
      </li>

      <li class="col-3 list-inline-item">
        <span
            class="d-block u-icon-v2 u-icon-size--sm g-rounded-50x g-brd-gray-light-v2 g-color-gray-dark-v5 mx-auto mb-3">
          <i class="g-font-style-normal g-font-weight-700">3</i>
        </span>
        <h4 class="g-font-size-16 text-uppercase mb-0">Pago</h4>
      </li>
    </ul>
    <!-- End Step Titles -->
  </div>

  <!-- Checkout Form, Revisión-->
  <div class="container g-pt-20 g-pb-20">
    <!-- Shopping Cart -->
    <div class="row">
      <div class="col-md-8 g-mb-30">
        <!-- Products Block -->
        <div class="g-overflow-x-scroll g-overflow-x-visible--lg">
          <table class="text-center w-100">
            <thead class="h6 g-brd-bottom g-brd-gray-light-v3 g-color-black text-uppercase">
            <tr>
              <th class="g-font-weight-400 text-left g-pb-20">Producto</th>
              <th class="g-font-weight-400 g-width-130 g-pb-20">Precio</th>
              <th class="g-font-weight-400 g-width-50 g-pb-20">Cantidad</th>
              <th class="g-font-weight-400 g-width-130 g-pb-20">Subtotal</th>
              <th></th>
            </tr>
            </thead>

            <tbody>
            @foreach(auth()->user()->cart->details as $detail)
              <!-- Item-->
              <tr class="g-brd-bottom g-brd-gray-light-v3">
                <td class="text-left g-py-25">
                  <img class="d-inline-block g-width-100 mr-4" src="{{ $detail->product->featured_image_url }}" alt="{{$detail->product->name }}">
                  <div class="d-inline-block align-middle">
                    <h4 class="h6 g-color-black">{{$detail->product->name }}</h4>
                    <ul class="list-unstyled g-color-gray-dark-v4 g-font-size-12 g-line-height-1_6 mb-0">
                      <li>{{$detail->product->category->name }}</li>
                    </ul>
                  </div>
                </td>
                <td class="g-color-gray-dark-v2 g-font-size-13">${{ number_format($detail->price, 2) }}</td>
                <td class="g-color-gray-dark-v2 g-font-size-13">{{ number_format($detail->quantity, 2) }}</td>
                <td class="text-right g-color-black">
                  <span class="g-color-gray-dark-v2 g-font-size-13 mr-4">${{ number_format($detail->price * $detail->quantity, 2) }}</span>
                </td>
              </tr>
            @endforeach

            <!-- End Item-->
            </tbody>
          </table>
        </div>
        <!-- End Products Block -->
      </div>

      <div class="col-md-4 g-mb-30">
        <!-- Order Summary -->
      @include('user.cart.summary')
      <!-- End Order Summary -->

        <form action="{{ route('user.cart.checkout2') }}" method="get">
          <button type="submit" class="btn btn-block u-btn-primary g-font-size-13 text-uppercase g-py-15 mb-4" type="button" data-next-step="#step2">formas de envío</button>
        </form>
      </div>
    </div>
    <!-- End Shopping Cart -->
  </div>
  <!-- End Checkout Form -->
@endsection


