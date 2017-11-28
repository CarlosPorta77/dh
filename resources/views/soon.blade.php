@extends('layouts.app')
@section('title', 'Inicio')

@section('styles')
  <style>
  </style>
@endsection

@section('content')
  <!-- Breadcrumbs -->
  <section class="g-brd-bottom g-brd-gray-light-v4 g-py-10">
    <div class="container">
      <ul class="u-list-inline">
        <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-text" href="{{route('welcome')}}">Home</a>
          <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
        </li>
        <li class="list-inline-item g-color-primary">
          <span>En construcción</span>
        </li>
      </ul>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- Coming Soon -->
  <div class="g-pos-rel g-py-100">
    <div class="g-pos-rel g-z-index-1">
      <!-- Heading -->
      <div class="g-max-width-645 text-center mx-auto g-mb-70">
        <h2 class="g-font-size-50 mb-3">Página en construcción</h2>
        <p class="g-font-size-17">Paciencia..., en breve implementaremos esta opción.</p>
      </div>
      <!-- End Heading -->

      <div class="container">
        <!-- Countdown -->
        <div class="js-countdown u-countdown-v1 text-center g-mb-70"
             data-end-date="2018/12/31"
             data-month-format="%m"
             data-days-format="%d"
             data-hours-format="%H"
             data-minutes-format="%M"
             data-seconds-format="%S">
          <div class="d-inline-block u-shadow-v19 g-brd-around g-brd-gray-light-v3 rounded g-pa-20 g-mx-15 g-mb-30">
            <div class="js-cd-month g-color-primary g-font-weight-700 g-font-size-40 g-line-height-1_4"></div>
            <hr class="g-brd-gray-light-v3 my-2 mb-3">
            <h3 class="h6 g-color-text g-font-weight-400 mb-0">Meses</h3>
          </div>

          <div class="d-inline-block u-shadow-v19 g-brd-around g-brd-gray-light-v3 rounded g-pa-20 g-mx-15 g-mb-30">
            <div class="js-cd-days g-color-primary g-font-weight-700 g-font-size-40 g-line-height-1_4"></div>
            <hr class="g-brd-gray-light-v3 my-2 mb-3">
            <h3 class="h6 g-color-text g-font-weight-400 mb-0">Dias</h3>
          </div>

          <div class="d-inline-block u-shadow-v19 g-brd-around g-brd-gray-light-v3 rounded g-pa-20 g-mx-15 g-mb-30">
            <div class="js-cd-hours g-color-primary g-font-weight-700 g-font-size-40 g-line-height-1_4"></div>
            <hr class="g-brd-gray-light-v3 my-2 mb-3">
            <h3 class="h6 g-color-text g-font-weight-400 mb-0">Horas</h3>
          </div>

          <div class="d-inline-block u-shadow-v19 g-brd-around g-brd-gray-light-v3 rounded g-pa-20 g-mx-15 g-mb-30">
            <div class="js-cd-minutes g-color-primary g-font-weight-700 g-font-size-40 g-line-height-1_4"></div>
            <hr class="g-brd-gray-light-v3 my-2 mb-3">
            <h3 class="h6 g-color-text g-font-weight-400 mb-0">Minutos</h3>
          </div>

          <div class="d-inline-block u-shadow-v19 g-brd-around g-brd-gray-light-v3 rounded g-pa-20 g-mx-15 g-mb-30">
            <div class="js-cd-seconds g-color-primary g-font-weight-700 g-font-size-40 g-line-height-1_4"></div>
            <hr class="g-brd-gray-light-v3 my-2 mb-3">
            <h3 class="h6 g-color-text g-font-weight-400 mb-0">Segundos</h3>
          </div>
        </div>
        <!-- End Countdown -->

        <!-- Subscribe -->
        <div class="g-max-width-550 text-center mx-auto">
          <div class="mb-4">
            <h2 class="h4">Subscribite</h2>
            <p class="g-color-gray-dark-v5">Suscribite para recibir nuestras últimas novedades y promociones.</p>
          </div>

          <form class="input-group u-shadow-v21 g-brd-around g-brd-gray-light-v4 rounded" action="{{ route('soon') }}">
            <input class="form-control g-brd-none g-color-gray-dark-v4 g-placeholder-gray-dark-v3 rounded g-px-25 g-py-17" type="email" placeholder="Ingresá tu email">
            <span class="input-group-addon u-shadow-v19 g-brd-none g-bg-white">
                  <button class="btn u-btn-primary g-font-size-12 rounded text-uppercase g-py-12 g-px-15" type="submit"><i class="fa fa-long-arrow-right"></i></button>
                </span>
          </form>
          <!-- End Subscribe -->
        </div>
      </div>
    </div>

    <div class="g-pos-abs g-bottom-0 g-right-minus-50 g-right-0--lg">
      <img class="img-fluid" src="assets/img-temp/444x359/img1.png" alt="Image Description">
    </div>
  </div>
  <!-- End Coming Soon -->

@endsection
