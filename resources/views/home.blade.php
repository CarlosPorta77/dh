@extends('layouts.app')
@section('title', 'Panel de control')

@section('content')
  <!-- Breadcrumbs -->
  <section class="g-brd-bottom g-brd-gray-light-v4 g-py-10">
    <div class="container">
      <ul class="u-list-inline">
        <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-text" href="{{ route('home') }}">Home</a>
          <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
        </li>
        <li class="list-inline-item g-color-primary">
          <span>Panel control</span>
        </li>
      </ul>
    </div>
  </section>
  <!-- End Breadcrumbs -->


  <!--  -->
  <div class="container g-pt-20 g-pb-20">

    <header class="text-center mb-4">
      <h1 class="h3 g-color-black g-font-weight-400">Panel de control</h1>
    </header>

    <div class="row">
      <!-- Profile Settings -->
      <div class="col-lg-3 g-mb-50">
        @include('includes.profile-menu')
      </div>

      <div class="col-lg-9 g-mb-50">
      </div>
      <!-- End Profile Settings -->
    </div>
    <!-- End  -->
  </div>
@endsection


{{--@if (session('status'))--}}
{{--<div class="alert alert-success">--}}
{{--{{ session('status') }}--}}
{{--</div>--}}
{{--@endif--}}

{{--You are logged in!!!--}}


{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--<div class="container">--}}
{{--<div class="row mt-5">--}}
{{--<div class="col-md-8 offset-md-2">--}}
{{--<div class="card">--}}
{{--<div class="card-header">Dashboard</div>--}}

{{--<div class="card-body">--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
