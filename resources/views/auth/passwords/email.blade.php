@extends('layouts.app')

@section('content')
  <!-- Breadcrumbs -->
  <section class="g-brd-bottom g-brd-gray-light-v4 g-py-20">
    <div class="container">
      <ul class="u-list-inline">
        <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-text" href="{{ route('welcome') }}">Home</a>
          <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
        </li>
        <li class="list-inline-item g-color-primary">
          <span>Recuperar contraseña</span>
        </li>
      </ul>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- Login -->
  <section class="container g-py-30">
    <div class="row justify-content-center">
      <div class="col-sm-9 col-md-7 col-lg-5">
        <div class="g-brd-around g-brd-gray-light-v3 g-bg-white rounded g-px-30 g-py-50 mb-4">
          <header class="text-center mb-4">
            <h1 class="h4 g-color-black g-font-weight-400">Olvidaste tu contraseña?</h1>
            <p>Ingresá tu correo electrónico para resetear tu contraseña.</p>
          </header>

          <!-- Form -->
          <form class="g-py-15" role="form" method="POST" action="{{ url('/password/email') }}">
            {!! csrf_field() !!}

            <div class="mb-4">
              <div class="input-group g-rounded-left-5">
                    <span class="input-group-addon g-width-45 g-brd-gray-light-v3 g-color-gray-dark-v5">
                      <i class="icon-finance-067 u-line-icon-pro"></i>
                    </span>
                <input
                    class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-rounded-left-0 g-rounded-right-5 g-py-15 g-px-15 {{ $errors->has('email') ? ' is-invalid' : '' }}"
                    type="email"
                    placeholder="Correo electrónico"
                    name="email"
                    value="{{ old('email') }}">
                @if ($errors->has('email'))
                  <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                  </div>
                @endif

              </div>
            </div>

            <button class="btn btn-block u-btn-primary g-font-size-12 text-uppercase g-py-15 g-px-25" type="submit">Obtener nueva contraseña</button>
          </form>
          <!-- End Form -->
        </div>
      </div>
    </div>
  </section>
  <!-- End Login -->


  {{--<div class="container">--}}
    {{--<div class="row justify-content-md-center mt-5">--}}
      {{--<div class="col-md-8">--}}
        {{--<div class="card">--}}
          {{--<div class="card-header">Olvidaste tu contraseña?</div>--}}
          {{--<div class="card-body">--}}
            {{--@if (session('status'))--}}
              {{--<div class="alert alert-success">--}}
                {{--{{ session('status') }}--}}
              {{--</div>--}}
            {{--@endif--}}

            {{--<form role="form" method="POST" action="{{ url('/password/email') }}">--}}
              {{--{!! csrf_field() !!}--}}

              {{--<div class="form-group row">--}}
                {{--<label class="col-lg-4 col-form-label text-lg-right">E-Mail Address</label>--}}

                {{--<div class="col-lg-6">--}}
                  {{--<input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">--}}

                  {{--@if ($errors->has('email'))--}}
                    {{--<div class="invalid-feedback">--}}
                      {{--<strong>{{ $errors->first('email') }}</strong>--}}
                    {{--</div>--}}
                  {{--@endif--}}
                {{--</div>--}}
              {{--</div>--}}

              {{--<div class="form-group row">--}}
                {{--<div class="col-lg-6 offset-lg-4">--}}
                  {{--<button type="submit" class="btn btn-primary">--}}
                    {{--Send Password Reset Link--}}
                  {{--</button>--}}
                {{--</div>--}}
              {{--</div>--}}
            {{--</form>--}}
          {{--</div>--}}
        {{--</div>--}}
      {{--</div>--}}
    {{--</div>--}}
  {{--</div>--}}
@endsection
