<!-- Header -->
<header id="js-header" class="u-header u-header--static u-shadow-v19">
  <!-- Top Bar -->
  <div class="u-header__section g-brd-bottom g-brd-gray-light-v4 g-bg-black g-transition-0_3">
    <div class="container">
      <div class="row justify-content-between align-items-center g-mx-0--lg">

        <!-- Social Icons -->
        <div class="col-sm-auto g-hidden-sm-down">
          <ul class="list-inline g-py-14 mb-0">
            <li class="list-inline-item">
              <a class="g-color-white-opacity-0_8 g-color-primary--hover g-pa-3" href="{{ route('soon') }}">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="g-color-white-opacity-0_8 g-color-primary--hover g-pa-3" href="{{ route('soon') }}">
                <i class="fa fa-google"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="g-color-white-opacity-0_8 g-color-primary--hover g-pa-3" href="{{ route('soon') }}">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="g-color-white-opacity-0_8 g-color-primary--hover g-pa-3" href="{{ route('soon') }}">
                <i class="fa fa-instagram"></i>
              </a>
            </li>
          </ul>
        </div>
        <!-- End Social Icons -->

        <!-- Teléfono -->
        <div
            class="col-sm-auto g-hidden-sm-down g-color-white-opacity-0_6 g-font-weight-400 g-pl-15 g-pl-0--sm g-py-14">
          <i class="icon-communication-163 u-line-icon-pro g-font-size-18 g-valign-middle g-color-white-opacity-0_8 g-mr-10 g-mt-minus-2"></i>
          0800-77-SUSHI(78744) o 4584-4777
        </div>
        <!-- End Teléfono -->

        <!-- Account y Faqs -->
        <div class="col-sm-auto g-pos-rel g-py-14">
          <!-- List -->
          <ul class="list-inline g-overflow-hidden g-pt-1 g-mx-minus-4 mb-0">
            <!-- Account -->
            @if (Auth::guest())
              <li class="list-inline-item">
                <a class="d-block g-color-white-opacity-0_6 g-font-weight-400 g-color-primary--hover g-text-underline--none--hover g-font-weight-400 g-py-5"
                   href="{{ route('login') }}">
                  <i class="fa fa-sign-in g-font-size-16 g-mr-10"></i>Ingreso
                </a>
              </li>
              <li class="list-inline-item g-color-white-opacity-0_3 g-mx-4">|</li>
              <li class="list-inline-item">
                <a class="d-block g-color-white-opacity-0_6 g-color-primary--hover g-font-weight-400 g-text-underline--none--hover g-font-weight-400 g-py-5"
                   href="{{ route('register') }}">
                  <i class="fa fa-user-plus g-font-size-16 g-mr-10"></i>Registro
                </a>
              </li>
            @else
              <a id="account-dropdown-invoker-2"
                 class="g-color-white-opacity-0_6 g-color-primary--hover g-font-weight-400 g-text-underline--none--hover"
                 href="{{ route('home') }}"
                 aria-controls="account-dropdown-2"
                 aria-haspopup="true"
                 aria-expanded="false"
                 data-dropdown-event="hover"
                 data-dropdown-target="#account-dropdown-2"
                 data-dropdown-type="css-animation"
                 data-dropdown-duration="300"
                 data-dropdown-hide-on-scroll="false"
                 data-dropdown-animation-in="fadeIn"
                 data-dropdown-animation-out="fadeOut">
                <i class="fa fa-user g-font-size-16 g-mr-10"></i>{{ Auth::user()->name }}
              </a>
            @endif
            <ul id="account-dropdown-2"
                class="list-unstyled u-shadow-v29 g-pos-abs g-bg-white g-width-180 g-pb-5 g-mt-19 g-z-index-2"
                aria-labelledby="account-dropdown-invoker-2">
              @if (!Auth::guest())
                {{--Inició sesión--}}
                <li>
                  <a class="d-block g-color-black g-color-primary--hover g-text-underline--none--hover g-font-weight-400 g-py-5 g-px-20"
                     href="{{ route('cart') }}">
                    Carrito de compras
                  </a>
                </li>
                <li>
                  <a class="d-block g-color-black g-color-primary--hover g-text-underline--none--hover g-font-weight-400 g-py-5 g-px-20"
                     href="{{ route('home') }}">
                    Panel de control
                  </a>
                </li>
                @if (auth()->user()->admin)
                  <li>
                    <a class="d-block g-color-black g-color-primary--hover g-text-underline--none--hover g-font-weight-400 g-py-5 g-px-20"
                       href="{{ route('admin.products.index') }}">
                      Gestionar productos
                    </a>
                  </li>
                  <li>
                    <a class="d-block g-color-black g-color-primary--hover g-text-underline--none--hover g-font-weight-400 g-py-5 g-px-20"
                       href="{{ route('admin.categories.index') }}">
                      Gestionar categorias
                    </a>
                  </li>
                @endif
                <li>
                  <a class="d-block g-color-black g-color-primary--hover g-text-underline--none--hover g-font-weight-400 g-py-5 g-px-20"
                     href="{{ route('logout') }}"
                     onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Cerrar sesión
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>

                </li>
              @endif
            </ul>
            </li>
            <!-- End Account -->
            <li class="list-inline-item g-color-white-opacity-0_3 g-mx-4">|</li>
            <li class="list-inline-item g-mx-4">
              <a class="g-color-white-opacity-0_6 g-color-primary--hover g-font-weight-400 g-text-underline--none--hover"
                 href="{{ route('soon') }}">
                <i class="fa fa-question g-font-size-16 g-mr-10"></i>Faqs</a>
            </li>
          </ul>
          <!-- End List -->
        </div>
        <!-- End Account y Faqs -->

        <!-- Cart y search -->
        <div class="col-sm-auto g-pr-15 g-pr-0--sm">

        @if (!auth()->guest())
          <!-- Cart -->
            <div class="u-basket d-inline-block g-z-index-3">
              <div class="g-py-10 g-px-6">
                <a href="#" id="basket-bar-invoker"
                   class="u-icon-v1 g-color-white-opacity-0_8 g-color-primary--hover g-font-size-17 g-text-underline--none--hover"
                   aria-controls="basket-bar"
                   aria-haspopup="true"
                   aria-expanded="false"
                   data-dropdown-event="hover"
                   data-dropdown-target="#basket-bar"
                   data-dropdown-type="css-animation"
                   data-dropdown-duration="300"
                   data-dropdown-hide-on-scroll="false"
                   data-dropdown-animation-in="fadeIn"
                   data-dropdown-animation-out="fadeOut">
                <span class="u-badge-v1--sm u-icon-size--xl g-color-white g-bg-primary g-font-size-11 g-line-height-1_4 g-rounded-50x g-pa-4"
                      style="top: 7px !important; right: 3px !important;">{{auth()->user()->cart->details->count()}}</span>
                  <i class="fa fa-shopping-cart g-mr-3 g-color-white-opacity-0_6"></i>
                </a>
              </div>

              <div id="basket-bar"
                   class="u-basket__bar u-dropdown--css-animation u-dropdown--hidden g-text-transform-none g-bg-white g-brd-around g-brd-gray-light-v4"
                   aria-labelledby="basket-bar-invoker">
                <div class="g-brd-bottom g-brd-gray-light-v4 g-pa-15 g-mb-10">
                  <span class="d-block h6 text-center text-uppercase mb-0">Carrito de compras</span>
                </div>
                <div class="js-scrollbar g-height-200">
                @foreach(auth()->user()->cart->details as $detail)

                  <!-- Product -->
                    <div class="u-basket__product g-brd-none g-px-20">
                      <div class="row no-gutters g-pb-5">
                        <div class="col-4 pr-3">
                          <a class="u-basket__product-img" href="#">
                            <img class="img-fluid" src="{{$detail->product->featured_image_url}}"
                                 alt="Image Description">
                          </a>
                        </div>

                        <div class="col-8">
                          <h6 class="g-font-weight-400 g-font-size-default">
                            <a class="g-color-black g-color-primary--hover g-text-underline--none--hover"
                               href="#">{{$detail->product->name }}</a>
                          </h6>
                          <small class="g-color-primary g-font-size-12">{{$detail->quantity}} x $ {{number_format($detail->price, 2)}}</small>
                          <form action="{{ route('user.cart.destroy') }}" method="post" class="d-inline g-px-0 g-py-0">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                            <button type="submit"
                                    class="btn u-btn-none g-color-gray-dark-v4 g-color-black--hover g-cursor-pointer g-py-0 g-mx-0 g-px-0 bg-transparent d-inline"
                                    data-toggle="tooltip" data-placement="top" title="Eliminar">
                              <i class="fa fa-trash g-font-size-14"></i>
                            </button>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- End Product -->
                  @endforeach
                </div>

                <div class="clearfix g-px-15">
                  <div
                      class="row align-items-center text-center g-brd-y g-brd-gray-light-v4 g-font-size-default">
                    <div class="col g-brd-right g-brd-gray-light-v4">
                      <strong
                          class="d-block g-py-10 text-uppercase g-color-main g-font-weight-500 g-py-10">Total</strong>
                    </div>
                    <div class="col">
                      <strong class="d-block g-py-10 g-color-main g-font-weight-500 g-py-10">$ {{number_format(auth()->user()->cart->total, 2)}}</strong>
                    </div>
                  </div>
                </div>

                <div class="g-pa-20">
                  <div class="text-center g-mb-15">
                    <a class="text-uppercase g-color-primary g-color-main--hover g-font-weight-400 g-font-size-13 g-text-underline--none--hover"
                       href="{{ route('cart') }}">
                      ir al carrito
                      <i class="ml-2 icon-finance-100 u-line-icon-pro"></i>
                    </a>
                  </div>

                  <form action="{{ route('user.cart.checkout1') }}" method="get">
                    {{--{{ csrf_field() }}--}}

                    @if (auth()->user()->cart->details->count() > 0)
                    <button type="submit"
                            class="btn btn-md btn-block u-btn-black g-brd-primary--hover g-bg-primary--hover g-mr-10 g-mb-15 text-uppercase rounded g-font-size-12 g-py-10">Realizar
                      pedido<i class="fa fa-check  g-font-size-14 g-ml-6"></i></button>
                      @endif
                  </form>
                </div>
              </div>
            </div>
            <!-- End Cart -->
        @endif

        <!-- Search -->
          <div class="d-inline-block g-valign-middle">
            <div class="g-py-10 g-pl-15">
              <a href="#!"
                 class="g-color-white-opacity-0_8 g-color-primary--hover g-font-size-17 g-text-underline--none--hover"
                 aria-haspopup="true"
                 aria-expanded="false"
                 data-dropdown-event="hover"
                 aria-controls="searchform-1"
                 data-dropdown-target="#searchform-1"
                 data-dropdown-type="css-animation"
                 data-dropdown-duration="300"
                 data-dropdown-animation-in="fadeInUp"
                 data-dropdown-animation-out="fadeOutDown">
                <i class="g-pos-rel g-top-3 fa fa-search g-color-white-opacity-0_6"></i>
              </a>
            </div>

            <!-- Search Form -->
            <form id="searchform-1"
                  class="u-searchform-v1 u-dropdown--css-animation u-dropdown--hidden u-shadow-v20 g-brd-around g-brd-gray-light-v4 g-bg-white g-right-0 rounded g-pa-10 1g-mt-8">
              <div class="input-group">
                <input class="form-control g-font-size-13 w-100" type="search"
                       placeholder="Que buscás?...">
                <div class="input-group-btn p-0">
                  <button class="btn u-btn-primary g-font-size-12 text-uppercase g-py-13 g-px-15"
                          type="submit">Buscar
                  </button>
                </div>
              </div>
            </form>
            <!-- End Search Form -->
          </div>
        </div>
        <!-- End Search -->
      </div>
      <!-- End Cart y search -->
    </div>
  </div>
  <!-- End Top Bar -->

  <!-- Second menu -->
  <div class="u-header__section u-header__section--light g-bg-white g-transition-0_3 g-py-10">
    <nav class="js-mega-menu navbar navbar-expand-lg">
      <div class="container">
        <!-- Responsive Toggle Button -->
        <button
            class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0"
            type="button"
            aria-label="Toggle navigation"
            aria-expanded="false"
            aria-controls="navBar"
            data-toggle="collapse"
            data-target="#navBar">
                <span class="hamburger hamburger--slider g-pr-0">
                  <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                  </span>
                </span>
        </button>
        <!-- End Responsive Toggle Button -->

        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('welcome') }}">
          <img src="{{ asset('images/logo-s.jpg') }}" alt="Sushi Furusato">
        </a>
        <!-- End Logo -->

      </div>
    </nav>
  </div>
  <!-- End Second menu -->
</header>
<!-- End Header -->

