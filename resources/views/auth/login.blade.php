@extends('layouts.app')
@section('title', 'ingreso')

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
          <span>Ingreso</span>
        </li>
      </ul>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- Login -->
  <section class="container g-pt-20 g-pb-10">
    <div class="row justify-content-between">
      <div class="col-md-6 col-lg-5 order-lg-2 g-mb-80">
        <div class="g-brd-around g-brd-gray-light-v3 g-bg-white rounded g-px-30 g-py-50 mb-4">
          <header class="text-center mb-4">
            <h1 class="h4 g-color-black g-font-weight-400">Inicio de sesión</h1>
          </header>

          <!-- Form -->
          <form class="g-py-15" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="mb-4">
              <div class="input-group g-rounded-left-3">
                <span class="input-group-addon g-width-45 g-brd-gray-light-v3 g-color-gray-dark-v5">
                  <i class="icon-finance-067 u-line-icon-pro"></i>
                </span>
                <input
                    class="form-control g-color-black g-bg-white g-bg-white--focus g-rounded-left-0 g-rounded-right-3 g-py-15 g-px-15 {{ $errors->has('email') ? ' is-invalid ' : ' g-brd-gray-light-v3 ' }} d-block"
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    placeholder="Correo electrónico"
                >
              </div>
              @if ($errors->has('email'))
                <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('email') }}</small>
              @endif
            </div>

            <div class="mb-4">
              <div class="input-group g-rounded-left-3 mb-4">
                <span class="input-group-addon g-width-45 g-brd-gray-light-v3 g-color-gray-dark-v5">
                  <i class="icon-media-094 u-line-icon-pro"></i>
                </span>
                <input
                    class="form-control g-color-black g-bg-white g-bg-white--focus g-rounded-left-0 g-rounded-right-3 g-py-15 g-px-15 {{ $errors->has('password') ? ' is-invalid ' : ' g-brd-gray-light-v3 ' }} d-block"
                    id="password"
                    type="password"
                    name="password"
                    required
                    placeholder="Contraseña"
                >
              </div>
              @if ($errors->has('password'))
                <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('password') }}</small>
              @endif
            </div>

            <div class="row justify-content-between mb-5">
              <div class="col align-self-center">
                <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-13 g-pl-25 mb-0">
                  <input
                      class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0"
                      type="checkbox"
                      name="remember"
                      {{ old('remember') ? 'checked' : '' }}
                  >
                  <span class="d-block u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                    <i class="fa" data-check-icon="&#xf00c"></i>
                  </span>
                  Recordame
                </label>
              </div>
              <div class="col align-self-center text-right">
                <a class="g-font-size-13" href="{{ route('password.request') }}">Olvidaste tu contraseña?</a>
              </div>
            </div>

            <div class="mb-5">
              <button class="btn btn-block u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25"
                      type="submit">Ingresar
              </button>
            </div>

            <div class="d-flex justify-content-center text-center g-mb-30">
              <div class="d-inline-block align-self-center g-width-50 g-height-1 g-bg-gray-light-v1"></div>
              <span class="align-self-center g-color-gray-dark-v5 mx-4">O</span>
              <div class="d-inline-block align-self-center g-width-50 g-height-1 g-bg-gray-light-v1"></div>
            </div>

            <div class="row no-gutters">
              <div class="col-6">
                <button
                    class="btn btn-block u-btn-facebook g-font-size-12 text-uppercase g-py-12 g-px-25 mr-2"
                    type="button">
                  <i class="mr-1 fa fa-facebook"></i>
                  Facebook
                </button>
              </div>
              <div class="col-6">
                <button
                    class="btn btn-block u-btn-twitter g-font-size-12 text-uppercase g-py-12 g-px-25 ml-2"
                    type="button">
                  <i class="mr-1 fa fa-twitter"></i>
                  Twitter
                </button>
              </div>
            </div>
          </form>
          <!-- End Form -->
        </div>

        <div class="text-center">
          <p class="g-color-gray-dark-v5 mb-0">No tenés cuenta?
            <a class="g-font-weight-600" href="page-signup-1.html">registrate</a></p>
        </div>
      </div>

      <div class="col-md-6 order-lg-1 g-mb-80">
        <div class="mb-5">
          <h2 class="h1 g-font-weight-400 mb-3">Bienvenido a Furusato</h2>
          <p class="g-color-gray-dark-v4">Somos un emprendimiento gastronómico dedicado desde el año 1999 a la elaboración de sushi calidad Premium para delivery y catering.</p>
          <p class="g-color-gray-dark-v4">En un ambiente de suma calidez y profesionalismo nuestros Sushi Masters junto al equipo de sushiman y ayudantes logran las más exquisitas y variadas combinaciones fusionando colores y sabores propios de este milenario arte culinario.</p>
        </div>

        <div class="row">
          <div class="col-lg-9">
            <!-- Icon Blocks -->
            <div class="media mb-5">
              <div class="d-flex mr-3">
                <span class="align-self-center u-icon-v1 u-icon-size--lg g-color-primary">
                    <i class="icon-hotel-restaurant-099 u-line-icon-pro"></i>
                </span>
              </div>
              <div class="media-body align-self-center">
                <h3 class="h5 g-font-weight-400">Tu pedido al momento</h3>
                <p class="g-color-gray-dark-v5 mb-0">Todos los pedidos son preparados al momento. Garantizamos la frescura y calidad de los mismos.</p>
              </div>
            </div>
            <!-- End Icon Blocks -->

            <!-- Icon Blocks -->
            <div class="media mb-5">
              <div class="d-flex mr-3">
                <span class="align-self-center u-icon-v1 u-icon-size--lg g-color-primary">
                    <i class="icon-hotel-restaurant-186 u-line-icon-pro"></i>
                </span>
              </div>
              <div class="media-body align-self-center">
                <h3 class="h5 g-font-weight-400">Delivery gratuito</h3>
                <p class="g-color-gray-dark-v5 mb-0">No tenemos gastos de envío dentro de CABA.</p>
              </div>
            </div>
            <!-- End Icon Blocks -->

            <!-- Icon Blocks -->
            <div class="media">
              <div class="d-flex mr-3">
                <span class="align-self-center u-icon-v1 u-icon-size--lg g-color-primary">
                    <i class="icon-finance-218 u-line-icon-pro"></i>
                </span>
              </div>
              <div class="media-body align-self-center">
                <h3 class="h5 g-font-weight-400">Atención telefónica</h3>
                <p class="g-color-gray-dark-v5 mb-0">Nuestras operadoras telefónicas te asesorarán y aconsejarán para que puedas hacer el pedido tal cual como querés.</p>
              </div>
            </div>
            <!-- End Icon Blocks -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Login -->

@endsection