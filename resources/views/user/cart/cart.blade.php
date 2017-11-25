@extends('layouts.app')
@section('title', 'Carrito de compras')

@section('carrito-de-compras', ' active g-color-primary--parent-active g-bg-gray-light-v5--active ')

@section('content')
  <!-- Breadcrumbs -->
  <section class="g-brd-bottom g-brd-gray-light-v4 g-py-20">
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
          <span>Carrito de compras</span>
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
      <h1 class="h3 g-color-black g-font-weight-400">Carrito de compras</h1>
    </header>

    <div class="row">
      <!-- Profile Settings -->
      <div class="col-lg-3 g-mb-50">
        @include('includes.profile-menu')
      </div>
      <!-- End Profile Settings -->


      <div class="col-lg-9 g-mb-50">
        <!-- Products Block -->
        <div class="rounded g-brd-around g-brd-gray-light-v4 g-overflow-x-scroll g-overflow-x-visible--lg g-pa-30">
          <table class="text-center w-100 table-responsive">
            <thead class="h6 g-brd-bottom g-brd-gray-light-v4 g-color-black text-uppercase">
            <tr>
              <th class="g-font-weight-500 text-left g-pb-20">Producto</th>
              <th class="g-font-weight-500 g-width-130 g-pb-20">Precio</th>
              <th class="g-font-weight-500 g-width-55 g-pb-20">Cantidad</th>
              <th class="g-font-weight-500 g-width-130 g-pb-20">Subtotal</th>
              <th></th>
            </tr>
            </thead>

            <tbody>
            @foreach(auth()->user()->cart->details as $detail)
              <!-- Item-->
              <tr class="g-brd-bottom g-brd-gray-light-v4">
                <td class="text-left g-py-25">
                  <img class="d-inline-block g-width-100 mr-4" src="{{ $detail->product->featured_image_url }}" alt="{{$detail->product->name }}">
                  <div class="d-inline-block align-middle">
                    <h4 class="h6 g-color-black"><a class="u-link-v5 g-color-black g-color-primary--hover" href="{{route('user.products.show', ['id'=> $detail->product->id])}}"
                                                    target="_blank">{{$detail->product->name }}</a></h4>
                    <ul class="list-unstyled g-color-gray-dark-v4 g-font-size-12 g-line-height-1_6 mb-0">
                      <li>{{$detail->product->category->name }}</li>
                    </ul>
                  </div>
                </td>
                <td class="g-color-gray-dark-v2 g-font-size-13">${{ number_format($detail->price, 2) }}</td>
                <td class="g-color-gray-dark-v2 g-font-size-13">{{ number_format($detail->quantity, 0) }}</td>
                {{--<td>--}}
                  {{--<div>--}}
                    {{--<div class="input-group u-quantity-v1 g-width-80 g-brd-primary--focus">--}}
                      {{--<input class="form-control text-center g-font-size-13 rounded-0 g-pa-0 g-mr-10" type="text" value="{{ $detail->quantity }}">--}}
                      {{--<span class="g-color-gray-dark-v4 g-color-black--hover g-cursor-pointer" data-toggle="tooltip" title="Modificar cantidad">--}}
                        {{--<i class="mt-auto fa fa-pencil"></i>--}}
                      {{--</span>--}}
                    {{--</div>--}}
                  {{--</div>--}}
                {{--</td>--}}
                <td class="text-right g-color-black">
                  <span class="g-color-gray-dark-v2 g-font-size-13 g-mr-6">${{ number_format($detail->price * $detail->quantity, 2) }}</span>
                  <a class="u-link-v5 g-color-gray-dark-v4 g-color-black--hover g-cursor-pointer g-mr-6"
                     data-toggle="tooltip" data-placement="top" title="Ver detalles"
                     target="_blank"
                     href="{{route('user.products.show', ['id'=> $detail->product->id])}}">

                    <i class="fa fa-info"></i>
                  </a>

                  <form action="{{ route('user.cart.destroy') }}" method="post" class="d-inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                    <button type="submit"
                            class="btn u-btn-none g-color-gray-dark-v4 g-color-black--hover g-cursor-pointer g-py-0 g-mx-0 g-px-5 bg-transparent"
                            data-toggle="tooltip" data-placement="top" title="Eliminar">
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>

                  {{--<a--}}
                  {{--href="{{route('user.cart.delete', ['id', $detail->id])}}"--}}
                  {{--class="g-color-gray-dark-v4 g-color-black--hover g-cursor-pointer" data-toggle="tooltip" title="Eliminar">--}}
                  {{--<i class="mt-auto fa fa-trash"></i>--}}
                  {{--</a>--}}
                </td>
              </tr>
            @endforeach

            <!-- End Item-->

            <tr>
              <td colspan="4">
                <div class="d-flex justify-content-between g-mt-10">
                  <div class="g-ml-10">
                    <p class="g-color-gray-dark-v4 g-font-size-16 g-mt-10">Items: {{ auth()->user()->cart->details->count() }}. Total: ${{ number_format(auth()->user()->cart->total, 2) }}</p>
                  </div>
                  <form action="{{ route('user.cart.checkout1') }}" method="get">
                  {{--{{ csrf_field() }}--}}

                    @if (auth()->user()->cart->details->count() > 0)
                    <button type="submit"
                       class="btn btn-md u-btn-black g-brd-primary--hover g-bg-primary--hover g-mr-10 g-mb-15 text-uppercase rounded g-font-size-12 ">Realizar pedido<i class="fa fa-check  g-font-size-14 g-ml-6"></i> </button>
                      @endif
                  </form>
                </div>
              </td>
            </tr>

            </tbody>
          </table>
        </div>
        <!-- End Products Block -->
      </div>
    </div>
    <!-- End  -->

  </div>
@endsection


