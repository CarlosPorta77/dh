@extends('layouts.app')
@section('title', 'Compras')

@section('tus-compras', ' active g-color-primary--parent-active g-bg-gray-light-v5--active ')

@section('content')
  <!-- Breadcrumbs -->
  <section class="g-brd-bottom g-brd-gray-light-v4 g-py-10">
    <div class="container">
      <ul class="u-list-inline">
        <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-text" href="{{ route('welcome') }}">Home</a>
          <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
        </li>
        <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-text" href="{{ route('home') }}">Panel de control</a>
          <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
        </li>
        <li class="list-inline-item g-color-primary">
          <span>Compras</span>
        </li>
      </ul>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- Flash notifications -->
  @include('includes.flash')
  <!-- End Flash notifications -->

  <div class="container g-pt-20 g-pb-20">

    <header class="text-center mb-4">
      <h1 class="h3 g-color-black g-font-weight-400">Compras</h1>
    </header>

    <div class="row">
      <!-- Profile Settings -->
      <div class="col-lg-3 g-mb-50">
        @include('includes.profile-menu')
      </div>
      <!-- End Profile Settings -->


      <!-- Orders -->
      <div class="col-lg-9 g-mb-50">
        <div class="row justify-content-end g-mb-20 g-mb-0--md">
          <div class="col-md-7 g-mb-30">
            <!-- Search Form -->
            <form class="input-group g-pos-rel">
                  <span class="g-pos-abs g-top-0 g-left-0 g-z-index-3 g-px-13 g-py-10">
                    <i class="g-color-gray-dark-v4 g-font-size-12 icon-education-045 u-line-icon-pro"></i>
                  </span>
              <input class="form-control u-form-control g-brd-around g-brd-gray-light-v3 g-brd-primary--focus g-font-size-13 g-rounded-3 g-pl-35 g-pa-0" type="search"
                     placeholder="Que compra buscás?">
              <div class="input-group-addon g-brd-none g-py-0">
                <a href="{{ route('soon') }}" class="btn u-btn-black g-font-size-13 rounded g-px-18 g-py-10" type="submit">Buscar compras</a>
              </div>
            </form>
            <!-- End Search Form -->
          </div>
        </div>

      @foreach ($orders as $order)
        <!-- Order Block -->
          <div class="g-brd-around g-brd-gray-light-v4 rounded g-mb-30">
            <header class="g-bg-gray-light-v5 g-pa-20">
              <div class="row">
                <div class="col-sm-3 col-md-2 g-mb-20 g-mb-0--sm">
                  <h4 class="g-color-gray-dark-v4 g-font-weight-400 g-font-size-12 text-uppercase g-mb-2">Fecha</h4>
                  {{--<span class="g-color-black g-font-weight-300 g-font-size-13">{{ $order->order_date->format('d-m-Y') }}</span>--}}
                  <span class="g-color-black g-font-weight-300 g-font-size-13">DD/MM/YYY</span>
                </div>

                <div class="col-sm-3 col-md-2 g-mb-20 g-mb-0--sm">
                  <h4 class="g-color-gray-dark-v4 g-font-weight-400 g-font-size-12 text-uppercase g-mb-2">Total</h4>
                  <span class="g-color-black g-font-weight-300 g-font-size-13">${{number_format($order->total, 2)}}</span>
                </div>

                <div class="col-sm-3 col-md-5 g-mb-20 g-mb-0--sm">
                  <h4 class="g-color-gray-dark-v4 g-font-weight-400 g-font-size-12 text-uppercase g-mb-2">Entrega</h4>
                  <span class="g-color-black g-font-weight-300 g-font-size-13">{{$order->shipping_address}}</span>

                </div>

                <div class="col-sm-3 col-md-3 ml-auto text-sm-right">
                  <h4 class="g-color-gray-dark-v4 g-font-weight-400 g-font-size-12 text-uppercase g-mb-2">N° Orden</h4>
                  <span class="g-color-black g-font-weight-300 g-font-size-13">{{$order->id}}</span>

                </div>
              </div>
            </header>

            <!-- Order Content -->
            <div class="g-pa-20">
              <div class="row">
                <div class="col-md-8 col-lg-9">
                  <div class="mb-4">
                    <h3 class="h5 mb-1"></h3>
                  </div>

                  @foreach($order->details as $detail)
                  <div class="row">
                    <div class="col-4 col-sm-3 g-mb-30">
                      <img class="img-fluid" src="{{ asset($detail->product->featured_image_url) }}" alt="{{$detail->product->name}}" width="150">
                    </div>

                    <div class="col-8 col-sm-9 g-mb-30">
                      <h4 class="h6 g-font-weight-400"><a href="#">{{$detail->product->name}}</a></h4>
                      <span class="d-block g-color-gray-dark-v4 g-font-size-13 mb-2">{{$detail->product->description}}</span>
                      <span class="d-block g-color-lightred mb-2">{{$detail->quantity}} x ${{number_format($detail->price, 2)}}</span>
                    </div>
                  </div>
                    @endforeach
                </div>

              </div>
            </div>
            <!-- End Order Content -->
          </div>
          <!-- End Order Block -->
        @endforeach
        {!! $orders->links('vendor.pagination.bootstrap-4'); !!}

      </div>
    </div>
    <!-- End  -->

  </div>
@endsection


