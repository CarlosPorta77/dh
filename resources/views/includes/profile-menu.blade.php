<aside class="g-brd-around g-brd-gray-light-v4 rounded g-px-20 g-py-30">
  <!-- Profile Picture -->
  <div class="text-center g-pos-rel g-mb-30">
    <div class="g-width-100 g-height-100 mx-auto mb-3">
      <img class="img-fluid rounded-circle" src="https://lorempixel.com/100/100/?92567" alt="">
    </div>

    <span class="d-block g-font-weight-500">{{ auth()->user()->name . ' ' . auth()->user()->last_name}}</span>

    <span class="u-icon-v3 u-icon-size--xs g-color-white--hover g-bg-primary--hover rounded-circle g-pos-abs g-top-0 g-right-15 g-cursor-pointer"
          title="Change Profile Picture"
          data-toggle="tooltip"
          data-placement="top">
                  <i class="icon-finance-067 u-line-icon-pro"></i>
                </span>
  </div>
  <!-- End Profile Picture -->

  <hr class="g-brd-gray-light-v4 g-my-30">

  <!-- Profile Settings List -->
  <ul class="list-unstyled mb-0">
    <li class="g-py-3">
      <a class="d-block align-middle u-link-v5 g-color-text g-color-primary--hover g-bg-gray-light-v5--hover rounded g-pa-3  @yield('carrito-de-compras')"
         href="{{route ('cart')}}">
        <span class="u-icon-v1 g-color-gray-dark-v5 mr-2"><i class="icon-finance-100 u-line-icon-pro u-line-icon-pro"></i></span>
        Carrito de compras
      </a>
    </li>
    <li class="g-py-3">
      <a class="d-block align-middle u-link-v5 g-color-text g-color-primary--hover g-bg-gray-light-v5--hover rounded g-pa-3" @yield('tus-compras') href="{{ route('user.order.index') }}">
        <span class="u-icon-v1 g-color-gray-dark-v5 mr-2"><i class="icon-finance-114 u-line-icon-pro"></i></span>
        Tus compras
      </a>
    </li>
    <li class="g-py-3">
      <a class="d-block align-middle u-link-v5 g-color-text g-color-primary--hover g-bg-gray-light-v5--hover rounded g-pa-3" href="{{ route('soon') }}">
        <span class="u-icon-v1 g-color-gray-dark-v5 mr-2"><i class="icon-finance-115 u-line-icon-pro"></i></span>
        Compras abiertas
      </a>
    </li>
    <li class="g-py-3">
      <a class="d-block align-middle u-link-v5 g-color-text g-color-primary--hover g-bg-gray-light-v5--hover rounded g-pa-3" href="{{ route('soon') }}">
        <span class="u-icon-v1 g-color-gray-dark-v5 mr-2"><i class="icon-finance-113 u-line-icon-pro"></i></span>
        Compras canceladas
      </a>
    </li>
    <li class="g-py-3">
      <a class="d-block align-middle u-link-v5 g-color-text g-color-primary--hover g-bg-gray-light-v5--hover rounded g-pa-3" href=" {{ route('soon') }}">
        <span class="u-icon-v1 g-color-gray-dark-v5 mr-2"><i class="icon-medical-022 u-line-icon-pro"></i></span>
        Favoritos
      </a>
    </li>
    <li class="g-py-3">
      <a class="d-block align-middle u-link-v5 g-color-text g-color-primary--hover g-bg-gray-light-v5--hover rounded g-pa-3" href="{{ route('soon') }}">
        <span class="u-icon-v1 g-color-gray-dark-v5 mr-2"><i class="icon-real-estate-027 u-line-icon-pro"></i></span>
        Direcciones
      </a>
    </li>
    <li class="g-py-3">
      <a class="d-block align-middle u-link-v5 g-color-text g-color-primary--hover g-bg-gray-light-v5--hover rounded g-pa-3" href="{{ route('soon') }}">
        <span class="u-icon-v1 g-color-gray-dark-v5 mr-2"><i class="icon-finance-110 u-line-icon-pro"></i></span>
        Medios de pago
      </a>
    </li>
    <li class="g-py-3">
      <a class="d-block align-middle u-link-v5 g-color-text g-color-primary--hover g-bg-gray-light-v5--hover rounded g-pa-3" href="{{ route('soon') }}">
        <span class="u-icon-v1 g-color-gray-dark-v5 mr-2"><i class="icon-finance-135 u-line-icon-pro"></i></span>
        Ingreso y seguridad
      </a>
    </li>
    <li class="g-pt-3">
      <a class="d-block align-middle u-link-v5 g-color-text g-color-primary--hover g-bg-gray-light-v5--hover rounded g-pa-3" href="{{ route('soon') }}">
        <span class="u-icon-v1 g-color-gray-dark-v5 mr-2"><i class="icon-education-033 u-line-icon-pro"></i></span>
        Notificaciones
      </a>
    </li>
  </ul>
  <!-- End Profile Settings List -->
</aside>
