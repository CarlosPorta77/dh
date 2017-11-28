@extends('layouts.app')
@section('title', 'registración')

@section('content')
  <!-- Breadcrumbs -->
  <section class="g-brd-bottom g-brd-gray-light-v4 g-py-10">
    <div class="container">
      <ul class="u-list-inline">
        <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-text" href="#!">Home</a>
          <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
        </li>
        <li class="list-inline-item g-color-primary">
          <span>Registración</span>
        </li>
      </ul>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- Signup -->
  <section class="container g-pt-20 g-pb-10">
    <div class="row">
      <div class="col-lg-5 order-lg-2 g-mb-80">
        <div class="g-brd-around g-brd-gray-light-v3 g-bg-white rounded g-px-30 g-py-50 mb-4">
          <header class="text-center mb-4">
            <h1 class="h4 g-color-black g-font-weight-400">Creá tu cuenta</h1>
          </header>

          <!-- Form -->
          <form class="g-py-15" role="form" method="POST" action="{{ url('/register') }}">
            {!! csrf_field() !!}

            <div class="row">
              <div class="col g-mb-20">
                <input
                    class="form-control g-color-black g-bg-white g-bg-white--focus rounded g-py-15 g-px-15 {{ $errors->has('name') ? ' is-invalid ' : ' g-brd-gray-light-v3 ' }}"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    placeholder="Nombre">
              </div>
              @if ($errors->has('name'))
                <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('name') }}</small>
              @endif

              <div class="col g-mb-20">
                <input
                    class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 rounded g-py-15 g-px-15"
                    type="text"
                    name="last_name"
                    value="{{ old('last_name') }}"
                    placeholder="Apellido">
              </div>
            </div>

            <div class="g-mb-20">
              <input
                  class="form-control g-color-black g-bg-white g-bg-white--focus rounded g-py-15 g-px-15 {{ $errors->has('land_phone') ? 'is-invalid ' : ' g-brd-gray-light-v3 ' }} d-block"
                  type="text"
                  name="land_phone"
                  value="{{ old('land_phone') }}"
                  placeholder="Teléfono fijo">
              @if ($errors->has('land_phone'))
                <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('land_phone') }}</small>
              @endif
            </div>

            <div class="g-mb-20">
              <input
                  class="form-control g-color-black g-bg-white g-bg-white--focus rounded g-py-15 g-px-15 {{ $errors->has('cel_phone') ? ' is-invalid' : ' g-brd-gray-light-v3 ' }} d-block"
                  type="text"
                  name="cel_phone"
                  value="{{ old('cel_phone') }}"
                  placeholder="Teléfono móvil">
            </div>

            <div class="g-mb-20">
              <input
                  class="form-control g-color-black g-bg-white g-bg-white--focus rounded g-py-15 g-px-15 {{ $errors->has('address') ? ' is-invalid' : ' g-brd-gray-light-v3 ' }} d-block"
                  type="text"
                  name="address"
                  value="{{ old('address') }}"
                  placeholder="Dirección">
              @if ($errors->has('address'))
                <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('address') }}</small>
              @endif
            </div>

            <div class="g-mb-20">
              <input
                  class="form-control g-color-black g-bg-white g-bg-white--focus rounded g-py-15 g-px-15 {{ $errors->has('city') ? ' is-invalid' : ' g-brd-gray-light-v3 ' }} d-block"
                  type="text"
                  name="city"
                  value="{{ old('city') }}"
                  placeholder="Localidad">
              @if ($errors->has('city'))
                <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('city') }}</small>
              @endif
            </div>

            <div class="g-mb-20">
              <input
                  class="form-control g-color-black g-bg-white g-bg-white--focus rounded g-py-15 g-px-15 {{ $errors->has('email') ? ' is-invalid' : ' g-brd-gray-light-v3 ' }} d-block"
                  type="email"
                  value="{{ old('email') }}"
                  name="email"
                  required
                  placeholder="Correo electrónico">
              @if ($errors->has('email'))
                <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('email') }}</small>
              @endif
            </div>

            <div class="g-mb-20">
              <div>
                <input
                    class="form-control g-color-black g-bg-white g-bg-white--focus rounded g-py-15 g-px-15 {{ $errors->has('password') ? ' is-invalid' : ' g-brd-gray-light-v3 ' }} d-block"
                    type="password"
                    name="password"
                    required
                    placeholder="Contraseña">
              </div>
              @if ($errors->has('password'))
                <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('password') }}</small>
              @endif
            </div>

            <div class="g-mb-20">
              <input
                  class="form-control g-color-black g-bg-white g-bg-white--focus rounded g-py-15 g-px-15 {{ $errors->has('password_confirmation') ? ' is-invalid' : ' g-brd-gray-light-v3 ' }} d-block"
                  type="password"
                  name="password_confirmation"
                  required
                  placeholder="Confirmación contraseña">
            </div>
            @if ($errors->has('password_confirmation'))
              <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('password_confirmation') }}</small>
            @endif

            <div class="mb-1">
              <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-13 g-pl-25 mb-2">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox">
                <span class="d-block u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                      <i class="fa" data-check-icon="&#xf00c"></i>
                    </span>
                Acepto los <a href="#!">Términos y condiciones</a>
              </label>
            </div>

            <div class="mb-3">
              <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-13 g-pl-25 mb-2">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox">
                <span class="d-block u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                      <i class="fa" data-check-icon="&#xf00c"></i>
                    </span>
                Subscrirme al newsletter
              </label>
            </div>

            <button class="btn btn-block u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25" type="submit">Confirmar registro</button>
          </form>
          <!-- End Form -->
        </div>

        <div class="text-center">
          <p class="g-color-gray-dark-v5 mb-0">Ya tenés una cuenta?
            <a class="g-font-weight-600" href="{{ route('login') }}">Ingresá</a></p>
        </div>
      </div>

      <div class="col-lg-7 order-lg-1 g-mb-80">
        <div class="g-pr-20--lg">
          <div class="mb-5">
            <h2 class="h1 g-font-weight-400 mb-3">Bienvenido a Furusato</h2>
            <p class="g-color-gray-dark-v4">The time has come to bring those ideas and plans to life. This is where we really begin to visualize your napkin sketches and make them
              into beautiful pixels.</p>
          </div>

          <div class="row text-center mb-5">
            <div class="col-sm-4 g-mb-10">
              <!-- Counters -->
              <div class="g-bg-gray-light-v5 g-pa-20">
                <div class="js-counter g-color-gray-dark-v5 g-font-weight-300 g-font-size-25 g-line-height-1">52147</div>
                <div class="d-inline-block g-width-10 g-height-2 g-bg-gray-dark-v5 mb-1"></div>
                <h4 class="g-color-gray-dark-v4 g-font-size-12 text-uppercase">Code Lines</h4>
              </div>
              <!-- End Counters -->
            </div>

            <div class="col-sm-4 g-mb-10">
              <!-- Counters -->
              <div class="g-bg-gray-light-v5 g-pa-20">
                <div class="js-counter g-color-gray-dark-v5 g-font-weight-300 g-font-size-25 g-line-height-1">24583</div>
                <div class="d-inline-block g-width-10 g-height-2 g-bg-gray-dark-v5 mb-1"></div>
                <h4 class="g-color-gray-dark-v4 g-font-size-12 text-uppercase">Projects</h4>
              </div>
              <!-- End Counters -->
            </div>

            <div class="col-sm-4 g-mb-10">
              <!-- Counters -->
              <div class="g-bg-gray-light-v5 g-pa-20">
                <div class="js-counter g-color-gray-dark-v5 g-font-weight-300 g-font-size-25 g-line-height-1">7348</div>
                <div class="d-inline-block g-width-10 g-height-2 g-bg-gray-dark-v5 mb-1"></div>
                <h4 class="g-color-gray-dark-v4 g-font-size-12 text-uppercase">Working Hours</h4>
              </div>
              <!-- End Counters -->
            </div>
          </div>

          <div class="text-center">
            <h2 class="h4 g-font-weight-400 mb-4">Join more than
              <span class="g-color-primary">33,000</span> members worldwide</h2>
            <img class="img-fluid g-opacity-0_6" src="assets/img/maps/map.png" alt="Image Description">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Signup -->

  <!-- Call to Action -->
  <div class="g-bg-primary">
    <div class="container g-py-20">
      <div class="row justify-content-center">
        <div class="col-md-4 mx-auto g-py-20">
          <!-- Media -->
          <div class="media g-px-50--lg">
            <i class="d-flex g-color-white g-font-size-40 g-pos-rel g-top-3 mr-4 icon-real-estate-048 u-line-icon-pro"></i>
            <div class="media-body">
              <span class="d-block g-color-white g-font-weight-500 g-font-size-17 text-uppercase">Free Shipping</span>
              <span class="d-block g-color-white-opacity-0_8">In 2-3 Days</span>
            </div>
          </div>
          <!-- End Media -->
        </div>

        <div class="col-md-4 mx-auto g-brd-x--md g-brd-white-opacity-0_3 g-py-20">
          <!-- Media -->
          <div class="media g-px-50--lg">
            <i class="d-flex g-color-white g-font-size-40 g-pos-rel g-top-3 mr-4 icon-real-estate-040 u-line-icon-pro"></i>
            <div class="media-body">
              <span class="d-block g-color-white g-font-weight-500 g-font-size-17 text-uppercase">Free Returns</span>
              <span class="d-block g-color-white-opacity-0_8">No Questions Asked</span>
            </div>
          </div>
          <!-- End Media -->
        </div>

        <div class="col-md-4 mx-auto g-py-20">
          <!-- Media -->
          <div class="media g-px-50--lg">
            <i class="d-flex g-color-white g-font-size-40 g-pos-rel g-top-3 mr-4 icon-hotel-restaurant-062 u-line-icon-pro"></i>
            <div class="media-body text-left">
              <span class="d-block g-color-white g-font-weight-500 g-font-size-17 text-uppercase">Free 24</span>
              <span class="d-block g-color-white-opacity-0_8">Days Storage</span>
            </div>
          </div>
          <!-- End Media -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Call to Action -->
@endsection
