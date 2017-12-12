@extends('layouts.app')
@section('title', 'registración')

@section('content')

  <!-- Js form validator -->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="js/registerValidator.js"></script>
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

              @if ($errors->has('name'))
                <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('name') }}</small>
              @endif
              <small class="ename form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0"></small>
              </div>

              <div class="col g-mb-20">
                <input
                    class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 rounded g-py-15 g-px-15"
                    type="text"
                    name="last_name"
                    value="{{ old('last_name') }}"
                    placeholder="Apellido">

              @if ($errors->has('last_name'))
                <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('last_name') }}</small>
              @endif
                <small class="elast_name form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0"></small>
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
                <small class="eland_phone form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0"></small>
            </div>

            <div class="g-mb-20">
              <input
                  class="form-control g-color-black g-bg-white g-bg-white--focus rounded g-py-15 g-px-15 {{ $errors->has('cel_phone') ? ' is-invalid' : ' g-brd-gray-light-v3 ' }} d-block"
                  type="text"
                  name="cel_phone"
                  value="{{ old('cel_phone') }}"
                  placeholder="Teléfono móvil">
                @if ($errors->has('cel_phone'))
                    <small class="form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0">{{ $errors->first('cel_phone') }}</small>
                @endif
                    <small class="ecel_phone form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0"></small>
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
                <small class="eaddress form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0"></small>
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
                <small class="ecity form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0"></small>
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
              <small class="eemail form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0"></small>
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
                <small class="epassword form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0"></small>
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
              <small class="epassword_confirmation form-control-feedback d-block g-bg-red g-color-white g-font-size-12 g-px-14 g-py-3 mt-0"></small>

            <div class="mb-1">
              <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-13 g-pl-25 mb-2">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name="accept">
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
            <p class="g-color-gray-dark-v4"><span class="g-color-primary">Nuestro Secreto: </span>La calidad Premium de los ingredientes.</p>
            <p class="g-color-gray-dark-v4">Entre los ingredientes que utilizamos en Sushi Furusato encontramos pescados frescos sin cocción como salmón rosado Premium de Chile, pescados blancos como lenguado y besugo; mariscos como langostinos y pulpo; salmón ahumado, vegetales, frutas exóticas, especias, condimentos y el corazón del sushi: arroz avinagrado (shari).</p>
          </div>

          <div class="row text-center mb-5">
            <div class="col-sm-4 g-mb-10">
              <!-- Counters -->
              <div class="g-bg-gray-light-v5 g-pa-20">
                <div class="js-counter g-color-gray-dark-v5 g-font-weight-300 g-font-size-25 g-line-height-1">50000</div>
                <div class="d-inline-block g-width-10 g-height-2 g-bg-gray-dark-v5 mb-1"></div>
                <h4 class="g-color-gray-dark-v4 g-font-size-12 text-uppercase">Clientes satisfechos</h4>
              </div>
              <!-- End Counters -->
            </div>

            <div class="col-sm-4 g-mb-10">
              <!-- Counters -->
              <div class="g-bg-gray-light-v5 g-pa-20">
                <div class="js-counter g-color-gray-dark-v5 g-font-weight-300 g-font-size-25 g-line-height-1">1000000</div>
                <div class="d-inline-block g-width-10 g-height-2 g-bg-gray-dark-v5 mb-1"></div>
                <h4 class="g-color-gray-dark-v4 g-font-size-12 text-uppercase">Pedidos enviados</h4>
              </div>
              <!-- End Counters -->
            </div>

            <div class="col-sm-4 g-mb-10">
              <!-- Counters -->
              <div class="g-bg-gray-light-v5 g-pa-20">
                <div class="js-counter g-color-gray-dark-v5 g-font-weight-300 g-font-size-25 g-line-height-1">20</div>
                <div class="d-inline-block g-width-10 g-height-2 g-bg-gray-dark-v5 mb-1"></div>
                <h4 class="g-color-gray-dark-v4 g-font-size-12 text-uppercase">Años de trayectoria</h4>
              </div>
              <!-- End Counters -->
            </div>
          </div>

          <div class="text-center">
            <h2 class="h4 g-font-weight-400 mb-4">Disfrutá de un verdadero sushi calidad Premium elaborado con los mejores ingredientes seleccionados por su frescura y sabor. </h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Signup -->

@endsection
