@extends('layouts.app')
@section('title', 'Checkout3')

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
          <span>Checkout4</span>
        </li>
      </ul>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- Flash notifications -->
  @include('includes.flash')
  <!-- End Flash notifications -->

  <div class=" container g-mb-10">
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
          <i class="fa fa-check"></i>
        </span>
        <h4 class="g-font-size-16 text-uppercase mb-0">Pago</h4>
      </li>
    </ul>
    <!-- End Step Titles -->
  </div>

  <!-- Order completed -->
  <div class="container g-py-10">
    <div class="u-shadow-v19 g-max-width-645 g-brd-around g-brd-gray-light-v4 text-center rounded mx-auto g-pa-30 g-pa-50--md">
          <span class="u-icon-v3 u-icon-size--lg g-color-white g-bg-primary rounded-circle g-pa-15 mb-5">
            <svg width="30" height="30 version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              viewBox="0 0 497.5 497.5" style="enable-background:new 0 0 497.5 497.5;" xml:space="preserve">
              <g>
                <path d="M487.75,78.125c-13-13-33-13-46,0l-272,272l-114-113c-13-13-33-13-46,0s-13,33,0,46l137,136
                  c6,6,15,10,23,10s17-4,23-10l295-294C500.75,112.125,500.75,91.125,487.75,78.125z" fill="#fff"/>
              </g>
            </svg>
          </span>

      <div class="mb-5">
        <h2 class="mb-4">Tu pedido se ha procesado con éxito!</h2>
        <p>Gracias por tu compra! Estamos procesando tu pedido, el que recibirás dentro de las 2 horas. Recibirás un email de confirmación.</p>
      </div>

      <a class="btn u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25" href="{{ route('welcome') }}">Continúa comprando</a>
    </div>
  </div>
  <!-- End Order Completed -->
@endsection


