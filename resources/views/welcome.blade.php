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
          <span>Inicio</span>
        </li>
      </ul>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- Revolution Slider -->
      @include('includes.welcome.revolution-slider')
  <!-- End Revolution Slider -->

  <!-- Features -->
{{--      @include('includes.welcome.features')--}}
  <!-- End Features -->

  <!-- Categories -->
      @include('includes.welcome.categories')
  <!-- End Categories -->

  <!-- Promo Block -->
  {{--    @include('includes.welcome.promo')--}}
  <!-- End Promo Block -->

  <!-- New Arrivals -->
  {{--    @include('includes.welcome.arrivals')--}}
  <!-- End New Arrivals -->
@endsection
