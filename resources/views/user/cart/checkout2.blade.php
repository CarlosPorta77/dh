@extends('layouts.app')
@section('title', 'Checkout')

@section('content')
  <!-- Breadcrumbs -->
  <section class="g-brd-bottom g-brd-gray-light-v4 g-py-10">
    <div class="container">
      <ul class="u-list-inline">
        <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-text" href="{{ route('welcome') }}">Home</a>
          <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
        </li>
        <li class="list-inline-item g-color-primary">
          <span>Checkout2</span>
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
          <i class="g-font-style-normal g-font-weight-700 g-hide-check">2</i>
          <i class="fa fa-check g-show-check"></i>
        </span>
        <h4 class="g-font-size-16 text-uppercase mb-0">Envío</h4>
      </li>

      <li class="col-3 list-inline-item">
        <span
            class="d-block u-icon-v2 u-icon-size--sm g-rounded-50x g-brd-gray-light-v2 g-color-gray-dark-v5 mx-auto mb-3">
          <i class="g-font-style-normal g-font-weight-700 g-hide-check">3</i>
          <i class="fa fa-check g-show-check"></i>
        </span>
        <h4 class="g-font-size-16 text-uppercase mb-0">Pago</h4>
      </li>
    </ul>
    <!-- End Step Titles -->
  </div>

  <!-- Checkout Form, Envío-->
  <div class="container g-pt-20 g-pb-20">
    <!-- Shipping -->
    <form action="{{ route('user.cart.checkout3') }}" method="post">
      {{ csrf_field() }}

      <div class="row">
        <div class="col-md-8 g-mb-30">
          <div class="row">
            <div class="col-12 g-mb-10">
              <div class="form-group">
                <label for="shipping_address"
                       class="d-block g-color-gray-dark-v2 g-font-size-13">Dirección de envío</label>
                <input
                    id="shipping_address"
                    class="d-block form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15 {{ $errors->has('shipping_address') ? ' is-invalid ' : ' g-brd-gray-light-v3 ' }}"
                    name="shipping_address"
                    type="text"
                    placeholder="Ingresá la dirección donde deseas recibir tu pedido"
                    value="{{ old('shipping_address', auth()->user()->cart->shipping_address) }}"
                >
                @if ($errors->has('shipping_address'))
                  <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('shipping_address') }}</small>
                @endif

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 g-mb-10">
              <div class="form-group">
                <label for="notes"
                       class="d-block g-color-gray-dark-v2 g-font-size-13">Notas y/o observaciones</label>
                <input
                    id="notes"
                    class="d-block form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15 {{ $errors->has('shipping_address') ? ' is-invalid ' : ' g-brd-gray-light-v3 ' }}"
                    name="notes"
                    type="text"
                    placeholder="Aquí podrás dejarnos algún comentario u obervación respecto de tu pedido."
                    value="{{ old('notes', auth()->user()->cart->notes) }}"
                >
                @if ($errors->has('notes'))
                  <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('notes') }}</small>
                @endif

              </div>
            </div>
          </div>

          <hr class="g-mb-20">

          <h4 class="h6 text-uppercase mb-3">Gastos de envío</h4>

          <!-- Shipping Mehtod -->
          <table class="mb-3">
            <thead class="h6 g-brd-bottom g-brd-gray-light-v3 g-color-gray-dark-v3 g-font-size-13">
            <tr>
              <th class="g-width-250 g-font-weight-500 g-pa-0 g-pb-10">Destino</th>
              <th class="g-width-70 g-font-weight-500 text-right g-pa-0 g-pb-10">Costo</th>
            </tr>
            </thead>
            <tbody>
            <tr class="g-color-gray-dark-v4 g-font-size-13">
              <td class="align-top g-py-5">CABA</td>
              <td class="align-top text-right g-py-5">Sin cargo</td>
            </tr>
            <tr class="g-color-gray-dark-v4 g-font-size-13">
              <td class="align-top g-py-5">Zona Norte hasta Av Paraná</td>
              <td class="align-top text-right g-py-5">Consultar</td>
            </tr>
            </tbody>
          </table>
          <!-- End Shipping Mehtod -->
        </div>

        <div class="col-md-4 g-mb-30">
          <!-- Order Summary -->
        @include('user.cart.summary')
          <!-- End Order Summary -->

          <button type="submit" class="btn btn-block u-btn-primary g-font-size-13 text-uppercase g-py-15 mb-4">medios de pago</button>
        </div>
      </div>
    </form>
    <!-- End Shipping -->
  </div>
  <!-- End Checkout Form -->
@endsection


